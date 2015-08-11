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
    $poID = "";
    if (isset($_GET['id_po'])) {
      $poID = $_GET['id_po'];
    }
  ?>
  <table width="50%" cellspacing="30" cellpadding="30">
    <tr>
      <td>
        <fieldset>
        <legend>Item Detail</legend>
        <table class="table hovered">
                    <thead>
                    <tr>
                        <th class="text-left">No</th>
                        <th class="text-left">Kode Barang</th>
                        <th class="text-left">Nama Barang</th>
                        <th class="text-left">Harga</th>
                        <th class="text-left">Qty</th>
                        <th class="text-left">Diskon</th>
                        <th class="text-left">Total</th>
                    </tr>
                    </thead>

                    <tbody>
                  <?php
                    $count = 0;
                    $total = 0;
                    $strQuery = "SELECT p.diskon, b.kode_barang, b.nama_barang, b.harga, p.qty FROM po_detail p INNER JOIN tbl_barang b ON b.id = p.id_barang where id_po_header = '$poID'";
                    // echo $strQuery;
                    $result = mysql_query($strQuery) or die(mysql_error());
                    while($arrResult = mysql_fetch_array($result)) {
                      $count++;
                      $total = $total + (($arrResult['qty']*$arrResult['harga']) - $arrResult['diskon']);
                  ?>
                    <tr>
                      <td><?php echo $count;?></td>
                      <td class="right"><?php echo $arrResult['kode_barang'];?></td>
                      <td class="right"><?php echo $arrResult['nama_barang'];?></td>
                      <td class="right"><?php echo number_format($arrResult['harga']);?></td>
                      <td class="right"><?php echo number_format($arrResult['qty']);?></td>
                      <td class="right"><?php echo number_format($arrResult['diskon']);?></td>
                      <td align="right" class="right"><?php echo number_format((($arrResult['qty']*$arrResult['harga']) - $arrResult['diskon']));?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                     <tfoot>
                      <tr >
                        <td align="right" colspan="6"><strong>GRAND TOTAL</strong></td>
                        <td align="right"><strong><?php echo number_format($total);?></strong></td>
                      </tr>
                     </tfoot>
                </table>

      </fieldset>
      </td>
    </tr>
    <tr>
        <td>
          <?php
                    $pathPO = "";
                    $strQuery = "SELECT * FROM po_header p  where id = '$poID'";
                $result = mysql_query($strQuery) or die(mysql_error());
                $arrResult = mysql_fetch_array($result);
                $pathPO = $arrResult['photo'];
          ?>
          <fieldset>
            <legend>Photo</legend>
            <img src="../upload/photo/<?php echo $pathPO;?>" class="shadow">
          </fieldset>
        </td>
      </tr>
  </table>
    
</body>
</html>