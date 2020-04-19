<?php
$file_name = 'https://zhuanlan.zhihu.com/p/101327188.a.php';

// 通过截取
echo substr($file_name, strripos($file_name, '.')+1);

// 利用数组特性
$file_name = explode('.', $file_name);
echo end($file_name);