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


$receiver=$_GET['cid'];
$timnestart=time();
//echo "1";
$sel_qry="SELECT * FROM group_call WHERE caller='$general_user'";

//echo "2";
$mem_sel=mysqli_query($bd,$sel_qry);
if(mysqli_num_rows($mem_sel)>0) {
//echo "3";
	$com_qry="UPDATE group_call SET caller='$general_user', receiver='$receiver', TimeStart='$timnestart', Status='$timnestart' WHERE caller='$general_user'";
	$mem_com=mysqli_query($bd,$com_qry);
//echo "4";
	echo $general_user."".$receiver."".$timnestart;
}
else {
	$com_qry="INSERT INTO group_call (caller,receiver,TimeStart,Status) VALUES('$general_user','$receiver','$timnestart','$timnestart')";
	$mem_com=mysqli_query($bd,$com_qry);
	echo $general_user."".$receiver."".$timnestart;
//echo "5";
}
?>