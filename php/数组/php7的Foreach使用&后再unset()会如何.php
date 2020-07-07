<?php
$arr = [1, 2, 3];
foreach ($arr as $key => $val) {
    if ($val <= 2) {
    	unset($arr[$key]);
    }
}
$val = 4;
var_dump($val);
var_dump($arr);