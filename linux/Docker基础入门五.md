## Docker基础入门（五）

#### 本章节目的：



#### 什么是 Dockerfile？

- 构建镜像的文本文件
- 文本内容包含了一条条构建镜像所需的指令和说明

#### Dockerfile 定制镜像

- 构建Nginx为例

  - ```
    FROM nginx
    RUN echo '这是一个本地构建的nginx镜像' > /usr/share/nginx/html/index.html
    
    # FROM：定制的镜像都是基于 FROM 的镜像，也叫基础镜像
    # RUN：用于执行后面跟着的命令行命令，有2种格式
    	# shell 格式
    		RUN <命令行命令>
    		# <命令行命令> 等同于，在终端操作的 shell 命令。
    	# exec 格式
    		RUN ["可执行文件", "参数1", "参数2"]
    		# RUN ["./test.php", "dev", "offline"] 等价于 RUN ./test.php dev offline
    ```

  - **注意**

    - Dockerfile 的指令每执行一次都会在 docker 上新建一层。所以过多无意义的层，会造成镜像膨胀过大，例如：

    - 

      ```
      FROM centos
      RUN yum install wget
      RUN wget -O redis.tar.gz "http://download.redis.io/releases/redis-5.0.3.tar.gz"
      RUN tar -xvf redis.tar.gz
      以上执行会创建 3 层镜像。可简化为以下格式：
      # 以 && 符号连接命令，这样执行后，只会创建 1 层镜像
      FROM centos
      RUN yum install wget \
          && wget -O redis.tar.gz "http://download.redis.io/releases/redis-5.0.3.tar.gz" \
          && tar -xvf redis.tar.gz
      ```

#### Dockerfile指令详解

- ```
  COPY:复制指令，从上下文目录中复制文件或者目录到容器里指定路径。
  	COPY [--chown=<user>:<group>] <源路径1>...  <目标路径>
  	COPY [--chown=<user>:<group>] ["<源路径1>",...  "<目标路径>"]
  	# [--chown=<user>:<group>]：可选参数，用户改变复制到容器内文件的拥有者和属组
      # <源路径>：源文件或者源目录，这里可以是通配符表达式
      # <目标路径>：容器内的指定路径，该路径不用事先建好，路径不存在的话，会自动创建
      
  ADD:同上
  CMD:类似于 RUN 指令，用于运行程序，但二者运行的时间点不同
  	CMD 在docker run 时运行。
  	RUN 是在 docker build。
  ENTRYPOINT
  ENV
  ARG
  VOLUME
  VOLUME
  WORKDIR
  USER
  HEALTHCHECK
  ONBUILD
  ```

  

