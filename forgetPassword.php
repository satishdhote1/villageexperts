<?php
include("config/connection.php");
include("phpSendMail.php");
session_start();
$conn=new connections();
$conn=$conn->connect();

$tableResult = 0;
$isError = 0;
$passStr="";
$changePWD = 0;
$isexpertUser = 0;
if(isset($_REQUEST['profileSubmit']))
{
	$email=isset($_REQUEST['email'])?$_REQUEST['email']:'';
	$cpwd = isset($_REQUEST['cpwd'])?$_REQUEST['cpwd']:'';
	$pwd = isset($_REQUEST['pwd'])?$_REQUEST['pwd']:'';
$sql="";
if(!empty($pwd) &&($pwd == $cpwd))
{
	$sql="update friendsRegister set pwd = '".md5($pwd)."',ResetPWDtoken = '".rand()."' where email = ".$email;
	$tableResult = mysqli_query($conn, $sql);
	if($tableResult == 1)
    {
    	$isError = 100;
    }
}
else
{
	$isError = 2;
}
   

    //print_r($tableResult);
}


$sqlParent = "select * from friendsRegister where email = '".$_REQUEST['email']."'";
       $tableResultParent = mysqli_query($conn, $sqlParent);
       $resultParentData = array();
       $resultParent = '';
       if (mysqli_num_rows($tableResultParent) > 0)  
      {
        $row  = mysqli_fetch_assoc($tableResultParent);
        if($row['ResetPWDtoken'] == $_REQUEST['token'])
        {
			$isError = 1;
      	}
       }
       else
       {
       	 $isError = 1;
       }

      



?>


<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1,">
 <meta http-equiv="x-ua-compatible" content="ie=edge">
 <title>Village Expert</title>

 <!-- Font Awesome -->
 <link href="fonts/css/font-awesome.min.css" rel="stylesheet">

 <!-- Bootstrap core CSS -->
 <link href="css/bootstrap.min.css" rel="stylesheet">

 <!-- Material Design Bootstrap -->
 <link href="css/mdb.min.css" rel="stylesheet">

 <!-- Your custom styles (optional) -->
 <link href="css/style.css" rel="stylesheet">
 <style>
.userpro {
	width: 150px;
	height: 150px;
	overflow: hidden;
	border: 3px solid #eee;
}
.userpro img {
	width: 100%;
}
.deco {
	text-align: right;
	margin-top: 10px;
}
.chang-text {
	text-transform: uppercase;
	font-weight: bold;
	letter-spacing: 1px;
	margin-bottom: 0;
}
.radio {
	margin: 0;
}
.radio > p {
	text-transform: uppercase;
	margin: 0;
}
.check1 label {
	font-size: 20px;
	font-weight: bold;
	margin-left: 15px;
	padding-left: 4px;
	vertical-align: top;
}
.check1 {
	line-height: 37px;
	margin-left: 56px;
	padding-top: 18px;
}
.check1 > input {
	margin-left: 0;
	margin-right: 0;
	margin-top: 13px !important;
}
.main-block {
	overflow: hidden;
}
.main-block .fa {
	font-size: 17px;
	text-transform: uppercase;
}
.box-new-page {
	background: #fff;
	margin-top: 25px;
	border-radius: 5px;
	box-shadow: 0 0 5px rgba(0,0,0,0.3);
	padding: 15px;
	margin-bottom: 30px
}
.logo-modify img {
	margin: auto;
	width: auto;
}
.user-profile-block {
	position: absolute;
	right: 101px;
	top: 5px;
	width: 300px;
}
.profile-img.pull-left {
	height: 100px;
	width: 90px;
}
.profile-img.pull-left img {
	width: 100%;
}
.setting {
	float: right;
}
.setting ul.dropdown-menu {
	left: 7px;
	padding: 10px 15px;
	top: 42px;
	width: 94%;
}
.fa > span {
	font-family: arial;
}
.hder {
	color: #999;
	font-size: 28px;
	font-weight: bold;
}
</style>
 </head>

 <body style="background:#CCCCFE">

