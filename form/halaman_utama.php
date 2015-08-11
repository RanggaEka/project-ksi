<?php 
    include '../system/config_service.php'; 
    session_start();
    if (empty($_SESSION['username']) || empty($_SESSION['password']) ) {
        echo "<script>window.location.href='../'</script>";
    } else {
?>
<!DOCTYPE html>
<html>
<head>
    <title>PO Online</title>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="../lib/chosen/style.css"> -->
    <!-- <link rel="stylesheet" href="../lib/chosen/prism.css"> -->
    <link rel="stylesheet" href="../lib/chosen/chosen.css">
    <style type="text/css" media="all">
        /* fix rtl for demo */
        .chosen-rtl .chosen-drop { left: -9000px; }
    </style>

    <link rel="stylesheet" href="../lib/metro/css/metro-bootstrap.css">
    <link rel="stylesheet" href="../lib/metro/css/metro-bootstrap-responsive.css">
    <script src="../lib/metro/js/jquery/jquery.min.js"></script>
    <script src="../lib/metro/js/jquery/jquery.widget.min.js"></script>
    <script src="../lib/metro/min/metro.min.js"></script>
</head>
<body class="metro">
    <nav class="navigation-bar">
        <nav class="navigation-bar-content">
            <a href="?page=home" class="element"><img src="../images/logo-gku.jpeg" width="128px"></a>
            <span class="element-divider"></span>
            <?php 
                if ($_SESSION['jabatan'] == "SALES" || $_SESSION['jabatan'] == "ADMIN") {
            ?>
            <div class="element">
                <a class="dropdown-toggle" href="#">
                    <span class="icon-newspaper"></span> Form Order</a>
                <ul class="dropdown-menu" data-role="dropdown">
                    <li><a href="?page=order">Input Order</a></li>
                    <!-- <li><a href="?page=order_detail">Input Detail Order</a></li> -->
                </ul>
            </div>
            
            <?php 
                } 
                if ($_SESSION['jabatan'] == "SUPERVISOR" || $_SESSION['jabatan'] == "ADMIN") {
            ?>
            <span class="element-divider"></span>
            <a class="element" href="?page=approval"><span class="icon-checkmark"></span> Form Approval</a>
            <?php 
                } 
                if ($_SESSION['jabatan'] == "STAFF EXPEDISI" || $_SESSION['jabatan'] == "ADMIN") {
            ?>
            <span class="element-divider"></span>
            <a class="element" href="?page=sj"><span class="icon-shipping"></span> Form SJ</a>
            <?php 
                } 
                if ($_SESSION['jabatan'] == "FINANCE" || $_SESSION['jabatan'] == "ADMIN") {
            ?>
            <span class="element-divider"></span>
            <a class="element" href="?page=verifikasi"><span class="icon-copy"></span> Form Verifikasi</a>
            <?php 
                } 
                if ($_SESSION['jabatan'] == "SOPIR" || $_SESSION['jabatan'] == "ADMIN") {
            ?>
            <span class="element-divider"></span>
            <a class="element" href="?page=sopir"><span class="icon-cars"></span> SOPIR</a>
            <?php } ?>
        </nav>
    </nav>
    <table width="100%" border="0">
        <tr align="right" height="30px">
            <td colspan="2" style="border-bottom: solid 1px black;">
                <strong><?php echo $_SESSION['username']." | ".$_SESSION['nama']." | ".$_SESSION['jabatan']." | "; ?><a href="../system/logout_service.php">LOGOUT</a></strong>&emsp;
            </td>
        </tr>
        <tr align="center">
            <?php
                if (isset($_GET['page'])) {
                    if ($_GET['page'] == "order") {
                        include 'order.php';
                    } elseif ($_GET['page'] == "order_detail") {
                        include 'order_detail.php';
                    } elseif ($_GET['page'] == "sj") {
                        include 'sj.php';
                    } elseif ($_GET['page'] == "verifikasi") {
                        include 'verifikasi.php';
                    } elseif ($_GET['page'] == "approval") {
                        include 'approval.php';
                    } elseif ($_GET['page'] == "sopir") {
                        echo "<script>window.location.href='sopir.php'</script>";
                    } else {
                        echo '<td colspan="2"><img src="../images/utama.jpg" width=""></td>';
                    }
                } else {
                    echo '<td colspan="2"><img src="../images/utama.jpg" width=""></td>';
                }
            ?>
        </tr>
    </table>
</body>
</html>
<script src="../lib/chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="../lib/chosen/prism.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
var config = {
  '.chosen-select'           : {},
  '.chosen-select-deselect'  : {allow_single_deselect:true},
  '.chosen-select-no-single' : {disable_search_threshold:10},
  '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
  '.chosen-select-width'     : {width:"95%"}
}
for (var selector in config) {
  // $(selector).chosen(config[selector]);
}
</script>
<script src="../js/main.js"></script>
<?php } ?>