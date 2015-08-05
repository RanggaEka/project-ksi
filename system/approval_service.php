<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';
	session_start();
	if (isset($_GET['status'])) {
		$statusApv = "";
		if ($_GET['status'] == "approve") {
			$statusApv = "APPROVED";
		} else if ($_GET['status'] == "reject") {
			$statusApv = "REJECTED";
		}
		$id = $_GET['id_po'];
		$idSJ = gen_uuid();

		
		$strQry = "UPDATE po_header SET status = '$statusApv' where id = '$id'";
		// echo ">>>".$strQry;
		$exQuery = mysql_query($strQry) or die(mysql_error());
		if ($exQuery) {
			if ($statusApv == "APPROVED") {
				$countQry = mysql_query("select * from surat_jalan order by no_urut_sj desc") or die(mysql_error());
				$arrCountQry = mysql_fetch_array($countQry);
				$cnt = 1;
				if ($arrCountQry['no_urut_sj'] == "") {
					$cnt = 1;
				} else {
					$cnt = $arrCountQry['no_urut_sj'] + 1;
				}
				$nomor = "SJ".str_pad($cnt,5,"0",STR_PAD_LEFT);
				$strQry = "INSERT INTO surat_jalan VALUES ('$idSJ','$nomor', '$id', now(), '', 'NEW', $cnt)";
				$exQuery = mysql_query($strQry) or die(mysql_error());
			}
			echo "<script> alert('PO berhasil di ".$statusApv." ! '); window.location.href='../form/halaman_utama.php?page=approval';</script>";
		} else {
			echo "<script> alert('Gagal , silahkan ulangi! '); window.history.back();</script>";
		}
	}
?>