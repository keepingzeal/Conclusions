[TOC]



#### 1、CentOS 7的yum更换为国内的阿里云yum源

```
1、备份
mv /etc/yum.repos.d/CentOS-Base.repo /etc/yum.repos.d/CentOS-Base.repo.backup

2、下载新的CentOS-Base.repo 到/etc/yum.repos.d/
centos7
wget -O /etc/yum.repos.d/CentOS-Base.repo http://mirrors.aliyun.com/repo/Centos-7.repo
或
curl -o /etc/yum.repos.d/CentOS-Base.repo http://mirrors.aliyun.com/repo/Centos-7.repo

3、添加EPEL
CentOS 7
wget -O /etc/yum.repos.d/epel.repo http://mirrors.aliyun.com/repo/epel-7.repo

4、清理缓存并生成新的缓存
yum clean all
yum makecache
```

#### 2、yum update 与 yum upgrade区别

```
yum -y update
升级所有包同时也升级软件和系统内核

yum -y upgrade 
只升级所有包，不升级软件和系统内核 
```

#### 3、yum安装MySQL

```
1、yum localinstall https://repo.mysql.com//mysql80-community-release-el7-1.noarch.rpm
2、删除依赖 mariadb组件 yum -y remove mariadb-libs
3、yum install mysql-community-server
```

#### 4、常用指令

```
service mysqld start #启动MySQL
service mysqld status #查看状态
sudo grep 'temporary password' /var/log/mysqld.log  #查看安装时候自动分配的初始密码

#改登录密码
use mysql;
ALTER USER 'root'@'localhost' IDENTIFIED BY '密码';
flush privileges;
```

#### 5、安装第三方依赖包

```
yum install -y perl
yum install -y net-tools
```

#### 6、修改权限

```
chmod -R 777 /var/lib/mysql/
```

#### 7、初始化

```
mysqld --initialize
chmod -R 777 /var/lib/mysql/*

#查询临时密码
grep 'temporary password' /var/log/mysqld.log
```

#### 8、vagrant下如果遇到连接不上（不用vagrant可忽略）

```
create user 'root'@'192.168.33.10' identified by '123456';
grant all privileges on *.* to 'root'@'192.168.33.10' with grant option;
flush privileges;
```

#### 9、MyISAM、InnoDB、TokuDB引擎

```
MyISAM：读取速度很快，适合读多写少场景，不支持事务，为了保证数据一致性，干脆写入数据的时候锁表，不允许其他的并发写入，如果连续写入多条数据，想要一起回滚是不可能的，所以不具备事务的MyISAM引擎在很多业务中是无法胜任的，并且崩溃后的维护难度比InnoDB大，所以几乎没人使用;
InnoDB：最大特点，支持事务，适合读多写多，维护综合成本相对低
TokuDB：只支持Linux系统，因为InnoDB单表的数据量超过2000w，那么这张表的读取速度明显下降，因此把数据表中不常用的数据转移到归档表中，这样业务表的空间腾出来了，同样在事务机制下，写入速度是InnoDB的9-20倍，数据的压缩比是InnoDB的14倍，所以用TokuDB这种写多读少的引擎存放正好合适
```

#### 10、查看Mysql数据表存放位置

```mysql
show global variables like "%datadir%";
```