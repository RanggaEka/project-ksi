<?php
	include '../system/config_service.php';
		
	$rs = mysql_query("SELECT * FROM user where is_active = 1 order by nama asc");
	$result = array();
	while($row = mysql_fetch_object($rs)){
		array_push($result, $row);
	}
	
	echo json_encode($result);
?>
