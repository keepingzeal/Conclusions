cd /
yum -y install epel-release
#yum -y update

yum install -y gcc gcc-c++ \
freetype-devel bzip2-devel \
curl-devel autoconf libxml2-devel \
libjpeg-devel libpng-devel \
libxslt-devel libzip-devel \
libmcrypt mhash openssl openssl-devel

wget https://cmake.org/files/v3.9/cmake-3.9.2.tar.gz
tar zxvf  cmake-3.9.2.tar.gz
cd cmake-3.9.2
./configure
make
sudo make install
cp bin/cmake /usr/bin/

wget https://www.zlib.net/fossils/zlib-1.2.11.tar.gz
tar -zxvf zlib-1.2.11.tar.gz
cd zlib-1.2.11
./configure
make && make install
 
yum remove -y libzip
wget https://nih.at/libzip/libzip-1.2.0.tar.gz
tar -zxvf libzip-1.2.0.tar.gz
cd libzip-1.2.0
./configure
make && make install


# nano /etc/ld.so.conf
# 在文件尾部加入：
# /usr/local/lib64
# /usr/local/lib
# /usr/lib
# /usr/lib64
# 存盘退出。
# ldconfig -v
# ln -s /usr/lib64/libssl.so /usr/lib/


wget https://www.php.net/distributions/php-7.3.28.tar.gz
tar xzvf php-7.3.8.tar.gz
cd  php-7.3.8*

groupadd www
useradd -g www www


./configure --prefix=/usr/local/php \
--with-fpm-user=www \
--with-fpm-group=www \
--with-curl \
--with-freetype-dir \
--with-gd \
--with-gettext \
--with-iconv-dir \
--with-kerberos \
--with-libdir=lib64 \
--with-libxml-dir \
--with-mysqli \
--with-openssl \
--with-pcre-regex \
--with-pdo-mysql \
--with-pdo-sqlite \
--with-pear \
--with-png-dir \
--with-jpeg-dir \
--with-xmlrpc \
--with-xsl \
--with-zlib \
--with-bz2 \
--with-mhash \
--enable-fpm \
--enable-bcmath \
--enable-libxml \
--enable-inline-optimization \
--enable-mbregex \
--enable-mbstring \
--enable-opcache \
--enable-pcntl \
--enable-shmop \
--enable-soap \
--enable-sockets \
--enable-sysvsem \
--enable-sysvshm \
--enable-xml \
--enable-zip \
--enable-fpm 

make && make install

nano ~/.bash_profile
在PATH=$PATH这行尾部加上:/usr/local/php/bin

cp php.ini-production /usr/local/php/lib/php.ini
cp /usr/local/php/etc/php-fpm.conf.default /usr/local/php/etc/php-fpm.conf
ln -s /usr/local/php/sbin/php-fpm /usr/local/bin


# 7, 安装mcrypt

# mcrypt是一个已遭官方弃用的加密模块，尽管官方从php 7.1开始就已经无法使用常规方法去安装了，但是大量php项目还在使用它，一时半会儿还无法真正退出历史舞台，所以没办法，我们只能使用phpize来曲线救国:

# wget http://pecl.php.net/get/mcrypt-1.0.1.tgz
# tar zxvf mcrypt-1.0.1.tgz
# cd mcrypt-1.0.1
# phpize （注意：如果之前没有将php路径加入系统PATH，则phpize在此处无法直接运行）
# ./configure
# make && make install
# 安装完毕后，会显示一条信息：

# Libraries have been installed in:
# /root/src/mcrypt-1.0.1/modules
# 这是mcrypt.so文件的存放路径，记下它。

# 编辑php.ini文件：

# nano /usr/local/php/lib/php.ini
# 在文件种加一行：
# extension=/root/src/mcrypt-1.0.1/modules/mcrypt.so

cp /usr/local/php/etc/php-fpm.d/www.conf.define /usr/local/php/etc/php-fpm.d/www.conf

cp /root/src/php-7.3.8/sapi/fpm/php-fpm.service /usr/lib/systemd/system/

systemctl start php-fpm
systemctl enable php-fpm



#composer 
#如果出现网络错误
#vi /etc/resolv.conf
#nameserver 8.8.8.8

# curl -sS https://getcomposer.org/installer | php
# mv composer.phar /usr/local/bin/composer
# chmod -R 777 /usr/local/bin/composer
# composer -v