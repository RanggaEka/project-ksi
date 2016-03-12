<?php 
    include '../system/config_service.php'; 
    session_start();
    if (empty($_SESSION['username']) || empty($_SESSION['password']) ) {
        echo "<script>window.location.href='../form/halaman_utama.php?page=home'</script>";
    } else {
?>
<!DOCTYPE html>
<html>

<head>
    <title>KSI System</title>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="../lib/chosen/style.css"> -->
    <!-- <link rel="stylesheet" href="../lib/chosen/prism.css"> -->
    <link rel="stylesheet" href="../lib/chosen/chosen.css">
    <!--style type="text/css" media="all">
        /* fix rtl for demo */
        
        .chosen-rtl .chosen-drop {
            left: -9000px;
        }
        
        .user-level-viewer {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #666666;
        }
    </style-->
	<style type="text/css">
		#idletimeout { background:#1ba1e2; border:1px solid #eee; color:#fff; font-family:arial, sans-serif; text-align:center; font-size:12px; padding:10px; position:relative; top:0px; left:0; right:0; z-index:100000; display:none; }
		#idletimeout a { color:#fff; font-weight:bold }
		#idletimeout span { font-weight:bold }
	</style>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../lib/jquery/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../lib/jquery/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../lib/jquery/demo/demo.css">
    <link rel="stylesheet" href="../lib/metro/css/metro-bootstrap.css">
    <link rel="stylesheet" href="../lib/metro/css/metro-bootstrap-responsive.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../lib/jquery/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="../lib/datagrid-detailview.js"></script>
    <!--<script type="text/javascript" src="../lib/jquery-1.4.4.min.js"></script>-->
	<script type="text/javascript" src="../js/formatter.js"></script>	
    <script type="text/javascript" src="../js/mainController.js"></script>
	<script src="../js/jquery.idletimer.js" type="text/javascript"></script>
	<script src="../js/jquery.idletimeout.js" type="text/javascript"></script>
	
	<link rel="stylesheet" href="../lib/dojo.1.10/dojox/grid/enhanced/resources/claro/EnhancedGrid.css">
	<script>
		dojoConfig = {
			parseOnLoad: true,
			baseUrl:"../lib",
			packages: [{
					name: 'cbtree',
					location: '../lib/dojo.1.10/cbtree'
				},{
					name: 'dojo',
					location: '../lib/dojo.1.10/dojo'
				},{
					name: 'dijit',
					location: '../lib/dojo.1.10/dijit'
				},{
					name: 'dojox',
					location: '../lib/dojo.1.10/dojox'
				}
			]
		};
	</script>
	<!-- load framework -->
	<script src="../lib/dojo.1.10/dojo/dojo.js" type="text/javascript"></script>
	<!-- Startup Application -->
	<script src="../lib/IncludeModule.js" type="text/javascript"></script>
	<script src="../lib/ParseUtil.js" type="text/javascript"></script>
</head>

<body class="metro" onLoad="onLoadBodyGrid()">
	<div id="idletimeout">
		Anda akan logout dalam <span><!-- countdown place holder --></span>&nbsp;detik. 
		<a id="idletimeout-resume" href="#" style="text-decoration:underline;">Klik di sini untuk melanjutkan menggunakan system ini</a>.
	</div>
    <nav class="navigation-bar">
		<nav class="navigation-bar-content">
			<a href="?page=home" class="element"><img src="../images/ksi.png" width="128px"></a>
            <span class="element-divider"></span>
            <div style="margin:20px 0;"></div>
            <div class="easyui-panel" style="padding:5px;">
                <a href="#" class="easyui-menubutton" data-options="menu:'#mm1',iconCls:'icon-newspaper'">Form Tanda Terima</a>
                <a href="#" class="easyui-menubutton" data-options="menu:'#mm2',iconCls:'icon-coins'">Form Invoice</a>
				<a href="?page=rekappengiriman" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-file-excel'">Rekap Pengiriman</a>
                <?php 
					if ($_SESSION['jabatan'] == "ADMIN") {
				?>
                <a href="#" class="easyui-menubutton" data-options="menu:'#mm3admin',iconCls:'icon-tools'">Pengaturan Admin</a>
                 <div id="mm3admin" style="width:230px;">
					<div><a href="?page=kelolaadmin">Kelola Admin</a></div>
					<div><a href="?page=useractive">User Aktif</a></div>
					<!--<div><a href="?page=db">Database</a></div>-->
				</div>
				<?php } ?>
			</div>
            <div id="mm1" style="width:200px;">
                <div><a href="?page=tandaterima">Input Tanda Terima</a></div>
                <div><a href="?page=rekaptandaterima">Rekap Tanda Terima</a></div>
            </div>
            <div id="mm2" style="width:230px;">
                <div><a href="?page=invoice">Input Invoice</a></div>
                <div><a href="?page=pembayaraninvoice">Input Pembayaran Invoice</a></div>
                <div><a href="?page=rekapinvoice">Rekap Invoice</a></div>
            </div>
        </nav>
    </nav>
    <table width="100%" border="0">
        <tr align="right" height="30px">
            <td colspan="2" style="border-bottom: solid 1px black;" class="user-level-viewer">
                <strong><?php 	echo 
								"<img src='../images/famfam/application_form.png' style='cursor:pointer;' title='FORM' valign='middle' width='20px'/> ".strtoupper($_GET['page'])." | ".
								"<img src='../images/icon/036.png' style='cursor:pointer;' title='Nama' valign='middle' width='20px'/> ".$_SESSION['nama']." | ".
								"<img src='../images/icon/159.png' style='cursor:pointer;' title='Username' valign='middle' width='20px'/> ".$_SESSION['username']." | ".
								"<img src='../images/icon/146.png' style='cursor:pointer;' title='Jabatan' valign='middle' width='20px'/> ".$_SESSION['jabatan']." | "; ?>
								<a href="../system/logout_service.php">LOGOUT</a>
				</strong>&emsp;
            </td>
        </tr>
        <tr align="center">
            <?php
                if (isset($_GET['page'])) {
                    if ($_GET['page'] == "tandaterima") {
                        include 'tanda_terima.php';
                    } elseif ($_GET['page'] == "rekaptandaterima") {
                        include 'rekap_tanda_terima.php';
                    } elseif ($_GET['page'] == "invoice") {
                        include 'invoice.php';
                    } elseif ($_GET['page'] == "pembayaraninvoice") {
                        include 'pembayaran_invoice.php';
                    } elseif ($_GET['page'] == "rekapinvoice") {
                        include 'rekap_invoice.php';
                    } elseif ($_GET['page'] == "rekappengiriman") {
                        include 'rekap_pengiriman.php';
                    } elseif ($_GET['page'] == "kelolaadmin") {
                        include 'kelola_admin.php';
                    } elseif ($_GET['page'] == "useractive") {
                        include 'user_active.php';
                    } elseif ($_GET['page'] == "db") {
                        include 'db.php';
                    } else {
                        echo '<td colspan="2"><br/><br/><br/><br/><h2>KIKI SOLUSI INTERNUSA</h2></td>';
                    }
                } else {
                    echo '<td colspan="2"><br/><br/><br/><br/><h2>KIKI SOLUSI INTERNUSA</h2></td>';
                }
            ?>
        </tr>
    </table>
</body>

</html>
<script src="../lib/chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="../lib/chosen/prism.js" type="text/javascript" charset="utf-8"></script>
<!--script type="text/javascript">
    var config = {
        '.chosen-select': {},
        '.chosen-select-deselect': {
            allow_single_deselect: true
        },
        '.chosen-select-no-single': {
            disable_search_threshold: 10
        },
        '.chosen-select-no-results': {
            no_results_text: 'Oops, nothing found!'
        },
        '.chosen-select-width': {
            width: "95%"
        }
    }
    for (var selector in config) {
        // $(selector).chosen(config[selector]);
    }
</script-->
<script type="text/javascript">
	$.idleTimeout('#idletimeout', '#idletimeout a', {
		idleAfter: 5,
		pollingInterval: 2,
		keepAliveURL: '../form/halaman_utama.php?page=home',
		serverResponseEquals: 'OK',
		onTimeout: function(){
			$(this).slideUp();
			window.location.href='../system/logout_service.php';
			//window.location = "timeout.htm";
		},
		onIdle: function(){
			$(this).slideDown(); // show the warning bar
		},
		onCountdown: function( counter ){
			$(this).find("span").html( counter ); // update the counter
		},
		onResume: function(){
			$(this).slideUp(); // hide the warning bar
		}
	});
</script>
<script src="../js/main.js"></script>
<?php } ?>
