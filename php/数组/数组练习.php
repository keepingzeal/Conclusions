<?php
// $arr = [111, 222, 333];
// list($a, $b, $c) = $arr;
// var_dump($a, $b, $c);


$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("e"=>"red","f"=>"green","g"=>"blue");

$result=array_diff($a1,$a2);
print_r($result);

$arr = [
	'1A' => 123,
	'1'	=> 321,
	2.8	=> 8222,
	false	=> 8222,
	1	=> 222,
];
print_r($arr);