<?php
$str = 'abcdefgabcdefg';

// 读取字符的第一次出现的位置（不忽略大小写）
echo strpos($str, 'ef'); // 4
echo strpos($str, 'ab'); // 0
echo strpos($str, 'ac'); // false

// 同上，忽略大小写
echo stripos($str, 'ac'); // false

// 读取字符最后一次出现的位置
strrpos();
// 读取字符最后一次出现的位置(忽略大小写)
strripos();


