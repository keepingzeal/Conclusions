<?php
$arr = [
	[
		'id' 	=> 1,
		'sort'	=> 1
	],
	[
		'id' 	=> 2,
		'sort'	=> 2
	],
	[
		'id' 	=> 3,
		'sort'	=> 3
	],
];

$arr_sort = array_column($arr, 'sort');
array_multisort($arr_sort, SORT_DESC, $arr); // 降序从新排序
var_dump($arr);