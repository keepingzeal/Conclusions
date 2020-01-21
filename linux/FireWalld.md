#### Centos防火墙

##### 遇到问题

- 防火墙关闭状态下，其他端口请求无法生效

  添加80端口的访问权限，这里添加后永久生效
          #firewall-cmd --zone=public --add-port=80/tcp --permanent    
          #firewall-cmd --reload
  查看80端口访问权限情况
         #firewall-cmd --zone= public --query-port=80/tcp
  关闭80访问权限
         #firewall-cmd --zone= public --remove-port=80/tcp --permanent
  ————————————————
  版权声明：本文为CSDN博主「LCYong_」的原创文章，遵循 CC 4.0 BY-SA 版权协议，转载请附上原文出处链接及本声明。
  原文链接：https://blog.csdn.net/lcyong_/article/details/78928223

  

-  其他命令操作 

  启动： systemctl start firewalld
  查看状态： systemctl status firewalld 
  停止： systemctl disable firewalld
  禁用： systemctl stop firewalld
  启动服务：systemctl start firewalld.service
  关闭服务：systemctl stop firewalld.service
  重启服务：systemctl restart firewalld.service
  服务的状态：systemctl status firewalld.service
  在开机时启用一个服务：systemctl enable firewalld.service
  在开机时禁用一个服务：systemctl disable firewalld.service
  查看服务是否开机启动：systemctl is-enabled firewalld.service
  查看已启动的服务列表：systemctl list-unit-files|grep enabled
  查看启动失败的服务列表：systemctl --failed
  查看版本： firewall-cmd --version
  查看帮助： firewall-cmd --help
  显示状态： firewall-cmd --state
  查看所有打开的端口： firewall-cmd --zone=public --list-ports
  更新防火墙规则： firewall-cmd --reload
  查看区域信息:  firewall-cmd --get-active-zones
  查看指定接口所属区域： firewall-cmd --get-zone-of-interface=eth0
  拒绝所有包：firewall-cmd --panic-on
  取消拒绝状态： firewall-cmd --panic-off
  查看是否拒绝： firewall-cmd --query-panic

  