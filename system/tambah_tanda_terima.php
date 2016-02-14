<?php
	include 'config_service.php';	
	session_start();
	if (isset($_POST['tambah_tt'])) {		
		$no_cn		= $_POST['no_cn'];
		$tanggal	= $_POST['tanggal'];		
		$total		= $_POST['total'];
		$sid		= $_POST['tt_sid'];
		$user_id 	= $_SESSION['user_sid'];
		$sql		= "INSERT INTO temp_detail 
						VALUES ( null,
								'$sid',
								'$no_cn',
								'$tanggal',
								'$total',
								'$user_id')";		
		$result = @mysql_query($sql);
		if ($result){
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Terjadi Kesalahan.'));
		}
	}
?>