<?php
	include '../system/config_service.php';
	
	$param1 = "";
	if ($_GET['sid'] != null) {
		$param1 = "where sid = '".$_GET['sid']."'";
	}
	
	$rs = mysql_query("SELECT * FROM customer ".$param1." order by nama asc");
	$result = array();
	while($row = mysql_fetch_object($rs)){
		array_push($result, $row);
	}
	
	echo json_encode($result);
?>
