<?php 
session_start();
session_destroy();
session_unset();
$_SESSION["SESS_ID"] = "";
$_SESSION["SESS_SR_ID"] = "";
			header('location:index.php');
?>