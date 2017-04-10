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
$explodedLanguageElementBase ="";


if(isset($_SESSION['SESS_SR_ID'])) {
	$SRID=$_SESSION['SESS_SR_ID'];
	$qryProfile=mysqli_query($bd, "SELECT * FROM service_requester WHERE SRID='$SRID'");
	if($memProfile=mysqli_fetch_assoc($qryProfile)) {
		$sremail=$memProfile['email'];
		$timeZone=$memProfile['TimeZone'];
	}
}
else {
	$SRID="";
		$sremail="";
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
  <span class="service_request_text">SERVICE REQUESTOR PROFILE PAGE</span>
  <div class="service_bg">
  <div class="service_left_box">
  <div class="requester_image" id="srp">
  
  <?php
  $srID=$SRID;
  if(file_exists("profile_images/".$srID.".jpg")) {
   ?>
  		<img src="profile_images/<?php echo $srID.".jpg"; ?>" alt="image">
	<?php 
	  }
	  else {
	?>
		<img src="profile_images/no-profile-img-male.gif" alt="image">
	<?php
	}
	?>
  
  </div>
  <div class="upload_box">
  <input type="file" id="my_file" name="ppimg" style="display: none;"  accept="image/jpeg" />
  <a href="javascript:void(0);" onClick="upload_pp();"><span class="upload_text">
  <span class="upload_text">
  <?php
if(isset($_SESSION['SESS_SR_ID'])) {
  if(file_exists("profile_images/".$srID.".jpg")) {
  echo "Change Profile Picture";
  }
  else {
  echo "Upload Profile Picture";
  }
}
else {
}
  ?>
  
  </span></a>
  
  </div>
  <!--
  <div class="language_box">
  <span class="lan_text">Languages</span>
  
   <?php
  $qryLanguage=mysqli_query($bd, "SELECT * FROM language ORDER BY Languages ASC");
  while($memLanguage=mysqli_fetch_assoc($qryLanguage)) {
  ?>
  
  <div class="arbic_text_box">
  <span class="arbic_text"><?php echo $memLanguage['Languages']; ?></span>
  <?php
  $flag="0";
  $explodedLanguageElement=$explodedLanguageElementBase;
  	while($explodedLanguageElement>0) {
		$explodedLanguageElement=$explodedLanguageElement-1;
		if($explodedLanguage[$explodedLanguageElement] == $memLanguage['LanguageID']) {
   
		$flag=$flag+1;
	}
  //echo  $explodedLanguage[$explodedLanguageElement];
  }
  if($flag>0) {
  ?>
  <div class="check_box_one"><input name="language[]" type="checkbox" value="<?php echo $memLanguage['LanguageID']; ?>" checked></div>
  <?php
  }
  else {
  ?>
  <div class="check_box_one"><input name="language[]" type="checkbox" value="<?php echo $memLanguage['LanguageID']; ?>"></div>
  <?php
  }
  ?>
  
  </div>
  <?php
  }
  ?>
  
  
  
  </div>
  -->
  </div>
   <?php  
	if(isset($_SESSION['SESS_SR_ID'])) {
		?>
  <form action="sr_update.php" method="post">
  <input name="srid" type="hidden" value="<?php echo $SRID; ?>">
  <?php
	}
	else {
		?>
  <form action="sr_register.php" method="post">
  <?php
	}
  ?>
  <div class="request_form_bg">
  <div class="user_name_box">
  <span class="user_name_text">Email</span>
  <div class="user_text_fild"><input name="uname" class="user_text_fild_main" type="email" value="<?php echo $sremail;?>" required></div>
  </div>
  
  <div class="user_name_box">
  <span class="user_name_text">Password</span>
  <div class="user_text_fild"><input name="pwd" class="user_text_fild_main" type="password" required></div>
  </div>
  
  <div class="user_name_box">
  <span class="user_name_text">Time Zone</span>
 
  <div class="user_text_fild"><select name="timezone" class="user_text_fild_main">
  <?php  
	if(isset($_SESSION['SESS_SR_ID'])) {
		?>
  <option value="<?php echo $timeZone; ?>" selected><?php echo $timeZone; ?></option>
  <?
	}
	else {
  ?>
  <option value="">Select TimeZone</option>
  <?php
	}
	?>
  <option value="GMT -12">GMT -12</option>
  <option value="GMT -11.30">GMT -11.30</option>
  <option value="GMT -11">GMT -11</option>
  <option value="GMT -10.30">GMT -10.30</option>
  <option value="GMT -10">GMT -10</option>
  <option value="GMT -9.30">GMT -9.30</option>
  <option value="GMT -9">GMT -9</option>
  <option value="GMT -8.30">GMT -8.30</option>
  <option value="GMT -8">GMT -8</option>
  <option value="GMT -7.30">GMT -7.30</option>
  <option value="GMT -7">GMT -7</option>
  <option value="GMT -6.30">GMT -6.30</option>
  <option value="GMT -6">GMT -6</option>
  <option value="GMT -5.30">GMT -5.30</option>
  <option value="GMT -5">GMT -5</option>
  <option value="GMT -4.30">GMT -4.30</option>
  <option value="GMT -4">GMT -4</option>
  <option value="GMT -3.30">GMT -3.30</option>
  <option value="GMT -3">GMT -3</option>
  <option value="GMT -2.30">GMT -2.30</option>
  <option value="GMT -2">GMT -2</option>
  <option value="GMT -1.30">GMT -1.30</option>
  <option value="GMT -1">GMT -1</option>
  <option value="GMT +0">GMT +0</option>
  <option value="GMT +0.3">GMT +0.3</option>
  <option value="GMT +1">GMT +1</option>
  <option value="GMT +1.30">GMT +1.30</option>
  <option value="GMT +2">GMT +2</option>
  <option value="GMT +2.30">GMT +2.30</option>
  <option value="GMT +3">GMT +3</option>
  <option value="GMT +3.30">GMT +3.30</option>
  <option value="GMT +4">GMT +4</option>
  <option value="GMT +4.30">GMT +4.30</option>
  <option value="GMT +5">GMT +5</option>
  <option value="GMT +5.30">GMT +5.30</option>
  <option value="GMT +5">GMT +5</option>
  <option value="GMT +1.30">GMT +1.30</option>
  <option value="GMT +6">GMT +6</option>
  <option value="GMT +6.30">GMT +6.30</option>
  <option value="GMT +7">GMT +7</option>
  <option value="GMT +7.30">GMT +7.30</option>
  <option value="GMT +8">GMT +8</option>
  <option value="GMT +8.30">GMT +8.30</option>
  <option value="GMT +9">GMT +9</option>
  <option value="GMT +9.30">GMT +9.30</option>
  <option value="GMT +10">GMT +10</option>
  <option value="GMT +10.30">GMT +10.30</option>
  <option value="GMT +11">GMT +11</option>
  <option value="GMT +11.30">GMT +11.30</option>
  </select></div>
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
  
  
  <?php  
	if(isset($_SESSION['SESS_SR_ID'])) {
		?>
  <input type="submit" class="register_button" value="Update">
  <?php
	}
	else {
		?>
  <input type="submit" class="register_button" value="Register">
  <?php
	}
  ?>
  </div>
  </form>
  
  <div class="request_right_box">
  <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Bank Name</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Bank Name">
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Bank SWIFT Code</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Bank Name">
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Amount...</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Bank Name">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> I agree to the Terms and Conditions
    </label>
  </div>
  <button type="submit" class="register_button">Pay Now </button>
</form>
  </div>
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
    
    <script>
  function upload_pp() {
    $("input[id='my_file']").click();
  }
  
  
$("#my_file").change(function(){
	//document.getElementById("sppp").innerHTML='<img src="images/ajax_loader_gray.gif" alt="loader">';
	var pdata='<?php echo "<img src=\'profile_images/".$SRID.".jpg\' >";?>';
	var file_data = $("#my_file").prop("files")[0];   // Getting the properties of file from file field
	
	var form_data = new FormData();                  // Creating object of FormData class
	form_data.append("file", file_data);              // Appending parameter named file with properties of file_field to form_data
	form_data.append("user_id", 123);                 // Adding extra parameters to form_data
	//alert(file_data);
	$.ajax({
                url: "uploadsrp.php",
                dataType: 'script',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         // Setting the data attribute of ajax with file_data
                type: 'post',
				success: function(data) {
   					window.location.reload();
				}
       });
	   
	   function rload(){
              // window.location.reload();
        }        
	   
});
//
//setInterval("update()", 10000); // Update every 10 seconds 

function update() 
{ 
document.getElementById("srp").innerHTML='<?php echo "<img src=\'profile_images/".$SRID.".jpg\' >";?>';
} 
  </script>
  
  
  
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