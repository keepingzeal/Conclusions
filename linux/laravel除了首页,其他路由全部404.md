**原因分析：**在nginx接到请求后先判断是否是静态资源文件或目录，如果不是默认处理是指向404,需要改成返回动态处理。

**解决方案：**在nginx的配置文件上添加

location / {

  try_files $uri $uri/ /index.php?$query_string;

}