<?php
	session_start();
require('config.php');
if(isset($_SESSION['SESS_ID'])) {
	$SPID=$_SESSION['SESS_ID'];
	$qryProfile=mysqli_query($bd, "SELECT * FROM service_provider WHERE SPID='$SPID'");
	if($memProfile=mysqli_fetch_assoc($qryProfile)) {
		$fname=$memProfile['First_Name'];
		$lname=$memProfile['Last_Name'];
		$email=$memProfile['email'];
		$country=$memProfile['Country'];
		$phone1=$memProfile['Phone1'];
		$phone2=$memProfile['Phone2'];
		$timeZone=$memProfile['TimeZone'];
		$experience=$memProfile['YearsOfExperience'];
		$bank=$memProfile['BankName'];
		$account=$memProfile['BankAccountNumber'];
		$swift=$memProfile['BankSWIFTCode'];
		$profession=$memProfile['Profession'];
		$specialisation=$memProfile['Specialisation'];
		$language=$memProfile['Languages'];
		$bank=$memProfile['BankName'];
		$explodedLanguage = explode(",",$language);
		$explodedLanguageElementBase = count($explodedLanguage);
		
		
		$ratesString=$memProfile['Rates'];
		$explodedRates = explode("::",$ratesString);
		
		$times = $explodedRates[0];
		$rates = $explodedRates[1];
		
		$sepTimes =explode(",",$times);
		$sepRates =explode(",",$rates);
				
	}
}
else {
		$fname="";
		$lname="";
		$email="";
		$country="";
		$phone1="";
		$phone2="";
		$timeZone="";
		$experience="";
		$bank="";
		$account="";
		$swift="";
		$profession="";
		$specialisation="";
		$language="";
		$sepRates[0]="";
		$sepRates[1]="";
		$sepRates[2]="";
		$language="";
		$explodedLanguage = "";
		$explodedLanguageElementBase = "";
		$SPID="";
		$bank="";
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
    <title>Service Provider</title>

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
  <?php
if(isset($_SESSION['SESS_ID'])) {
	?>
  <form action="sp_update.php" method="post" name="myForm" onsubmit="return validateForm()">
  <input name="spid" type="hidden" value="<?php echo $SPID; ?>">
  <?php
} else{
	?>
  <form action="sp_register.php" method="post" name="myForm" onsubmit="return validateForm()">
  <?php
} 
	?>
  <div class="main_body_box">
  <div class="container">
  <span class="service_request_text">SERVICE PROVIDER PROFILE PAGE</span>
  <div class="service_bg">
  <div class="service_left_box">
  <div class="requester_image" id="sppp">
  
   <?php
  $spID=$SPID;
  if(file_exists("profile_images/".$spID.".jpg")) {
   ?>
  		<img src="profile_images/<?php echo $spID.".jpg"; ?>" alt="image">
	<?php 
	  }
	  else {
	?>
		<img src="profile_images/no-profile-img-male.gif" alt="image">
	<?php
	}
	?>
  
  </div>
  <div id="test"></div>
  <div class="upload_box">  
    <input type="file" id="my_file" name="ppimg" style="display: none;"  accept="image/jpeg" />
  <a href="javascript:void(0);" onClick="upload_pp();"><span class="upload_text">
  <?php
if(isset($_SESSION['SESS_ID'])) {
  if(file_exists("profile_images/".$spID.".jpg")) {
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
  
   <div class="loader"><img src="images/ajax_loader_gray.gif" alt="loader"></div>
  <!--<span class="name_text">Dr. Xavier</span>-->
  </div>
  
  
  
  
  
  <h4 style="margin-top:40px; float:left;">Register as an Expert in..</h4>
  <div class="provider_fild_box"><select name="profession" class="provider_fild_box_main" id="profession" required="Select Your Profession">
 
  <option value="">Select Profession</option>
  <?php
  $qryProfession=mysqli_query($bd, "SELECT * FROM professions ORDER BY Professions ASC");
  while($memProfession=mysqli_fetch_assoc($qryProfession)) {
  if ($profession==$memProfession['ProfessionID']) {
	  ?> 
      <option value="<?php echo $memProfession['ProfessionID']; ?>" selected><?php echo $memProfession['Professions']; ?></option>
      <?php
  }
  else {
	  ?> 
      <option value="<?php echo $memProfession['ProfessionID']; ?>"><?php echo $memProfession['Professions']; ?></option>
      <?php
  }
  ?>
  <?php
  }
  ?>
  </select></div>
  
  <div id="splx">
  <?php  
	if(isset($_SESSION['SESS_ID'])) {
  ?>
  <div class="provider_fild_box"><select name="speialisation" class="provider_fild_box_main" id="spelisation" required>
  <option value="">Select Specialisation</option>
  <?php
  $qrySpl=mysqli_query($bd, "SELECT * FROM specialisation WHERE ParentID='$profession' ORDER BY Specialisation ASC");
  while($memSpl=mysqli_fetch_assoc($qrySpl)) {
	  if($specialisation==$memSpl['SpecialisationID']){
		  ?>
  <option value="<?php echo $memSpl['SpecialisationID']; ?>" selected><?php echo $memSpl['Specialisation']; ?></option>
          <?php
	  }
	  else {
  ?>
  <option value="<?php echo $memSpl['SpecialisationID']; ?>"><?php echo $memSpl['Specialisation']; ?></option>
  <?php
	  }
  }
  ?>
  </select></div>
  
  <?php
	}
  ?>
  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  </div>
  
 
  
  <div class="provider_blue_bg">
  <div class="provider_form_box">
  <div class="provider_name_box">
  <span class="provider_name_text">First Name</span>
  <div class="provider_fild_box"><input name="fname"  class="provider_fild_box_main" type="text" value="<?php echo $fname; ?>" required></div>
  </div>
  <div class="provider_name_box">
  <span class="provider_name_text">Last Name</span>
  <div class="provider_fild_box"><input name="lname" value="<?php echo $lname; ?>"  class="provider_fild_box_main" type="text" required></div>
  </div>
  
  <div class="provider_name_box">
  <span class="provider_name_text">Email</span>
  <div class="provider_fild_box"><input name="email" value="<?php echo $email; ?>"  class="provider_fild_box_main" type="email" required></div>
  </div>
  
  <div class="provider_name_box">
  <span class="provider_name_text">Country</span>
  <div class="provider_fild_box"><select name="country" class="provider_fild_box_main">
 
  <option value="">Select Country</option>
  <?php
  $qryCountry=mysqli_query($bd, "SELECT * FROM countries ORDER BY country_name ASC");
  while($memCountry=mysqli_fetch_assoc($qryCountry)) {
  if($country==$memCountry['country_name']) {
  ?>
  <option value="<?php echo $memCountry['country_name']; ?>" selected><?php echo $memCountry['country_name']; ?></option>
  <?php
  }
  else { ?>
  <option value="<?php echo $memCountry['country_name']; ?>" ><?php echo $memCountry['country_name']; ?></option>
  <?php
  }
  }
  ?>
  </select></div>
  </div>
  
  <div class="provider_name_box">
  <span class="provider_name_text">Phone</span>
  <div class="provider_fild_box"><input name="phone1"  class="provider_fild_box_main" value="<?php echo $phone1; ?>" type="text" onkeypress="return isNumber(event);"></div>
  </div>
  
  <div class="provider_name_box">
  <span class="provider_name_text">Alternate Phone</span>
  <div class="provider_fild_box"><input name="phone2"  value="<?php echo $phone1; ?>" class="provider_fild_box_main" type="text"></div>
  </div>
  
  <div class="provider_name_box">
  <span class="provider_name_text">Time Zone</span>
  <div class="provider_fild_box"><select name="timezone" class="provider_fild_box_main"><?php  
	if(isset($_SESSION['SESS_ID'])) {
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
  
  
  
  <div class="Password">
  <span class="provider_name_text">Password</span>
  <div class="provider_fild_box">
  <?php
if(isset($_SESSION['SESS_ID'])) {
	?>
  <input name="password"  class="provider_fild_box_main" id="password" type="password" >
  <?php 
} 
else {
	?>
  <input name="password"  class="provider_fild_box_main" id="password" type="password" required>
  <?php 
}
  ?>
  </div>
  </div>
  
  </div>
  
  <div class="register_right_box">
  <div class="language_box">
  <span class="lan_text">Years of Experience</span>
  <?php
  $qryExperience=mysqli_query($bd, "SELECT * FROM experience");
  while($memExperience=mysqli_fetch_assoc($qryExperience)) {
  ?>
  
  <div class="arbic_text_box">
  <span class="arbic_text"><?php echo $memExperience['YearsOfExperience']; ?></span>
  <?php
  if($experience==$memExperience['YearsOfExperienceID']) {
  ?>
  <div class="check_box_one"><input name="experience" type="checkbox" value="<?php echo $memExperience['YearsOfExperienceID']; ?>" checked></div>
  <?php } else { ?>
  <div class="check_box_one"><input name="experience" type="checkbox" value="<?php echo $memExperience['YearsOfExperienceID']; ?>" class="expchk"></div>
  <?php } ?>
  </div>
  <?php
  }
  ?>
  
  </div>
  </div>
  
  <div class="provider_bottom_box">
  <!--<div class="avaylity_box">
  <div class="avylity_top_blue_box">
  <span class="avylity_text">availability</span>
  <span class="sun_text">Sun</span>
  <span class="sun_text">Mon</span>
  <span class="sun_text">Tue</span>
  <span class="sun_text">Wed</span>
  <span class="sun_text">Thu</span>
  <span class="sun_text">Fri</span>
  <span class="sun_text">Sat</span>
  </div>
  <div class="avylity_white_box">
  <span class="avylity_morning_text">Morning</span>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  </div>
  
  <div class="after_noon_blue_bg">
  <span class="avylity_after_noon_text">Afternoon</span>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  </div>
  
   <div class="avylity_white_box">
  <span class="avylity_morning_text">Evening</span>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  </div>
  
  <div class="after_noon_blue_bg">
  <span class="avylity_after_noon_text">Night</span>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  <div class="sun_check_box"><input name="" type="checkbox" value=""></div>
  </div>
  </div>-->
  
  <div class="bottom_language_box">
  <div class="bottom_left_language_box">
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
  </div>
  <div class="bottom_right_rate_box">
  <div class="language_box">
  <span class="lan_text">Rate</span>
  <div class="arbic_text_box">
  <span class="arbic_text">15 mins</span>
  <div class="text_fild_one">$<input name="rate10" class="text_fild_one_main" type="number" value="<?php echo $sepRates[0]; ?>" required></div>
  </div>
  <div class="arbic_text_box">
  <span class="arbic_text">30 mins</span>
  <div class="text_fild_one">$<input name="rate20" class="text_fild_one_main" type="number" value="<?php echo $sepRates[1]; ?>"  required></div>
  </div>
  
  
  <div class="arbic_text_box">
  <span class="arbic_text">60 mins</span>
  <div class="text_fild_one">$<input name="rate30" class="text_fild_one_main" type="number" value="<?php echo $sepRates[2]; ?>"  required></div>
  </div>
  </div>
  </div>
  </div>
  
  <div class="blanks_box">
  <div class="fill_box">Fill in the blanks</div>
   <div class="provider_name_box">
  <span class="provider_name_text">Bank Name</span>
  <div class="provider_fild_box">
  <!--
  <input name="bank"  class="provider_fild_box_main" value="<?php echo $bank; ?>" type="text">
  -->
  
  <select name="bank" class="provider_fild_box_main">
 
  <option value="">Select Bank</option>
  <?php
  $qryBank=mysqli_query($bd, "SELECT * FROM banks ORDER BY Bank ASC");
  while($memBank=mysqli_fetch_assoc($qryBank)) {
  if($bank==$memBank['Bank']) {
  ?>
  <option value="<?php echo $memBank['country_name']; ?>" selected><?php echo $memBank['country_name']; ?></option>
  <?php
  }
  else { ?>
  <option value="<?php echo $memBank['Bank']; ?>" ><?php echo $memBank['Bank']; ?></option>
  <?php
  }
  }
  ?>
  </select>
  
  
  
  
  </div>
  </div>
  
  <div class="provider_name_box">
  <span class="provider_name_text">Bank Account Number</span>
  <div class="provider_fild_box"><input name="account"  class="provider_fild_box_main" value="<?php echo $account; ?>" type="text"></div>
  </div>
  
  <div class="provider_name_box">
  <span class="provider_name_text">Bank SWIFT Code</span>
  <div class="provider_fild_box"><input name="swift"  class="provider_fild_box_main" value="<?php echo $swift; ?>" type="text"></div>
  </div>
  
   <div class="checkbox">
    <label>
      <input type="checkbox" required> I agree to the Terms and Conditions
    </label>
  </div>
  <?php
if(isset($_SESSION['SESS_ID'])) {
	?>
  <button type="submit" class="service_requester_button">Update</button>
  <?php
} else{
	?>
  <button type="submit" class="service_requester_button">Register</button>
  <?php
} 
	?>
  </div>
  </div>
  </div>
  </div>
  
  <div class="bottm_box"><a href="index.php"><div class="home_button">Home</div></a>
  </div>
  </div>
  
  <hr />
  <div class="copy_text">Copyrights 2015.  All Rights Reserved</div>
  </div>
  </form>
  
  
 
  
  
  
  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script> 
  <script>
 $("#profession").change(function() {
    var selected = $(this).val(); // or this.value
	if(selected) {
		$.ajax({
			url : "get-spl.php?q="+selected,
			success : function (data) {
				$("#splx").html(data);
			}
		});
	}
	else {
		document.getElementById("splx").innerHTML="";
	}
});
  </script>
  
  <script>
  function upload_pp() {
    $("input[id='my_file']").click();
  }
  
  
$("#my_file").change(function(){
	var pdata='<?php echo "<img src=\'profile_images/".$SPID.".jpg\' >";?>';
	var file_data = $("#my_file").prop("files")[0];   // Getting the properties of file from file field
	
	var form_data = new FormData();                  // Creating object of FormData class
	form_data.append("file", file_data);              // Appending parameter named file with properties of file_field to form_data
	form_data.append("user_id", 123);                 // Adding extra parameters to form_data
	$.ajax({
                url: "uploadspp.php",
                dataType: 'script',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         // Setting the data attribute of ajax with file_data
                type: 'post',
       });
	   document.getElementById("sppp").innerHTML='<img src="images/ajax_loader_gray.gif" alt="loader">';
	   setTimeout(function(){
               window.location.reload();
        }, 1000);        
	   
});
  </script>
  <script>
  $('input.expchk').on('change', function() {
    $('input.expchk').not(this).prop('checked', false);  
});
  </script>
  <script>
 function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode!=43) {
        return false;
    }
    return true;
}

  function validateForm() {
        var pwd= document.getElementById("password").value;
		var pwdlen=pwd.length;
		if(pwdlen<6){
			alert("Password should be minimum 6 character");
		return false;
		}
		else {
		return true;
		}
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