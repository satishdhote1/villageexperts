<?php
session_start();
require('config.php');
$srid=$_POST['srid'];

$email=$_POST['uname'];
$timezone=$_POST['timezone'];


$sql="UPDATE service_requester SET ";
if(!empty($_POST['pwd'])){		
$password=$_POST['pwd'];
$epass=md5($password);
$sql.="Password='$epass',";
}
$sql.="email='$email',TimeZone='$timezone' WHERE SRID='$srid'";

//echo $sql;
$qryAddsp=mysqli_query($bd, $sql);
header('location:service_requestor_profile_page.php');
	

 
?>