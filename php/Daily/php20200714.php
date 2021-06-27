<?php
// $a = true;
// $a && $b = 123;
// echo $b;

// $arr = ['aa',1];
// $aj = json_encode($arr);

$a = 1;
$b = 2;
$c = 3;
$d = 4;

function test($a, ...$params) {
	var_dump($a, $params[1]);
}

test($a, $b, $c, $d);