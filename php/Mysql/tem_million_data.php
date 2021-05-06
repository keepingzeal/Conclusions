<?php
set_time_limit(0);

function a(){
    header("Content-Type:text/html;charset=utf-8");
    $servername = "192.168.33.10";
    $port = 3306;
    $username = "root";
    $password = "bb123456.";
    $dbname = "test";


// 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

// 检测连接
    if ($conn->connect_error) {
        die("connect failed: " . $conn->connect_error);
    }
    $costBegin = time();

    echo date('Y-m-d H:s:i',$costBegin)."<br>";

    $sql = sprintf("INSERT INTO t_test (val) VALUES ");
    $itemStr = '';



    // 执行上千万条sql
    for($i=0;$i<10000;$i++){
        $itemStr = '( ';
        // $itemStr .= sprintf("'%s','%s','%s','%s','%s','%s', %d", mt_rand(1, 2500), character(32),date('Y-m-d H:i:s', mt_rand(strtotime('2018-01-01'), strtotime('2019-01-01'))),mt_rand(strtotime('2018-01-01'), strtotime('2019-01-01')),getChar(mt_rand(100, 1024)),getChar(mt_rand(8, 64)),mt_rand(0, 1));

        $itemStr .= sprintf("'%s'", uuid());
        
        $itemStr .= '),';
        $sql .= $itemStr;
    }

    // 生成文本，通过文本导入，千万数据，不要轻易使用
    // if (!file_exists('test.txt')) {
    //     mkdir('test.txt');
    // }
    // $fh = fopen('test.txt', 'w');
    // for ($i=0; $i < 10000000; $i++) { 
    //     fwrite($fh, uuid().PHP_EOL);
    // }
    // fclose($fh);

    // 去除最后一个逗号，并且加上结束分号
    $sql = rtrim($sql, ',');
    $sql .= ';';

    if ($conn->query($sql) === TRUE) {
        echo "成功插入 $i 条;". "<br>";
    } else {
        echo "Error: ". "<br>" . $conn->error;
    }

    $costEnd = time();
    echo date('Y-m-d H:s:i',$costEnd)."<br>";
    $cost = $costEnd - $costBegin;
    echo date('H:s:i',$cost)."<br>";
    $conn->close();
}

function getChar($num)  // $num为生成汉字的数量
{
    $b = '';
    for ($i = 0; $i < $num; $i++) {
        // 使用chr()函数拼接双字节汉字，前一个chr()为高位字节，后一个为低位字节
        $a = chr(mt_rand(0xB0, 0xD0)) . chr(mt_rand(0xA1, 0xF0));
        // 转码
        $b .= iconv('GB2312', 'UTF-8', $a);
    }
    return $b;
}

function uuid($prefix = '')
{
    $chars = md5(uniqid(mt_rand(), true));
    $uuid  = substr($chars,0,8) . '-';
    $uuid .= substr($chars,8,4) . '-';
    $uuid .= substr($chars,12,4) . '-';
    $uuid .= substr($chars,16,4) . '-';
    $uuid .= substr($chars,20,12);
    return $prefix . $uuid;
}

function character($length = 10, $alphabet = 'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789'){
    mt_srand();
    // 重复字母表以防止生成长度溢出字母表长度
    if ($length >= strlen($alphabet)) {
        $rate = intval($length / strlen($alphabet)) + 1;
        $alphabet = str_repeat($alphabet, $rate);
    }
    // 打乱顺序返回
    return substr(str_shuffle($alphabet), 0, $length);
}

for($aaa=0;$aaa<1000;$aaa++){
    a();
}