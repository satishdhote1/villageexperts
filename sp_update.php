<?php
	session_start();
require('config.php');
$spid=$_POST['spid'];

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
	
	
	
	
	
	
	
	
	$sql="UPDATE service_provider SET ";
	if(!empty($_POST['password'])){		
		$password=$_POST['password'];
		$epass=md5($password);
		$sql.="Password='$epass',";
	}
	$sql.="First_Name='$fname',Last_Name='$lname',Country='$country',Phone1='$phone1',Phone2='$phone2',email='$email',TimeZone='$timezone',Languages='$flanguage',Profession='$profession',Specialisation='$spelisation',YearsOfExperience='$experience',Rates='$rates',BankName='$bank',BankAccountNumber='$account',BankSWIFTCode='$swift',NumberOfTimesListed='$rates' WHERE SPID='$spid'";
	
	//echo $sql;
	$qryAddsp=mysqli_query($bd, $sql);
			header('location:service_provider_page.php');
	

 
?>