<?php
require("phpMailer/class.phpmailer.php");
require("phpMailer/PHPMailerAutoload.php");

/*$mail = new PHPMailer();
$mail->SMTPDebug = 1;
$mail->isSMTP();
$mail->Host = 'sg2plcpnl0137.prod.sin2.secureserver.net';
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->IsSMTP();
$mail->Mailer = "smtp";*/


//$mail->Host = "smtp.gmail.com";
// $mail->Port = "587";
// $mail->SMTPAuth = true;
// $mail->SMTPSecure = 'tls';
/*$mail->Username = "villageexperts@otoman.net";
$mail->Password = "WebRTC123";
$mail->From     = "villageexperts@otoman.net";*/

//$mail->Username = "dassamtest2@gmail.com";
//$mail->Password = "dassamtest253";
//$mail->From     = "dassamtest2@gmail.com";


$emailUsername ="villageexpert.info@gmail.com";
$emailPassword ="webRTC123";
$host= "smtp.gmail.com";//"email-smtp.us-west-2.amazonaws.com";
$from ="villageexpert.info@gmail.com";//"villageexpert.info@gmail.com";
$from_name = "Villageexperts Team";
$port = "465"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL
$smtpSecure = 'ssl';

$mail = new PHPMailer();
$mail->IsSMTP();
//$mail->SMTPDebug = 2;
$mail->Mailer = "smtp";
$mail->Host = $host;//"smtp.gmail.com";
$mail->Port = $port;
$mail->SMTPAuth = true;
$mail->SMTPSecure = $smtpSecure;
$mail->Username = $emailUsername;
$mail->Password = $emailPassword;
$mail->From     = $from;
$mail->FromName = $from_name;
$mail->AddAddress("tara181989@gmail.com","altanai");
// $mail->AddReplyTo("Your Reply-to Address", "Sender's Name");
$mail->Subject = "test";
$mail->Body    = "test email body ";
$mail->WordWrap = 50;
$mail->IsHTML(true);
if(!$mail->Send())
{
    echo "Mailer Error: " . $mail->ErrorInfo;
    return false;
}
else
{
    return true;
}

?>
