<?php
require("phpMailer/class.phpmailer.php");
require("phpMailer/PHPMailerAutoload.php");
class phpSendMail
{
/*
private $emailUsername ="AKIAJDE2TN3CRH5SMSVQ";
private $emailPassword ="Ah9ElPU5hKXb/28bQAdkeiTT1+YZ8JZMQwElIGt8ygni";
private $host= "email-smtp.us-west-2.amazonaws.com";
private $from ="villageexpert.info@gmail.com";
private $port = "587"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL
*/
/*
private $emailUsername ="AKIAJCO6GXE23JHPS7JQ";
private $emailPassword ="AggY9vX6Vmqrj9pYKNn4iGJNIxJ9D/W3PwQZ0X9A/5Vo";

private $emailUsername ="AKIAIQN4ZGWZLARUSPUA";
private $emailPassword ="AvaWT4DutD2pcfECCo2APf5cRlwjKh7aFNSj+MHuU0EP";
*/

private $emailUsername ="villageexpert.info@gmail.com";
private $emailPassword ="webRTC123";
private $host= "smtp.gmail.com";//"email-smtp.us-west-2.amazonaws.com";
private $from ="villageexpert.info@gmail.com";//"villageexpert.info@gmail.com";
private $port = "465"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL
private $smtpSecure = 'ssl';
//kidzeeweb
/*
private $emailUsername ="villageexperts@kidzeeweb.com";
private $emailPassword ="kidzeewe_subha123";
private $host= "mail.kidzeeweb.com";
private $from ="villageexperts@kidzeeweb.com";//"villageexpert.info@gmail.com";
private $port = "26"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL
*/
//otoman.net
/*
private $emailUsername ="villageexperts@otoman.net";
private $emailPassword ="WebRTC123";
private $host= "sg2plcpnl0137.prod.sin2.secureserver.net";
private $from ="villageexpert.info@gmail.com";
private $port = "465"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL
private $from_name ="Village Expert";
private $smtpSecure = 'ssl';
*/
public function geEmailConfig()
{
    $emailData['uname'] = $this->emailUsername;
    $emailData['pwd'] = $this->emailPassword;
    $emailData['host'] = $this->host;
    $emailData['from'] = $this->from;
    $emailData['port'] = $this->port;
    $emailData['smtpSecure'] = $this->smtpSecure;
    $emailData['from_name'] = $this->from_name;
    return $emailData; 
    
}
public function sendMail($email,$memberName,$subject,$body)
{
	//echo "email-$email--=name:$memberName*-----body---$body=====$this->emailUsername===$this->emailPassword===$this->host";
	$mail = new PHPMailer();
	//$mail->SMTPDebug = 1;
	$mail->IsSMTP();
	//$mail->SMTPDebug = 2;
	$mail->Mailer = "smtp";
	$mail->Host = $this->host;//"smtp.gmail.com";
	$mail->Port = $this->port;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = $this->smtpSecure;
	$mail->Username = $this->emailUsername;
	$mail->Password = $this->emailPassword;
	$mail->From     = $this->from;
	$mail->FromName = $this->from_name;
	$mail->AddAddress($email, $memberName);
	// $mail->AddReplyTo("Your Reply-to Address", "Sender's Name");
	$mail->Subject = $subject;
	$mail->Body    = $body;
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
    
}

}
?>
