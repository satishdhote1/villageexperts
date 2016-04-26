<?php
	session_start();
require('config.php');
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$timeZone = $_POST['timezone'];
 
 
 
 
	$qryMno=mysqli_query($bd, "SELECT MAX(SRID) FROM service_requester WHERE SRID LIKE CONCAT(SUBSTRING(SRID, 1, 4),'%')");
if($memMno=mysqli_fetch_assoc($qryMno)){

 $str = $memMno['MAX(SRID)'] ;
 //$str = 'In My Cart : 11 12 items';
preg_match_all('!\d+!', $str, $matches);
 $var = implode(' ', $matches[0]);
 $var1=$var+1;
 $len = strlen($var1);
 $restv=8-$len;
 if($restv=="7"){
	 $srid="SR0000000".$var1;
 }
 if($restv=="6"){
	 $srid="SR000000".$var1;
 }
 if($restv=="5"){
	 $srid="SR00000".$var1;
 }
 if($restv=="4"){
	 $srid="SR0000".$var1;
 }
 if($restv=="3"){
	 $srid="SR000".$var1;
 }
 if($restv=="2"){
	 $srid="SR00".$var1;
 }
 if($restv=="1"){
	 $srid="SR0".$var1;
 }
 if($restv=="0"){
	 $srid="SR".$var1;
 }
 //echo $srid."<br>";
}
 $id="";
 
 
 $pass=md5($pwd);
 
 	$sql="INSERT INTO service_requester(ID,SRID,TimeZone,email,password) VALUES('$id','$srid','$timeZone','$uname','$pass')";	
	$qryAddsp=mysqli_query($bd, $sql);
	session_regenerate_id();
			$_SESSION['SESS_SR_ID'] = $memLogin['SRID'];
			//echo $_SESSION['SESS_ID'];
			session_write_close();
			header('location:index.php');
?>