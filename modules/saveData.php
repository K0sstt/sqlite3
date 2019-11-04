<?php 

$str = '';

foreach($_POST as $value) {
	$str .= $value."\n";
}

file_put_contents('QSO.adif', $str);