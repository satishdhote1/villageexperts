<?php
include("config/connection.php");

include("phpSendMail.php");

session_start();

$user_id  = isset($_SESSION['logged_user_id'])?$_SESSION['logged_user_id']:'';

$conn=new connections();
$conn=$conn->connect();

//Create Email instance for sending mail
$emailObject=new phpSendMail();

$end_time = isset($_REQUEST['endTime'])?$_REQUEST['endTime']:'';

if(!empty($user_id)){
	
	$user_name  = isset($_SESSION['logged_user_fname'])?$_SESSION['logged_user_fname']:'';
	$user_image  = isset($_SESSION['logged_user_image'])?$_SESSION['logged_user_image']:'';
	$user_type  = isset($_SESSION['logged_role_code'])?$_SESSION['logged_role_code']:'';
	$memberId = isset($_REQUEST['memberId'])?$_REQUEST['memberId']:0;
	$memberName = isset($_REQUEST['memberName'])?$_REQUEST['memberName']:'';
	$memberEmail = isset($_REQUEST['memberEmail'])?$_REQUEST['memberEmail']:'';
	$search = isset($_REQUEST['search'])?$_REQUEST['search']:'';
	$imagePath = isset($_REQUEST['imagePath'])?$_REQUEST['imagePath']:'';
	$my_groups = isset($_REQUEST['my_groups'])?$_REQUEST['my_groups']:'';
	$imagePath = empty($imagePath)?"http://".$_SERVER['SERVER_NAME'].'/images/placeholder/male2.jpg':"http://".$_SERVER['SERVER_NAME']."/".$imagePath;
	$currentTimestamp = strtotime("now");
	
	if(!empty($search) && $search == 'FaF'){
		$sql2="INSERT INTO connect (sr_id,sp_id,start_date_time)values($user_id,$memberId,'".$currentTimestamp."')";
		$tableResults = mysqli_query($conn, $sql2);

		$body = '';						
		$body = '<div style="width:100%;max-width:660px;margin:0px auto;"><div style="text-align:center;"><img src="http://'.$_SERVER['SERVER_NAME'].'/images/logo.png" /></div>';
		$body.='<div style="border:solid 1px#EEE;text-align:center;margin-bottom:3px;margin-top:10px;background:#F3F3F3;"><p style="font-size:16px;color:#036;margin:3px 0;font-family:Georgia,\'Times New Roman\',Times,serif;padding:10px 15px;line-height:25px;text-align:left;">';
		$body.='<div style="text-align:center;"><img width="200" height="200" src="'.$imagePath.'" /></div><br><br>';
		$body.='Dear '.$memberName.',<br /><br/>'.$user_name.' has initiated a connect session with you . <br/> Please login to '.$_SERVER['SERVER_NAME'].' to connect<br/><br/></p></div></div>';

		$mailSent = $emailObject->sendMail($memberEmail,$memberName,"Village-Expert connection between members!",$body);
		if($mailSent){
			header("location:https://".$_SERVER['SERVER_NAME'].":8084/#".$currentTimestamp);
		}else{
			header("location:https://".$_SERVER['SERVER_NAME'].":8084/#".$currentTimestamp);
		}
	
	}else if(!empty($search) && $search == 'findsp'){
		$sql="select sp_name,sp_email from service_provider where sp_id=$memberId" ;//echo $ sql;exit();

		$tableResult = mysqli_query($conn, $sql);
		$row=array();
		
		if (mysqli_num_rows($tableResult) > 0) {
		   	$row = mysqli_fetch_assoc($tableResult);
	        	$sql2="INSERT INTO connect (sr_id,sp_id,start_date_time)values($user_id,$memberId,'".$currentTimestamp."')" ;
		    	$tableResults = mysqli_query($conn, $sql2);
			header("location:https://".$_SERVER['SERVER_NAME'].":8084/#".$currentTimestamp);		
		}else{
			header("location:well-come.php?redirect=connect&passImg=img-3.jpg&passStr=You are not authorized to connect.<br>Redirecting....");
		}
		
	}else if(!empty($end_time)){
		$currentTimestamp = strtotime("now");
		$sql="UPDATE connect SET end_date_time = '".$currentTimestamp."' where start_date_time = '".$end_time."'" ;
		$tableResults = mysqli_query($conn, $sql);
		header("location:well-come.php?redirect=connect&passImg=img-3.jpg&passStr=Your session Ended.<br>Redirecting....");
	}

}else{
	header("location:well-come.php?redirect=connect&passImg=placeholder/male2.jpg&passStr=You are not authorized to connect.<br>Redirecting....");
}

?>
