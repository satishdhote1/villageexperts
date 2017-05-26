<?php
include("config/connection.php");
session_start();
$conn=new connections();
$conn=$conn->connect();


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
	$pwd = isset($_REQUEST['pwds'])?$_REQUEST['pwds']:'';
$sql="";
if(!empty($pwd))
{
	$sql="update friendsRegister set fname = '".ucwords($fname)."',lname = '".ucwords($lname)."', city = '".$m_city."',country = '".$m_country."',phone = '".$m_mobile."',email = '".$m_email."',pwd = '".md5($pwd)."' where id = ".$uid;
}
else
{
	$sql="update friendsRegister set fname = '".ucwords($fname)."',lname = '".ucwords($lname)."', city = '".$m_city."',country = '".$m_country."',phone = '".$m_mobile."',email = '".$m_email."' where id = ".$uid;
}
    $tableResult = mysqli_query($conn, $sql);
    print_r($tableResult);
}



$sqlParent = "select * from friendsRegister where email = '".$_SESSION['logged_user_email']."'";
       $tableResultParent = mysqli_query($conn, $sqlParent);
       $resultParentData = array();
       $resultParent = '';
       if (mysqli_num_rows($tableResultParent) > 0)  
      {
        $resultParentData  = mysqli_fetch_assoc($tableResultParent);
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
   <div class="alert alert-success connSuccess" style="display:none;margin-top: 10px;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  <span>Profile Updated Successfuly!</span> 
	</div>
	<div class="clearfix"></div>
    <div class="box-new-page">
       <div class="col-sm-6 text-xs-left">
        <p class="hder">My Profile Page</p>
      </div>
       <div class="col-xs-12 col-sm-4 deco">
        <button class="btn btn-cyan backTo" >My Home Page</button>
      </div>
       <div class="col-xs-12 col-sm-2 deco">
        <button class="btn btn-close btn-blue-grey backTo"><i class="fa fa-close"></i></button>
      </div>
       <div class="clearfix"></div>
       <div class="m-t-2"></div>
       <form class="profile" id="profile" action="" method="post" enctype="multipart/form-data">
       <input type="hidden" name="uid" value="<?php echo $resultParentData['id'] ;?>">
		       <div class="col-md-6 col-xs-12">
		        <div class=" main-block"> <i class="fa fa-user prefix"> <span>First Name </span></i>
		           <input id="fname" class="form-control fname" name="fname" tabindex="1" type="text" value="<?php echo $resultParentData['fname'] ;?>" placeholder="Data">
		           <label for="fname"></label>
		         </div>
		      </div>
		       <div class="col-md-6 col-xs-12">
		        <div class=" main-block"> <i class="fa fa-user prefix"> <span> Last Name</span> </i>
		           <input id="form4 lname" class="form-control lname" name="lname" tabindex="2" type="text" value="<?php echo $resultParentData['lname'] ;?>" placeholder="Data">
		           <label for="form4"></label>
		         </div>
		      </div>
		       <div class="col-md-6 col-xs-12">
		        <div class=" main-block"> <i class="fa fa-envelope prefix"> <span>email</span> </i>
		           <input id="email" class="form-control email" name="email" tabindex="3" type="text" value="<?php echo $resultParentData['email'] ;?>" placeholder="Data">
		           <label for="email"></label>
		         </div>
		      </div>
		       <div class="col-md-6 col-xs-12">
		        <div class="main-block"> <i class="fa fa-phone prefix"><span> Mobile</span></i>
		           <input id="form7 phone" class="form-control mobile" name="phone" tabindex="4" type="text" value="<?php echo $resultParentData['phone'] ;?>" placeholder="Data">
		           <label for="form7"></label>
		         </div>
		      </div>
		       <div class="col-md-6 col-xs-12">
		        <div class=" main-block"> <i class="fa fa-map-marker prefix"><span> City</span></i>
		           <input id="form5 city" class="form-control city" name="city" tabindex="5" type="text" value="<?php echo $resultParentData['city'] ;?>" placeholder="Data">
		           <label for="form5"></label>
		         </div>
		      </div>
		       <div class="col-md-6 col-xs-12">
		        <div class=" main-block"> <i class="fa fa-flag prefix"><span> country</span></i>
		           <input id="form6 city" class="form-control city" name="country" tabindex="6" type="text" value="<?php echo $resultParentData['country'] ;?>" placeholder="Data">
		           <label for="form6"></label>
		         </div>
		      </div>
		       <div class="col-md-6 col-xs-12">
		        <div class="radio">
		           <p>Listed as Expert<span class="check1">
		             <input type="radio" name="exp" id="Y" tabindex="7">
		             <label for="Y" style="margin-right:20px">YES</label>
		             <input type="radio" id="N" name="exp" tabindex="8">
		             <label for="N">NO </label>
		             </span></p>
		         </div>
		        <div class=" main-block" style="padding-top:20px;">
		           <div class="col-xs-5" style="padding-right:0;padding-left:0;padding-top:20px;"> Expertise Listed As </div>
		           <div class="col-xs-6" style="padding-left:0">
		            <input id="form7 " class="form-control Ldate" name="" tabindex="9" type="text" value="" placeholder="Data" style="margin:0;height:auto;">
		            <label for="form7"></label>
		          </div>
		         </div>
		        <div class=" main-block">
		           <div class="col-xs-5" style="padding-right:0;padding-left:0;padding-top:10px;"> User Name </div>
		           <div class="col-xs-6" style="padding-left:0">
		            <input id="form7 Ldate" class="form-control " name="" tabindex="10" type="text" value="" placeholder="Data" style="margin:0;height:auto;">
		            <label for="form7"></label>
		          </div>
		         </div>
		        <div class=" main-block">
		           <div class="col-xs-5" style="padding-right:0;padding-left:0;padding-top:10px;"> Password </div>
		           <div class="col-xs-6" style="padding-left:0">
		            <input id="form7 " class="form-control Ldate" name="pwds" tabindex="11" type="password" value="" placeholder="Data" style="margin:0;height:auto;">
		            <label for="form7"></label>
		          </div>
		         </div>
		      </div>
		       <div class="col-xs-12 col-sm-6">
		        <div class="main-block row">
		           <div class="col-xs-5">
		            <div class="userpro"> <img src="<?php echo !empty($resultParentData['image'])?$resultParentData['image']:'images/profile.jpg' ;?>" id="preview"> </div>
		          </div>
		           <div class="col-xs-7">
		            <div class=""> <i class="fa prefix"></i>
		               <p class="chang-text">Change Image </p>
		               <input placeholder="upload-img" id="pImage" class="form-control pImage " name="pImage" type="file">
		             </div>
		          </div>
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
  
$(document).on("click",".backTo",function(){
window.history.back();
});

</script>
</body>
</html>
