<?php
	session_start();
require('config.php');
  $general_user = "";
if(isset($_SESSION['SESS_ID'])) {
	$SPID=$_SESSION['SESS_ID'];
  $general_user = $SPID;
	$qryProfile=mysqli_query($bd, "SELECT * FROM service_provider WHERE SPID='$SPID'");
	if($memProfile=mysqli_fetch_assoc($qryProfile)) {
		$fname=$memProfile['First_Name'];
		$lname=$memProfile['Last_Name'];
	}
}

if(isset($_SESSION['SESS_SR_ID'])) {
	$SRID=$_SESSION['SESS_SR_ID'];
  $general_user = $SRID;
	$qryProfile=mysqli_query($bd, "SELECT * FROM service_requester WHERE SRID='$SRID'");
	if($memProfile=mysqli_fetch_assoc($qryProfile)) {
		$sremail=$memProfile['email'];
    $srfname=$memProfile['First_Name'];
    $srlname=$memProfile['Last_Name'];
	}
}
else {
  header('location:index.php?error="loginerror"');
  exit(); 
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
  <span class="main_image_name_text"><a href="service_requestor_profile_page.php"><?php echo $srfname." ".$srlname;?></a> | <a href="logout.php">Log out</a></span>
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
  <div class="main_body_box" style="background:none; margin-top:60px;">
      <div class="container"> 
        <div class="clearfix"></div>

        <?php
          $qryKsp=mysqli_query($bd, "SELECT DISTINCT SPID FROM sp_sr_connect WHERE SRID='$SRID'");
          while($memKsp=mysqli_fetch_assoc($qryKsp)) {
            $ksp_id=$memKsp['SPID'];
            $qryDsp=mysqli_query($bd, "SELECT * FROM service_provider INNER JOIN status ON service_provider.SPID = status.SPID WHERE service_provider.SPID ='$ksp_id'");
            $memDsp=mysqli_fetch_assoc($qryDsp);
            $lastActivity=$memDsp['lastActivity'];
            $timeNow=date('ymdhis');
            $timediff=$timeNow-$lastActivity;
            if($timediff>30){
            ?>
              <div class="col-lg-4">
                <div class="main-box">
                  <div class="icon-box">
                      <?php
                      if(file_exists("profile_images/".$ksp_id.".jpg")) {
                      ?>
                        <img src="profile_images/<?php echo $ksp_id.".jpg"; ?>" alt="image">
                      <?php 
                      }
                      else {
                      ?>      
                        <img src="profile_images/no-profile-img-male.gif" alt="image">
                      <?php
                      }
                      ?>
                  </div>
                  <h2 style="font-size: 17px; text-align: center; float: left;  width: 100%;"><?php echo $memDsp['First_Name']." ".$memDsp['Last_Name']?><br></h2>
                  <div class="deactive-btn">Offline</div>
                </div>
              </div>
            <?php
            }
            else {
            ?>
              <div class="col-lg-4">
                <div class="main-box">
                  <div class="icon-box">
                      <?php
                      if(file_exists("profile_images/".$ksp_id.".jpg")) {
                      ?>
                        <img src="profile_images/<?php echo $ksp_id.".jpg"; ?>" alt="image">
                      <?php 
                      }
                      else {
                      ?>      
                        <img src="profile_images/no-profile-img-male.gif" alt="image">
                      <?php
                      }
                      ?>
                  </div>
                  <h2 style="font-size: 17px; text-align: center; float: left;  width: 100%;"><?php echo $memDsp['First_Name']." ".$memDsp['Last_Name']?><br></h2>
                   <a class="redirect-btn" href="javascript:void(0);" onClick="show_module('<?php echo $ksp_id; ?>','<?php echo $SRID; ?>');">Connect</a>
                </div>
              </div>
            <?php
            }
          }
        ?>
      	<!--<div class="col-lg-4">
        	<div class="main-box">
            <div class="icon-box">
              <img src="images/new-sp.png" alt="team">
            </div>
            <h2 style="font-size: 17px; text-align: center; float: left;  width: 100%;">Service Provider 1<br></h2>
            <div class="deactive-btn">Offline</div>
          </div>
        </div>
 
      	<div class="col-lg-4">
        	<div class="main-box">
            <div class="icon-box">
              <img src="images/new-sp.png" alt="team">
            </div>
            <h2 style="font-size: 17px; text-align: center; float: left;  width: 100%;">Service Provider 2<br></h2>
            <a class="redirect-btn" href="#">Connect</a>
          </div>
        </div>
 
      	<div class="col-lg-4">
        	<div class="main-box">
            <div class="icon-box">
              <img src="images/new-sp.png" alt="team">
            </div>
            <h2 style="font-size: 17px; text-align: center; float: left;  width: 100%;">Service Provider 3<br></h2>
            <a class="redirect-btn" href="#">Connect</a>
          </div>
        </div>-->

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
        			location.href = "https://www.villageexperts.com:8084/#/"+spid;
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



<!--Service Requester Status-->
<?php
if(isset($_SESSION['SESS_SR_ID'])) {
?>
<script>
setInterval(last_seen, 10000); // Update every 10 seconds
function last_seen() 
{ 
$.ajax({
	url : "requester_status.php",
	success : function (data) {
		if(data) {
    	
		}
	}
});
} 
</script>
<?php
}

if($_SESSION['SESS_ID']||$_SESSION['SESS_SR_ID']) {
?>
<script>
  setInterval("checkcommunication_group('<?php echo $general_user; ?>')", 10000); // Update every 10 seconds 
function checkcommunication_group(spid) 
{ 
$.ajax({
  url : "checkcommunication_group.php",
  success : function (data) {
    if(data=='error') {
    }
    else{
      var audio = new Audio('sounds/final-warn-sound.mp3');
      audio.play();
        window.setTimeout(function(){
              location.href = "https://www.villageexperts.com:8084/#/"+data;
          }, 3000);      
    }
  }
});
} 
</script>
<?php } ?>


<script>
  function show_module(spid,srid) {
    $.ajax({
      url : "communication_start.php?spid="+spid+"&srid="+srid,
      success : function (data) {
        location.href = "https://www.villageexperts.com:8084/#/"+spid;
      }
    });
  }
</script>
  </body>
</html>