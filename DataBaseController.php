<?php 

require 'DataBase.php';

class DataBaseController {

	private $db;

	function __construct() {
		if(isset($_FILES['db'])) {
			move_uploaded_file($_FILES['db']['tmp_name'], basename($_FILES['db']['name']));
			file_put_contents('settings/DataBaseName.txt', basename($_FILES['db']['name']));
		}

		$dbName = file_get_contents('settings/DataBaseName.txt');
		$this->db = new DataBase($dbName);

		return $this->db; 
	}

	public function view() {

		$result = $this->db->showLogQSO();
		$columnCount = $result->numColumns();

		return require 'view/Table.php';
	}
	
}