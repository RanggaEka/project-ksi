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
<body class="metro">
  <?php 
    include '../system/config_service.php'; 
    $sjID = "";
    if (isset($_GET['id_sj'])) {
      $sjID = $_GET['id_sj'];
    }


    $count = 0;
    $strQuery = "SELECT s.id as sj_sid, s.no_sj, p.photo, p.id, p.no_po,p.tanggal,c.nama,p.alamat,u.nama as nama_user
                                FROM surat_jalan s 
                                INNER JOIN po_header p ON p.id = s.id_po 
                                INNER JOIN customer c ON c.id = p.id_customer 
                                INNER JOIN user u ON u.id = c.id_referensi_user 
                                where s.status_pengiriman = 'NEW' 
                                and s.id = '$sjID'"
                                ;
    $result = mysql_query($strQuery) or die(mysql_error());
    $arrResult = mysql_fetch_array($result);
    
  ?>

  <table width="100%" cellspacing="30" cellpadding="30">
    <tr>
      <td>
        <fieldset style="width: 85%; padding: 10px;">
        <!-- <legend>Cetak SJ</legend> -->
        <table width="100%" border="0" cellpadding="5" cellspacing="5" bordercolor="1" style="border:solid 1px #000000; padding:10px;">
          <tr>
            <td width="10%"><img src="../images/logo-gku.jpeg" width="100" height="100" /></td>
            <td width="69%"><p><strong>PT GRAHA KERINDO UTAMA</strong><br />
              Kelompok KOMPAS - GRAMEDIA<br />
              Jl. Kerajinan No.3 - 7 Kel. Krukut<br />
              Kec. Tamansari Jakarta Barat 11140<br />
              (021) 2601616<br />
              </p>            </td>
            <td width="21%" valign="bottom"><p>Jakarta, <?php echo date('d/m/Y');?><br />
            Kepada YTH.</p>
            <p><strong><?php echo $arrResult['nama']; ?></strong></p></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><table width="100%" border="0">
              <tr>
                <td width="9%">No. PO</td>
                <td width="2%">:</td>
                <td colspan="2"><?php echo $arrResult['no_po']; ?></td>
              </tr>
              <tr>
                <td>No. SJ</td>
                <td>:</td>
                <td colspan="2"><?php echo $arrResult['no_sj']; ?></td>
              </tr>
              <tr>
                <td valign="top">Sales</td>
                <td valign="top">:</td>
                <td colspan="2" valign="top"><?php echo $arrResult['nama_user']; ?></td>
              </tr>
              <tr>
                <td colspan="4">Harap Diterima Barang-barang seperti dibawah ini</td>
              </tr>
              
            </table></td>
            <td>&nbsp;</td>
          </tr>
          <tr align="center">
            <td colspan="3"><strong><font size="+3" >SURAT JALAN</font></strong></td>
          </tr>
          <tr>
            <td colspan="3"><table width="100%" border="1" cellpadding="5" cellspacing="5">
              <tr align="center">
                <td>Kode Barang</td>
                <td>Nama Barang</td>
                <td>Quantity</td>
                <td>Harga</td>
                <td>Disc %</td>
                <td>Jumlah</td>
              </tr>
             <?php
              $sjIDPO = $arrResult['id'];
			 				$sjID = $arrResult['sj_sid'];
                    		$count = 0;
							$totalQty = 0;
							$totalJumlah = 0;
                    		$strQuery = "SELECT b.kode_barang, b.nama_barang, b.harga, p.qty 
										FROM po_detail p 
										INNER JOIN tbl_barang b ON b.id = p.id_barang 
										where id_po_header = '$sjIDPO'";
                    		$result = mysql_query($strQuery) or die(mysql_error());
                    		while($arrResult = mysql_fetch_array($result)) {
                    			$count++;
								$totalHarga = $arrResult['harga'] * $arrResult['qty']; 
								$totalQty = $totalQty + $arrResult['qty'];
								$totalJumlah = $totalJumlah + $totalHarga;
                    	?>
              <tr>
                <td><?php echo $arrResult['kode_barang']; ?></td>
                <td><?php echo $arrResult['nama_barang']; ?></td>
                <td><?php echo number_format($arrResult['qty']); ?></td>
                <td><?php echo number_format($arrResult['harga']); ?></td>
                <td>0</td>
                <td><?php echo number_format($totalHarga); ?></td>
              </tr>
              <?php } ?>
              <tr>
                <td colspan="2" align="right"><strong>Total Qty</strong></td>
                <td><strong><?php echo number_format($totalQty); ?></strong></td>
                <td colspan="2" align="right"><strong>Total</strong></td>
                <td><strong><?php echo number_format($totalJumlah); ?></strong></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="3">Keterangan: Kami Tidak bertanggung jawab lagi setelah barang-barang di terima</td>
          </tr>
          <tr>
            <td colspan="3" align="center"><table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr align="center">
                <td>Yang Menerima</td>
                <td>Sopir</td>
                <td>Kepala Gudang</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr align="center">
                <td>(.........................................)</td>
                <td>(.........................................)</td>
                <td>(.........................................)</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="3" align="center"><a type="button" class="button"onclick="print()" href="../system/sj_service.php?status=READY&idSJ=<?php echo $sjID; ?>" >Cetak</a></td>
          </tr>
        </table>
</fieldset>
      </td>
    </tr>
  </table>
    
</body>
</html>