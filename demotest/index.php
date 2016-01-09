<?php
	session_start();
require('config.php');
 
		  if(isset($_POST['email'])){
			  $email=$_POST['email'];
          	$qrySPL=mysqli_query($bd, "SELECT * FROM users WHERE email='$email'");
			if($memSPL=mysqli_fetch_assoc($qrySPL)) {				
			session_regenerate_id();
			$_SESSION['SESS_ID'] = $memSPL['id'];
			$_SESSION['SESS_NAME'] = $memSPL['name'];
			$_SESSION['SESS_EMAIL'] = $memSPL['email'];
			session_write_close();
				$lerror = "";
			}
			else {
				$lerror = "<h1 style='color:#ff0000;'>WRONG EMAIL OR PASSWORD</h1>";
			}
		  }
		  else{			  
				$lerror = "";
		  }
		  
if(isset($_SESSION['SESS_ID'])) {
	$UID=$_SESSION['SESS_ID'];
	$UNAME=$_SESSION['SESS_NAME'];
	$UEMAIL=$_SESSION['SESS_EMAIL'];
};
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Village Expert Demo</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
  </head>
  <body>
  <div id="header">
  <div class="container">
  <a href="#"><div id="logo"><img src="images/logo.jpg" alt="logo"></div></a>
  
  <?php
  if(isset($_SESSION['SESS_ID'])) {  
  ?>
  <div class="right_header">
  <div class="button_box">
	  
  <?php
	  echo "Welcome, ".$UNAME." | <a href='logout.php'>Logout</a>";
  ?>
  </div>
  </div>
  <?php
  }  
  ?>
  <div class="right_one_header">
  <a href="#"><span class="service_text"></span></a>
  </div>
  </div>
  </div>
  
  <div class="main_body_box">
      <div class="container">       
          <div class="col-lg-4 col-md-4 col-sm-4"> 
          </div>    
          
          <?php
		  if(isset($_SESSION['SESS_ID'])) {
          $time = time();
		  $timeLESS = $time-30;
		  ?> 
          <div class="col-lg-4 col-md-4 col-sm-4 pal" style="border:1px solid #ccc; background:#FFF; margin-top:50px; padding:10px;">
          <h2 style=" text-align:center;">My Team</h2>
          	<?php
          	$qryU=mysqli_query($bd, "SELECT * FROM users WHERE introduced_by='$UID'");
			while($memU=mysqli_fetch_assoc($qryU)) {
                if($memU['last_seen']>$timeLESS){
				?>
                	<div id="u<?php echo $memU['id'];?>" style="line-height: 30px;"><a href="#" onClick="selectu('<?php echo $memU['id'];?>')"><img src="images/login.png" alt="Logged In" style="width:18px; float:left;margin-top: 6px;margin-right: 5px;"><?php echo $memU['name'];?><img src="images/selected.png" alt="Logged Out" style="width:18px; float:right;margin-top: 6px;margin-right: 5px; display:none;" id="selected_img"></a></div>
                <?php
				}
				else {
				?>
                	<div id="u<?php echo $memU['id'];?>" style="line-height: 30px; padding: 10px;"><img src="images/not-login.png" alt="Logged Out" style="width:18px; float:left;margin-top: 6px;margin-right: 5px;"><?php echo $memU['name'];?></div>
                    <?php
				}
			}
			?>
           <input type="hidden" value="" id="connect_with"> 
            <a class="log_in_button" id="connect_button" style="float:left; width:100%; margin-top:20px; background: #ff6c00; color:#FFF; font-size: 25px; display:none;" href="#" onClick="start_communication();">Connect</a>
          </div>
          <?php
		  }
		  else {
		  ?>
          <div class="col-lg-4 col-md-4 col-sm-4 pal" style="border:1px solid #ccc; background:#FFF; margin-top:50px;     padding: 15px;">
          <h2 style=" text-align:center;">Login Here</h2>
          	<?php $lerror; ?>
            <form method="post">
            <input type="email" name="email" placeholder="Your Email" style="float:left; width:100%; margin-top:20px;padding: 10px;border-radius: 5px;border: 1px solid #A0A0A0;" required>            
            <input type="submit" value="LOGIN"  class="log_in_button" style="float:left; width:100%; margin-top:20px;">
            </form>
            
          </div>
          <?php
		  }
		  ?>
               
          <div class="col-lg-4 col-md-4 col-sm-4"> 
          </div>   
          
          
          
          
          <div class="col-lg-4 col-md-4 col-sm-4 pal" style="">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 pal" style="margin-top:50px; text-align:center;">
            <input type="hidden" id="selectedsp">
            <input type="hidden" id="selectedsr">
            <div class="log_in_button" id="cnct_btn" style="display:none;width:100%;" onClick="conect_btn();">Connect Now</div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 pal" style="">
          </div>
      </div>
  
  	<hr />
  	<div class="copy_text">Copyrights 2015.  All Rights Reserved</div>
  </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script>
	function selectu(uid){
		$('[id^="u"]').removeClass("selected");
		$("#u"+uid).addClass("selected");
		document.getElementById("connect_with").value=uid;
		document.getElementById("connect_button").style.display="block";
	}
	</script>
    <script>
	function start_communication(){
		var uid = document.getElementById("connect_with").value;
		location.href = "communication.php?cid="+uid;
	}
	</script>
    <?php
if(isset($_SESSION['SESS_ID'])) {
	?>
    <script>
  setInterval(checkcommunication, 10000); // Update every 10 seconds 

function checkcommunication() 
{ 

$.ajax({
	url : "checkcommunication.php",
	success : function (data) {
		if(data) {
    	location.href = "communication.php?crid="+data;
		}
	}
});
} 
</script>
<?php
}
?>
    <?php
if(isset($_SESSION['SESS_ID'])) {
	?>
    <script>
  setInterval(last_seen, 10000); // Update every 10 seconds 

function last_seen() 
{ 

$.ajax({
	url : "change_last_seen.php",
	success : function (data) {
		if(data) {
    	
		}
	}
});
} 
</script>
<?php
}
?>
  </body>
</html>