### 常用指令

#### 查看centos版本

- lsb_release -a 适用于Redhat、Suse、Debian、Centos等

#### 查看是否安装过某些软件

- **rpm包安装：**rpm -qa | grep "软件包名"
- **deb包安装：**dpkg -l | grep "软件包名"
- **yum安装：**yum list installed | grep "软件包名"
- 源码安装通过.tar.gz  tar.bz2之只能看执行文件是否存在

#### 返回上一个目录

- cd -

#### 查看端口是否被使用

- netstat -anp | grep 端口号

