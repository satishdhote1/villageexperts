<?php
	session_start();
require('config.php');
$email=$_POST['email'];
$password=$_POST['pwd'];
$epass=md5($password);
//echo $epass."<br>";
//echo $email."<br>";

$qryLogin=mysqli_query($bd, "SELECT * FROM service_provider WHERE email='$email' AND Password='$epass'");
if($memLogin=mysqli_fetch_assoc($qryLogin)) {
			session_regenerate_id();
			$_SESSION['SESS_ID'] = $memLogin['SPID'];
			//echo $_SESSION['SESS_ID'];
			session_write_close();
			header('location:index.php');
}
else {
			header('location:index.php?error=wrongpassword');
}

?>