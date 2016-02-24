<?php
	$result = array();
	include '../system/config_service.php'; 
	$rs = mysql_query("select * from invoice_header where no_inv in (select no_inv from invoice_detail)");
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	echo json_encode($items);
?>
