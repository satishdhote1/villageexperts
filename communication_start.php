<?php
session_start();
require('config.php');
$spid=$_GET['spid'];
$srid=$_GET['srid'];
$timnestart=date('ymdhis');


$sel_qry="SELECT * FROM current_communication WHERE SPID='$spid'";
$mem_sel=mysqli_query($bd,$sel_qry);
if(mysqli_num_rows($mem_sel)) {
	$com_qry="UPDATE current_communication SET SRID='$srid', TimeStart='$timnestart', Status='$timnestart' WHERE SPID='$spid'";
	$mem_com=mysqli_query($bd,$com_qry);
}
else {
	$com_qry="INSERT INTO current_communication (SPID,SRID,TimeStart,Status) VALUES('$spid','$srid','$timnestart','$timnestart')";
	$mem_com=mysqli_query($bd,$com_qry);
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$sps_qry="SELECT * FROM sp_sr_connect WHERE SPID='$spid' AND SRID='$srid'";
$mem_sps=mysqli_query($bd,$sps_qry);
if(mysqli_num_rows($mem_sps)) {

}
else {
	$spsi_qry="INSERT INTO sp_sr_connect (SPID,SRID) VALUES('$spid','$srid')";
	$mem_spsi=mysqli_query($bd,$spsi_qry);
}
?>