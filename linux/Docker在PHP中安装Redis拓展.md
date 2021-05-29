## 步骤

```
# 进入php容器
docker exec -it 【php容器名称】 【bash | /bin/bash | /bin/sh】

# 下载Redis拓展
# 下载地址参考：https://github.com/phpredis/phpredis/releases
curl -L -o /tmp/redis.tar.gz 【redis版本地址】
tar xfz /tmp/redis.tar.gz
rm -r /tmp/redis.tar.gz
mkdir -p /usr/src/php/ext
mv phpredis-【版本号】 /usr/src/php/ext/redis
docker-php-ext-install redis

# 安装完成后
docker restart 【php容器名称】
```

https://www.cnblogs.com/gaosf/p/11697726.html