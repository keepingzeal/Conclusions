#### 自己制作的BOX，使用后出现一下情况

```
default: SSH address: 127.0.0.1:2222
default: SSH username: vagrant
default: SSH auth method: password
default: Warning: Authentication failure. Retrying...
default: Warning: Authentication failure. Retrying...
```

```
1、设置Vagrantfile
  config.ssh.username = "vagrant"
  config.ssh.password = "vagrant"

2（二选一）、请通过VirtualBox进入ssh，修改/etc/ssh/sshd_config文件
注释这行代码PasswordAuthentication no

3（二选一）、将官网提供的公钥写入虚拟机中
 sudo -u vagrant wget https://raw.githubusercontent.com/mitchellh/vagrant/master/keys/vagrant.pub -O   /home/vagrant/.ssh/authorized_keys
 vagrant  reload
```


####共享目录
config.vm.synced_folder "poject/", "/home/wwwroot/"


/usr/sbin/nginx -c /etc/nginx/nginx.conf


upstream myServer{
    server 192.168.33.80:9000 max_fails=3 fail_timeout=10s;
    server 192.168.33.81:9000 max_fails=3 fail_timeout=10s;
}
server {
    listen       80;
    server_name  localhost.nginx01.com;
    location / {
        root   /home/wwwroot;
        index  index.html index.htm;
    }
    error_page   500 502 503 504  /50x.html;
    location = /50x.html {
        root   /usr/share/nginx/html;
    }
    location ~ \.php$ {
        root           /home/wwwroot;
        fastcgi_pass   myServer;
        fastcgi_index  index.php;
        fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
        include        fastcgi_params;
    }
}


tail -f /var/log/nginx/error.log /var/log/nginx/access.log


验证nginx配置文件是否正确
方法一：进入nginx安装目录sbin下，输入命令./nginx -t

重启Nginx服务
 方法一：进入nginx可执行目录sbin下，输入命令./nginx -s reload 即可


监听20与80之间传递的包
tcpdump -nps0 -iany  net 192.168.33.20 and net 192.168.33.80

tcpdump解释
https://www.kkpan.com/article/3159.html

TCP的状态 (SYN, FIN, ACK, PSH, RST, URG)
https://www.cnblogs.com/azraelly/p/2832393.html

TCP-ARP
https://www.cnblogs.com/songwenlong/p/6103406.html