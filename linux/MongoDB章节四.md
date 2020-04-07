## 章节四

##### 章节目的

- db.collection.find()
- 匹配查询
- 查询操作符

##### 术语

- 游标：find命令返回的文档集合
- 投射：只返回部分字段

##### 读取文档

- ```
  db.<collection>.find(<query>, <projection>)
  #<projection>文档定义了对读取结果进行的“投射”
  
  #整理格式
  db.<collection>.find().pretty()
  
  
  #-----比较操作符-------------------
  {<field>: {$<operator>: <value>}}
  $eq,$ne,$gt,$gte,$lt,$lte
  #注意：
  #$eq 会筛选出不包含查询字段（复合主键）的文档
  #$lt:<string> 找出按照字母排序，在string前面的字符（其余比较符同理）
  
  $in/$nin
  {<field>: {$[n]in: [<v1>,<v2>]}}
  
  
  #-----逻辑操作符-------------------
  $not	：匹配筛选条件不成立的文档
  {field:{$not:{<operator-expression>}}}
  #例子：{field:{$not:{$lt:100}}}
  #$eq 会筛选出不包含查询字段（复合主键）的文档
  
  $and	：匹配多个筛选条件全部成立的文档
  #例子：{field:{$and:[{},{}]}}
  #例子简写：{field:{},field:{}}
  #例子简写：{field:{$gt:100,$lt:150}}
  
  $or		：匹配至少一个筛选条件成立的文档
  #例子：{field:{$or:[{},{}]}}
  #注意：如果or操作符中使用eq,不如用in查询符
  
  $nor	：匹配多个筛选条件全部不成立的文档
  #同上
  
  
  #-----字段操作符-------------------
  exists
  #{field:{$exists: <boolean>}}
  #可以解决eq、not等问题，获取更准确的结果
  
  type
  #{field:{$type:<BSON type>}}
  #BSON type:字符类型
  
  
  #-----数组操作符-------------------
  $all：匹配数组字段中包含所有查询值的文档
  {field:{$all:[<v1>,<v2>]}}
  # 测试数据
  #db.accounts.insert([
  	{
  		name:'jack',
  		balance:2000,
  		content:['11111', 'Alabama', 'US']
  	},
  	{
  		name:'karen',
  		balance:2500,
  		content:[['222222','333333'], 'Beijing', 'China']
  	}
  ]);
  #例子1：db.accounts.find({content:{$all:['China']}})
  #例子2：db.accounts.find({content:{$all:[['222222','333333']]}})
  
  
  $elemMatch：匹配数组字段中至少存在一个值满足筛选条件的文档
  #例子1：db.accounts.find({content:{$elemMatch:{$gt:'10000',$lt:'20000000'}}})
  
  #例子2：
  $all与$elemMatch结合
  {field:{
  	$all:[
  		{$elemMatch:{$gt:'1000',$lt:'2000'}},
  		{$elemMatch:{$gt:'2000',$lt:'3000'}},
  	]
  }}
  
  
  #-----运算操作符-------------------
  $regex：匹配满足正则表达式的文档
  #语法1：{<field>:{$regex:/pattern/, '<options>'}} 一般推荐这种方式
  #例子1：db.accounts.find({name:{$regex:/karen/, $options:'i'}})
  
  #语法2：{<field>:{:/pattern/<options>}} 在配合in操作符一起使用才能使用该表达式
  #例子2：db.accounts.find({name:{$in:[/^b/, /j/]}})
  
  
  #文档游标
  find()返回一个文档集合游标M
  在不迭代的情况先，默认只列出前20个文档
  var myCursor = db.accounts.find();
  myCursor; // 默认访问集合下的文档
  myCursor[1] //默认返回第一个文档
  
  游历完所有文档后，或在10分钟后，游标会自动关闭
  可以使用noCursorTimeout()来保持游标一直有效
  var myCursor = db.accounts.find().noCursorTimeout();
  
  #-----游标函数-------------------
  cursor：变量名
  *var myCursor = db.accounts.find()
  cursor.hasNext()
  cursor.next()
  while(myCursor.hasNext()){printjson(myCursor.next())}
  
  cursor.forEach()
  myCursor.forEach(printjson)
  
  cursor.limit()：获取文档集合的第N篇
  db.accounts.find().limit(1)
  #注意：limit(0),与不用limit没区别
  
  cursor.skip():跳过文档集合的第N篇
  db.accounts.find().skip(1)
  
  cursor.count(<applySkipLimit>)
  #applySkipLimit:boolean
  #默认情况下，<applySkipLimit>的值是false,即语句中若是使用了skip(),limit()等游标函数，也会默认忽略掉
  #下面这个例子会忽略limit()函数
  #db.accounts.find().limit(1).conut() // 20
  #当count设为true时，则limit(),skit()生效
  #db.accounts.find().limit(1).conut(true) // 1
  
  cursor.sort(<document>)
  #db.accounts.find().sort( {balance:1, name:-1} )
  #综合使用(1)-读取余额最大的银行账户文档
  #db.accounts.find().sort({balance:-1}).limit(1)
  
  #综合查询的特殊问题
  #db.accounts.find().limit(5).skip(3);
  #直接读：会认为返回2篇文档，但结果是5篇
  #实际读法：拿出整篇文档，然后跳过前3篇，再拿前5篇
  #so,skit,sort永远都来在limit前调用，也就是放在末尾使用
  #游标函数的实际应用顺序是sort(),skip(),limit()
  ```

##### 投影文档

```
#选择性返回文档中的部分字段
db.accounts.find({}, {name:1})
#结果会默认把_id带上，如果不想带上_id，则{name:1, _id:0}

#不返回部分字段，但要其他的字段
db.accounts.find({}, {name:0, _id:0})

db.accounts.find({}, {balance:1, name:0, _id:0})
#上面这个例子会报错，会触发错误“使用投影文档，不能混合使用‘包含’与‘不包含‘这两种投影操作”（除主键外）
#要么列出所有（不）包含的字段

#db.accounts.find({}, {name:1, content:{$slice:1}, _id:0})
#$slice:获取数组的第一位
#$slice:-1 获取倒数第一位
#$slice:-2 获取倒数两位
#$slice:[x,y],x:代表skip多少位，y代表limit多少位 

db.accounts.find({}, {name:1, _id:0, content:{$elemMatch:{$gt:'Alabama'}}})
#content:返回书数组中“第一位“大于’Alabama'的数组元素，参考如下结果：
{ "name" : "bb1" }
{ "name" : "jack", "content" : [ "US" ] }

db.accounts.find({content:{$gt:'Alabama'}}, {name:1, _id:0, "content.$":1}) 
# 使用了content.$，就不再额外使用自定义的筛选条件

```

