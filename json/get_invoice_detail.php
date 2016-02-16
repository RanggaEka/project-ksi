<?php
	include '../system/config_service.php';	
		
	$rs = mysql_query('SELECT * FROM invoice_detail WHERE no_inv=$_GET[no_inv] order by no_cn desc'); 
	$result = array();
	while($row = mysql_fetch_object($rs)){
		array_push($result, $row);
	}
	
	echo json_encode($result);
?>
