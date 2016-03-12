<?php
	include 'config_service.php';
	if (isset($_POST['btn_login'])) {
		$userN = $_POST['username'];
		$pass = $_POST['password'];
	
		$cekSign = mysql_query("select * from user where is_active = 1 and username = '".$userN."' ");
		$signAr = mysql_fetch_array($cekSign);
		$countSign = mysql_num_rows($cekSign);
		
		
		
		
		if ($countSign > 0) {
			if ($signAr['jabatan'] == 'ADMIN') {
				$sql = mysql_query("SELECT * FROM user where username = '$userN' and password = '$pass' ");
				$arr = mysql_fetch_array($sql);
		
				$id = $arr['id'];
				$password = $arr['password'];
				$username = $arr['username'];
				$jabatan = $arr['jabatan'];
				$nama = $arr['nama'];
			
				if (($userN == $username && $pass == $password) && ($userN != "" && $pass != "")) {
					$signOn = mysql_query("update user set is_active = 1 where username = '".$username."' ");
					if ($signOn) {
						session_start();
						$_SESSION['username'] = $username;
						$_SESSION['password'] = $password;
						$_SESSION['user_sid'] = $id;
						$_SESSION['nama'] = $nama;
						$_SESSION['jabatan'] = $jabatan;
						echo "<script> window.location.href='../form/halaman_utama.php?page=home';</script>";
					} else {
						echo "<script> alert('MYSQL ERROR could not execute update table `user` '); window.history.back();</script>";
					}
					
				} else {
					echo "<script> alert('Email atau password anda belum terdaftar, silahkan ulangi kembali! '); window.history.back();</script>";
				}
			} else {
				echo "<script>alert('User `".$userN."` sedang login , Silahkan gunakan user lain ! '); window.history.back();</script>";
			}
			
		} else {
			$sql = mysql_query("SELECT * FROM user where username = '$userN' and password = '$pass' ");
			$arr = mysql_fetch_array($sql);
	
			$id = $arr['id'];
			$password = $arr['password'];
			$username = $arr['username'];
			$jabatan = $arr['jabatan'];
			$nama = $arr['nama'];
		
			if (($userN == $username && $pass == $password) && ($userN != "" && $pass != "")) {
				$signOn = mysql_query("update user set is_active = 1 where username = '".$username."' ");
				if ($signOn) {
					session_start();
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					$_SESSION['user_sid'] = $id;
					$_SESSION['nama'] = $nama;
					$_SESSION['jabatan'] = $jabatan;
					echo "<script> window.location.href='../form/halaman_utama.php?page=home';</script>";
				} else {
					echo "<script> alert('MYSQL ERROR could not execute update table `user` '); window.history.back();</script>";
				}
				
			} else {
				echo "<script> alert('Email atau password anda belum terdaftar, silahkan ulangi kembali! '); window.history.back();</script>";
			}
		}
	}
?>
