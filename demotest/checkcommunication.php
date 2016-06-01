<?php
	session_start();
require('config.php');
$timeNow=time();
$timeLess=$timeNow-30;
if(isset($_SESSION['SESS_ID'])) {
$uid=$_SESSION['SESS_ID'];
$com_qry=mysqli_query($bd,"SELECT * FROM communication WHERE srid='$uid' ORDER BY id DESC");
}
if($mem_com=mysqli_fetch_assoc($com_qry)) {
	$time=$mem_com['time'];
	if($mem_com['time']>$timeLess) {
		echo $mem_com['srid']."".$time;

	}
}
?>