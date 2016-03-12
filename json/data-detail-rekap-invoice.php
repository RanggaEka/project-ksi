<?php
	include '../system/config_service.php'; 
	$no_inv = mysql_real_escape_string($_GET['no_inv']);
	$rs = mysql_query("select * from invoice_detail id inner join tanda_terima tt on id.tanda_terima_sid = tt.sid where id.no_inv= '$no_inv' ");
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	echo json_encode($items);
?>
