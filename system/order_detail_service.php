<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';
	session_start();
	if (isset($_POST['simpan_po_detail'])) {
		$id = gen_uuid();
		$po = $_POST['po'];
		$barang = $_POST['barang'];
		$qty = $_POST['qty'];
		$diskon = $_POST['diskon'];

		
		$strQry = "INSERT INTO po_detail VALUES ('$id','$po','$barang','$qty', '$diskon')";
		// echo ">>>".$strQry;
		$exQuery = mysql_query($strQry) or die(mysql_error());
		if ($exQuery) {
			echo "<script> alert('Berhasil Menambahkan Detail PO ! '); window.location.href='../form/halaman_utama.php?page=order_detail&po_id=$po';</script>";
		} else {
			echo "<script> alert('Gagal Membuat PO, silahkan ulangi! '); window.history.back();</script>";
		}
	}
?>