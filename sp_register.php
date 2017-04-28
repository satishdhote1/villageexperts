<?php
	session_start();
require('config.php');


$flanguage="";
$sep="";
if(isset($_POST['language'])){
        foreach($_POST['language'] as $c){
            if(!empty($c)){
				$flanguage.=$sep."".$c;
				$sep=",";
            }   
        }
    }
	if(isset($_POST['experience'])){
	$experience=$_POST['experience'];
	}
	else {
	$experience="";
	}
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$country=$_POST['country'];
	
	if(isset($_POST['phone1'])){
	$phone1=$_POST['phone1'];
	}
	else {
	$phone1="";
	}
	
	if(isset($_POST['phone2'])){
	$phone2=$_POST['phone2'];
	}
	else {
	$phone2="";
	}
	$timezone=$_POST['timezone'];
	
	if(isset($_POST['bank'])){
	$bank=$_POST['bank'];
	}
	else {
	$bank="";
	}
	if(isset($_POST['swift'])){
	$swift=$_POST['swift'];
	}
	else {
	$swift="";
	}
	if(isset($_POST['account'])){
	$account=$_POST['account'];
	}
	else {
	$account="";
	}
	$rate10=$_POST['rate10'];
	$rate20=$_POST['rate20'];
	$rate30=$_POST['rate30'];
	$rates="10,20,30::".$rate10.",".$rate20.",".$rate30;
	
	$profession=$_POST['profession'];
	$spelisation=$_POST['spelisation'];
	
	$qryMno=mysqli_query($bd, "SELECT MAX(SPID) FROM service_provider WHERE SPID LIKE CONCAT(SUBSTRING(SPID, 1, 4),'%')");
if($memMno=mysqli_fetch_assoc($qryMno)){

 $str = $memMno['MAX(SPID)'] ;
 //$str = 'In My Cart : 11 12 items';
preg_match_all('!\d+!', $str, $matches);
 $var = implode(' ', $matches[0]);
 $var1=$var+1;
 $len = strlen($var1);
 $restv=8-$len;
 if($restv=="7"){
	 $spid="SP0000000".$var1;
 }
 if($restv=="6"){
	 $spid="SP000000".$var1;
 }
 if($restv=="5"){
	 $spid="SP00000".$var1;
 }
 if($restv=="4"){
	 $spid="SP0000".$var1;
 }
 if($restv=="3"){
	 $spid="SP000".$var1;
 }
 if($restv=="2"){
	 $spid="SP00".$var1;
 }
 if($restv=="1"){
	 $spid="SP0".$var1;
 }
 if($restv=="0"){
	 $spid="SP".$var1;
 }
 //echo $spid."<br>";
}
$password=$_POST['password'];
$epass=md5($password);

$qryMid=mysqli_query($bd, "SELECT MAX(ID) FROM service_provider WHERE ID LIKE CONCAT(SUBSTRING(ID, 1, 4),'%')");
if($memMid=mysqli_fetch_assoc($qryMid)){

 $mid = $memMid['MAX(ID)'] ;
 $mid = $mid+1;
 //echo $mid;
}
 
 	$sql="INSERT INTO service_provider(ID,SPID,Password,First_Name,Last_Name,Country,Phone1,Phone2,email,TimeZone,Languages,Profession,Specialisation,YearsOfExperience,Rates,BankName,BankAccountNumber,BankSWIFTCode) VALUES('$mid','$spid','$epass','$fname','$lname','$country','$phone1','$phone2','$email','$timezone','$flanguage','$profession','$spelisation','$experience','$rates','$bank','$account','$swift')";
	
	$qryAddsp=mysqli_query($bd, $sql);
	
	
	session_regenerate_id();
			$_SESSION['SESS_ID'] = $spid;
			//echo $_SESSION['SESS_ID'];
			session_write_close();

			header('location:index.php');
?>