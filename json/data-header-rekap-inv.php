<?php
	$result = array();
	include '../system/config_service.php'; 
	$param1= "";
	$param2= "";
	$param3= "";
	
	if ($_GET['customer_inv'] != "") {
		$param1 = " and customer_nama like '%".$_GET['customer_inv']."%' ";
	} 
	
	if ($_GET['no_inv'] != "") {
		$param2 = " and no_inv like '%".$_GET['no_inv']."%' ";	
	}
	
	if ($_GET['tgl_dari'] != "" && $_GET['tgl_sampai'] != "") {
		//$param3 = " and (DATE_FORMAT(tanggal, '%d/%m/%Y') between '".$_GET['tgl_dari']."' and '".$_GET['tgl_sampai']."') ";	
		$param3 = " and (tanggal between '".$_GET['tgl_dari']."' and '".$_GET['tgl_sampai']."') ";	
	}
	$rs = mysql_query("select * from invoice_header where no_inv in (select no_inv from invoice_detail) $param1 $param2 $param3 ");
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	echo json_encode($items);
?>
