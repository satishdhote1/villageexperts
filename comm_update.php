<?php
	session_start();
require('config.php');
$timeNow=date('ymdhis');
//$timeLess=$timeNow-60;
if(isset($_SESSION['SESS_ID'])) {
	$spid=$_SESSION['SESS_ID'];
		
		$qryStat=mysqli_query($bd, "UPDATE current_communication SET Status='$timeNow' WHERE SPID='$spid'");
	
}

?>