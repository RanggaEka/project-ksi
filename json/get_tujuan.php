<?php
	include '../system/config_service.php';
	$rs = mysql_query('SELECT * FROM tarif order by kota asc');
	$result = array();
	while($row = mysql_fetch_object($rs)){
		array_push($result, $row);
	}
	
	echo json_encode($result);
?>
