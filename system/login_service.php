<?php
include 'config_service.php';
if (isset($_POST['btn_login'])) {
	$userN = $_POST['username'];
	$pass = $_POST['password'];

	$sql = mysql_query("SELECT * FROM user where username = '$userN' and password = '$pass' ");
	$arr = mysql_fetch_array($sql);

	$id = $arr['id'];
	$password = $arr['password'];
	$username = $arr['username'];
	$jabatan = $arr['jabatan'];
	$nama = $arr['nama'];
	// $role = $arr['has_role'];

	if (($userN == $username && $pass == $password) && ($userN != "" && $pass != "")) {

		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['user_sid'] = $id;
		$_SESSION['nama'] = $nama;
		$_SESSION['jabatan'] = $jabatan;

		echo "<script> alert('Selamat datang ! '); window.location.href='../form/halaman_utama.php';</script>";
	} else {
		echo "<script> alert('Email atau password anda belum terdaftar, silahkan ulangi kembali! '); window.history.back();</script>";
	}
}

?>