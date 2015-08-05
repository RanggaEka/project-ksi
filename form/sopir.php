<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="../lib/metro/css/metro-bootstrap.css" rel="stylesheet">
    <link href="../lib/metro/css/metro-bootstrap-responsive.css" rel="stylesheet">


    <title>Metro UI CSS : Metro Bootstrap CSS Library</title>
</head>
<body class="metro">

    <div class="container">
        <h1>Daftar Status Pengiriman</h1>
        <table class="table bordered striped">
            <thead>
            <tr>
                <td>No.</td>
                <td>No. SJ</td>
                <td>Nama Customer</td>
                <td>Alamat</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <?php
                include '../system/config_service.php'; 
                $count = 0;
                $strQuery = "SELECT s.status_pengiriman, s.id as sj_id,s.no_sj, p.photo, p.id, p.no_po,p.tanggal,c.nama,p.alamat,u.nama as nama_user
                                FROM surat_jalan s 
                                INNER JOIN po_header p ON p.id = s.id_po 
                                INNER JOIN customer c ON c.id = p.id_customer 
                                INNER JOIN user u ON u.id = c.id_referensi_user 
                                where s.status_pengiriman = 'READY' " ;
                $result = mysql_query($strQuery) or die(mysql_error());
                while($arrResult = mysql_fetch_array($result)) {
                    $count++;
                    $path = $arrResult['photo'];
                    $id = $arrResult['sj_id'];
            ?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $arrResult['no_sj'];?></td>
                <td><?php echo $arrResult['nama'];?></td>
                <td><?php echo $arrResult['alamat'];?></td>
                <td><a href="../system/sj_service.php?status=DELIVERED&idSJ=<?php echo $id; ?>"><i class="icon-bus"></i> Telah Diterima Customer</a></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>