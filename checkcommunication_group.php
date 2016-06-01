<?php
	session_start();
require('config.php');
if($_SESSION['SESS_ID']||$_SESSION['SESS_SR_ID']) {
	$general_user = "";
	if(isset($_SESSION['SESS_ID'])) {
		$SPID=$_SESSION['SESS_ID'];
		$general_user = $SPID;
	}
	
	if(isset($_SESSION['SESS_SR_ID'])) {
		$SRID=$_SESSION['SESS_SR_ID'];
		$general_user = $SRID;
	}
}
else {
	header('location:index.php?error="loginerror"');
	exit();	
}
$timeNow=time();
$timeLess=$timeNow-30;
$com_qry=mysqli_query($bd,"SELECT * FROM group_call WHERE receiver='$general_user'");
if($mem_com=mysqli_fetch_assoc($com_qry)) {
	$timeDiff=$timeNow-$mem_com['Status'];
	if($timeDiff<30) {
		echo $mem_com['caller']."".$mem_com['receiver']."".$mem_com['TimeStart'];
	}
	else{
		echo "error";
	}
}
else {
	echo "error";
}
?>