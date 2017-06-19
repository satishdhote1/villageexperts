<?php
include("config/connection.php");
include("phpSendMail.php");
session_start();
$conn=new connections();
$conn=$conn->connect();

$tableResult = 0;
$passStr="";
$changePWD = 0;
$isexpertUser = 0;
if(isset($_REQUEST['profileSubmit']))
{

	$userType = isset($_REQUEST['userType'])?$_REQUEST['userType']:'';
	$isexpertreg=isset($_REQUEST['isexpertreg'])?$_REQUEST['isexpertreg']:'';
	$isFriendreg=isset($_REQUEST['isFriendreg'])?$_REQUEST['isFriendreg']:'';
	$uid=isset($_REQUEST['uid'])?$_REQUEST['uid']:'';
	$expertID=isset($_REQUEST['expertID'])?$_REQUEST['expertID']:'';
	$fname=isset($_REQUEST['fname'])?$_REQUEST['fname']:'';
	$lname=isset($_REQUEST['lname'])?$_REQUEST['lname']:'';
	$m_city=isset($_REQUEST['city'])?$_REQUEST['city']:'';
	$m_country=isset($_REQUEST['country'])?$_REQUEST['country']:'';
	$m_mobile=isset($_REQUEST['phone'])?$_REQUEST['phone']:'';
	$m_email=isset($_REQUEST['email'])?$_REQUEST['email']:'';
	$expertiesData = isset($_REQUEST['expertiesData'])?$_REQUEST['expertiesData']:'';
	$pwd = isset($_REQUEST['pwds'])?$_REQUEST['pwds']:'';
$sql="";
if(!empty($pwd))
{
	$changePWD = 1;
	$sql="update friendsRegister set fname = '".ucwords($fname)."',lname = '".ucwords($lname)."', city = '".$m_city."',country = '".$m_country."',phone = '".$m_mobile."',email = '".$m_email."',pwd = '".md5($pwd)."',experties = '".$expertiesData."' where id = ".$uid;
}
else
{
	$changePWD = 0;
	$sql="update friendsRegister set fname = '".ucwords($fname)."',lname = '".ucwords($lname)."', city = '".$m_city."',country = '".$m_country."',phone = '".$m_mobile."',email = '".$m_email."',experties = '".$expertiesData."' where id = ".$uid;
}
    $tableResult = mysqli_query($conn, $sql);

    if($tableResult == 1)
    {
    	
    }

    //print_r($tableResult);
}


$sqlParent = "select * from friendsRegister where email = '".$_SESSION['logged_user_email']."'";
       $tableResultParent = mysqli_query($conn, $sqlParent);
       $resultParentData = array();
       $resultParent = '';
       if (mysqli_num_rows($tableResultParent) > 0)  
      {
        $resultParentData  = mysqli_fetch_assoc($tableResultParent);

			$sqlParent2 = "select * from friendsExpertInfo where userid = '".$resultParentData['id']."'";
			$tableResultParent2 = mysqli_query($conn, $sqlParent2);
			$resultParentData2 = array();

			if (mysqli_num_rows($tableResultParent2) > 0)  
			{
				$flag1 = 0;
				$flag2 = 0;
				while ($row = mysqli_fetch_assoc($tableResultParent2)) {
					if($row['isexpert'] == 1)
					{
						$flag1 = 1;				
					}
					else{
						$flag2 = 1;
					}
				}
				if($flag1 == 1 && $flag2 == 1)
				{
					$isexpertUser = 2;	
				}
				else if($flag1 == 1 && $flag2 != 1)
				{
					$isexpertUser = 1;	
				}
				else if($flag1 != 1 && $flag2 == 1)
				{
					$isexpertUser = 0;	
				}
				
			}
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
   <div class="alert alert-success connSuccess" style="display:block;margin-top: 5px;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  <span>Profile Updated Successfuly!</br> <?php if($tableResult == 1 && $changePWD == 1){echo "Password changed!Logging you out..</br>";}?></span> 
	</div>
	<?php }?>
	<div class="clearfix"></div>
    <div class="box-new-page">
       <div class="col-sm-6 text-xs-left">
        <p class="hder">My Profile Page</p>
      </div>
       <div class="col-xs-12 col-sm-4 deco">
        <button class="btn btn-cyan backToHome" >My Home Page</button>
      </div>
       <div class="col-xs-12 col-sm-2 deco">
        <button class="btn btn-close btn-blue-grey backTo"><i class="fa fa-close"></i></button>
      </div>
       <div class="clearfix"></div>
       <div class="m-t-2"></div>
       <form class="profile" id="profile" action="" method="post" enctype="multipart/form-data">
       <input type="hidden" name="uid" value="<?php echo $resultParentData['id'] ;?>">
       <input type="hidden" name="passwordChanged" class="passwordChanged" value="<?php echo ($tableResult == 1 && $changePWD == 1)?"1":"0"; ?>">
       
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
	if($(".passwordChanged").val() == 1)
	{setTimeout(function(){location.href="logout.php"}, 2000);}
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
