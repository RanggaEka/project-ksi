<?php
	include '../system/config_service.php';
	$param1= "";
	if ($_GET['cn'] != "") {
		$countArr = 0;
		if ($_GET['arrSID'] != null || $_GET['arrSID'] != "") {
			$json = json_encode($_GET['arrSID']);
			$dec = json_decode($json);
			$countArr = count($dec);
			$data = array();
			for ($i = 0; $i < $countArr; $i++) {
				array_push($data, $dec[$i]);
			}
			$string = join(',', $data);
			$param1 = "where no_cn = '".$_GET['cn']."' and pengirim = '".$_GET['customer']."' and sid not in (".$string.")  and is_sudah_invoice = 0 ";
		} else {
			$param1 = "where no_cn = '".$_GET['cn']."'"; //and is_sudah_invoice = 0 
		}
		
	} else if ($_GET['tanggal'] != "") {
		$countArr = 0;
		if ($_GET['arrSID'] != null || $_GET['arrSID'] != "") {
			$json = json_encode($_GET['arrSID']);
			$dec = json_decode($json);
			$countArr = count($dec);
			$data = array();
			for ($i = 0; $i < $countArr; $i++) {
				array_push($data, $dec[$i]);
			}
			$string = join(',', $data);
			$param1 = "where tanggal = '".$_GET['tanggal']."' and pengirim = '".$_GET['customer']."'  and sid not in (".$string.")  and is_sudah_invoice = 0 ";
		} else {
			$param1 = "where tanggal = '".$_GET['tanggal']."'"; //and is_sudah_invoice = 0 
		}
		
	} else if ($_GET['pengirim'] != "") {
		$countArr = 0;
		if ($_GET['arrSID'] != null || $_GET['arrSID'] != "") {
			$json = json_encode($_GET['arrSID']);
			$dec = json_decode($json);
			$countArr = count($dec);
			$data = array();
			for ($i = 0; $i < $countArr; $i++) {
				array_push($data, $dec[$i]);
			}
			$string = join(',', $data);
			$param1 = "where pengirim = '".$_GET['pengirim']."' and pengirim = '".$_GET['customer']."'  and sid not in (".$string.")  and is_sudah_invoice = 0 ";
		} else {
			$param1 = "where pengirim = '".$_GET['pengirim']."'"; // and is_sudah_invoice = 0 
		}
		
	} else if ($_GET['tujuan'] != "") {
		if ($_GET['arrSID'] != null || $_GET['arrSID'] != "") {
			$json = json_encode($_GET['arrSID']);
			$dec = json_decode($json);
			$countArr = count($dec);
			$data = array();
			for ($i = 0; $i < $countArr; $i++) {
				array_push($data, $dec[$i]);
			}
			$string = join(',', $data);
			$param1 = "where tujuan = '".$_GET['tujuan']."' and pengirim = '".$_GET['customer']."'  and sid not in (".$string.")  and is_sudah_invoice = 0 ";
		} else {
			$param1 = "where tujuan = '".$_GET['tujuan']."'";  //and is_sudah_invoice = 0 
		}
		
	} else if ($_GET['customer'] != "") {
		$countArr = 0;
		if ($_GET['arrSID'] != null || $_GET['arrSID'] != "") {
			$json = json_encode($_GET['arrSID']);
			$dec = json_decode($json);
			$countArr = count($dec);
			$data = array();
			for ($i = 0; $i < $countArr; $i++) {
				array_push($data, $dec[$i]);
			}
			$string = join(',', $data);
			$param1  = "where pengirim = '".$_GET['customer']."' and pengirim = '".$_GET['customer']."'  and sid not in (".$string.")  and is_sudah_invoice = 0 ";
		} else {
			$param1  = "where pengirim = '".$_GET['customer']."' and is_sudah_invoice = 0";
		}
	} else if ($_GET['no_query'] != "") {
		$param1  = "where is_sudah_invoice = 9";
	} else {
		$param1 = "";
	}
	
	$rs = mysql_query("SELECT * FROM tanda_terima $param1 order by no_cn desc");
	$result = array();
	while($row = mysql_fetch_object($rs)){
		array_push($result, $row);
	}
	
	echo json_encode($result);
?>
