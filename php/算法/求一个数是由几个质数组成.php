<?php
$x = 707829217;
$y = $x;

$temp = "";
for($i = 2;$i <= $x;$i++) {
    if($x != $i) {
        if($x % $i == 0) {
            echo $x."\n";
            echo $i."\n";
            $x = $x/$i;
            echo $x."\n";
            $temp = $temp.$i."*";
            $i = 1;
        }
    } else {
        if($i == $y) {
            $temp = "1"."*".$y;
        }
        $temp = $temp.$i;
    }
}
echo $temp;