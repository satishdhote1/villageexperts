<?php
	session_start();
require('config.php');
if($_SESSION['SESS_ID']) {
}
else {
	header('location:index.php?error="loginerror"');
	exit();	
}

if(isset($_GET['cid'])) {
$spid=$_GET['cid'];
$time=time();
	if($_SESSION['SESS_ID']) {
		$qrySP=mysqli_query($bd, "INSERT INTO communication(srid,time,status) VALUES('$spid','$time','open')");
		echo $spid."".$time;
	}
}
?>