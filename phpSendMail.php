<?php

require("../Documents/Unnamed Site 2/phpMailer/class.phpmailer.php");

class phpSendMail
{

private $emailUsername ="AKIAJDE2TN3CRH5SMSVQ";
private $emailPassword ="Ah9ElPU5hKXb/28bQAdkeiTT1+YZ8JZMQwElIGt8ygni";
private $host= "email-smtp.us-west-2.amazonaws.com";
private $from ="dassamtest2@gmail.com";//"villageexpert.info@gmail.com";

public function geEmailConfig()
{
		$emailData['uname'] = $this->emailUsername;
		$emailData['pwd'] = $this->emailPassword;
		$emailData['host'] = $this->host;
		$emailData['from'] = $this->from;
		return $emailData; 
		
}

	
	
	
	
	
	
	
}


















?>