<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';
	session_start();
	if ($_POST['data'] != null) {				
		
		$test = json_encode($_POST['data']);
		$jsondata = json_decode($test);
		$id = gen_uuid();
		$nama = $jsondata[0]->nama;
		$alamat = $jsondata[0]->alamat;
		$telpon = $jsondata[0]->telpon;
		
		$strQry = "INSERT INTO customer VALUES ('$id',
											'$nama',
											'$alamat',	
											'$telpon')";
		$exQuery = mysql_query($strQry) or die(mysql_error());
		if (!$exQuery) {
			echo $exQuery;
		}		
		
	}
?>
