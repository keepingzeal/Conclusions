## Docker基础入门（二）

#### 本章节目的

1. docker images 查看当前的镜像
2. docker pull 拉取新镜像
3. docker rmi 删除镜像
4. 创建镜像
   1. docker commit 根据本地的镜像创建一个新的镜像
   2. Dockerfile
      1. docker build
5. 设置镜像标签



#### 列出镜像列表

- docker images

  - REPOSITORY：表示镜像的仓库源
  - TAG**：**镜像的标签
  - IMAGE ID：镜像ID
  - CREATED：镜像创建时间
  - SIZE：镜像大小

- 如果要使用版本为15.10的ubuntu系统镜像来运行容器时，命令如下：

  - ```
    docker run -t -i ubuntu:15.10 /bin/bash 
    ```

- 如果要使用版本为 14.04 的 ubuntu 系统镜像来运行容器时，命令如下：

  - ```
    docker run -t -i ubuntu:14.04 /bin/bash 
    ```

- 如果你不指定一个镜像的版本标签，例如你只使用 ubuntu

  - docker 将默认使用 ubuntu:latest 镜像

#### 获取一个新的镜像

- ```
  docker pull [镜像名]
  ```

  - NAME: 镜像仓库源的名称
  - DESCRIPTION: 镜像的描述
  - OFFICIAL: 是否 docker 官方发布
  - stars: 类似 Github 里面的 star，表示点赞、喜欢的意思。
  - AUTOMATED: 自动构建。

#### 删除镜像

- ```
  docker rmi [CONTAINER | NAMES]
  ```

#### 查找镜像

- ```
  docker search [镜像名]
  ```

#### 创建镜像

- 当我们从 docker 镜像仓库中下载的镜像不能满足我们的需求时，我们可以通过以下两种方式对镜像进行更改

  - 从已经创建的容器中更新镜像，并且提交这个镜像
  - 使用 Dockerfile 指令来创建一个新的镜像

- 更新镜像

  - 进入到容器里面更新

  - ```
    docker commit -m="has update" -a="runoob" e218edb10161 runoob/ubuntu:v2
    ```

    - **-m:** 提交的描述信息
    - **-a:** 指定镜像作者
    - **e218edb10161：**容器 ID
    - **runoob/ubuntu:v2:** 指定要创建的目标镜像名

  - docker images查看刚才提交的副本

#### 构建镜像

- ```
  #查找镜像
  https://hub.docker.com
  ```

- ```
  1、copy Dockerfile 的内容
  2、例如：
  https://github.com/CentOS/sig-cloud-instance-images/blob/dcf7932cbda6dd9865d50bfe969927e3e1f0c671/docker/Dockerfile
  3、并且返回当前目录的上级：
  https://github.com/CentOS/sig-cloud-instance-images/tree/dcf7932cbda6dd9865d50bfe969927e3e1f0c671/docker
  4、下载tar.xz文件
  wget https://github.com/CentOS/sig-cloud-instance-images/blob/dcf7932cbda6dd9865d50bfe969927e3e1f0c671/docker/centos-7.7-x86_64-docker.tar.xz
5、docker build -t centos7.7 -f Dockerfile .
  ```

#### 设置镜像标签

- ```
  docker tag [IMAGE ID] [REPOSITORY]:[TAG]
  ```