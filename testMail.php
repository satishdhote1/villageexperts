<?php
require("phpMailer/class.phpmailer.php");
require("phpMailer/PHPMailerAutoload.php");
mail("dassamtest2@gmail.com","hi","hello");

	$mail = new PHPMailer();
	$mail->SMTPDebug = 1;
	$mail->isSMTP();
    $mail->Host = 'sg2plcpnl0137.prod.sin2.secureserver.net';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
        //$mail->Host = "smtp.gmail.com";//"smtp.gmail.com";
       // $mail->Port = "587";
       // $mail->SMTPAuth = true;
       // $mail->SMTPSecure = 'tls';
    $mail->Username = "villageexperts@otoman.net";
	$mail->Password = "WebRTC123";
	$mail->From     = "villageexperts@otoman.net";
	
	//$mail->Username = "dassamtest2@gmail.com";
	//$mail->Password = "dassamtest253";
	//$mail->From     = "dassamtest2@gmail.com";
   	
   	$mail->FromName = "Village Expert";
   	$mail->AddAddress("dassamtest2@gmail.com", "hello");
  	// $mail->AddReplyTo("Your Reply-to Address", "Sender's Name");
   	$mail->Subject = "test2";
   	$mail->Body    = "also test22";
   	$mail->WordWrap = 50;  
   	$mail->IsHTML(true);
   	if(!$mail->Send())
   	{
   		echo "Mailer Error: " . $mail->ErrorInfo;
   		
   	}
   	else
   	{
   		echo "success!";
   	}













?>