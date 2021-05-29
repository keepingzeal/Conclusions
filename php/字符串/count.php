<?php

// 位运算判断奇偶
// echo (1 & 1);


// 如何在命令行下运行php脚本(写出两种方式)同时向php脚本传递参数
// php aaa.php -f "123456"
// $options = getopt("f:");
// var_dump($options);


// 截取字符串
// function str_split_cus($str, $len = 0)
// {
// 	if ($len > 0) {
// 		$ret = [];
// 		$lens = mb_strlen($str, 'UTF-8');
// 		for ($i=0; $i < $lens; $i += $len) { 
// 			$ret[] = mb_substr($str, $i, $len, "UTF-8");
// 		}
// 		return $ret;
// 	}
// 	return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);;
// }
// var_dump(str_split_cus('截取字符.php'));

// 斐波那契数列
// function test($n) {
// 	if ($n<3) return $n;
// 	return test($n-1) + test($n-2);
// }
echo date('d');die;

// 1.获取本月开始到结束的时间戳
echo   strtotime(date('Y-m-d 0:0:0', mktime(0,0,0,date('n'),1,date('Y'))));
echo  strtotime(date('Y-m-d 23:59:59', mktime(0,0,0,date('n'),date('t'),date('Y'))));


// 2.获取本周开始和结束时间
$beginThisweek=mktime(0,0,0,date('m'),date('d')-date('w')+1,date('Y'));
$endThisweek=mktime(23,59,59,date('m'),date('d')-date('w')+7,date('Y'));


// 3.获取上周开始和结束时间
$beginLastweek=mktime(0,0,0,date('m'),date('d')-date('w')+1-7,date('Y'));
$endLastweek=mktime(23,59,59,date('m'),date('d')-date('w')+7-7,date('Y'));

// 约瑟夫环
// function test($arr, $num = 3) {
// 	$count = 1;
// 	while(1) {
// 		if (count($arr) == 1) return $arr;
// 		if ($count % $num != 0) {
// 			array_push($arr, $arr[$count - 1]);
// 			unset($arr[$count - 1]);
// 		} else {
// 			unset($arr[$count - 1]);
// 		}
// 		$count++;
// 	}
// }
	

	$something = 0;
echo ('password123' == $something) ? 'true' : 'false';