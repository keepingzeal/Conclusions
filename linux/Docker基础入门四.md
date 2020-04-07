## Docker基础入门（四）

#### 本章节目的

1. 使用仓库管理

#### Docker 仓库管理--Docker Hub

- ```
  #镜像地址https://hub.docker.com
  #登录docker
  docker login
  
  #退出docker
  docker logout
  
  #查找镜像
  docker search [镜像名]
  
  #拉取镜像
  docker pull
  
  #标记镜像
  docker tag [REPOSITORY:TAG] [username]/[pojectName:version]
    #username是DockerHub地址用户名
    #pojectName是DockerHub地址项目名称
    #version是自定义版本名
  
  #推送镜像
  docker push [pojectName:version]
  ```
  
