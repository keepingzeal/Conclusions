<?php
global $arr;
$arr[] = "4539";
$arr[] = "4556";
$arr[] = "4916";
$arr[] = "4532";
$arr[] = "4929";
$arr[] = "40240071";
$arr[] = "4485";
$arr[] = "4716";
$arr[] = "4";
$arr[] = "51";
$arr[] = "52";
$arr[] = "53";
$arr[] = "54";
$arr[] = "55";
$arr[] = "34";
$arr[] = "37";
$arr[] = "6011";
$arr[] = "300";
$arr[] = "301";
$arr[] = "302";
$arr[] = "303";
$arr[] = "36";
$arr[] = "38";
$arr[] = "2014";
$arr[] = "2149";
$arr[] = "35";
$arr[] = "8699";

function completed_number($prefix, $length) {
    $ccnumber = $prefix;
    # generate digits
    while ( strlen($ccnumber) < ($length - 1) ) {
      $ccnumber .= rand(0,9);
    }
    # Calculate sum
    $sum = 0;
    $pos = 0;
    $reversedCCnumber = strrev( $ccnumber );
    while ( $pos < $length - 1 ) {
      $odd = $reversedCCnumber[ $pos ] * 2;
      if ( $odd > 9 ) {
        $odd -= 9;
      }
      $sum += $odd;
      if ( $pos != ($length - 2) ) {
        $sum += $reversedCCnumber[ $pos +1 ];
      }
      $pos += 2;
    }
    # Calculate check digit
    $checkdigit = (( floor($sum/10) + 1) * 10 - $sum) % 10;
    $ccnumber .= $checkdigit;
    return $ccnumber;
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

function credit_card_number($prefixList, $length) {
    $ccnumber = $prefixList[ array_rand($prefixList) ];
    return completed_number($ccnumber, $length);
}

function a(){
    $fh = fopen('test_cart.txt', 'w');
    for ($i=0; $i < 10000000; $i++) {
        fwrite($fh, uuid().','. credit_card_number($GLOBALS['arr'], rand(13,16)) .PHP_EOL);
    }
    fclose($fh);
}

a();
