<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';
	session_start();
	if (isset($_POST['simpan_inv'])) {
		$id = gen_uuid();
		$no_inv = $_POST['no_inv'];
		
		$tanggal = $_POST['tanggal'];		
		$bln=substr($tanggal,0,2);
		$tgl=substr($tanggal,3,2);
		$thn=substr($tanggal,6,4);
		$hasil="$thn-$bln-$tgl";
		
		$customer_sid = $_POST['customer_sid'];
		$customer_nama = $_POST['customer_nama'];		
		$user_id = $_SESSION['user_sid'];
		$user_name = $_SESSION['username'];				
		
		$countQry = mysql_query("select * from tanda_terima order by no desc") or die(mysql_error());
		$arrCountQry = mysql_fetch_array($countQry);
		$cnt = 1;
		if ($arrCountQry['no'] == "") {
			$cnt = 1;
		} else {
			$cnt = $arrCountQry['no'] + 1;
		}		
		
		$cekCN	= mysql_num_rows(mysql_query("SELECT * FROM invoice_header WHERE no_inv='$no_inv'"));
		if(($cekCN)>=1){
			echo "<script> alert('Maaf, Nomor Invoice $no_inv sudah ada di database, silahkan ganti dengan yang lain! '); window.history.back();</script>";
		}else{
			$sql = "INSERT INTO invoice_header 
					VALUES ('$id',
							'$cnt',
							'$no_inv',
							'$hasil',
							'$customer_sid',
							'$customer_nama',							
							'$user_id',
							'$user_name')";
			$result = @mysql_query($sql);
			if ($result){
				$tmpSql ="SELECT * FROM temp_detail WHERE user_id='".$_SESSION['user_sid']."'";
				$tmpQry = mysql_query($tmpSql);
				while ($tmpRow = mysql_fetch_array($tmpQry)){					
					$itemSql = "INSERT INTO invoice_detail 
								VALUES ('$id', 
										'$tmpRow[id]', 
										'$tmpRow[tanda_terima_sid]',
										'$tmpRow[tanda_terima_nomor]',										
										'$tmpRow[tanda_terima_tanggal]', 
										'$tmpRow[grand_total]'";
		  		mysql_query($itemSql)or die ("Terjadi Kesalahan".mysql_error());
				}
				mysql_query("DELETE FROM temp_detail WHERE user_id='".$_SESSION['user_sid']."'") or die ("Gagal kosongkan tmp".mysql_error());
				echo json_encode(array(
					'sid' => $id,
					'id' => $cnt,
					'no_inv' => $no_inv,
					'tanggal' => $hasil,
					'customer_sid' => $customer_sid,
					'customer_nama' => $customer_nama,					
					'user_id' => $user_id,
					'user_name' => $user_name
				));
				echo json_encode(array(
					'sid' => $id,
					'id' => $tmpRow['id'],
					'tanda_terima_sid' => $tmpRow['tanda_terima_sid'],
					'tanda_terima_nomor' => $tmpRow['tanda_terima_nomor'],
					'tanda_terima_tanggal' => $tmpRow['tanda_terima_tanggal'],
					'grand_total' => $tmpRow['grand_total']
				));
				echo "<script> alert('Berhasil Input Invoice'); window.location.href='../form/halaman_utama.php?page=invoice;</script>";
			} else {				
				echo json_encode(array('errorMsg'=>'Terjadi Kesalahan.'));
			}			
		}
	}
?>