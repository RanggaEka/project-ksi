<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';
	
	$idSJ = "";
	$status = "";
	if (isset($_GET['idSJ'])) {
		$idSJ = $_GET['idSJ'];
	}
	if (isset($_GET['status'])) {
		$status = $_GET['status'];
	}

	$strQry = "UPDATE surat_jalan SET status_pengiriman = '$status' where id = '$idSJ'";
	// echo ">>>".$strQry;
	$exQuery = mysql_query($strQry) or die(mysql_error());
	if ($exQuery) {
		if ($status == "DELIVERED") {
			$srcTotalTagihan = mysql_query("select sum(b.harga*d.qty) as total FROM po_detail d INNER JOIN po_header h ON d.id_po_header = h.id INNER JOIN surat_jalan s on s.id_po = h.id INNER JOIN tbl_barang b on d.id_barang = b.id WHERE s.id = '$idSJ'") or die(mysql_error());
			$arrsrcTotalTagihan = mysql_fetch_array($srcTotalTagihan);
			$totalTagihan = $arrsrcTotalTagihan['total'];

			$countQry = mysql_query("select * from invoice order by no_urut_invoice desc") or die(mysql_error());
			$arrCountQry = mysql_fetch_array($countQry);
			$cnt = 1;
			if ($arrCountQry['no_urut_invoice'] == "") {
				$cnt = 1;
			} else {
				$cnt = $arrCountQry['no_urut_invoice'] + 1;
			}
			$idINV = gen_uuid();
			$nomor = "INV".str_pad($cnt,5,"0",STR_PAD_LEFT);
			$strQry = "INSERT INTO invoice VALUES ('$idINV','$nomor', '$idSJ', $totalTagihan, 'NEW', $cnt)";
			$exQuery = mysql_query($strQry) or die(mysql_error());
			echo "<script> alert('Berhasil Mengirim ke Customer ! '); window.location.href='../form/sopir.php';</script>";
		} elseif ($status == "READY") {
			echo "<script> window.location.href='../form/halaman_utama.php?page=sj';</script>";
		}
	} else {
		echo "<script> alert('Gagal , silahkan ulangi! '); window.history.back();</script>";
	}
	
?>