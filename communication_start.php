<?php
	session_start();
require('config.php');
$spid=$_GET['spid'];
$srid=$_GET['srid'];
$timnestart=date('ymdhis');

$sel_qry="SELECT * FROM current_communication WHERE SPID='$spid'";

if($mem_sel=mysqli_query($bd,$sel_qry)) {
	$com_qry="UPDATE current_communication SET SRID='$srid', TimeStart='$timnestart', Status='$timnestart' WHERE SPID='$spid'";
	$mem_com=mysqli_query($bd,$com_qry);
}
else {
	$com_qry="INSERT INTO current_communication (SPID,SRID,TimeStart,Status) VALUES('$spid','$srid','$timnestart','$timnestart')";
	$mem_com=mysqli_query($bd,$com_qry);
}
?>