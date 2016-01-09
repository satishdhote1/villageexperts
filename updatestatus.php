<?php
	session_start();
require('config.php');
$timeNow=date('ymdhis');
//$timeLess=$timeNow-60;
if(isset($_SESSION['SESS_ID'])) {
	$spid=$_SESSION['SESS_ID'];
	$qryStat=mysqli_query($bd, "SELECT * FROM status WHERE SPID='$spid'");
	$memStat=mysqli_fetch_assoc($qryStat);
	if($memStat) {		
		$qryStat=mysqli_query($bd, "UPDATE status SET lastActivity='$timeNow' WHERE SPID='$spid'");
	}
	else {	
		$qryStat=mysqli_query($bd, "INSERT INTO status(SPID,lastActivity) VALUES('$spid','$timeNow')");
	}
}

?>