<?php 
$str = '';
foreach($_POST as $value) {
	$str .= 'key'.':'.$value.' ';
}
file_put_contents('../test.txt', $str, FILE_APPEND);