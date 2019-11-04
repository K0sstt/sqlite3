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

		$result = $this->db->getLogQSO();
		$columnCount = $result->numColumns();

		return require 'view/Table.php';
	}

	public function importTable() {
		$str = '';
		$result = $this->db->getLogQSO();

		while($row = $result->fetchArray(SQLITE3_ASSOC)) {
			foreach($row as $columnName => $columnValue) {
				$str .= '<'. $columnName. ':' . strlen($columnValue) . '>' . $columnValue;
			}

			$str .= "\n";
		}

		$str .= '<eor>';

		file_put_contents('QSO.adif', $str);
	}

	public function importSelectedData() {
		$str = '';
		$file = fopen('modules/QSO.adif', 'r');

		while(!feof($file)) {

			$id = fgets($file);
			$stmt = $this->db->prepare('SELECT * FROM tbl_logQSO WHERE recId = :id');
			$stmt->bindValue(':id', $id, SQLITE3_INTEGER);
			$result = $stmt->execute();

			while($row = $result->fetchArray(SQLITE3_ASSOC)) {
				foreach($row as $columnName => $columnValue) {
					$str .= '<'. $columnName. ':' . strlen($columnValue) . '>' . $columnValue;
				}

				$str .= "\n";
			}

		}

		$str .= '<eor>';

		fclose($file);

		file_put_contents('modules/QSO.adif', $str);
	}
	
}