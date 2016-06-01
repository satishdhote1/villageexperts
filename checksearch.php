<?php
	session_start();
require('config.php');
$spid=$_SESSION['SESS_ID'];
$timeNow=time();
$timeLess=$timeNow-60;
$com_qry=mysqli_query($bd,"SELECT * FROM search_notification WHERE spid='$spid' AND date='".date('Y-m-d')."' AND status=''");
if($mem_com=mysqli_fetch_assoc($com_qry)) {
	$qryUpdate=mysqli_query($bd, "UPDATE search_notification SET status='notified' WHERE SPID='$spid'");
		echo $_SESSION['SESS_ID'];
}
?>