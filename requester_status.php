<?php
	session_start();
require('config.php');

if(isset($_SESSION['SESS_SR_ID'])) {
	$SRID=$_SESSION['SESS_SR_ID'];
	$qryProfile=mysqli_query($bd, "SELECT * FROM service_requester WHERE SRID='$SRID'");
	if($memProfile=mysqli_fetch_assoc($qryProfile)) {
		$sremail=$memProfile['email'];
	}
	
	
	$timeNow=time();
	$result = mysqli_query($bd, "SELECT * FROM sr_status WHERE SRID ='$SRID' ");
	if( mysqli_num_rows($result) > 0) {
		mysqli_query($bd, "UPDATE sr_status SET lastActivity='$timeNow' WHERE SRID='$SRID'");
	}
	else
	{
		mysqli_query($bd, "INSERT INTO sr_status(SRID,lastActivity) VALUES('$SRID','$lastActivity')");
	}
	
}






?>