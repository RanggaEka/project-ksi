<?php
include 'config_service.php';
session_start();
$signOut = mysql_query("update user set is_active = 0 where username = '".$_SESSION['username']."' ");
if ($signOut) {
	session_destroy();
	echo "<script>window.location.href='../'</script>";
} else {
	echo "<script> alert('MYSQL ERROR could not execute update table `user` ');</script>";
}
?>
