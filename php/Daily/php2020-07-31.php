<?php
$arr = [
	'a9' => '9fafas99',
	'a5' => '9fafas95',
	'a6' => '9fafas96',
	'a1' => '9fafas91',
];

$sort = ['a6','a1','a5','a9'];

var_dump(array_merge(array_flip($sort), $arr));die;

uksort($arr, function($a, $b) use ($sort, $arr){

	// 方法一
	$posA = array_search($a, $sort);
	$posB = array_search($b, $sort);
	if (($posA === false || $posA === null) && ($posB === false || $posB === null)) {
		return array_search($a, $arr) > array_search($b, $arr) ? 1 : -1;
	}
	if ($posA == $posB) {
		return 0;
	}
	if ($posA === false || $posA === null) {
		return 1;
	}
	if ($posB === false || $posB === null) {
		return -1;
	}
	return $posA<$posB ? -1 : 1;

	// 方法二
	// $posA = (function() use ($a, $sort){
	// 	$i = 0;
	// 	$pos = 99999;
	// 	foreach ($sort as $row) {
	// 		$i++;
	// 		if ($row == $a) {
	// 			break;
	// 		}
	// 	}
	// 	return $i;
	// })();
	// $posB = (function() use ($b, $sort){
	// 	$i = 0;
	// 	$pos = 99999;
	// 	foreach ($sort as $row) {
	// 		$i++;
	// 		if ($row == $b) {
	// 			break;
	// 		}
	// 	}
	// 	return $i;
	// })();
	// if ($posA==$posB){return 0;}else{return ($posA > $posB ? 1 : -1);}
});
var_dump($arr);



//main function
// Function SortArrayAKeysLikeArrayBKeys(&$TheArrayToSort){
//    uksort($TheArrayToSort,"SortArrayAKeysLikeArrayBKeys_cmp");
//    uksort($TheArrayToSort, function($a, $b){

//    })
// }

// Function SortArrayAKeysLikeArrayBKeys_cmp($a,$b){
//   global $TheArrayOrder;
//   $PosA=KeyPosInArray($a,$TheArrayOrder);
//   $PosB=KeyPosInArray($b,$TheArrayOrder);
//   if ($PosA==$PosB){return 0;}else{return ($PosA > $PosB ? 1 : -1);}
// }

// //where is my key in my array
// Function KeyPosInArray($Key,$Array){
//    $i=0;
//    $Pos=99999999;
//    if($Array){
//       foreach($Array as $K => $V){
//          $i++;
//          if($K==$Key){
//             $Pos=$i;
//             break;
//          }
//       }
//    }
//    return $Pos;
// }

// //the array you want to sort
// $AnyArrayToSort['age']='19';
// $AnyArrayToSort['ville']='rennes';
// $AnyArrayToSort['website']='kik-it.com';
// $AnyArrayToSort['region']='bretagne';
// $AnyArrayToSort['code_postal']='35200';
// $AnyArrayToSort['Nom']='Fred';

// //the array with the correct keys/values order
// $TheArrayOrder['Nom']='Whatever';
// $TheArrayOrder['age']='Anything';
// $TheArrayOrder['region']='What u want';
// $TheArrayOrder['ville']='Something';
// $TheArrayOrder['code_postal']='Nothing';

// //before sort
// print_r($AnyArrayToSort);   
// echo "<br>";
// //we sort
// SortArrayAKeysLikeArrayBKeys($AnyArrayToSort);
// echo "<br>";
// //after sort
// print_r($AnyArrayToSort);