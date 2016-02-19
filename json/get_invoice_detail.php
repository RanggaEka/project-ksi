<?php
	include '../system/config_service.php';
	//if ($_GET['custNama'] != null || $_GET['custNama'] != "") {
		$rs = mysql_query("select * from invoice_header ih 
		inner join invoice_detail id on id.no_inv = ih.no_inv
		inner join tanda_terima tt on tt.sid = id.tanda_terima_sid
		WHERE ih.no_inv='". $_GET['no_inv']."' and ih.customer_nama = '". $_GET['custNama']."' order by ih.no_inv asc ");
	//} else {
	//	$rs = mysql_query('SELECT * FROM invoice_detail order by id desc');
	//}
	
	$result = array();
	while($row = mysql_fetch_object($rs)){
		array_push($result, $row);
	}
	
	echo json_encode($result);
?>
