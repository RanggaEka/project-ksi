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
            <td width="21%" valign="bottom"><p>Jakarta, <?php echo date('d/m/Y');?></p></td>
          </tr>
          <tr align="center">
            <td colspan="3" align="right"><strong><font size="+3" >CETAK INVOICE</font></strong><hr></td>
          </tr>
          <tr>
            <td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="11%">Kepada YTH,</td>
                <td width="2%">&nbsp;</td>
                <td width="55%">&nbsp;</td>
                <td width="18%">Sales</td>
                <td width="2%">:</td>
                <td width="12%"><?php echo $arrResult['nama_user']; ?></td>
              </tr>
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $arrResult['nama']; ?></td>
                <td>No. Invoice</td>
                <td>:</td>
                <td><?php echo $arrResult['no_invoice']; ?></td>
              </tr>
              <tr>
                <td>Telp</td>
                <td>:</td>
                <td><?php echo $arrResult['tlp']; ?></td>
                <td>Tanggal Invoice</td>
                <td>:</td>
                <td><?php echo date('d/m/Y');?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $arrResult['alamat']; ?></td>
                <td>Tanggal Jatuh Tempo</td>
                <td>:</td>
                <td><?php echo date('d/m/Y');?></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="3"><table width="100%" border="1" cellpadding="5" cellspacing="5">
              <tr align="center">
                <td width="6%">No</td>
                <td width="17%">Kode  Barang</td>
                <td width="22%">Description</td>
                <td width="6%">Qty</td>
                <td width="13%">Harga/Q</td>
                <td width="8%">Diskon</td>
                <td width="28%">Total</td>
              </tr>
              <?php
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
                      ?>
              <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $arrResult['kode_barang']; ?></td>
                <td><?php echo $arrResult['deskripsi']; ?></td>
                <td><?php echo number_format($arrResult['qty']); ?></td>
                <td><?php echo number_format($arrResult['harga']); ?></td>
                <td>0</td>
                <td><?php echo number_format($totalHarga); ?></td>
              </tr>
              <?php } ?>
              <tr>
                <td colspan="3" rowspan="3" align="left" valign="bottom">Note: Barang yang sudah dibeli tidak dapat dikembalikan<br>
                  Transfer Via <br>
                  BCA 12345678<br>
                  A/N. PT GRAHA KERINDO UTAMA</td>
                <td colspan="3" align="right">Sub Total</td>
                <td><?php echo number_format($totalJumlah);?></td>
              </tr>
              <tr>
                <td colspan="3" align="right">Diskon</td>
                <td>0</td>
              </tr>
              <tr>
                <td colspan="3" align="right">Total</td>
                <td><?php echo number_format($totalJumlah);?></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="3">Keterangan: Kami Tidak bertanggung jawab lagi setelah barang-barang di terima</td>
          </tr>
          <tr>
            <td colspan="3" align="center"><table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr align="center">
                <td>Penerima/Pembeli</td>
                <td>PT GRAHA KERINDO UTAMA</td>
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
                <td>(.........................................)</td>
                <td>(.........................................)</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="3" align="center"><a type="button" class="button" onclick="print()" href="../system/verifikasi_service.php?status=FINISHED&id_inv=<?php echo $invID; ?>" >Cetak</a></td>
          </tr>
        </table>
</fieldset>
      </td>
    </tr>
  </table>
    
</body>
</html>