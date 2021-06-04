[TOC]

#### 编译安装mysql

```
mkdir  /home/source  
cd /home/source  
wget https://cdn.mysql.com//Downloads/MySQL-5.7/mysql-5.7.34.tar.gz
	
yum install -y cmake make gcc gcc-c++ wget ncurses-devel cmake make perl ncurses-devel openssl-devel bison-devel libaio libaio-devel

mv /etc/my.cnf /etc/mysql.cof.back

tar -zxvf mysql-5.7.34.tar.gz
cd mysql-5.7.34/

cmake \
-DCMAKE_BUILD_TYPE=RelWithDebInfo \
-DCMAKE_INSTALL_PREFIX=/usr/local/web/mysql \
-DMYSQL_UNIX_ADDR=/usr/local/web/mysql/mysql.sock \
-DDEFAULT_CHARSET=utf8 \
-DDEFAULT_COLLATION=utf8_general_ci \
-DMYSQL_DATADIR=/home/mysql/data \
-DSYSCONFDIR=/etc/my.cnf \
-DWITH_MYISAM_STORAGE_ENGINE=1 \
-DWITH_INNOBASE_STORAGE_ENGINE=1 \
-DWITH_PARTITION_STORAGE_ENGINE=1 \
-DENABLE_DEBUG_SYNC=0 \
-DENABLED_LOCAL_INFILE=1 \
-DENABLED_PROFILING=1 \
-DMYSQL_TCP_PORT=3306 \
-DWITH_DEBUG=0 \
-DWITH_SSL=yes \
-DDOWNLOAD_BOOST=1 \
-DWITH_BOOST=/usr/local/boost_1_59_0

----压缩版
cmake -DCMAKE_BUILD_TYPE=RelWithDebInfo -DCMAKE_INSTALL_PREFIX=/usr/local/web/mysql -DMYSQL_UNIX_ADDR=/usr/local/web/mysql/mysql.sock -DDEFAULT_CHARSET=utf8 -DDEFAULT_COLLATION=utf8_general_ci -DMYSQL_DATADIR=/home/mysql/data -DSYSCONFDIR=/etc/my.cnf -DWITH_MYISAM_STORAGE_ENGINE=1 -DWITH_INNOBASE_STORAGE_ENGINE=1 -DWITH_PARTITION_STORAGE_ENGINE=1 -DENABLE_DEBUG_SYNC=0 -DENABLED_LOCAL_INFILE=1 -DENABLED_PROFILING=1 -DMYSQL_TCP_PORT=3306 -DWITH_DEBUG=0 -DWITH_SSL=yes -DDOWNLOAD_BOOST=1 -DWITH_BOOST=/usr/local/boost_1_59_0
----压缩版

make && make install


cp /usr/local/web/mysql/support-files/mysql.server /etc/init.d/mysqld
chmod +x /etc/init.d/mysqld
ln -s /usr/local/web/mysql/bin/* /usr/local/bin/
chkconfig --add mysqld
chkconfig mysqld on

cp /usr/local/mysql/support-files/my-default.cnf /etc/my.cnf
没有的话自己创建

vi /etc/my.cnf
--------------------------my.cnf
[mysqld]

#skip-grant-tables

sql_mode=NO_ENGINE_SUBSTITUTION,STRICT_TRANS_TABLES 

# 一般配置选项
basedir = /usr/local/web/mysql
datadir = /home/mysql/data
port = 3306
socket = /home/mysql/mysqld.sock
character-set-server=utf8


#下面是可选项，要不要都行，如果出现启动错误，则全部注释掉，保留最基本的配置选项，然后尝试添加某些配置项后启动，检测配置项是否有误
back_log = 300
max_connections = 3000
max_connect_errors = 50
table_open_cache = 4096
max_allowed_packet = 32M
#binlog_cache_size = 4M

max_heap_table_size = 128M
read_rnd_buffer_size = 16M
sort_buffer_size = 16M
join_buffer_size = 16M
thread_cache_size = 16
query_cache_size = 128M
query_cache_limit = 4M
ft_min_word_len = 8

thread_stack = 512K
transaction_isolation = REPEATABLE-READ
tmp_table_size = 128M
#log-bin=mysql-bin
long_query_time = 6


server_id=1

innodb_buffer_pool_size = 1G
innodb_thread_concurrency = 16
innodb_log_buffer_size = 16M


innodb_log_file_size = 512M
innodb_log_files_in_group = 3
innodb_max_dirty_pages_pct = 90
innodb_lock_wait_timeout = 120
innodb_file_per_table = on

[mysqldump]
quick

max_allowed_packet = 32M

[mysql]
no-auto-rehash
default-character-set=utf8
safe-updates

[myisamchk]
key_buffer = 16M
sort_buffer_size = 16M
read_buffer = 8M
write_buffer = 8M

[mysqlhotcopy]
interactive-timeout

[mysqld_safe]
open-files-limit = 8192



------------my.cnf


mysqld --defaults-file=/etc/my.cnf --initialize --basedir=/usr/local/web/mysql --datadir=/home/mysql/data  --user=mysql


flush privileges;
set password for 'root'@'localhost'=password('bb123456.');

GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'bb123456.' WITH GRANT OPTION;

```

服务器运行：iptables -L -n --line-numbers
发现默认lnmp一键包关闭了3306端口，需要删除对应的DROP规则
服务器运行：iptables -D INPUT 6


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