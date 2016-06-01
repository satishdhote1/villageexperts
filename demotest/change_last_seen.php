<?php
	session_start();
require('config.php');
$timeNow=time();
if(isset($_SESSION['SESS_ID'])) {
$uid=$_SESSION['SESS_ID'];
$com_qry=mysqli_query($bd,"UPDATE users SET last_seen='$timeNow' WHERE id='$uid'");
}
?>