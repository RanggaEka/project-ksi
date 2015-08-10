<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';
	session_start();
	if (isset($_POST['simpan_po'])) {
		$id = gen_uuid();
		// $po = $_POST['po'];
		$tanggal = $_POST['tanggal'];
		$customer = $_POST['customer'];
		$alamat = $_POST['alamat'];
		$photo =  $_FILES['photo']['name'];
		if ($photo != "") {
			$ext = pathinfo($photo, PATHINFO_EXTENSION);
			$fileName = $id."_photo.".$ext;
			move_uploaded_file($_FILES['photo']['tmp_name'], '../upload/photo/'.$fileName);
		}
		$countQry = mysql_query("select * from po_header order by no_urut_po desc") or die(mysql_error());
		$arrCountQry = mysql_fetch_array($countQry);
		$cnt = 1;
		if ($arrCountQry['no_urut_po'] == "") {
			$cnt = 1;
		} else {
			$cnt = $arrCountQry['no_urut_po'] + 1;
		}
		$nomor = "P".str_pad($cnt,5,"0",STR_PAD_LEFT);
		$strQry = "INSERT INTO po_header VALUES ('$id','$nomor','$tanggal','$customer', '$alamat', '$fileName', $cnt, 'NEW')";
		// echo ">>>".$strQry;
		$exQuery = mysql_query($strQry) or die(mysql_error());
		if ($exQuery) {
			if ($photo != "") {
				$ext = pathinfo($photo, PATHINFO_EXTENSION);
				$fileName = $id."_photo.".$ext;
				move_uploaded_file($_FILES['photo']['tmp_name'], '../upload/photo/'.$fileName);
			}
			echo "<script> alert('Berhasil Membuat PO, berikutnya Silahkan isi Itemnya! '); window.location.href='../form/halaman_utama.php?page=order_detail&po_id=$id';</script>";
		} else {
			echo "<script> alert('Gagal Membuat PO, silahkan ulangi! '); window.history.back();</script>";
		}
	}
?>