## 章节五

##### 更新文档

- ```
  db.collection.update()
  db.collection.update(<query>, <update>, <options>)
  #<query>:更新操作时的筛选文档的条件
  #<update>:更新的文档内容
  #<options>:应用于更新操作的选项与操作
  
  #默认情况下，文档id不会被更改
  
  ```

#<update>内容要写全，不写全则会被默认替换
  例子：
  原：{ "_id" : ObjectId("5e8bf1c4fa3fb6d29643f0f8"), "name" : "bilibili3", "balance" : "999" }
  步骤一：db.accounts.update({name:'bilibili3'}, {balance:'998'})
  数据：{ "_id" : ObjectId("5e8bf1c4fa3fb6d29643f0f8"), "balance" : "998" }
  更新是否，如果带上id，必须要与之前的id一直，否则会报错


  <query>查询出多篇文档，但是<update>只会对第一篇进行更新

  如何更新特定的文档参数
  #更新操作符
  $set:更新指定字段或新增字段

```
db.accounts.update({name:'jack'},{$set:{balance:30000,info:{dateOpened:new Date('2016-05-18T16:00:00Z'),'branch':'branch1'}}})

#若是更新数组的某个字段，则用下标来更新
db.accounts.update({name:'jack'}, {'content.0':666666})

#若新增字段，超过字段值太多，则多余的字段会被设为null
db.acconts.update({name:'jack'},{$set:{'content.5':'bibibi'}})
"content" : [
		null,
		"Alabama",
		"US",
		null,
		null,
		"bibibi"
	],
```

  $unset:删除字段
  $rename:重命名字段
  $inc:加减字段值
  $mul:相乘字段值
  $min:比较较小字段值
  $max:比较较大字段值

  ```
  
  


  ```