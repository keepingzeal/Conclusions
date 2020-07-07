<?php
echo 5-1 % 4;die;
/**
 * 逻辑运算包含字符，结果会是如何
 * @var string
 */
$a = "PHPlinux";
$b = "PHPLinux";
$c = strstr($a,'L');
$d = stristr($b,'i');
echo $c .'is'. $d;  //isinux

/**
 * 调整变量返回会不会导致变量污染
 * @var integer
 */
$a = 10;
function print_A() {
	$a = 99;
	global $a;
	return $a;
}
echo print_A();


