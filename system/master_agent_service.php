<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';
	session_start();
	if ($_POST['data'] != null) {				
		
		$test = json_encode($_POST['data']);
		$jsondata = json_decode($test);
		$id = gen_uuid();
		$agent = $jsondata[0]->agent;
		$alamat = $jsondata[0]->alamat;
		$no_telp = $jsondata[0]->no_telp;
		
		$strQry = "INSERT INTO agent VALUES ('$id',
											'$agent',
											'$no_telp',	
											'$alamat')";
		$exQuery = mysql_query($strQry) or die(mysql_error());
		if (!$exQuery) {
			echo $exQuery;
		}		
		
	}
?>
