<?php
	include '../system/config_service.php';
	
	$param1= "";
	if ($_GET['no_inv'] != "") {
		$param1 = " and no_inv = '".$_GET['no_inv']."' ";
		
	} else if ($_GET['tanggal'] != "") {
		$param1 = " and tanggal = '".$_GET['tanggal']."' ";	
	}
	
	$rs = mysql_query("SELECT * FROM invoice_header WHERE keterangan = 'BELUM LUNAS' $param1 order by no_inv desc");
	$result = array();
	while($row = mysql_fetch_object($rs)){
		array_push($result, $row);
	}
	echo json_encode($result);
?>
