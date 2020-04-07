## Docker基础入门（一）

#### 本章节目的

1. 安装docker
2. 更换国内镜像
3. docker 拉取项目
4. docker run 指令 -i -t -d -p -P参数使用
5. docker images 查看当前拥有的镜像
6. docker logs 查看容器的日志
7. docker top 查看容器内部进程
8. docker inspect 查看容器底层信息

#### Centos安装docker

- https://www.runoob.com/docker/windows-docker-install.html



#### Docker 镜像加速

- vim  /etc/docker/daemon.json
  
- ```
  {"registry-mirrors":["https://registry.docker-cn.com"]}
  ```

- 重启服务
  - sudo systemctl daemon-reload	
  - sudo systemctl restart docker



#### Docker Hello World

```linux
docker run ubuntu:15.10 /bin/echo "Hello world"
Hello world
```

- docker run ：组合运行一个容器

- ubuntu:15.10 ：指定要运行的镜像，不存在则从镜像仓库下载

- /bin/echo "Hello world" ：在启动的容器里执行命令

  

#### 运行交互式的容器

```linux
docker run -i -t ubuntu:15.10 /bin/bash
```

- -t：在新容器内指定一个伪终端或终端
- -i：允许你对容器内的标准输入进行交互



#### 退出

- Ctrl + D
- exit



#### 启动容器（后台模式）

```linux
docker run -d ubuntu:15.10 /bin/sh -c "while true; do echo hello world; sleep 1; done"

2b1b7a428627c51ab8810d541d759f072b4fc75487eed05812646b8534a2fe63
```

- 2b1b7a...是容器ID
- 确认容器有在运行
  - docker ps -a
    - CONTAINER ID: 容器 ID
    - IMAGE**:** 使用的镜像
    - COMMAND**:** 启动容器时运行的命令
    - CREATED: 容器的创建时间
    - STATUS: 容器状态
      - created（已创建）
      - restarting（重启中）
      - running（运行中）
      - removing（迁移中）
      - paused（暂停）
      - exited（停止）
      - dead（死亡）
    - PORTS：容器的端口信息和使用的链接类型（tcp\udp)
    - NAMES：自动分配的容器名称

#### 查看容器内的标准输出

- docker logs [CONTAINER | NAMES]

#### 停止容器

- docker stop [CONTAINER | NAMES]

#### 重启容器

- docker restart [CONTAINER | NAMES]

#### 其他

- 查询最后一次创建的容器

  - ```
    docker ps -l
    ```

#### 容器使用

- 获取镜像

  - 如果我们本地没有 ubuntu 镜像，我们可以使用 docker pull 命令来载入 ubuntu 镜像

    - ```linux
      docker pull ubuntu
      ```

- 启动容器

  - ```linux
    docker run -it ubuntu
    ```

- 后台运行

  - ```linux
    docker run -itd ubuntu
    ```

- 进入后台容器

  - docker attach [CONTAINER | NAMES]
  - **docker exec**：推荐大家使用 docker exec 命令，因为此退出容器终端，不会导致容器的停止
    - docker exec -it [CONTAINER | NAMES] /bin/bash  

#### 导出和导入容器

- 如果要导出本地某个容器，可以使用 **docker export** 命令

  - ```linux
    docker export 1e560fca3906 > ubuntu.tar
    ```

- 导入容器快照

  - ```
    docker import [url]
    ```

  - ```linux
    cat [快照文件] | docker import - [镜像]
    ```

#### 删除容器

- ```
  docker rm -f 1e560fca3906
  ```

- 清理掉所有处于终止状态的容器

  - docker container prune

#### 运行一个 web 应用

- 我们将在docker容器中运行一个 Python Flask 应用来运行一个web应用【注：记得开启服务器安全组】

- ```
  docker pull training/webapp # 载入镜像
  docker run -d -P training/webapp python app.py 
  #-d：容器后台运行
  #-P：内部使用的网络端口映射到我们使用的主机上
  
  #也可以通过 -p 参数来设置不一样的端口
  docker run -d -p 5001:5000 training/webapp python app.py
  ```

- 快速查看容器端口号

  - ```
    docker port  [CONTAINER | NAMES]
    ```

#### 查看 WEB 应用程序日志

- ```
  docker logs -f [CONTAINER | NAMES]
  # -f: 让 docker logs 像使用 tail -f 一样来输出容器内部的标准输出
  ```

#### 查看WEB应用程序容器的进程

- 容器内部运行的进程

  - ```
    docker top [CONTAINER | NAMES]
    ```

#### 检查 WEB 应用程序

- 查看 Docker 的底层信息

  - ```
    docker inspect [CONTAINER | NAMES]
    ```
