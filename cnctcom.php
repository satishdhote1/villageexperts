<?php
	session_start();
require('config.php');
if($_SESSION['SESS_ID']||$_SESSION['SESS_SR_ID']) {
}
else {
	header('location:index.php?error="loginerror"');
	exit();	
}
$spid=$_GET['spid'];
$srid=$_GET['srid'];
$qdelete=mysqli_query($bd, "DELETE FROM last_query WHERE SRID='$srid'");
header('location:http://movingpixels.co.in/service_exc/communication.php?spid='.$spid);
?>

