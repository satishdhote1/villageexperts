<?php
	session_start();
require('config.php');
if(isset($_SESSION['SESS_SP_ID'])) {
	$SPID=$_SESSION['SESS_SP_ID'];
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>VIllage Expart Demo</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div id="header">
  <div class="container">
  <a href="#"><div id="logo"><img src="images/logo.jpg" alt="logo"></div></a>
  <div class="right_header">
  <div class="button_box">
  <a href="#"><div class="sign_up_button">SP Login</div></a>
  <a href="#"><div class="log_in_button">SR Login</div></a>
  </div>
  </div>
  <div class="right_one_header">
  <a href="#"><span class="service_text"></span></a>
  </div>
  </div>
  </div>
  
  <div class="main_body_box">
      <div class="container">
          
          <div class="col-lg-4 col-md-4 col-sm-4 pal" style="">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 pal" style="margin-top:50px; text-align:center;">
          <?php
		  if(isset($_POST['email'])){
			  $email=$_POST['email'];
			  $password=$_POST['password'];
          	$qrySPL=mysqli_query($bd, "SELECT * FROM sr WHERE email='$email' AND password='$password'");
			if($memSPL=mysqli_fetch_assoc($qrySPL)) {
				
			session_regenerate_id();
			$_SESSION['SESS_SR_ID'] = $memSPL['id'];
			$_SESSION['SESS_SR_NAME'] = $memSPL['name'];
			$_SESSION['SESS_SR_EMAIL'] = $memSPL['email'];
			session_write_close();
			header('location:index.php');
			exit();
			}
			else {
				echo "<h1 style='color:#ff0000;'>WRONG EMAIL OR PASSWORD</h1>";
			}
		  }
		  ?>
            <form method="post">
            <input type="email" name="email" placeholder="Email" style="float:left; width:100%; margin-top:20px;padding: 10px;border-radius: 5px;border: 1px solid #A0A0A0;" required>
            <input type="password" name="password" placeholder="Password" style="float:left; width:100%; margin-top:20px;padding: 10px;border-radius: 5px;border: 1px solid #A0A0A0;" required>
            <input type="submit" value="SP LOGIN"  class="log_in_button" style="float:left; width:100%; margin-top:20px;">
            </form>
           
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 pal" style="">
          </div>
      </div>
  
  	<hr />
  </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    
    
  </body>
</html>