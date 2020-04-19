<?php
$arr1 = [1,2];
$arr2 = [3,4];
$arr3 = [5,6];
$arr4 = [7,8];
// 定义一个二维数组
$arr = array($arr1, $arr2, $arr3, $arr4);
// 定义待插入数组
$arr5 = [9,10];
// 定义插入位置，插入第二位
array_splice($arr, 2, 0, [$arr5]);

var_dump($arr);