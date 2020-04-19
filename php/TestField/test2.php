<?php
echo time();
echo PHP_EOL;
// token 生成规则 time+拼接符+appid+key 然后MD5
// appid：5823185386  
// key 	：f01aca95baa1118c4ba7f11b2d74900b
$data = [
    time(),
    5823185386,
    'f01aca95baa1118c4ba7f11b2d74900b'
];
// token检验
echo md5(implode('&', $data));
