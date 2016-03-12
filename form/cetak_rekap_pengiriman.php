<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Rekap Pengiriman</title>
    <link rel="stylesheet" href="../lib/metro/css/metro-bootstrap.css">
    <script src="../lib/metro/js/jquery/jquery.min.js"></script>
    <script src="../lib/metro/js/jquery/jquery.widget.min.js"></script>
    <script src="../lib/metro/min/metro.min.js"></script>
    <script src="../js/main.js"></script>
</head>
<style>
body {padding:0px}
.print-area {border:0px dashed;padding:0;margin:0}
</style>
<body class="metro" onload="#javascript:printDiv('print-area-1');">  
  <table width="100%" cellspacing="0" cellpadding="5" align="center">
    <tr>
      <td>
	  <div id="print-area-1" class="print-area" style="width: 120%; height: 100%; padding: 0px;" align="center">
        <!--fieldset style="width: 85%; padding: 0px;" align="center"-->
        <!-- <legend>Cetak TT</legend> -->
        <table width="100%" border="0" cellpadding="0" cellspacing="1" bordercolor="1" style="border:solid 0px #000000; padding:0px;" align="center">
          <tr>
            <!--td width="10%"><img src="../images/ksi.png" width="100" height="100" /></td-->
            <td align="center"><p><strong>REKAP PENGIRIMAN</strong><br/>              
              <strong>CV. KIKI SOLUSI INTERNUSA (KiKi Trans)</strong><br />              
              </p>
			</td>			
          </tr>
		  <tr>
            <td><table width="100%" border="1" cellpadding="5" cellspacing="5">
              <tr>                
				<th rowspan="2" align="left">No</th>
				<th rowspan="2" align="left">No. CN</th>
				<th rowspan="2" align="left">No. Inv</th>
				<th rowspan="2" align="left">Tgl. CN</th>
				<th rowspan="2" align="left">Tgl. Inv</th>
				<th rowspan="2" align="left">Pengirim</th>
				<th rowspan="2" align="left">Tujuan</th>
				<th colspan="3" align="center">Service</th>
				<th colspan="5" align="center">Total</th>
				<th colspan="2" align="center">Invoice</th>
				<th rowspan="2" align="center">Jatuh Tempo</th>
				<th rowspan="2" align="center">Tgl. Bayar </th>
				<th colspan="2" align="center">Tanda Terima </th>
				<th colspan="4" align="center">Biaya</th>
              </tr>
			  <tr>
				<th align="center">U/D/L</th>
				<th align="center">DTD/DTP</th>
				<th align="center">Agent</th>
				<th align="center">Coll</th>
				<th align="center">KG</th>
				<th align="center">Vol/M3</th>
				<th align="center">Pack Kayu</th>
				<th align="center">Asuransi</th>
				<th align="center">Tarif</th>
				<th align="center">Jumlah</th>
				<th align="center">Penerima</th>
				<th align="center">Tgl</th>
				<th align="center">Freight</th>
				<th align="center">U/D/L</th>
				<th align="center">Lain 2</th>
				<th align="center">Ket</th>
			  </tr>			  
<?php 
	date_default_timezone_set('Asia/Jakarta');
    include '../system/config_service.php'; 
    $param1= "";
	if ($_GET['customer_inv'] != "") {
		$param1 = " where customer_nama = '".$_GET['customer_inv']."' ";
	} else if ($_GET['status'] != "") {
		$param1 = " where keterangan = '".$_GET['status']."' ";	
	} else if ($_GET['tgl_dari'] != "" && $_GET['tgl_sampai'] != "") {
		$param1 = " and (tanggal between = '".$_GET['tgl_dari']."' and '".$_GET['tgl_sampai']."') ";	
	}
		
	$strQuery = "select  
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
		$param1
		order by ih.no_inv asc";

    $count = 0;    
    $result = mysql_query($strQuery) or die(mysql_error());
	$cekData= mysql_num_rows($result);
	if(($cekData)<=0){
		echo"<style>
			body {display:none}			
		</style>";
		echo "<script> alert('Maaf, Data tidak ditemukan! ');</script>";
		echo "<meta http-equiv='refresh' content='0; url=halaman_utama.php?page=rekapinvoice'>";
	}
	while($arrResult = mysql_fetch_array($result)) {
		$count++;
?>			  
              <tr>
				<td align="center"><?php echo $count; ?></td>
				<td align="left"><?php echo $arrResult['no_cn']; ?> </td>
				<td align="left"><?php echo $arrResult['no_inv']; ?> </td>
				<td align="left"><?php echo $arrResult['tgl_tanda_terima']; ?> </td>
                <td align="left"><?php echo $arrResult['tgl_inv']; ?></td>
                <td align="left"><?php echo $arrResult['pengirim']; ?></td>
                <td align="left"><?php echo $arrResult['tujuan']; ?> </td>				
                <td align="center"><?php echo $arrResult['service_udl']; ?></td>
                <td align="center"><?php echo $arrResult['service_dtddtp']; ?> </td>
				<td align="center"><?php echo $arrResult['service_agent']; ?> </td>				
				<td align="center"><?php echo number_format($arrResult['total_coll']); ?></td>
                <td align="center"><?php echo number_format($arrResult['total_berat']); ?></td>
                <td align="center"><?php echo number_format($arrResult['total_vol']); ?> </td>
                <td align="center"><?php echo number_format($arrResult['pack_kayu']); ?> </td>
                <td align="center"><?php echo number_format($arrResult['asuransi']); ?> </td>
				<td align="right"><?php echo number_format($arrResult['tarif_inv']); ?> </td>
				<td align="right"><?php echo number_format($arrResult['grand_total']); ?> </td>
				<td align="center"><?php echo $arrResult['jatuh_tempo_inv']; ?> </td>
				<td align="center"><?php echo $arrResult['tgl_pembayaran']; ?> </td>
				<td align="center"><?php echo $arrResult['penerima']; ?> </td>
				<td align="center"><?php echo $arrResult['tgl_tanda_terima']; ?> </td>
				<td align="center"></td>
				<td align="center"><?php echo $arrResult['service_udl']; ?></td>
				<td align="center"><?php echo number_format($arrResult['biaya']); ?></td>
				<td align="center"><?php echo $arrResult['keterangan']; ?> </td>
              </tr>
<?php } ?>      
            </table></td>
          </tr>
        </table>
		<!--/fieldset-->
		</div>
      </td>
    </tr>
  </table>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr align="center">
		<td align="center">
			<a type="button" class="button" href="javascript:printDiv('print-area-1');" >Cetak</a>
		</td>
	</tr>
  </table>
<textarea id="printing-css" style="display:none;">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:70%;font:inherit;vertical-align:center}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px solid;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:0.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:0.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:70%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:70%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em}th{font-weight:bold}table[border="1"] caption{border:none;font-style:italic}.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
  
</body>
<script>
function printDiv(elementId) {
    var a = document.getElementById('printing-css').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}
</script>
</html>
