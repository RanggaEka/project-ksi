<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';
	session_start();
	if ($_POST['data'] != null) {
		
		$test = json_encode($_POST['data']);
		$jsondata = json_decode($test);
		$id = gen_uuid();
		$rec = ($jsondata[0]->rec);
		$form = ($jsondata[0]->form);
		
		$cekValue = mysql_query("SELECT * FROM locking WHERE value = '".$rec."' and form_name = '".$form."' ");
		$cekAr = mysql_fetch_array($cekValue);
		$countRec = mysql_num_rows($cekValue);
		if (($countRec) > 0) {
			echo "Data <b>".$rec."</b> sedang di edit oleh user <b>".$cekAr['user_name']."</b>";
		} else {
			//echo $countRec;
			$cekSelf = mysql_num_rows(mysql_query("SELECT * FROM locking WHERE user_id = '".$_SESSION['user_sid']."'"));
			if (($cekSelf) < 1) {
				mysql_query("insert into locking values ('".$id."','".$form."','".$rec."','".$_SESSION['user_sid']."','".$_SESSION['username']."') ");
			} else {
				$del = mysql_query("DELETE FROM locking WHERE user_id = '".$_SESSION['user_sid']."'");
				if ($del) {
					mysql_query("insert into locking values ('".$id."','".$form."','".$rec."','".$_SESSION['user_sid']."','".$_SESSION['username']."') ");
				}
			}
		}
	} else if ($_GET['sch'] != null) {	
		$del = mysql_query("DELETE FROM locking WHERE user_id = '".$_SESSION['user_sid']."'");
		if ($del) {
			echo "Delete locking succes";
		} else {
			echo "ERROR 500";
		}
	}
?>
