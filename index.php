<?php 

// require 'DataBase.php';
require 'DataBaseController.php';

$controller = new DataBaseController();


if($_POST) {

	$post = $_POST;

	if($post['do'] == 'importTable') {
		$controller->importTable();
		if(file_exists($file = 'QSO.adif')) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($file).'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
			exit();
		}
	}

	if($post['do'] == 'importSelectedData') {
		$controller->importSelectedData();
		if($file = 'modules/QSO.adif') {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($file).'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
			exit();
		}
	}

}

$controller->view();
