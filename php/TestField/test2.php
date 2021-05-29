<?php
// echo time();
// echo PHP_EOL;
// // token 生成规则 time+拼接符+appid+key 然后MD5
// // appid：5823185386  
// // key 	：f01aca95baa1118c4ba7f11b2d74900b
// $data = [
//     time(),
//     5823185386,
//     'f01aca95baa1118c4ba7f11b2d74900b'
// ];
// // token检验
// echo md5(implode('&', $data));


// $json = '[{"addr":"1","workday":["4","2"]},{"addr":"2","workday":["4","5","6"]}]';
// if (!$a = json_decode($json, true)) {
// } else {
// 	$arr = array_flip(array_values($a[0]['workday']));
// }

// $numberToDay = [1=>'一',2=>'二',3=>'三',4=>'四',5=>'五',6=>'六',7=>'日'];

// var_dump(array_intersect_key($numberToDay, $arr));



$file = 'x.y.z.png';
echo end(explode('.', $file));

echo substr(strrchr($file, '.'), 1);
echo pathinfo($file)['extension'];
echo array_pop(explode('.', $file));