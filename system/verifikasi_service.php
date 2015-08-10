<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';
	session_start();
	if (isset($_GET['status'])) {
		$status = $_GET['status'];
		$id_inv = $_GET['id_inv'];
		
		$strQry = "UPDATE invoice SET status_penagihan = '$status' where id = '$id_inv'";
		// echo ">>>".$strQry;
		$exQuery = mysql_query($strQry) or die(mysql_error());
		if ($exQuery) {
			if ($status == "APPROVED") {
				echo "<script> alert('Invoice berhasil di ".$status." ! '); window.location.href='../form/halaman_utama.	php?page=verifikasi';</script>";
			} elseif ($status == "FINISHED") {
				echo "<script> alert('Invoice berhasil di Cetak ! '); window.location.href='../form/halaman_utama.	php?page=verifikasi';</script>";

			}
		} else {
			echo "<script> alert('Gagal , silahkan ulangi! '); window.history.back();</script>";
		}
	}
?>