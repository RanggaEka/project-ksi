<?php
include 'config_service.php';
session_start();
$signOut = mysql_query("update user set is_active = 0 where username = '".$_SESSION['username']."' ");
$delAllLocking = mysql_query("delete from locking where user_name = '".$_SESSION['username']."' ");
if ($signOut && $delAllLocking) {
	session_destroy();
	echo "<script>window.location.href='../'</script>";
} else {
	echo "<script> alert('MYSQL ERROR could not execute update table `user` ');</script>";
}
?>
