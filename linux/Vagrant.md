自己制作的BOX，使用后出现一下情况

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

