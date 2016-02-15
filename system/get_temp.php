<?php
	include '../system/config_service.php';
	$rs = mysql_query('SELECT * FROM temp_detail order by id desc');
	$result = array();
	while($row = mysql_fetch_object($rs)){
		array_push($result, $row);
	}
	
	echo json_encode($result);
?>
