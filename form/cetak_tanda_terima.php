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
    $CN = "";
    if (isset($_GET['CN'])) {
      $CN = $_GET['CN'];
    }

    $count = 0;
    $strQuery = "SELECT * FROM tanda_terima where no_cn='$CN'";
    $result = mysql_query($strQuery) or die(mysql_error());
    $arrResult = mysql_fetch_array($result);    
  ?>
  <table width="100%" cellspacing="30" cellpadding="30" align="center">
    <tr>
      <td>
        <fieldset style="width: 85%; padding: 10px;" align="center">
        <!-- <legend>Cetak TT</legend> -->
        <table width="100%" border="0" cellpadding="5" cellspacing="5" bordercolor="1" style="border:solid 1px #000000; padding:10px;" align="center">
          <tr>
            <td width="10%"><img src="../images/ksi.png" width="100" height="100" /></td>
            <td width="69%"><p><strong><b style="color:red">CV. KIKI</b> <b style="color:blue">SOLUSI INTERNUSA</b></strong><br />              
              Jl. Tanjung Keliling no. 21, RT. 11 / RW. 11<br />
              Cipinang, Jakarta Timur.<br />
              Telp. 021-47883998, 68660967, 081310756621.<br />
			  Email   :  ksi_jkt@yahoo.com<br />
              </p>
			</td>
            <td width="21%" valign="bottom"><p>Jakarta, <?php echo date('d/m/Y');?></p></td>
          </tr>
          <tr align="center">
            <td colspan="3" align="center"><strong><font size="+3" >TANDA TERIMA</font></strong><hr></td>
          </tr>
          <tr>
            <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="10%"><b>Pengirim:</b></td>
                <td width="35%">&nbsp;</td>
                <td width="35%">&nbsp;</td>
                <td width="20%"><b>Penerima:</b></td>
              </tr>
              <tr>
                <td><?php echo $arrResult['pengirim']; ?></td>
				<td width="35%">&nbsp;</td>
                <td width="35%">&nbsp;</td>
                <td><?php echo $arrResult['penerima']; ?></td>
              </tr>
			  <tr>
                <td><?php echo $arrResult['alamat_pengirim']; ?></td>
				<td width="35%">&nbsp;</td>
                <td width="35%">&nbsp;</td>
                <td><?php echo $arrResult['alamat_penerima']; ?></td>
              </tr>
			  <tr>
                <td><?php echo"08986265770"; ?></td>
				<td width="35%">&nbsp;</td>
                <td width="35%">&nbsp;</td>
                <td><?php echo"08986265770"; ?></td>
              </tr>
			  </br>
              <tr>
                <td><b>Service: </b><?php echo $arrResult['service_udl']; ?>/<?php echo $arrResult['service_dtddtp']; ?>/<?php echo $arrResult['service_agent']; ?></td>				
              </tr>
            </table><hr></td>						
          </tr>		            
          <tr>
            <td colspan="3" align="center"><table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr align="center">
                <td>Pengirim</td>
                <td><b style="color:red">CV. KIKI</b> <b style="color:blue">SOLUSI INTERNUSA</b></td>
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
        </table>
		</fieldset>
      </td>
    </tr>
  </table>
  <table width="85%" border="0" cellpadding="0" cellspacing="0">
	<tr align="center">
		<td align="center">
			<a type="button" class="button" onclick="window.location.href='../form/halaman_utama.php?page=home';">Kembali ke Home</a>
			<a type="button" class="button" onclick="print()">Cetak</a>
		</td>
	</tr>
  </table>
</body>
</html>