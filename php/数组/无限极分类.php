<?php

$arr = [
    1   =>  [
        'id'    => 1,
        'pid'   => 0,
    ],
    2   =>  [
        'id'    => 2,
        'pid'   => 0,
    ],
    3   =>  [
        'id'    => 3,
        'pid'   => 1,
    ],
    4   =>  [
        'id'    => 4,
        'pid'   => 1,
    ],
    5   =>  [
        'id'    => 5,
        'pid'   => 2,
    ],
    6   =>  [
        'id'    => 6,
        'pid'   => 2,
    ],
];


// function getTree($array, $pid =0, $level = 0){
//     static $list = [];
//     foreach ($array as $key => $value){
//         if ($value['pid'] == $pid){
//             $list[] = $value;
//             unset($array[$key]);
//             getTree($array, $value['id']);
//         }
//     }
//     return $list;
// }

function getTree02($arr) {
    $tree = [];
    foreach($arr as $key => $v) {
        if (isset($arr[$v['pid']])) {
            $arr[$v['pid']]['chils'][] = &$arr[$key];
        } else {
            $tree[] = &$arr[$key];
        }
    }
    return $tree;
}

$res = getTree02($arr);
var_dump($res);

// $tr = getTree($arr);
// var_dump($tr);


