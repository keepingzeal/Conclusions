## 章节一

##### 章节目的

- CURD基础操作

##### 创建---Create

- 文档主键_ID

  - 唯一性，与常见的关系型数据库中的主键相似
  - 支持所有数据类型（数组除外）
  - 复合主键

- 对象主键 ObjectId

  - 默认的文档主键
  - 可以快速生成12字节id
  - 包含创建时间
  - 特殊情况
    - 同一秒多个数据存储，无法保证精确度
    - 在客户端生成，各个客户端的时间生成，导致对象主键创建的排序与创建时间不一致

- 创建文档

  - db.collection.insert()
  - db.collection.save()--同上
  - 创建多个文档

- 注意

  - insertOne/insertMany不支持explain命令
  - insert支持

- **实战**

  - db.collection.insertOne()

    - ```json
      db.<collection>.insertOne{
      	<dcoument>,
      	{
      		writeConcern: <document>
      	}
      }
      # collection： 写入的集合名称
      # document： 写入的文档本身
      # writeConcern： 定义本次文档创建操作的安全写级别，安全写级别越高，写入延迟也高，丢失数据风险就越低，不提供则默认
      
      例子：
      db.accounts.insertOne(
      	{
      		_id:'account1',
      		name:'bilibili',
      		balance:100
      	}
      )
      # 写入成功后
      { "acknowledged" : true, "insertedId" : "account1" }
      acknowledged：默认安全写级别被启用
      insertedId：被写入文档的值
      
      # 重复写入相同数据会报错，可使用try-catche捕捉异常
      try {
          db.accounts.insertOne(
              {
                  _id:'account1',
                  name:'bilibili',
                  balance:100
              }
          )
      } catch (e) {
      	print(e)
      }
      
      # 会得到以下错误信息
      WriteError({
      	"index" : 0,
      	"code" : 11000,
      	"errmsg" : "E11000 duplicate key error collection: test.accounts index: _id_ dup key: { _id: \"account1\" }",
      	"op" : {
      		"_id" : "account1",
      		"name" : "bilibili",
      		"balance" : 100
      	}
      })
      
      # 只要不指定主键，则自动生成
      ```

  - db.collection.insertMany()

    - ```json
      db.accounts.insertMany(
      	[
      		{
                  name:'bilibili1',
                  balance:100
              },
              {
                  name:'bilibili2',
                  balance:100
              }
      	],{order:false}
      )
      # 按照顺序写入时，一旦遇到错误，操作便会退出，剩余的文档无论正确与否，都不会执行
      # 乱序写入(order==false)，即使某些文档造成错误，剩余正确的文档仍然会被写入
      ```

  - db.collection.insert()
  
    - ```json
      db.accounts.insert(
      	{
      		'name':'bilibili',
      		blance:100
      	}
      )
      # 返回结果
      WriteResult({ "nInserted" : 1 })
      ```
  
- 插入数据三种命令的结果文档格式

  - ```json
    db.collection.insertOne()
    # 正确
    {
    	"acknowledged" : true,
    	"insertedId" : ObjectId("5e719b161bdda6f6c7ea6c66")
    }
    
    # 错误
    WriteError({
    	"index" : 0,
    	"code" : 11000,
    	"errmsg" : "E11000 duplicate key error collection: test.accounts index: _id_ dup key: { _id: \"account1\" }",
    	"op" : {
    		"_id" : "account1",
    		"name" : "bilibili",
    		"balance" : 100
    	}
    })
    
    db.collection.insertMany()
    # 正确
    {
    	"acknowledged" : true,
    	"insertedIds" : [
    		ObjectId("5e719b431bdda6f6c7ea6c67"),
    		ObjectId("5e719b431bdda6f6c7ea6c68")
    	]
    }
    
    # 错误
    BulkWriteError({
    	"writeErrors" : [
    		{
    			"index" : 0,
    			"code" : 11000,
    			"errmsg" : "E11000 duplicate key error collection: test.accounts index: _id_ dup key: { _id: \"account1\" }",
    			"op" : {
    				"_id" : "account1",
    				"name" : "bilibili1",
    				"balance" : 100
    			}
    		}
    	],
    	"writeConcernErrors" : [ ],
    	"nInserted" : 0,
    	"nUpserted" : 0,
    	"nMatched" : 0,
    	"nModified" : 0,
    	"nRemoved" : 0,
    	"upserted" : [ ]
    })
    
    db.collection.insert()
    # 正确
    # --写入单个
    WriteResult({ "nInserted" : 1 })
    # --写入多个
    BulkWriteResult({
    	"writeErrors" : [ ],
    	"writeConcernErrors" : [ ],
    	"nInserted" : 2,
    	"nUpserted" : 0,
    	"nMatched" : 0,
    	"nModified" : 0,
    	"nRemoved" : 0,
    	"upserted" : [ ]
    })
    
    # 错误
    # --写入单个
    WriteResult({
    	"nInserted" : 0,
    	"writeError" : {
    		"code" : 11000,
    		"errmsg" : "E11000 duplicate key error collection: test.accounts index: _id_ dup key: { _id: \"account1\" }"
    	}
    })
    # --写入多个
    BulkWriteResult({
    	"writeErrors" : [
    		{
    			"index" : 0,
    			"code" : 11000,
    			"errmsg" : "E11000 duplicate key error collection: test.accounts index: _id_ dup key: { _id: \"account1\" }",
    			"op" : {
    				"_id" : "account1",
    				"name" : "bilibili1",
    				"balance" : 100
    			}
    		}
    	],
    	"writeConcernErrors" : [ ],
    	"nInserted" : 0,
    	"nUpserted" : 0,
    	"nMatched" : 0,
    	"nModified" : 0,
    	"nRemoved" : 0,
    	"upserted" : [ ]
    })
    ```

- explain--数据库索引

