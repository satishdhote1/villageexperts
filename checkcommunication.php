<?php
	session_start();
require('config.php');
$spid=$_SESSION['SESS_ID'];
$timeNow=date('ymdhis');
$timeLess=$timeNow-30;
$com_qry=mysqli_query($bd,"SELECT * FROM current_communication WHERE SPID='$spid'");
if($mem_com=mysqli_fetch_assoc($com_qry)) {
	if($mem_com['Status']>$timeLess) {
		echo $mem_com['SPID'];
	}
}
?>