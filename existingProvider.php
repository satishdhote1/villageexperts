<?php
include("config/connection.php");
session_start();
if(isset($_SESSION['logged_user_id']) && !empty($_SESSION['logged_user_id']))
{
$conn=new connections();
$conn=$conn->connect();
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

/*
//Get specialization Data
$sql="select * from 	sp_specialisation order by specialisation";
			$tableResult = mysqli_query($conn, $sql);
			//print_r($tableResult);

				$specialData = array();
			if (mysqli_num_rows($tableResult) > 0)  
			{
				while($row = mysqli_fetch_assoc($tableResult)) {
				$specialData[] = $row;
				}
			}
	*/
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
<div class="loader-exp" style="display:none;">
<p><img src="images/ajax-loader.gif"></p>
</div>
<div class="container-fluid header-part">
  <div class="row">
    <div class="col-md-12 text-center">
      <div class="logo"> <img src="images/logo.png" alt="logo" > </div>
      <div class="over-lap">
        <div class="profile pull-left"> <img src="images/<?php echo $imagePath; ?><?php echo (!empty($user_pic))?$user_pic:"img-3.jpg"; ?>" class="img-responsive"> </div>
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
          <button class="btn btn-info bg-blue">Logout</button>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    </div>
    </div>
    



<div class="container search-background margin-top60">
  <div class="row marginTOP">
    <div class="col-md-12 text-center">
      <h1 class="result-text">Result</h1>
      <div class="background-blue">
      <table class="table table-hover">
  <thead>
    <tr class="hder-modify-table">
      <th width="14.2%">Image</th>
      <th width="14.2%">Name</th>
      <th width="14.2%">Expertish</th>
      <th width="14.2%">Specialization</th>
      <th width="14.2%">Experience</th>
       <th width="14.2%">Rate/Hr</th>
        <th width="14.2%">Language</th>
        <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td align="center"><div class="result-profile"><img src="images/img-3.jpg"></div></td>
      <td>Ram Sing</td>
      <td>Madical</td>
      <td>Cardiac</td>
      <td>5</td>
       <td>$40</td>
       <td>English</td>
       <td><p class="connect-btn btn">Connect</p></td>
     
       
    </tr>
    <tr>
      <td align="center"><div class="result-profile"><img src="images/img-3.jpg"></div></td>
      <td>Ram Sing</td>
      <td>Madical</td>
      <td>Cardiac</td>
      <td>5</td>
       <td>$40</td>
       <td>English</td>
       <td><p class="connect-btn btn">Connect</p></td>
     
       
    </tr>
   <tr>
      <td align="center"><div class="result-profile"><img src="images/img-3.jpg"></div></td>
      <td>Ram Sing</td>
      <td>Madical</td>
      <td>Cardiac</td>
      <td>5</td>
       <td>$40</td>
       <td>English</td>
       <td><p class="connect-btn btn">Connect</p></td>
     
       
    </tr>
    <tr>
      <td align="center"><div class="result-profile"><img src="images/img-3.jpg"></div></td>
      <td>Ram Sing</td>
      <td>Madical</td>
      <td>Cardiac</td>
      <td>5</td>
       <td>$40</td>
       <td>English</td>
       <td><p class="connect-btn btn">Connect</p></td>
     
       
    </tr>
    <tr>
      <td align="center"><div class="result-profile"><img src="images/img-3.jpg"></div></td>
      <td>Ram Sing</td>
      <td>Madical</td>
      <td>Cardiac</td>
      <td>5</td>
       <td>$40</td>
       <td>English</td>
       <td><p class="connect-btn btn">Connect</p></td>
     
       
    </tr>
    <tr>
      <td align="center"><div class="result-profile"><img src="images/img-3.jpg"></div></td>
      <td>Ram Sing</td>
      <td>Madical</td>
      <td>Cardiac</td>
      <td>5</td>
       <td>$40</td>
       <td>English</td>
       <td><p class="connect-btn btn">Connect</p></td>
     
       
    </tr>
    <tr>
      <td align="center"><div class="result-profile"><img src="images/img-3.jpg"></div></td>
      <td>Ram Sing</td>
      <td>Madical</td>
      <td>Cardiac</td>
      <td>5</td>
       <td>$40</td>
       <td>English</td>
       <td><p class="connect-btn btn">Connect</p></td>
     
       
    </tr>
    <tr>
      <td align="center"><div class="result-profile"><img src="images/img-3.jpg"></div></td>
      <td>Ram Sing</td>
      <td>Madical</td>
      <td>Cardiac</td>
      <td>5</td>
       <td>$40</td>
       <td>English</td>
       <td><p class="connect-btn btn">Connect</p></td>
     
       
    </tr>
    <tr>
      <td align="center"><div class="result-profile"><img src="images/img-3.jpg"></div></td>
      <td>Ram Sing</td>
      <td>Madical</td>
      <td>Cardiac</td>
      <td>5</td>
       <td>$40</td>
       <td>English</td>
       <td><p class="connect-btn btn">Connect</p></td>
     
       
    </tr>
    <tr>
      <td align="center"><div class="result-profile"><img src="images/img-3.jpg"></div></td>
      <td>Ram Sing</td>
      <td>Madical</td>
      <td>Cardiac</td>
      <td>5</td>
       <td>$40</td>
       <td>English</td>
       <td><p class="connect-btn btn">Connect</p></td>
     
       
    </tr>
    <tr>
      <td align="center"><div class="result-profile"><img src="images/img-3.jpg"></div></td>
      <td>Ram Sing</td>
      <td>Madical</td>
      <td>Cardiac</td>
      <td>5</td>
       <td>$40</td>
       <td>English</td>
       <td><p class="connect-btn btn">Connect</p></td>
     
       
    </tr>
     </tbody>
</table>
       <div style="margin:20px 0px"><a class="navmenu btn-connect" href="#"><span><i class="fa fa-link"></i></span>Connect</a></div>
      </div>
    </div>
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
	$passStr = 'You are not authorized.Redirecting....';
	$passImg = 'groupPhotos/img-3.jpg';
	header("location:well-come.php?passStr=$passStr&passImg=$passImg&redirect=index");
}
?>

