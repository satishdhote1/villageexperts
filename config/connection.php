<?php
//global $con;
class connections
{
/*	private $servername="sql207.byethost7.com";
	private $uname="b7_15994620";
	private $password="byethost";
	private $dbname="b7_15994620_crm";*/

	private $servername="localhost";
	private $uname="root";
	private $password="mysqlroot";
	private $dbname="villageexpertsdb";

	//email cnfig
/*		
	private $emailUsername ='dassamtest2@gmail.com';
	private $emailPassword ='dassamtest253';
	private $host= 'smtp.gmail.com';*/

	private $emailUsername ='AKIAJRGMUMZO76PAE7VQ';
	private $emailPassword ='AvwImGIsRCL1uE0NVdqErPxo3P8FOhg0RUIWoRoMdvx6';
	private $host= 'ses-smtp-user.20160627-205547';

	public function connect()
	{	
		$con=mysqli_connect($this->servername,$this->uname,$this->password,$this->dbname);
		if(!$con){
			die("Connection failed: ". mysqli_connect_error() );
		}else
		{
			//session_start();
			return $con;
		}
		//echo "Connected";
	}
	
	public function geEmailConfig()
	{
		$emailData['uname'] = $this->emailUsername;
		$emailData['pwd'] = $this->emailPassword;
		return $emailData; 
		
	}
}


?>