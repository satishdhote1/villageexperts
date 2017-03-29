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
	} elseif(isset($_SESSION['SESS_SR_ID'])){
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
  
  <div class="right_header" style="width: 410px;">
  	<span class="service_text" style="text-align:center; font-size:16px;">Login</span>
  	<div class="button_box">
  		<a href="service_provider_login.php"><div class="sign_up_button">Service Provider</div></a>
  		<a href="service_requestor_login.php"><div class="log_in_button" style="float: left; margin-left: 10px;">Service Requestor</div></a>
  	<a href="nm_login_page.php"><div class="sign_up_button">Group Members</div></a>
  </div>
  </div>
  <div class="right_one_header" style="">
  <!--<div onClick="show_login();" onMouseOver="show_login();" onMouseOut="hide_login();"><span class="service_text">Service Provider Login</span>-->
  <!--Demo-->
  <div class="right_header" style="width: 270px;">
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
  	<a href="demotest">
  		<div class="log_in_button" style="width:320px; float:left; margin-top:20px; margin-left:30px;">Goto Test Page</div>
  	</a>
	      
  	<div class="clearfix"></div>
      		<div class="col-lg-4">
        		<div class="main-box">
            			<div class="icon-box">
                		<img src="images/team.png" alt="team">
                	</div>
                	<a class="redirect-btn" href="groups.php">My Groups</a>
            	</div>
        </div>
 
      	<div class="col-lg-4">
        	<div class="main-box">
            	<div class="icon-box">
                <img src="images/old-sp.png" alt="team">
                </div>
                <a class="redirect-btn" href="known_service_provider.php">Known Service Provider</a>
            </div>
        </div>
 
      	<div class="col-lg-4">
        	<div class="main-box">
            <div class="icon-box">
              <img src="images/new-sp.png" alt="team">
            </div>
            <a class="redirect-btn" href="new_search.php">New Service Provider</a>
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
function update() { 
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

function checksearch(spid) { 
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

<?php
if(isset($_GET['error'])){
$error=str_replace('"','',$_GET['error']);
if($error=='loginerror') {
?>
<div style="width: 100%; height: 100%; position: fixed; background: rgba(0, 0, 0, 0.78);" id="notif_box">
	<div style="width: 300px;padding-right: 20px; background: #fff; color: #F00; margin: auto; margin-top: 220px; font-size: 18px; text-align: right;"><a href="javascript:void(0);" title="Close" style="color: #F00;" onclick="close_notif();">X</a></div>     
	<div style="width: 300px; padding: 20px; background: #fff; color: #F00; margin: auto; font-size: 18px; padding-top: 0px;">You have to login to access the page. Thank You!</div>      
</div>
<?php
}
elseif ($error=='wrongpassword') {
?>
<div style="width: 100%; height: 100%; position: fixed; background: rgba(0, 0, 0, 0.78);" id="notif_box">
	<div style="width: 300px;padding-right: 20px; background: #fff; color: #F00; margin: auto; margin-top: 220px; font-size: 18px; text-align: right;"><a href="javascript:void(0);" title="Close" style="color: #F00;" onclick="close_notif();">X</a></div>
	<div style="width: 300px; padding: 20px; background: #fff; color: #F00; margin: auto; font-size: 18px; padding-top: 0px;">Username or password is wrong. Please try again. Thank You!</div>      
</div>
<?php
}
}
?>

<script type="text/javascript">
function close_notif() {
	document.getElementById("notif_box").style.display="none";
}
</script>


</body>
</html>

