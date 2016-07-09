<?php

require("phpMailer/class.phpmailer.php");

class phpSendMail
{
/*
private $emailUsername ="AKIAJDE2TN3CRH5SMSVQ";
private $emailPassword ="Ah9ElPU5hKXb/28bQAdkeiTT1+YZ8JZMQwElIGt8ygni";
private $host= "email-smtp.us-west-2.amazonaws.com";
*/

private $emailUsername ="AKIAIVWQDQ5MXUANO4ZA";
private $emailPassword ="AoBHQwH1NZ+wZIPeSOGa5sOoF1wmhivD2RlX8thYdlyl";
private $host= "smtp.us-west-2.amazonaws.com";
private $from ="dassamtest2@gmail.com";//"villageexpert.info@gmail.com";
private $port = "587"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL
private $from_name ="Village Expert";
public function geEmailConfig()
{
		$emailData['uname'] = $this->emailUsername;
		$emailData['pwd'] = $this->emailPassword;
		$emailData['host'] = $this->host;
		$emailData['from'] = $this->from;
		$emailData['port'] = $this->port;
		$emailData['from_name'] = $this->from_name;
		return $emailData; 
		
}
public function sendMail($email,$memberName,$subject,$body)
{
	$mail = new PHPMailer();
	$mail->SMTPDebug = 1;
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->Host = $this->host;//"smtp.gmail.com";
        $mail->Port = $this->port;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
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
