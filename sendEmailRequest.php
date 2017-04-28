<?php
include("config/connection.php");
//require("phpMailer/class.phpmailer.php");
include("phpSendMail.php");

//Create Email instance for sending mail
$emailObject=new phpSendMail();

$mailSent = $emailObject->sendMail('dassamtest2@gmail.com', 'Sam',"Village-Expert Group Member Registration successful!",'hello!');
if($mailSent)
{
	echo "Sent";
}
else
{
	echo "Not sent";
}

?>