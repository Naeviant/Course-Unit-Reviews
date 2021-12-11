<?php
	require_once(__DIR__ ."/../config.inc.php");

	$conn = mysqli_connect($database_host, $database_user, $database_pass, $database_name);

	if (!$conn) {
		die();
	}

	function doSQL($sql) {
		global $conn;

		// [OK, data]
		if ($result = mysqli_query($conn, $sql)) {
			return [true, $result];
		}
		else {
			return [false, $result];
		}
	}

	function getConn() {
		global $conn;
		return $conn;
	}

	function toArray($sql) {
		$data = [];
		while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
			$payload = array();
			foreach(array_keys($row) as $key) {
				$payload[$key] = $row[$key];
			}
			array_push($data, $payload);
		}
		return $data;
	}
?>
