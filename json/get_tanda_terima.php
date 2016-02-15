<?php
	include '../system/config_service.php';
	
	/*
	$param1 = "";
	$param2 = "";
	$param3 = "";
	$param4 = "";
	if ($_GET['cn'] != null) {
		$param1 = "where no_cn = '".$_GET['cn']."'";
	}
	if ($_GET['tanggal'] != null) {
		$param1 = "where tanggal = '".$_GET['tanggal']."'";
	}
	if ($_GET['pengirim'] != null) {
		$param1 = "where pengirim = '".$_GET['pengirim']."'";
	}
	if ($_GET['tujuan'] != null) {
		$param1 = "where tujuan = '".$_GET['tujuan']."'";
	}
	*/
	$rs = mysql_query('SELECT * FROM tanda_terima order by no_cn desc');//'.$param1.$param2.$param3.$param4.' 
	$result = array();
	while($row = mysql_fetch_object($rs)){
		array_push($result, $row);
	}
	
	echo json_encode($result);
?>
