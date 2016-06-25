<?php 
include("config/connection.php");
session_start();

//if(isset($_SESSION['logged_user_id']) && !empty($_SESSION['logged_user_id']))
//{
/*$user_id = $_SESSION['logged_user_id'];
$user_name  = $_SESSION['logged_user_name'];
$user_pic = $_SESSION['logged_user_image'];
$userType = $_SESSION['logged_role_code'];*/

$conn=new connections();
$conn=$conn->connect();
$member_id = isset($_REQUEST['member_id'])? $_REQUEST['member_id'] : 0;
$memberName = isset($_REQUEST['memberName'])? $_REQUEST['memberName'] : '';
$email = isset($_REQUEST['email'])? $_REQUEST['email'] : '';

$sql="SELECT * FROM group_member where  gm_id = ".$member_id." AND status='N'";
$resultData = mysqli_query($conn, $sql);
$memberData = array();$img='img-3.jpg';
if (mysqli_num_rows($resultData) > 0)  
{
	$memberData = mysqli_fetch_assoc($resultData);
	$img = !empty($memberData['gm_image'])?$memberData['gm_image']:$img;
	/* echo "<br><pre>";
	 print_r($groupsList);
	 echo "</pre><br>";
	*/
}
else
{
	header("Refresh: 5; url=index.php");
	echo '<center><h1 style="color:red">You are not authorized to go through this process!<br>
	Because this member does\'t exist or already registered!<br>Redirecting....</h1></center>';
}
$memberName =!empty($memberData['gm_name'])?$memberData['gm_name']:$memberName;
$email =!empty($memberData['gm_email'])?$memberData['gm_email']:$email;
$phone =!empty($memberData['gm_phone'])?$memberData['gm_phone']:'';
//$gm_group_id =!empty($memberData['gm_group_id'])?$memberData['gm_group_id']:'';
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
	display: block !important
}
</style>
<body class="bodybg">
<div class="container-fluid header-part">
  <div class="row">
    <div class="col-md-12 text-center">
      <div class="logo"> <img src="images/logo.png" alt="logo" > </div>
      <div class="over-lap">
        <div class="profile pull-left"> <img src="images/uploads/<?php echo (!empty($user_pic))?$user_pic:"img-3.jpg"; ?>" class="img-responsive"  id="previewLogo"> </div>
        <div class="pull-right">
          <p class="loginname"><?php echo "Welcome Guest!"/*$user_name*/;  ?></p>
          <div class=""><a href="index.php" class="btn btn-info bg-blue logout">Login</a></div>
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
            <h1 class="hder">Complete Member Registration </h1>
        <form name="newMember" id="newMember" method="post" action="add-new-member-next-save.php" enctype="multipart/form-data">
          <div class="row witdh-modify">
            <div class="col-sm-6">
              <div class="form-group form-group-gap">
                <input type="hidden" class="member_id" name="member_id" value="<?php echo $member_id; ?>">
                <input type="hidden" class="memberName" name="memberName" value="<?php echo $memberName; ?>">
                <input type="hidden" class="Email" name="Email" value="<?php echo $email; ?>">
               <?php /*?> <input type="hidden" class="gm_group_id" name="gm_group_id" value="<?php echo $gm_group_id; ?>"><?php */?>
                <label class="col-sm-3 control-label" for="firstname">Member Name *</label>
                <div class="col-sm-9">
                  <input type="text" value="<?php echo $memberName; ?>" disabled  id="member-Name" placeholder="member-Name" class="form-control dorder0" name="memberName">
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="form-group form-group-gap">
                <label class="col-sm-3 control-label" for="firstname">Email *</label>
                <div class="col-sm-9">
                  <input type="text" value="<?php echo $email; ?>"  disabled id="email" placeholder="Email" class="form-control dorder0 email" name="Email">
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="form-group form-group-gap">
                <label class="col-sm-3 control-label" for="Mobile Number">Mobile Number</label>
                <div class="col-sm-9">
                  <input type="text" value="<?php echo $phone; ?>"  id="mobileNo" placeholder="Mobile-Nuber" class="form-control dorder0 mobileNo" name="mobileNo">
                </div>
                <div class="clearfix"></div>
              </div>
              
              <div class="form-group form-group-gap">
                <label class="col-sm-3 control-label" for="firstname">Password*</label>
                <div class="col-sm-9">
                  <input type="password" value="" id="pwd" placeholder="Password" class="form-control dorder0 pwd" name="pwd">
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="form-group form-group-gap">
                <label class="col-sm-3 control-label" for="firstname">Confirm Password*</label>
                <div class="col-sm-9">
                  <input type="password" value="" id="cpwd" placeholder="Confirm Password" class="form-control dorder0 cpwd" name="cpwd">
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="form-group form-group-gap">
                <label class="col-sm-3 control-label" for="description">Upload Image</label>
                <div class="col-sm-9">
                  <input type="file" value="" placeholder="upload-img" class="form-control dorder0 ppdding0" size="40" id="photo" name="file" onchange="previewImage(this)" accept="image/*">
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="upload-img-block"> <img width="150" height="150" src="images/memberPhotos/<?php echo $img; ?>" id="preview"> </div>
              <div>
                <input type="submit" class="group-submit" value="Complete Registration" id="submit" name="submit">
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
<script src="js/instantImageShow.js"></script>
</body>
</html>
<?php
/*}
else
{
	header("Refresh: 3; url=index.php");
		echo '<center><h1 style="color:red">You are not autorized.Redirecting....</h1></center>';
}       
*/           
    
   
          
          
          
         