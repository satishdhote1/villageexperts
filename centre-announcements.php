<?php session_start();
if(isset($_SESSION['logged_user_id']) && !empty($_SESSION['logged_user_id']))
{
$user_id = $_SESSION['logged_user_id'];
$user_name  = $_SESSION['logged_user_name'];
$user_pic = $_SESSION['logged_user_image'];
$user_type = $_SESSION['logged_role_code'];
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


//echo $imagePath ;die();
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
.over-lap{display:block !important}
</style>
<body class="bodybg">
<div class="container-fluid header-part">
  <div class="row">
    <div class="col-md-12 text-center">
      <div class="logo"> <img src="images/logo.png" alt="logo" > </div>
      <div class="over-lap">
        <div class="profile pull-left"> <img src="images/<?php echo $imagePath; ?><?php echo(!empty($user_pic))?$user_pic:"img-3.jpg"; ?>" class="img-responsive"> </div>
        <div class="pull-right">
          <p class="loginname">
          <?php
          if($user_type == 'SP'){
			 echo "Welcome Service Provider <br>".$user_name."!";  
		  }
		  else if($user_type == 'SR'){
			 echo "Welcome Service Requester <br>".$user_name."!";  
		  }
		   else if($user_type == 'GM'){
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

<div class="container bg-off-white">
<div class="row">
<div class="col-md-12"><h1 class="hder">Connect with.....</h1></div>
<div class="col-md-3">
<div class="col-1 text-center"><img src="images/img-1.jpg" class="img-responsive"> 
    <h2 class="connect text-center"><a class="navmenu" href="my-group.php">Friends & Family</a></h2> 
    <p class="over-lap-connect"><img alt="group" src="images/group.png"></p>
    </div>
    </div>
<?php  
//if($user_type == 'SP')

?>
<div class="col-md-3 <?php echo($user_type == 'SP' || $user_type == 'GM')? 'disabled-add tooltip-test" data-toggle="tooltip" title="This Tab may be accessed by Service Requester Only"':'"';?> >
<div class="col-1 text-center"><img src="images/img-2.jpg" class="img-responsive"> 
    <h2 class="connect text-center"><a class="navmenu  <?php echo($user_type != 'SR')? 'disabled-pointer':''?>" href="<?php echo($user_type == 'SR')?'existingProvider.php':''?> ">Existing Provider</a></h2> 
    <p class="over-lap-connect"><img alt="group" src="images/e-p.png"></p>
    </div>
    </div>
<div class="col-md-3 <?php echo($user_type == 'SP' || $user_type == 'GM')? 'disabled-add tooltip-test" data-toggle="tooltip" title="This Tab may be accessed by Service Requester Only"':'"';?> >
<div class="col-1 text-center"><img src="images/img-3.jpg" class="img-responsive"> 
    <h2 class="connect text-center"><a class="navmenu <?php echo($user_type != 'SR')? 'disabled-pointer':''?>" href="<?php echo($user_type == 'SR')?'newProvider.php':''?> " >New Provider</a></h2> 
    <p class="over-lap-connect"><img alt="group" src="images/n-p.png"></p>
    </div>
    </div>
    
<div class="col-md-3 <?php echo($user_type == 'SP' || $user_type == 'GM')? 'disabled-add tooltip-test" data-toggle="tooltip" title="This Tab may be accessed by Service Requester Only"':'"';?> >
<div class="col-1 text-center"><img src="images/Search-icon.png" class="img-responsive"> 
    <h2 class="connect text-center"><a class="navmenu  <?php echo($user_type != 'SR')? 'disabled-pointer':''?>" href="<?php echo($user_type == 'SR')?'searchProvider.php':''?>">Search Provider</a></h2> 
    <p class="over-lap-connect"><img alt="group" src="images/s-p.png"></p>
    </div>
    </div>
  <?php  


?>  
    
    </div>
</div>
<!-- jQuery Version 1.11.1 --> 
<script src="js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script>
</body>
</html>


<?php
}
else
{
	header("Refresh: 3; url=index.php");
		echo '<center><h1 style="color:red">You are not autorized.Redirecting....</h1></center>';
}

?>
