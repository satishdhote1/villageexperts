<?php
	session_start();
require('config.php');
if($_SESSION['SESS_ID']||$_SESSION['SESS_SR_ID']) {
}
else {
	header('location:index.php?error="loginerror"');
	exit();	
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
    <title>Service Exchange</title>

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
    <div class="main_image_box" style="float:left;">
  
  <span class="main_image_name_text" id="pnotification"></span>
  </div>

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
  </div>
  <div class="main_body_box" style="background:none;">
      <div class="container"> 
      
          <a href="#">
          <div class="log_in_button" style="width:320px; float:left; margin-top:20px;">Create Group</div>
          </a>
          <div class="clearfix"></div>
  		<h2 style="text-align:center; color: #0078AC;">My Groups</h2>
        
      	<div class="col-lg-4">
        	<div class="main-box">
            	<div class="icon-box">
                <img src="images/team.png" alt="team">
                </div>
                <a class="redirect-btn" href="#">Group 1</a>
            </div>
        </div>
        
      	<div class="col-lg-4">
        	<div class="main-box">
            	<div class="icon-box">
                <img src="images/team.png" alt="team">
                </div>
                <a class="redirect-btn" href="#">Group 2</a>
            </div>
        </div>
        
      	<div class="col-lg-4">
        	<div class="main-box">
            	<div class="icon-box">
                <img src="images/team.png" alt="team">
                </div>
                <a class="redirect-btn" href="#">Group 3</a>
            </div>
        </div>
        
      	<div class="col-lg-4">
        	<div class="main-box">
            	<div class="icon-box">
                <img src="images/team.png" alt="team">
                </div>
                <a class="redirect-btn" href="#">Group 4</a>
            </div>
        </div>
        
      	<div class="col-lg-4">
        	<div class="main-box">
            	<div class="icon-box">
                <img src="images/team.png" alt="team">
                </div>
                <a class="redirect-btn" href="#">Group 5</a>
            </div>
        </div>
        
      	<div class="col-lg-4">
        	<div class="main-box">
            	<div class="icon-box">
                <img src="images/team.png" alt="team">
                </div>
                <a class="redirect-btn" href="#">Group 6</a>
            </div>
        </div>
        
      </div>  
      <hr />
      <div class="copy_text">Copyrights 2015.  All Rights Reserved</div>
  </div>
  
  
  
  
  <div id="notification" style="position: absolute; right: 20px; bottom: 20px; width: 320px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; padding: 20px; border: 1px solid rgb(18, 116, 191); display:none;">
  </div>
  
  
  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   <script>
  setInterval(pal, 3000); // Update every 3 seconds 

function pal() 
{ 
//alert("sd");
$.post("updatestatus.php");
} 
</script>
   
   
   
  <script>
  setInterval(update, 10000); // Update every 10 seconds 

function update() 
{ 
//alert("sd");
//$.post("updatestatus.php"); // Sends request to update.php 
} 
</script>
    
     <script>
 $("#expertise").change(function() {
    var selected = $(this).val(); // or this.value
	if(selected) {
		$.ajax({
			url : "search-filter.php?q="+selected,
			success : function (data) {
				$("#specl").html(data);
			}
		});
	}
});
  </script>
<?php
if(isset($_SESSION['SESS_ID'])) {
	?>
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
			var audio = new Audio('sounds/final-warn-sound.mp3');
			audio.play();
				window.setTimeout(function(){
        			location.href = "communication.php?spid="+spid;
    			}, 3000);
			
		}
	}
});
} 
</script>

<script>
  setInterval("checksearch('<?php echo $_SESSION['SESS_ID']; ?>')", 1000); // Update every 1 seconds 

function checksearch(spid) 
{ 
//alert(spid);
$.ajax({
	url : "checksearch.php",
	success : function (data) {
		//$("#test1").html(data);
		//alert(data);
		if(data==spid) {
			document.getElementById("notification").style.display="block";
			var htmlval="<div style='width: 30px; float: right; margin-top: -20px; margin-right: -20px; cursor:pointer;' onclick='hide_notification();'><img src='images/close.png' alt='close'></div><div style='float:left; width:100%;'>You are under active selection process</div>";
			$('#notification').html(htmlval);
			var audio = new Audio('sounds/warn-sound.mp3');
			audio.play();
		}
	}
});
} 
function hide_notification(){
	$('#notification').html("");
	document.getElementById("notification").style.display="none";
}
</script>
<?php } ?>
<?php
if(isset($_SESSION['SESS_SR_ID'])) {
	?>
<script>
  setInterval("chknotification('<?php echo $_SESSION['SESS_SR_ID']; ?>')", 10000); // Update every 10 seconds 

function chknotification(srid) 
{ 
$.ajax({
	url : "chknotification.php?srid="+srid,
	success : function (data) {
		$("#pnotification").html(data);
	}
});
} 
</script>
<?php }?>
  </body>
</html>