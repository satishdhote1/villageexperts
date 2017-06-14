<?php
error_reporting(E_ERROR);

mysqli_report(MYSQLI_REPORT_STRICT);

//global $con;

class connections
{

	private $servername="localhost";
	private $uname="root";
	private $password="altanaimysql"; //      mysqlroot
	private $dbname="villageexpertsdb";

/*    private $servername="localhost";
    private $uname="root";
    private $password="altanaimysql";
    private $dbname="villageexpertsdb";*/

	//email cnfig


	/*private $emailUsername ='AKIAJRGMUMZO76PAE7VQ';
	private $emailPassword ='AvwImGIsRCL1uE0NVdqErPxo3P8FOhg0RUIWoRoMdvx6';
	private $host= 'ses-smtp-user.20160627-205547';
	private $from ="villageexpert.info@gmail.com";
	*/
	private $emailUsername ="AKIAJDE2TN3CRH5SMSVQ";
	private $emailPassword ="Ah9ElPU5hKXb/28bQAdkeiTT1+YZ8JZMQwElIGt8ygni";
	private $host= "email-smtp.us-west-2.amazonaws.com";
	private $from ="dassamtest2@gmail.com";//"villageexpert.info@gmail.com";//

	public function connect()
	{	
		$con=mysqli_connect($this->servername,$this->uname,$this->password,$this->dbname);
		
		if(!$con){
			die("Connection failed: ". mysqli_connect_error() );
		}else{
			return $con;
		}
	}
	
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