<!-- Start your project here-->

<header>
   <div class="container">
   <div class="logo-modify"><img src="images/logo.png"></div>
   
   <!--<div class="user-profile-block">
    
    <div class="profile-img pull-left">
    <img src="images/profile.jpg" class="embed-responsive-item">
    
    </div>
    <div class="setting">
   <div class="dropdown filter-btn"> <button class="btn btn-primary dropdown-toggle modify-btn" type="button" data-toggle="dropdown" aria-expanded="false">Subhasis Naskar<span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Name Edit</a></li>
                        <li><a href="#">Password Edit</a></li>
                      </ul>
                    </div>
    
    
    
    </div>
    
    
    
    </div>--> 
 </header>

<!--Navbar-->
<div class="container">
   <div class="row">
   <?php if($tableResult == 1){?>
   <div class="alert alert-danger connSuccess" style="display:block;margin-top: 5px;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  <span><?php if($isError == 1){echo "Sorry! Link is not valid or email id no longer exists!</br>";}
	  else if($isError == 2){echo "Sorry! Password and Confirm password doesn't match!</br>";}
	  else if($isError == 100){echo "Password reset successful!</br>";}
	  ?></span> 
	</div>
	<?php }?>
	<div class="clearfix"></div>
    <div class="box-new-page">
       <div class="col-sm-6 text-xs-left">
        <p class="hder">Password Reset</p>
      </div>
       <div class="col-xs-12 col-sm-4 deco">
        <button class="btn btn-cyan backToHome" >My Home Page</button>
      </div>
       <div class="col-xs-12 col-sm-2 deco">
        <button class="btn btn-close btn-blue-grey backTo"><i class="fa fa-close"></i></button>
      </div>
       <div class="clearfix"></div>
       <div class="m-t-2"></div>
       <form class="profile" id="profile" action="" method="post" >
       <input type="hidden" name="email" value="<?php echo $_REQUEST['email'] ;?>">
       <input type="hidden" name="token" value="<?php echo $_REQUEST['token'] ;?>">
       <input type="hidden" name="passwordChanged" value="<?php echo $isError;?>">
       
		       <div class="col-md-6 col-xs-12">
		        <div class=" main-block"> <i class="fa fa-user prefix"> <span>Password </span></i>
		           <input id="pwd" class="form-control pwd" name="pwd" tabindex="1" type="text" value="" placeholder="Enter Your New Password">
		           <label for="pwd"></label>
		         </div>
		      </div>
		       <div class="col-md-6 col-xs-12">
		        <div class=" main-block"> <i class="fa fa-user prefix"> <span> Repeat Password</span> </i>
		           <input id="form4 cpwd" class="form-control cpwd" name="cpwd" tabindex="2" type="text" value="" placeholder="Confirm your new password">
		           <label for="form4"></label>
		         </div>
		      </div>
		       
		       <div class="col-xs-6 ">
		        <button class="btn btn-cyan text-xs-center pull-right" type="submit" name="profileSubmit" style="width:55%; margin:34px auto 0 auto" >Save</button>
		      </div>
      </form>
       <div class="clearfix"></div>
     </div>
  </div>
 </div>
<!-- SCRIPTS --> 

<!-- JQuery --> 
<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script> 
<script src="js/jquery.validate.min.js"></script> 
<script src="js/formSubmission.js"></script> 
<script src="js/connectMe.js"></script> 
<script src="js/instantImageShow.js"></script> 
<!-- Bootstrap tooltips --> 
<script type="text/javascript" src="js/tether.min.js"></script> 

<!-- Bootstrap core JavaScript --> 
<script type="text/javascript" src="js/bootstrap.min.js"></script> 

<!-- MDB core JavaScript --> 
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript">
  
$(document).ready(function(){
	if($(".passwordChanged").val() == 100)
	{setTimeout(function(){location.href="index.php#login"}, 2000);}
$(document).on("click",".backTo",function(){
window.history.back();
});
$(document).on("click",".backToHome",function(){
location.href="friends-family.php"
});
});

</script>
</body>
</html>
