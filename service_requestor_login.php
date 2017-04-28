<?php
	session_start();
require('config.php');
if(isset($_SESSION['SESS_ID'])) {	
			header('location:service_provider_page.php');
			exit();
}
else {
$SPID	="";
}
if(isset($_SESSION['SESS_ID'])) {
	$SPID=$_SESSION['SESS_ID'];
	$qryProfile=mysqli_query($bd, "SELECT * FROM service_provider WHERE SPID='$SPID'");
	if($memProfile=mysqli_fetch_assoc($qryProfile)) {
		$fname=$memProfile['First_Name'];
		$lname=$memProfile['Last_Name'];
	}
}
if(isset($_SESSION['SESS_SR_ID'])) {
	$SRID=$_SESSION['SESS_SR_ID'];
	$qryProfile=mysqli_query($bd, "SELECT * FROM service_requester WHERE SRID='$SRID'");
	if($memProfile=mysqli_fetch_assoc($qryProfile)) {
		$sremail=$memProfile['email'];
	}
}
	?>
	<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Service Requestor</title>

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
  <?php
  if(isset($_SESSION['SESS_ID'])) {
	?>
    <div class="main_image_box">
  <div class="main_image"><img src="profile_images/no-profile-img-male.gif" alt="image"></div>
  <span class="main_image_name_text"><a href="service_provider_page.php"><?php echo $fname." ".$lname;?></a> | <a href="logout.php">Log out</a></span>
  </div>
    <?php
}
elseif(isset($_SESSION['SESS_SR_ID'])){
	?>
    <div class="main_image_box">
  <div class="main_image"><img src="profile_images/no-profile-img-male.gif" alt="image"></div>
  <span class="main_image_name_text"><a href="service_requestor_profile_page.php"><?php echo $sremail;?></a> | <a href="logout.php">Log out</a></span>
  </div>
    <?php
}
else {
?>
  
  <div class="right_header">
  <span class="service_text" style="text-align:center; font-size:16px;">Login</span>
  <div class="button_box">
  <a href="service_provider_login.php"><div class="sign_up_button">Service Provider</div></a>
  <a href="service_requestor_login.php"><div class="log_in_button">Service Requestor</div></a>
  </div>
  </div>
  <div class="right_one_header" style="">
  <!--<div onClick="show_login();" onMouseOver="show_login();" onMouseOut="hide_login();"><span class="service_text">Service Provider Login</span>-->
  <!--Demo-->
  <div class="right_header">
  <span class="service_text" style="text-align:center; font-size:16px;">Register</span>
  <div class="button_box">
  <a href="service_provider_page.php"><div class="sign_up_button">Service Provider</div></a>
  <a href="service_requestor_profile_page.php"><div class="log_in_button">Service Requestor</div></a>
  </div>
  </div>
  <!--//Demo-->
  
  <div class="expart_log_in_bg" id="sp_login_form" style="">
  <form action="sp_login.php" method="post">
  <div class="user_box">
  <span class="user_text">Email</span>
  <div class="user_fild_box"><input name="email" class="user_fild_box_main" type="email" required></div>
  </div>
  <div class="user_box">
  <span class="user_text">Password</span>
  <div class="user_fild_box"><input name="pwd" class="user_fild_box_main" type="password" required></div>
  </div>  
  <input type="submit" class="sign_up_button" value="Log In">
  </form>
  <a href="service_provider_page.php"><div class="sign_up_button">Register</div></a>
  </div>
  </div>
  <script>
  function show_login(){
	 
		  document.getElementById("sp_login_form").style.display="block";
	  
  }
  function hide_login(){
	 
		  document.getElementById("sp_login_form").style.display="none";
	  
  }
  </script>
  </div>
  <?php
}
?>
  </div>
  
  <div class="main_body_box">
  <div class="container">
  <span class="service_request_text">Service Requestor Login Page</span>
  <div class="service_bg" style="background:none; box-shadow:none;">
  <form action="sr_login.php" method="post">
    <div class="request_form_bg" style="margin-left:35%;">
      <div class="user_name_box">
  <span class="user_name_text">Email</span>
  <div class="user_text_fild"><input name="email" class="user_text_fild_main" type="email"></div>
  </div>
  
  <div class="user_name_box">
  <span class="user_name_text">Password</span>
  <div class="user_text_fild"><input name="pwd" class="user_text_fild_main" type="password"></div>
  </div>
  
  <span class="connect_text">Connect with:</span>
  <div class="social_media_box">
  <a href="#"><div class="face_book_icon"><img src="images/socilaNetworks/face_book_icon.jpg" alt="icon"></div></a>
  <a href="#"><div class="face_book_icon"><img src="images/twitter.jpg" alt="icon"></div></a>
  <a href="#"><div class="face_book_icon"><img src="images/rss.jpg" alt="rss"></div></a>
  <a href="#"><div class="face_book_icon"><img src="images/socilaNetworks/google_plus.jpg" alt="google_plus"></div></a>
  <a href="#"><div class="face_book_icon"><img src="images/printset.jpg" alt="printset"></div></a>
  <a href="#"><div class="face_book_icon"><img src="images/link_din.jpg" alt="link_din"></div></a>
  <a href="#"><div class="face_book_icon"><img src="images/capther.jpg" alt="icon"></div></a>
  </div>
  
  <div class="checkbox">
    <label>
      <input type="checkbox"> Remember Me
    </label>
  </div>
  
  <input value="Login" class="register_button" type="submit">
</div>
</form>
  
  <div class="request_right_box"></div>
  </div>
  
  <div class="bottm_box"><a href="index.php"><div class="home_button">Home</div></a>
  </div>
  </div>
  
  <hr />
  <div class="copy_text">Copyrights 2015.  All Rights Reserved</div>
  </div>
  
  
  
  
  
  
  
  
  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   
<?php
if(isset($_SESSION['SESS_ID'])) {
	?> 
  <script>
  setInterval("update()", 10000); // Update every 10 seconds 

function update() 
{ 
$.post("updatestatus.php"); // Sends request to update.php 
//alert("sd");
} 
</script>
<script>
  setInterval("checkcommunication('<?php echo $_SESSION['SESS_ID']; ?>')", 10000); // Update every 10 seconds 

function checkcommunication(spid) 
{ 
//alert(spid);
$.ajax({
	url : "checkcommunication.php",
	success : function (data) {
		//$("#test1").html(data);
		//alert(data);
		if(data==spid) {
			location.href = "communication.php?spid="+spid;
		}
	}
});
} 
</script>
<?php } ?>
  </body>
</html>