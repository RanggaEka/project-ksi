<?php
	include 'config_service.php';
	session_start();

	if (isset($_POST['type'])) {
		$type = $_POST['type'];
		if ($type == "customer") {
			$a = array();
			$x = mysql_query("SELECT id, kode_customer, nama FROM customer") or die(mysql_error());
            while ($arr=mysql_fetch_assoc($x)) {
            	$a[] = $arr;
            }
			echo json_encode($a);
		}
	}
?>