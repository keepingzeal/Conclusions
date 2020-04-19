<?php
$dir = '../TestField';
var_dump(rm_empty_dir($dir));

/**
 * 返回数组，但是不会返回空目录
 * @param  [type] $dir [description]
 * @return [type]      [description]
 */
function loopDir($dir) {
	// 该方法通过scandir()实现
	if (!is_dir($dir)) {
		return $dir;
	}
	$files_arr = [];
	$files = scandir($dir);
	foreach ($files as $key => $value) {
		$new_path = $dir .'/'. $value;
		if (is_dir($new_path) && !in_array($value, ['.', '..'])) {
			$files_arr = array_merge($files_arr, loopDir01($new_path));
		} else if (is_file($new_path)) {
			$files_arr[] = $new_path;
		}
	}
	return $files_arr;
}

/**
 * 清空所有空文件夹
 * @param  [type] $dir [description]
 * @return [type]      [description]
 */
function rm_empty_dir($dir) {
	if (!is_dir($dir)) {
		return false;
	}
	$handle = dir($dir);
	if (!$handle) {
		return false;
	}
	while (($file = $handle->read()) !== false) {
		if ($file == '.' || $file == '..') {
			continue;
		}
		if (filetype($dir .'/'. $file) == 'dir') {
			rm_empty_dir($dir .'/'. $file);
			if (count(scandir($dir .'/'. $file)) == 2) {
				rmdir($dir .'/'. $file);
			}
		}
	}
	$handle->close();
	return true;
}
