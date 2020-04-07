## Docker基础入门（三）

#### 本章节目的

1. 端口映射，可指定网络地址、端口号、请求类型
2. 容器之间互联
3. 配置DNS

#### 网络端口映射

- ```
  docker run -p 127.0.0.1:5001:5000/[udp/tcp] [REPOSITORY:TAG] [指令]
  -p 可以指定网络地址，端口，协议
    [ip:][外端口]:[容器端口]/[协议]
  -P 随机端口
  ```

#### Docker 容器互联

- 容器命名
  
  - docker run -d -P --name  [新名称]  [REPOSITORY:TAG]  [指令]
  
- 新建网络

  - ```
    docker network create -d bridge test-net
    -d：参数指定 Docker 网络类型，有 bridge、overlay
    其中 overlay 网络类型用于 Swarm mode，在本小节中你可以忽略它
    
    docker network ls 查看当前网路
    ```

- 连接容器

  - ```
    $ docker run -itd --name [自定义] --network [NAME] [REPOSITORY:TAG] /bin/bash
    --network 当前网络
    ```

#### 配置DNS

- 主机 vim  /etc/docker/daemon.json

  - ```
    {
      "dns" : [
        "114.114.114.114",
        "8.8.8.8"
      ]
    }
    ```

  - 配置完需要重启docker

    - sudo systemctl daemon-reload	
    - sudo systemctl restart docker

  - 检测容器是否生效【未生效】

    - ```
      docker run -it [REPOSITORY:TAG]  cat etc/resolv.conf
      ```

  - 手动指定容器的配置【未生效】

    - ```
      docker run -it --rm host_ubuntu  --dns=114.114.114.114 --dns-search=test.com ubuntu
      ```