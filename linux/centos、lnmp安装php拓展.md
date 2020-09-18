### centos、lnmp安装php拓展

[yaf拓展]: https://www.cnblogs.com/shifu204/p/6743578.html

[php]: https://www.php.net/downloads.php



### php安装**四**部曲

- wget  **php***

- 解压-- tar -zxvf xxx.tar
- 配置-- ./configure --prefix=[文件存放路径]
- 编译安装-- make && make install 

##### 配置php快捷命令运行方式

- vi ~/.bash_profile
- **export PATH** 下添加
  - alias php7=xxx/bin/php
- **重载** source ~/.bash_profile

##### php源码安装遇到的坑

- 没有php.ini
  - 从源码包里面把**php.ini-development** 挪到 **xxx(php目录)/etc/**  里面
- 改了php.ini文件，但没有生效
  - php（自定义快捷命令） -i | grep php.ini 查看php引用php.ini的路径
  - 把自己的php.ini挪到该路径下



### Swoole

#### swoolei编译安装

- github/gitee等直接拉取swoole源码
- 没有configure文件
  - 在swoole目录下使用xxx(php目录) /bin/phpize生成
  - 遇到的错误（1）
    - **生产configure报错** <u>*Cannot find autoconf*</u>  
    - **解决：** yum install autoconf 
  - 遇到的错误（2）
    - 编译失败 <u>*error: C++ preprocessor*</u>  
    - **解决：** yum install glibc-headers gcc-g++
- ./configure --with-php-config=xxx(php)/bin/php-config
- make && make install
- 在php.ini添加extension=swoole
- 进入swoole源码/examples/server 执行 echo.php
  - 没报错则安装成功

