<?php
if(isset($_REQUEST['params']))
{
	echo "{email:null,name:null,subject:null,body:null}";
}
else
{
	include("phpSendMail.php");
	//Create Email instance for sending mail
	$emailObject=new phpSendMail();
	$Email = isset($_REQUEST['email'])?$_REQUEST['email']:"dassamtest@gmail.com";
	$memberName = isset($_REQUEST['name'])?$_REQUEST['name']:"Test Member";
	$subject = isset($_REQUEST['subject'])?$_REQUEST['subject']:"Village-Expert Group Test!";
	$body = isset($_REQUEST['body'])?$_REQUEST['body']:"TestBody";
	
	$mailSent = $emailObject->sendMail($Email, $memberName,$subject,$body);
	if($mailSent)
	{
	  echo "<center><h2 style='color:gold;'>Hello mail sent succesful !<h2></center>";
	}
}

?>
