<?php
	session_start();
require('config.php');

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$group_id = $_POST['group_id'];
$ucode = $_POST['ucode'];
 
 
 
 
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
 
 	$sql="INSERT INTO service_requester(SRID,First_Name,Last_Name,email,password,status) VALUES('$srid','$fname','$lname','$uname','$pass','nm_invite')";	
	$qryAddsp=mysqli_query($bd, $sql);

	$member_date = date('Y-m-d h:i:s');
	$member_status = 'nm_invited';
	$qryAddMember = mysqli_query($bd, "INSERT INTO group_members(group_id, member_id, fname, lname, member_date, member_status) VALUES('$group_id', '$srid', '$fname', '$lname', '$member_date', '$member_status')");

	$qryAddMember = mysqli_query($bd, "DELETE FROM nm_invite WHERE ucode='$ucode'");

	session_regenerate_id();
			$_SESSION['SESS_SR_ID'] = $memLogin['SRID'];
			//echo $_SESSION['SESS_ID'];
			session_write_close();
			header('location:index.php');
?>