<?php
include("phpSendMail.php");

//Create Email instance for sending mail
$emailObject=new phpSendMail();
$body = "TestBody";
$Email = "dassamtest2@gmail.com";
$memberName = "Test Member";
$mailSent = $emailObject->sendMail($Email, $memberName,"Village-Expert Group Test!",$body);
				if($mailSent)
				{
				  echo "Hello mail sent succesful !";
				}

?>
