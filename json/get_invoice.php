<?php
	include '../system/config_service.php';
	$rs = mysql_query('SELECT * FROM invoice_header WHERE status="BELUM LUNAS" order by no_inv desc');
	$result = array();
	while($row = mysql_fetch_object($rs)){
		array_push($result, $row);
	}
	
	echo json_encode($result);
?>
