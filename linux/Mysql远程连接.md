MySql远程连接无法打开解决办法

##### 开启防火墙

**1、改表法**。

请使用mysql管理工具，如：SQLyog Enterprise、navicate mysql

可能是你的帐号不允许从远程登陆，只能在localhost。这个时候只要在localhost的那台电脑使用mysql管理工具登入mysql后，更改 "mysql" 数据库里的 "user" 表里的 "host" 项，从"localhost"改称"%"

**2、 授权法。**

A:你想mysql账户myuser使用密码mypassword从任何主机连接到mysql服务器的话，那就在mySQL命令行下输入：
GRANT ALL PRIVILEGES ON \*.\* TO 'myuser'@'%' IDENTIFIED BY 'mypassword' WITH GRANT OPTION;

若上面那条命令还没有奏效，那就使用下面的命令，一定成功!

如果你想允许想mysql账户myuser从ip为192.168.1.3的主机连接到mysql服务器，并使用mypassword作为密码，那就在mySQL命令行下输入：

GRANT ALL PRIVILEGES ON \*.\* TO 'myuser'@'192.168.1.3' IDENTIFIED BY 'mypassword' WITH GRANT OPTION;



**以下是其它网友的补充：**

在远程主机上，我开启了mysql 服务，用 phpmyadmin 可以打开，比如说用户名为 root，密码为 123456。不过用 Mysql 客户端远程连接时却报了错误，比如 Mysql-Front 报了如下错误。

?

```
Access denied ``for` `user` `‘root``'@'``121.42.8.33′(using ``password``:YES)
```



##### 解决办法1

解决办法就是新建一个用户，比如TestUser
然后再给TestUser授权远程访问，即：
mysql>GRANT ALL PRIVILEGES ON \*.\* TO 'TestUser'@'%' IDENTIFIED BY '此处为TestUser的密码’' WITH GRANT OPTION;

iptables -L -n --line-numbers # 查看已有的iptables规则

在iptables规则里有一行是DROP，末尾以3306结尾的，在lnmp1.5里面序号是6，不同版本可能会不一样，自行确认

iptables -D INPUT 6