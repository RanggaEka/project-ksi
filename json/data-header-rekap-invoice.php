<?php
	include '../system/config_service.php'; 
	$result = array();
	$param1= "";
	$param2= "";
	$param3= "";
	$param4= "";
	$param5= "";
	
	if ($_GET['no_inv'] != "") {
		$param4 = " and ih.no_inv like '%".$_GET['no_inv']."%' ";
	} 
	if ($_GET['no_cn'] != "") {
		$param5 = " and tt.no_cn like '%".$_GET['no_cn']."%' ";
	} 
	if ($_GET['customer_inv'] != "") {
		$param1 = " and ih.customer_nama like '%".$_GET['customer_inv']."%' ";
	} 
	if ($_GET['status'] != "Silahkan Pilih" && $_GET['status'] != "") {
		$param2 = " and ih.keterangan = '".$_GET['status']."' ";	
	}
	if ($_GET['tgl_dari'] != "" && $_GET['tgl_sampai'] != "") {
		$param3 = " and (ih.tanggal between '".$_GET['tgl_dari']."' and '".$_GET['tgl_sampai']."') ";	
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
		tt.tarif as tarif_inv,
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
		tt.biaya as biaya,
		tt.packing_kayu as pack_kayu,
		tt.asuransi as asuransi,
		(SELECT MAX(tanggal) FROM  invoice_pembayaran where no_inv = ih.no_inv) as tgl_pembayaran
		
		from invoice_header ih 
		inner join invoice_detail id on ih.no_inv = id.no_inv
		inner join tanda_terima tt on id.tanda_terima_sid = tt.sid 
		where
		ih.no_inv is not null
		$param1 $param2 $param3 $param4 $param5  
		order by ih.no_inv asc ");
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	echo json_encode($items);
?>
