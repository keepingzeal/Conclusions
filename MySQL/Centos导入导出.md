```
1，进入MySQL：mysql -u 用户名 -p
　　输入的命令行:mysql -u root -p (输入同样后会让你输入MySQL的密码)
2，在MySQL-Front中新建你要建的数据库，这时是空数据库，如新建一个名为news的目标数据库（可能会报错，不用理他）
　　输入：mysql>use 目标数据库名
　　输入的命令行:mysql>use news;
3，导入文件：mysql>source 导入的来源文件名; 
　　输入的命令行：mysql>source news.sql;
```

