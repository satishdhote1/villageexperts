<?php

error_reporting(E_ALL);
 header("Refresh: 4; url= http://".$_SERVER['SERVER_NAME']."/");
include("config/connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Village Expert</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/mainstyle.css" rel="stylesheet">
</head>
<style>
.over-lap {
	display: none !important
}
</style>
<body class="bodybg" background="img/normal/family.jpg">
<div class="container-fluid header-part">
  <div class="row">
    <div class="col-md-12 text-center">
      <div class="logo"> <img src="images/logo.png" alt="logo" > </div>
			<div class="over-lap">
				<div class="profile pull-left"> <img src="images/placeholder/male2.jpg" class="img-responsive"> </div>
					<div class="pull-right">
					  <p class="loginname">Wellcome <?php echo $_SESSION['logged_user_fname']; ?></p>
					  <button class="btn btn-info bg-blue">Logout</button>
					</div>
				<div class="clearfix"></div>
			</div>
    </div>
  </div>
</div>


<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="wellcome-text">
			<?php

			if(isset($_COOKIE['VEemail']) && $_COOKIE['VEemail'] != "")
			{
				$_COOKIE['VEemail'] = '';
				unset($_COOKIE['VEemail']);
			}
			if(isset($_SESSION['logged_user_id']) && !empty($_SESSION['logged_user_id']))
			{
				$conn=new connections();
				$conn=$conn->connect();
				$sqlUpdate="update friendsRegister set loginStatus='NO' where id=".$_SESSION['logged_user_id'];
				$rsUpdate=mysqli_query($conn, $sqlUpdate);

				/*if($_SESSION['logged_role_code']=='SP'){
					$sqlUpdate="update friendsRegister set loginStatus='NO' where id=".$_SESSION['logged_user_id'];
					$rsUpdate=mysqli_query($conn, $sqlUpdate);
				}
				else if($_SESSION['logged_role_code']=='SR'){
					$sqlUpdate="update service_requestor set sr_logged_in='N' where sr_id=".$_SESSION['logged_user_id'];
					$rsUpdate=mysqli_query($conn, $sqlUpdate);
					//echo $ssql;exit();
				}
				else if($_SESSION['logged_role_code']=='GM'){
					$sqlUpdate="update group_member set gm_logged_in='N' where gm_id=".$_SESSION['logged_user_id'];
					$rsUpdate=mysqli_query($conn, $sqlUpdate);
					//echo $ssql;exit();
				}*/

				foreach ($_SESSION as $key=>$value){
					//if (substr($key,0,strlen($session_prefix))==$session_prefix){
					unset($_SESSION[$key]);
				}
				//header("Refresh: 4; url= http://".$_SERVER['SERVER_NAME']."/villageExpert");
				//header("Refresh: 3; url=index.php");
			?>
			<p>Logged Out successfully.  Redirecting....</p>
			<?php
					}
					else
					{
						//header("Refresh: 4; url= http://".$_SERVER['SERVER_NAME']."/villageExpert");
						//echo '<center><h1 style="color:red">You are not autorized.  Redirecting....</h1></center>';
						?>
			            <p>You are not autorized.  Redirecting....</p>
			            <?php
					}		
			?>
			</div>
		</div>
	</div>
</div>

<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
</body>
</html>
