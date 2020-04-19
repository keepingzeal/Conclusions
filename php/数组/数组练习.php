<?php
// $arr = [111, 222, 333];
// list($a, $b, $c) = $arr;
// var_dump($a, $b, $c);


$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("e"=>"red","f"=>"green","g"=>"blue");

$result=array_diff($a1,$a2);
print_r($result);

