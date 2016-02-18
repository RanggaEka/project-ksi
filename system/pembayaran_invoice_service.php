<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';
	session_start();
	if ($_POST['data'] != null) {
		
		$test = json_encode($_POST['data']);
		$jsondata = json_decode($test);	
		$id = gen_uuid();
		$no_inv = strtoupper($jsondata[0]->no_inv);
		
		$tanggal = $jsondata[0]->tanggal;
		
		$tgl=substr($tanggal,0,2);
		$bln=substr($tanggal,3,2);
		$thn=substr($tanggal,6,4);
		$hasil="$thn-$bln-$tgl";
		
		$nilai_bayar = $jsondata[0]->nilai_bayar;		
			
		$user_id = $_SESSION['user_sid'];
		$user_name = $_SESSION['username'];
				
		$result = 	mysql_query("UPDATE invoice_header
					SET cicilan=cicilan+'$nilai_bayar', sisa=sisa-'$nilai_bayar'
					WHERE no_inv='$no_inv'");
		if ($result){			
			$cekHeader = mysql_query("SELECT * FROM invoice_header WHERE no_inv='$no_inv'");
			$headerArr = mysql_fetch_array($cekHeader);
			if($headerArr['sisa']<=0){
						mysql_query("UPDATE invoice_header
						SET keterangan='LUNAS'
						WHERE no_inv='$no_inv'");
			}
			$idBayar = gen_uuid();
			mysql_query("INSERT INTO invoice_pembayaran 
				VALUES ('$idBayar',
						'$no_inv',
						'$hasil',
						'$nilai_bayar',						
						'$user_id',
						'$user_name')");
			//echo "<script>alert('Berhasil');</script>";
		} else {	
			echo "<script>alert('Exception Error SQL Save');</script>";
		}
	}
?>
