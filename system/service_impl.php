<?php
	include 'config_service.php';
	session_start();

	if (isset($_POST['type'])) {
		$type = $_POST['type'];
		if ($type == "customer") {
			$a = array();
			$x = mysql_query("SELECT * FROM customer order by kode_customer asc") or die(mysql_error());
            while ($arr=mysql_fetch_assoc($x)) {
            	$a[] = $arr;
            }
			echo json_encode($a);
		} else if ($type == "barang") {
			$a = array();
			$x = mysql_query("SELECT * FROM tbl_barang order by kode_barang asc") or die(mysql_error());
            while ($arr=mysql_fetch_assoc($x)) {
            	$a[] = $arr;
            }
			echo json_encode($a);
		}
	}
?>