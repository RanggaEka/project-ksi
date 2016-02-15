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
		$bln=substr($tanggal,0,2);
		$tgl=substr($tanggal,3,2);
		$thn=substr($tanggal,6,4);
		$hasil="$thn-$bln-$tgl";
		
		$customer_nama = $jsondata[0]->customer_nama;
		$cekCustomer = mysql_query("SELECT * FROM customer WHERE nama='$customer_nama'");
		$custArr = mysql_fetch_array($cekCustomer);
		$customer_sid = $custArr['sid'];
			
		$user_id = $_SESSION['user_sid'];
		$user_name = $_SESSION['username'];				
		
		$countQry = mysql_query("select * from tanda_terima order by no desc") or die(mysql_error());
		$arrCountQry = mysql_fetch_array($countQry);

		$testDetail = json_encode($jsondata[0]->listDetail);
		$jsondataDetail = json_decode($testDetail);	
				
		$cekCN	= mysql_num_rows(mysql_query("SELECT * FROM invoice_header WHERE no_inv='$no_inv'"));
		if(($cekCN)>=1){
			echo "<script> alert('Maaf, Nomor Invoice $no_inv sudah ada di database, silahkan ganti dengan yang lain! ');</script>";
		}else{
			$sid_header = $id;
			$sql = "INSERT INTO invoice_header 
					VALUES ('$id',
							'$no_inv',
							'$hasil',
							'$customer_sid',
							'$customer_nama',							
							'$user_id',
							'$user_name')";
			$result = mysql_query($sql);
			if ($result){
				for ($i = 0; $i < count($jsondataDetail)-1; $i++) {
					$Qry = mysql_query("select * from tanda_terima where sid = '".$jsondata[0]->listDetail[$i]->sid."' ") or die(mysql_error());
					$arQ = mysql_fetch_array($Qry);
					$idDetail = gen_uuid();
					mysql_query("INSERT INTO invoice_detail 
					VALUES ('$idDetail',
							'$sid_header',
							'$arQ[sid]',
							'$arQ[no_cn]',
							'$arQ[grand_total]')");
				}
			} else {	
				echo "<script>alert('Exception Error SQL Save');</script>";
			}			
		}
	}
?>
