#### redis数据结构

```
5种数据结构
字符串、哈希，链表、集合、有序集合
```

![image-20210505202601898](C:\Users\KZEAL\AppData\Roaming\Typora\typora-user-images\image-20210505202601898.png)

BitMaps：位图

HyperLogLog：超小内存唯一值技术，缺点是不准确

GEO：地理信息定位



#### 设置外部连接

```
一、配置安装目录下的redis.conf文件
bind 0.0.0.0  修改为这个

port 6379 这个为redis端口

#修改这个为yes,以守护进程的方式运行，就是关闭了远程连接窗口，redis依然运行
daemonize yes

#将protected-mode模式修改为no
protected-mode no

#设置需要密码才能访问,password修改为你自己的密码
requirepass password

ps -aux | grep redis
ps -ef | grep redis
netstat -tunple | grep 6379

二、redis的停止命令
./redis-cli -p 6379 shutdown
```

