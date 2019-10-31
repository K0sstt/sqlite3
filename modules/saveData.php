<?php 
$str = '';
foreach($_POST as $key => $value) {
	$str += $key.':'.$value.' ';
}
file_put_contents('modules/test.txt', $str, FILE_APPEND);