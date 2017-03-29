<?php 
session_start();
session_destroy();
session_unset();
			$_SESSION['SESS_ID'] = '';
			$_SESSION['SESS_NAME'] = '';
			$_SESSION['SESS_EMAIL'] = '';
			header('location:index.php');
?>