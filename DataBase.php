<?php

/*
database schema
	tbl_settings
	tbl_bandsList
	tbl_Contest
	sqlite_sequence
	tbl_logQSO
		CREATE INDEX `idxCall` ON `tbl_logQSO` ( `stCall` ASC );
		CREATE INDEX `idxMode` ON `tbl_logQSO` ( `stMode` ASC );
	tbl_Dxcc
	tbl_PfxInfo
	tbl_qsoContest
	tbl_dbVersion
	tbl_mainMode
		CREATE INDEX `mainMode`  ON `tbl_mainMode` (`mainMode` COLLATE NOCASE);
		CREATE INDEX `subMode`  ON `tbl_mainMode` (`subMode` COLLATE NOCASE);
	tbl_Cty2Dxcc
	veiw v_log_b FROM tbl_qsoContest, tbl_logQSO, tbl_bandsList, tbl_PfxInfo, tbl_Dxcc
 */

class DataBase extends SQLite3
{
	function __construct($dbName = 'multipan.db3') {
		$this->open($dbName);
	}

	public function showLogQSO() {
		return $this->query('SELECT * FROM tbl_logQSO');
	}

	public function show($result) {
		while ($row = $result->fetchArray()) {
			echo "<pre>";
			var_dump($row);
			echo "</pre>";
		}

	}

	public function showToArray($result) {
		while ($row = $result->fetchArray()) {
			echo "<pre>";
			print_r($row);
			echo "</pre>";
		}
	}

}
