## 章节一

##### 本章节目的

- 利用Docker搭建基础使用环境


##### 配置本地环境

- 下载docker镜像
  - docker pull mongo:4

- 启动一个MongoDB服务容器
  - docker run --name mymongo -v /myongo/data:/data/db -d mongo:4
    - -v 挂载数据目录
- 查看日志
  - docker logs mymongo

##### MongoDb数据库管理界面--Mongo Express

- docker pull mongo-express
- 联系mongo容器
  - docker run -d --link mymongo:mongo -p 8081:8081 mongo-express
    - --link 联系指定容器

##### 查看版本

- 客户端
  - db.version();
- 服务器端
  - mongo --version