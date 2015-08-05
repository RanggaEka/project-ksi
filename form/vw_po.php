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
                        <th class="text-left">Total</th>
                    </tr>
                    </thead>

                    <tbody>
                  <?php
                    $count = 0;
                    $strQuery = "SELECT b.kode_barang, b.nama_barang, b.harga, p.qty FROM po_detail p INNER JOIN tbl_barang b ON b.id = p.id_barang where id_po_header = '$poID'";
                    // echo $strQuery;
                    $result = mysql_query($strQuery) or die(mysql_error());
                    while($arrResult = mysql_fetch_array($result)) {
                      $count++;
                  ?>
                    <tr>
                      <td><?php echo $count;?></td>
                      <td class="right"><?php echo $arrResult['kode_barang'];?></td>
                      <td class="right"><?php echo $arrResult['nama_barang'];?></td>
                      <td class="right"><?php echo $arrResult['harga'];?></td>
                      <td class="right"><?php echo $arrResult['qty'];?></td>
                      <td class="right"><?php echo number_format($arrResult['qty']*$arrResult['harga']);?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>

      </fieldset>
      </td>
    </tr>
  </table>
    
</body>
</html>