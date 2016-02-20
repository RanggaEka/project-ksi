<?php
	include '../system/config_service.php'; 
	$result = array();
	$param1= "";
	if ($_GET['customer_inv'] != "") {
		$param1 = " where customer_nama = '".$_GET['customer_inv']."' ";
	} else if ($_GET['status'] != "") {
		$param1 = " where keterangan = '".$_GET['status']."' ";	
	} else if ($_GET['tgl_dari'] != "" && $_GET['tgl_sampai'] != "") {
		$param1 = " and (tanggal between = '".$_GET['tgl_dari']."' and '".$_GET['tgl_sampai']."') ";	
	}
	
	//$rs = mysql_query("select * from invoice_header where no_inv in (select no_inv from invoice_detail) $param1 order by no_inv asc ");
	$rs = mysql_query("select  
		ih.no_inv as no_inv,
		ih.tanggal as tgl_inv,
		ih.total as total_inv,
		ih.cicilan as cicilan_inv,
		ih.sisa as sisa_inv,
		ih.jatuh_tempo as jatuh_tempo_inv,
		ih.keterangan as keterangan,
		id.no_inv as no_inv_detail,
		id.tarif as tarif_inv,
		tt.no_cn as no_cn,
		tt.tanggal as tgl_tanda_terima,
		tt.tujuan as tujuan,
		tt.penerima as penerima,
		tt.pengirim as pengirim,
		tt.service_udl as service_udl,
		tt.service_dtddtp as service_dtddtp,
		tt.service_agent as service_agent,
		tt.total_coll as total_coll,
		tt.total_berat as total_berat,
		tt.total_vol as total_vol,
		tt.grand_total as grand_total,
		(SELECT MAX(tanggal) FROM  invoice_pembayaran where no_inv = ih.no_inv) as tgl_pembayaran
		
		from invoice_header ih 
		inner join invoice_detail id on ih.no_inv = id.no_inv
		inner join tanda_terima tt on id.tanda_terima_sid = tt.sid 
		$param1
		order by ih.no_inv asc ");
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	echo json_encode($items);
?>
