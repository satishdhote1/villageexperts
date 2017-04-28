<?php 
include("config/connection.php");
session_start();


if(isset($_SESSION['logged_user_id']) && !empty($_SESSION['logged_user_id']))
{
$user_id = $_SESSION['logged_user_id'];
$user_name  = $_SESSION['logged_user_name'];
$user_pic = $_SESSION['logged_user_image'];
$userType = $_SESSION['logged_role_code'];

if($_SESSION['logged_role_code']=='SP')
{
	$imagePath = "SP_Photos/";
}
else if($_SESSION['logged_role_code']=='SR')
{
	$imagePath = "SR_Photos/";
}
else if($_SESSION['logged_role_code']=='GM')
{
	$imagePath = "memberPhotos/";
}
else
$imagePath = "/";
$conn=new connections();
$conn=$conn->connect();
$getGM_id = isset($_REQUEST['gmID'])? $_REQUEST['gmID'] : 0;
$getgroupName = isset($_REQUEST['groupName'])? $_REQUEST['groupName'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>village expart</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/mainstyle.css" rel="stylesheet">
</head>
<style>
.over-lap {
	display: block !important
}
</style>
<body class="bodybg">
<div class="container-fluid header-part">
  <div class="row">
    <div class="col-md-12 text-center">
      <div class="logo"> <img src="images/logo.png" alt="logo" > </div>
      <div class="over-lap">
        <div class="profile pull-left"> <img src="images/<?php echo $imagePath; ?><?php echo (!empty($user_pic))?$user_pic:"img-3.jpg"; ?>" class="img-responsive"> </div>
        <div class="pull-right">
          <p class="loginname">
          
          <?php
          if($userType == 'SP'){
			 echo "Welcome Service Provider <br>".$user_name."!";  
		  }
		  else if($userType == 'SR'){
			 echo "Welcome Service Requester <br>".$user_name."!";  
		  }
		   else if($userType == 'GM'){
			 echo "Welcome Group Member <br>".$user_name."!";  
		  }
		  
		  ?>
          </p>
          <div class=""><a href="logout.php" class="btn btn-info bg-blue logout">Logout</a></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="add-new">
        <h1 class="hder">Member Registration<span class="icon-overlap"><img src="images/icon-logo.png"></span></h1>
        <form name="newMember" id="newMember" method="post" action="add-new-member-save.php" enctype="multipart/form-data">
          <div class="row witdh-modify">
            <div class="col-sm-6">
              <div class="form-group form-group-gap">
                <input type="hidden" class="gmID" name="gmID" value="<?php echo $getGM_id; ?>">
                <input type="hidden" class="groupName" name="groupName" value="<?php echo $getgroupName; ?>">
                <label class="col-sm-3 control-label" for="firstname">Member Name *</label>
                <div class="col-sm-9">
                  <input type="text" value="" id="member-Name" placeholder="Member Name" class="form-control dorder0" name="memberName">
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="form-group form-group-gap">
                <label class="col-sm-3 control-label" for="Mobile Number">Mobile Number</label>
                <div class="col-sm-9">
                  <input type="text" value="" id="mobileNo" placeholder="Mobile-Number" class="form-control dorder0 mobileNo" name="mobileNo">
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="form-group form-group-gap">
                <label class="col-sm-3 control-label" for="firstname">Email *</label>
                <div class="col-sm-9">
                  <input type="text" value="" id="GMemail" placeholder="Email" class="form-control dorder0 GMemail" name="Email">
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div>
                <input type="submit" class="group-submit" value="Register Member" id="submit" name="submit">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- jQuery Version 1.11.1 --> 
<script src="js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script>
<script src="js/connectMe.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/formSubmission.js"></script> 
<!--<script src="js/instantImageShow.js"></script>-->

</body>
</html>
<?php
}
else
{
	header("Refresh: 3; url=index.php");
		echo '<center><h1 style="color:red">You are not autorized.Redirecting....</h1></center>';
}
