<?php
include("config/connection.php");
include("imageresize/smart_resize_image.function.php");
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
    	$uploaded_file = '';
    	$member_id = $uid;
		     
		    if(isset($_FILES) && is_array($_FILES)) {

				$target_dir = "images/friendsFamily/";
				$imageFileType = pathinfo($_FILES['pImage']["name"],PATHINFO_EXTENSION);

				$target_file = $target_dir.$member_id.'.'.$imageFileType;
				unlink($target_file);
				$target_fileName = "friendsFamily/".$member_id.'.'.$imageFileType;

				//die($target_file);
				$uploadOk = 1;

				//indicate which file to resize (can be any type jpg/png/gif/etc...)
				$file = $_FILES['pImage']["tmp_name"];//'your_path_to_file/file.png';

				//indicate the path and name for the new resized file
				$resizedFile = $target_file;//'your_path_to_file/resizedFile.png';
									
				//call the function (when passing path to pic)
				if (smart_resize_image($file , null, "200" , "200" , false , $resizedFile , false , false ,100 )){	
					$uploaded_file = $target_file;
					$result['msg'] = "The Image ".$member_id. $target_fileName. " has been uploaded.";
					$result['imageName'] = $target_fileName;
					$sqlUpdate="update friendsRegister set image='".$target_file."' where id=".$member_id;
					$rsUpdate=mysqli_query($conn, $sqlUpdate);
					$passStr="Image Upload Successful.<br/>".$target_file;
				} else {
					$passStr="Sorry, there was an error uploading your Image.<br/>";
				}
			}
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
        <button class="btn btn-cyan backTo" >My Home Page</button>
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
		           <p>Listed as Expert<span class="check1"
		             <input type="radio" name="exp" id="Y" tabindex="7" <?php echo ($isexpertUser == 1)?"checked='checked'":"" ?>>
		             <label for="Y" >YES</label>
		             <input type="radio" id="N" name="exp" tabindex="8" <?php echo ($isexpertUser == 0)?"checked='checked'":"" ?>>
		             <label for="N" style="margin-right:20px">NO </label>
		             <input type="radio" id="B" name="exp" tabindex="9" <?php echo ($isexpertUser == 2)?"checked='checked'":"" ?>>
		             <label for="B">BOTH </label>
		             </span></p>
		         </div>
		        <div class=" main-block" style="padding-top:20px;">
		           <div class="col-xs-5" style="padding-right:0;padding-left:0;padding-top:20px;"> Expertise Listed As </div>
		           <div class="col-xs-6" style="padding-left:0">
		            <input id="form7 " autocomplete="false" class="form-control Ldate" name="expertiesData" tabindex="10" type="text" value="<?php echo $resultParentData['experties'] ;?>" placeholder="Data" style="margin:0;height:auto;">
		            <label for="form7"></label>
		          </div>
		         </div>
		        <!-- <div class=" main-block">
		           <div class="col-xs-5" style="padding-right:0;padding-left:0;padding-top:10px;"> User Name </div>
		           <div class="col-xs-6" style="padding-left:0">
		            <input id="form7 Ldate" class="form-control " name="" tabindex="10" type="text" value="" placeholder="Data" style="margin:0;height:auto;">
		            <label for="form7"></label>
		          </div>
		         </div> -->
		        <div class=" main-block">
		           <div class="col-xs-5" style="padding-right:0;padding-left:0;padding-top:10px;"> Password </div>
		           <div class="col-xs-6" style="padding-left:0">
		            <input id="form7 " autocomplete="false" class="form-control Ldate" name="pwds" tabindex="11" type="password" value="" placeholder="Data" style="margin:0;height:auto;">
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
		               <input placeholder="upload-img" id="pImage" class="form-control pImage " name="pImage"onchange="previewImage(this)" accept="image/*" type="file">
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
  
$(document).ready(function(){
	if($(".passwordChanged").val() == 1)
	{setTimeout(function(){location.href="logout.php"}, 2000);}
$(document).on("click",".backTo",function(){
window.history.back();
});
});

</script>
</body>
</html>
