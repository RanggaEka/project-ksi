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
		
		$customer_nama = $jsondata[0]->customer_nama;
		$cekCustomer = mysql_query("SELECT * FROM customer WHERE nama='$customer_nama'");
		$custArr = mysql_fetch_array($cekCustomer);
		$customer_sid = $custArr['sid'];
		$jatuh_tempo = $jsondata[0]->jatuh_tempo;
		
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
							'$tanggal',
							'$customer_sid',
							'$customer_nama',
							'0',
							'0',
							'0',
							'$jatuh_tempo',
							'BELUM LUNAS',
							'$user_id',
							'$user_name')";
			$result = mysql_query($sql);
			if ($result){
				for ($i = 0; $i < count($jsondataDetail); $i++) {
					$Qry = mysql_query("select * from tanda_terima where sid = '".$jsondata[0]->listDetail[$i]->sid."' ") or die(mysql_error());
					$arQ = mysql_fetch_array($Qry);
					$idDetail = gen_uuid();
					mysql_query("INSERT INTO invoice_detail 
					VALUES ('$idDetail',
							'$no_inv',
							'$arQ[sid]',
							'$arQ[no_cn]',
							'$arQ[grand_total]')");
							
					mysql_query("UPDATE tanda_terima
							SET is_sudah_invoice = 1
							where sid = '".$jsondata[0]->listDetail[$i]->sid."' ");
				}
				$hitungTotal = mysql_query("SELECT SUM(tarif) as total FROM invoice_detail WHERE no_inv='$no_inv'");
				$hitungTotalArr = mysql_fetch_array($hitungTotal);
				$total_inv = $hitungTotalArr['total'];
				mysql_query("UPDATE invoice_header
							SET total='$total_inv', sisa='$total_inv'
							WHERE no_inv='$no_inv'");
			} else {	
				echo "<script>alert('Exception Error SQL Save');</script>";
			}			
		}
		
	} else if ($_GET['sch_inv'] != null) {	
		$sch = mysql_query("select * from invoice_header where no_inv = '".$_GET['sch_inv']."' ");
		$count = mysql_num_rows($sch);
		
		if (($count) >= 1) {
			$result = array();
			while($row = mysql_fetch_object($sch)){
				array_push($result, $row);
			}
			//$row = mysql_fetch_array($sch);
			echo json_encode($result);
		} else {
			echo "";
		}
	}
?>
