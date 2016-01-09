<?php
	session_start();
require('config.php');
$email=$_POST['email'];
$password=$_POST['pwd'];
$epass=md5($password);
//echo $epass."<br>";
//echo $email."<br>";

$qryLogin=mysqli_query($bd, "SELECT * FROM service_requester WHERE email='$email' AND Password='$epass'");
if($memLogin=mysqli_fetch_assoc($qryLogin)) {
			session_regenerate_id();
			$_SESSION['SESS_SR_ID'] = $memLogin['SRID'];
			//echo $_SESSION['SESS_ID'];
			session_write_close();
}
else {
			//echo "hi";
}
			header('location:index.php');

?>