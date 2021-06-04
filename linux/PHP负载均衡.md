https://www.jianshu.com/p/746123c42716

https://www.cnblogs.com/yunfan1024/p/11316641.html



upstream myServerLaravel54{
    server 192.168.33.80:9000 max_fails=3 fail_timeout=10s;
    server 192.168.33.81:9000 max_fails=3 fail_timeout=10s;
}


server {
    listen       80;
    server_name  localhost.laravel54.com;

    location / {
        root           /home/wwwroot/blog/public;
        fastcgi_pass   myServerLaravel54;
        fastcgi_index  index.php;
        fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
        include        fastcgi_params;
        try_files $uri $uri/ /index.php?$query_string;
    }

    error_page   500 502 503 504  /50x.html;

    location = /50x.html {
        root   /usr/share/nginx/html;
    }


    location ~ \.php$ {
        root           /home/wwwroot/blog/public;
        fastcgi_pass   myServerLaravel54;
        fastcgi_index  index.php;
        fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
        include        fastcgi_params;
    }
}
