<?php
	include 'config_service.php';
	session_start();
	$id = $_REQUEST['id'];

	$sql = "DELETE FROM temp_detail WHERE id='$id'";
	$result = @mysql_query($sql);
	if ($result){
		echo json_encode(array('success'=>true));
	} else {
		echo json_encode(array('msg'=>'Terjadi Kesalahan.'));
	}
?>