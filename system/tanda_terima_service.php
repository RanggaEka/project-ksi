<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';
	session_start();
	if (isset($_POST['simpan_tt'])) {				
		
		if (trim($_POST['cn'])=="") { 
			echo "<script> alert('Nomor CN harus diisi ! '); window.history.back();</script>"; 
			return false;
		}
		if (trim($_POST['tanggal'])=="") { 
			echo "<script> alert('Tanggal harus diisi ! '); window.history.back();</script>"; 
			return false;
		}
				
		$id = gen_uuid();
		$cn = $_POST['cn'];
		
		$tanggal = $_POST['tanggal'];		
		$tgl=substr($tanggal,0,2);
		$bln=substr($tanggal,3,2);
		$thn=substr($tanggal,6,4);
		$hasil="$thn-$bln-$tgl";
		
		$pengirim = $_POST['pengirim'];
		$alamat_pengirim = $_POST['alamat_pengirim'];
		$telpon_pengirim = $_POST['telpon_pengirim'];
		$tujuan = $_POST['tujuan'];
		$penerima = $_POST['penerima'];
		$alamat_penerima = $_POST['alamat_penerima'];
		$telpon_penerima = $_POST['telpon_penerima'];
		$udl = $_POST['udl'];
		$dtddtp = $_POST['dtddtp'];
		$agent = $_POST['agent'];
		$coll = $_POST['coll'];
		$kg = $_POST['kg'];
		$vol = $_POST['vol'];
		$tarif = $_POST['tarif'];
		$grandtotal = $tarif * $kg;
		$deskripsi = $_POST['deskripsi'];
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
		//$nomor = "P".str_pad($cnt,5,"0",STR_PAD_LEFT);		
		$cekCN	= mysql_num_rows(mysql_query("SELECT * FROM tanda_terima WHERE no_cn='$cn'"));
		if(($cekCN)>=1){
			echo "<script> alert('Maaf, Nomor CN $cn sudah ada di database, silahkan ganti dengan yang lain! '); window.history.back();</script>";
		}else{		
			$strQry = "INSERT INTO tanda_terima VALUES ('$id','$cnt','$cn','$hasil','$pengirim','$alamat_pengirim','$telpon_pengirim','$tujuan','$penerima','$alamat_penerima','$telpon_penerima','$udl','$dtddtp','$agent','$coll','$kg','$vol','$grandtotal','$deskripsi','$user_id','$user_name')";
			// echo ">>>".$strQry;
			$exQuery = mysql_query($strQry) or die(mysql_error());
			if ($exQuery) {
				echo "<script> alert('Berhasil Input Tanda Terima'); window.location.href='../form/cetak_tanda_terima.php?CN=$cn';</script>";
			} else {
				echo "<script> alert('Gagal Input Tanda Terima, silahkan ulangi! '); window.history.back();</script>";
			}
		}
	}
?>