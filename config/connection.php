<?php
error_reporting(E_ERROR);

mysqli_report(MYSQLI_REPORT_STRICT);

		$con=new mysqli("localhost","root","mysqlroot","villageexpertsdb");
		//$con = mysqli_connect("localhost","my_user","my_password","my_db");

		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
		else{
				print_r($con);die("Connection success: " );
			
		}
//global $con;



?>
