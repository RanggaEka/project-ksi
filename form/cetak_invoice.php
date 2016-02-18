<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../lib/metro/css/metro-bootstrap.css">
    <script src="../lib/metro/js/jquery/jquery.min.js"></script>
    <script src="../lib/metro/js/jquery/jquery.widget.min.js"></script>
    <script src="../lib/metro/min/metro.min.js"></script>
    <script src="../js/main.js"></script>
</head>
<style>
body {padding:10px}
.print-area {border:1px dashed red;padding:1em;margin:0 0 1em}
</style>
<body class="metro">
  <?php /*
    include '../system/config_service.php'; 
    $invID = "";
    if (isset($_GET['id_invoice'])) {
      $invID = $_GET['id_invoice'];
    }


    $count = 0;
    $strQuery = "SELECT i.no_invoice, 
                        i.status_penagihan as status_penagihan, 
                        i.id as id_invoice, 
                        s.status_pengiriman,
                        s.no_sj as no_sj, 
                        s.id as sj_id, 
                        p.photo, 
                        p.id, 
                        p.no_po,
                        p.tanggal,
                        c.tlp,
                        c.nama,
                        p.alamat,
                        u.nama as nama_user
                                FROM invoice i
                                INNER JOIN surat_jalan s ON s.id = i.id_sj 
                                INNER JOIN po_header p ON p.id = s.id_po 
                                INNER JOIN customer c ON c.id = p.id_customer 
                                INNER JOIN user u ON u.id = c.id_referensi_user 
                                where i.id = '$invID'" 
                                ;
    $result = mysql_query($strQuery) or die(mysql_error());
    $arrResult = mysql_fetch_array($result);
  */  
  ?>
  <table width="100%" cellspacing="30" cellpadding="30">
    <tr>
      <td>
		<div id="print-area-1" class="print-area" style="width: 100%; padding: 10px;" align="center">
        <!--<fieldset style="width: 85%; padding: 10px;">-->
        <!-- <legend>Cetak SJ</legend> -->
        <table width="100%" border="0" cellpadding="5" cellspacing="5" style="border:solid 0px #000000; padding:10px;">
          <tr>
            <!--td align="left"><img src="../images/ksi.png" width="100" height="100" /></td>
			<td>&nbsp;</td-->
            <td colspan="3" align="left"><p><strong><font style="color:red">CV. KIKI</font> <font style="color:blue">SOLUSI INTERNUSA</font></strong><br />              
              Jl. Tanjung Keliling No. 21, Rt. 11 / Rw.11<br />
              Cipinang, Jakarta Timur<br />
              Telp. 021-47883998, 68660967, 081310756621<br />
			  Email: ksi_jkt@yahoo.com<br />
              </p><hr>
			</td>						
          </tr>		  
          <tr align="center">
            <td colspan="3" align="center"><strong><font size="+2"><u>INVOICE</u></font></strong></td>			
          </tr>
		  <tr align="center">
			<td colspan="3" align="center"><strong><font>No.1009/KSI-JKT/I/2016</font></strong></td>
		  </tr>
          <tr>
            <td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="64%">Kepada YTH,</td>
                <td width="2%">&nbsp;</td>
                <td width="2%">&nbsp;</td>
                <td width="18%">Tanggal Invoice</td>
                <td width="2%">:</td>
                <td width="12%"><?php //echo $arrResult['nama_user']; ?></td>
              </tr>
              <tr>
                <td>Fuad</td>
                <td></td>
                <td><?php //echo $arrResult['nama']; ?></td>
                <td>Cara Pembayaran</td>
                <td>:</td>
                <td><?php //echo $arrResult['no_invoice']; ?></td>
              </tr>
              <tr>
                <td>Taman Griya Permai Blok A4 No. 11</td>
                <td></td>
                <td><?php //echo $arrResult['tlp']; ?></td>
                <td>Tanggal Jatuh Tempo</td>
                <td>:</td>
                <td><?php //echo date('d/m/Y');?></td>
              </tr>
              <tr>
                <td>08986265770</td>
                <td></td>
                <td><?php //echo $arrResult['alamat']; ?></td>
                <td></td>
                <td></td>
                <td><?php //echo date('d/m/Y');?></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="3"><table width="100%" border="1" cellpadding="5" cellspacing="5">
              <tr align="center">
                <td width="3%" align="center">No</td>
                <td width="15%" align="center">Tanggal Tanda Terima</td>
                <td width="20%" align="center">Tujuan</td>
                <td width="8%" align="center">Service</td>
                <td width="8%" align="center">CN</td>
                <td width="5%" align="center">Coll</td>
                <td width="5%" align="center">Berat(Kg)</td>
				<td width="10%" align="center">Tarif</td>
                <td width="15%" align="center">Jumlah</td>
              </tr>
              <?php/*
              $invID = $arrResult['id_invoice'];
            
              $sjIDPO = $arrResult['id'];
              $count = 0;
              $totalQty = 0;
              $totalJumlah = 0;
                        $strQuery = "SELECT b.kode_barang, b.nama_barang, b.deskripsi, b.harga, p.qty 
                    FROM po_detail p 
                    INNER JOIN tbl_barang b ON b.id = p.id_barang 
                    where id_po_header = '$sjIDPO'";
                        $result = mysql_query($strQuery) or die(mysql_error());
                        while($arrResult = mysql_fetch_array($result)) {
                          $count++;
                $totalHarga = $arrResult['harga'] * $arrResult['qty']; 
                $totalQty = $totalQty + $arrResult['qty'];
                $totalJumlah = $totalJumlah + $totalHarga;
                     */ ?>
              <tr>
                <td><?php //echo $count; ?></td>
                <td><?php //echo $arrResult['kode_barang']; ?></td>
                <td><?php //echo $arrResult['deskripsi']; ?></td>
                <td><?php //echo number_format($arrResult['qty']); ?></td>
                <td><?php //echo number_format($arrResult['harga']); ?></td>
                <td>0</td>
                <td><?php //echo number_format($totalHarga); ?></td>
				<td>0</td>
                <td><?php //echo number_format($totalHarga); ?></td>
              </tr>
              <?php// } ?>
              <tr>
                <td colspan="6" rowspan="4" align="left" valign="top"><b>Pembayaran dapat ditransfer ke Rekening :</b><br>
                  <b>Bank Danamon, No. 003571498470 a/n CV.KiKi Solusi Internusa </b><br>
                  <b>Bank Central Asia, No,Rek. 3422661422 a/n HARYAKA </b><br>
                  <b>Bank Mandiri, No, Rek. 117-00-0587544-8 a/n HARYAKA </b>
				 </td>
                <td colspan="2" align="right">Sub Total</td>
                <td><?php echo number_format($totalJumlah);?></td>
              </tr>
              <tr>
                <td colspan="2" align="right">Packing Kayu</td>
                <td>0</td>
              </tr>
			  <tr>
                <td colspan="2" align="right">Asuransi</td>
                <td>0</td>
              </tr>
              <tr>
                <td colspan="2" align="right">Total</td>
                <td><?php echo number_format($totalJumlah);?></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="3"></td>
          </tr>
          <tr>
            <td colspan="3" align="center"><table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr align="center">
                <td></td>
                <td>Hormat Kami,</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr align="center">
                <td style="color:white">(.........................................)(.........................................)</td>
                <td>(.........................................)</td>
              </tr>
            </table></td>
          </tr>		
        </table>		
		<!-- </fieldset> -->		
		</div>		
		<tr>
			<td colspan="3" align="center"><a type="button" class="button" href="javascript:printDiv('print-area-1');" >Cetak</a></td>
        </tr>
      </td>		
    </tr>
  </table>
<textarea id="printing-css" style="display:none;">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px dotted;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:1.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:1.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:100%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:100%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em;text-align:left;vertical-align:top}th{font-weight:bold}table[border="1"] caption{border:none;font-style:italic}.no-print{display:none}</textarea>
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