<?php
if(isset($_REQUEST['params']))
{
	echo '<center><h2 style="color:gold;">[{"email":null,"name":null,"subject":null,"body":null},{"str":"?email=&name=&subject=&body="}]</h2></center>';
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
	  echo "<center><h2 style='color:gold;'>Hello E-mail sent succesfully to ".$Email." !</h2></center>";
	}
}

?>
