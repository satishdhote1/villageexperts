<?php
	session_start();
require('config.php');
if(isset($_SESSION['SESS_ID'])) {
	$SPID=$_SESSION['SESS_ID'];
	$qryProfile=mysqli_query($bd, "SELECT * FROM service_provider WHERE SPID='$SPID'");
	if($memProfile=mysqli_fetch_assoc($qryProfile)) {
		$fname=$memProfile['First_Name'];
		$lname=$memProfile['Last_Name'];
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
else {
?>
  <div class="right_header">
  <span class="service_text" style="text-align:center; font-size:16px;">Service Requestor</span>
  <div class="button_box">
  <a href="service_requestor_profile_page.php"><div class="sign_up_button">Sign Up</div></a>
  <a href="service_requestor_login.php"><div class="log_in_button">Login</div></a>
  </div>
  </div>
  <div class="right_one_header" style="">
  <div onClick="show_login();" onMouseOver="show_login();" onMouseOut="hide_login();"><span class="service_text">Service Provider Login</span>
  
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
  <form action="search.php" method="get">
  <div class="main_body_box">
  <div class="container">
  <div class="col-lg-9 col-md-9 col-sm-8">
  <div class="main_box">
  <div class="mid_image"><img src="images/image.png" alt="image"></div>
  <div class="fild_box">
  <!--<div class="expart_fild_box"><input name="q" class="expart_fild_box_main" placeholder="... the Expertise i am seeking..." type="hidden"></div>-->
  <input name="q" class="expart_fild_box_main" placeholder="... the Expertise i am seeking..." type="hidden" value="">
  <div class="loader"><img src="images/ajax_loader_gray.gif" alt="loader"></div>
  
  <div class="expart_list_box">
  <select name="expertise" class="expart_fild_box_main" id="expertise">
  <option value="">Choose Expertise From...</option>
  <?php
  $qryExpart=mysqli_query($bd, "SELECT * FROM professions ORDER BY Professions ASC");
  while($memExpart=mysqli_fetch_assoc($qryExpart)) {
	  echo "<option value=".$memExpart['ProfessionID'].">".$memExpart['Professions']."</option>";
  }
  ?>
  </select>
  </div>
  <div class="loader"><img src="images/ajax_loader_gray.gif" alt="loader"></div>
  </div>
  <!--<div class="search_button">
  <div class="search_button_main">
  <a href="#"><span class="search_text">Search</span>
  <div class="search_icon"><img src="images/search_icon.png" alt="icon"></div></a>
  </div>
  </div>-->
  
  <input type="submit" class="search_button_main" value="Search">
  </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-4">
  <div class="tree_box">
  <div class="attorni_box">
  <h1>Profession</h1>
  <div class="attorny_sub_box" id="specl">
  <div class="imanigition_box">
  	<span style="color:#CCC">Select Expertise..</span>
  </div>
  
  </div>
  </div>
  
  <div class="attorni_box">
  <h1>Language</h1>
  <div class="attorny_sub_box">
  <?php
  $qryLanguage=mysqli_query($bd, "SELECT * FROM language");
  while($memLanguage=mysqli_fetch_assoc($qryLanguage)) {
  ?>
  <div class="imanigition_box">
  <div class="check_box"><input name="language[]" type="checkbox" value="<?php echo $memLanguage['LanguageID']; ?>"></div>
  <span class="check_text"><?php echo $memLanguage['Languages']; ?></span>
  </div>
  <?php
  }
  ?>
  </div>
  </div>
  <!--
  <div class="attorni_box">
  <h1>Passed the Bar</h1>
  <div class="attorny_sub_box">
  <div class="imanigition_box">
  <div class="check_box"><input name="" type="checkbox" value=""></div>
  <span class="check_text">Yes</span>
  </div>
  <div class="imanigition_box">
  <div class="check_box"><input name="" type="checkbox" value=""></div>
  <span class="check_text">Not necessary</span>
  </div>
  </div>
  </div>
  -->
  <div class="attorni_box">
  <h1>Experience</h1>
  <div class="attorny_sub_box">
  <?php
  $qryExperience=mysqli_query($bd, "SELECT * FROM experience");
  while($memExperience=mysqli_fetch_assoc($qryExperience)) {
  ?>
  <div class="imanigition_box">
  <div class="check_box"><input name="experience[]" type="checkbox" value="<?php echo $memExperience['YearsOfExperienceID']; ?>"></div>
  <span class="check_text"><?php echo $memExperience['YearsOfExperience']; ?></span>
  </div>
  <?php
  }
  ?>
  </div>
  <!--<div class="attorny_sub_box">
  <div class="imanigition_box">
  <div class="check_box"><input name="" type="checkbox" value=""></div>
  <span class="check_text">Expert</span>
  </div>
  <div class="imanigition_box">
  <div class="check_box"><input name="" type="checkbox" value=""></div>
  <span class="check_text">Moderate expertise</span>
  </div>
  <div class="imanigition_box">
  <div class="check_box"><input name="" type="checkbox" value=""></div>
  <span class="check_text">Beginner</span>
  </div>
  </div>-->
  </div>
  </div>
  </div>
  
  <div class="search_button_mob">
  <div class="search_button_main">
  <a href="#"><span class="search_text">Search</span>
  <div class="search_icon"><img src="images/search_icon.png" alt="icon"></div></a>
  </div>
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
  </body>
</html>