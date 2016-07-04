
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
			
//Get Sub specialization Data
$sql2="select * from 	sp_sub_specialisation where specialisation_id = 5 order by sub_specialisation";
			$tableResult2 = mysqli_query($conn, $sql2);
			//print_r($tableResult);
				$subspecialData = array();
			if (mysqli_num_rows($tableResult2) > 0)  
			{
				while($row = mysqli_fetch_assoc($tableResult2)) {
				$subspecialData[] = $row;
				}
			}
			
			
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
.block-bg{background:#fff;padding:10px 0px;position: fixed;
    top: 122px;
    width: 100%;
    z-index: 100000;}
	.header-part{position:fixed;z-index:100000;background:#E9E9EA;}
	.block-4-section{padding-top:260px;}
	.btn-search-2{background:#ff8003;border:0px;padding:7px 45px;color:#fff;transition:all ease-in-out 0.2s 0s;margin-top:20px;}
	.btn-search-2:hover{background:#697bff;color:#eaecff;}
	.radius0{border-radius:0px;}
	.display-list > li {
    width: 158px;
}
.display-list{margin:20px 0px;padding:0px}
 input[type="checkbox"] {
 display: none;
}
input[type="radio"] {
 display: none;
}
input[type="checkbox"] + label span {
 display: inline-block;
 width: 25px;
 height: 25px;
 margin: -1px 4px 0 0;
 vertical-align: middle;
 cursor: pointer;
 -moz-border-radius: 50%;
 border-radius: 50%;
 border:2px solid #a1bcff;
}
input[type="checkbox"] + label span {
 background-color: #fff;
}
input[type="checkbox"]:checked + label span {
 background-color: #707297;
}
input[type="radio"]:checked + label span {
 background-color: #EC2B8C;
}
input[type="checkbox"] + label span, input[type="radio"]:checked + label span {
 -webkit-transition: background-color 0.4s linear;
 -o-transition: background-color 0.4s linear;
 -moz-transition: background-color 0.4s linear;
 transition: background-color 0.4s linear;
}
input[type="radio"] + label span, input[type="radio"]:checked + label span {
 -webkit-transition: background-color 0.4s linear;
 -o-transition: background-color 0.4s linear;
 -moz-transition: background-color 0.4s linear;
 transition: background-color 0.4s linear;
}
.modifi-list-item-2{width:32%;display:inline-block;border:1px solid #a1a5ff;position:relative;transition:all 0.5s ease-in-out 0s;margin-right:5px;border-radius:3px;}
.block-text a {
    color: #7d71a3;
    display: inherit;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 14px;
    letter-spacing: 1px;
    margin: 25px 0 0 0;
    padding: 6px 0;
    text-transform: uppercase;
   border-bottom:1px solid #7d71a3;text-align:center; border-top:1px solid #7d71a3;}
   .checkbox label.my-label{margin:20px 0 0 0 !important;padding-left:0px;}
   .over{height:100%;width:100%;background:rgba(0,0,0,0.5);position:absolute;top:0;left:0;display:none;transition:all 05s ease-in-out 0s;}
   .modifi-list-item-2:hover .over{display:block;transition:all 02s ease-in-out 0s;}
   .title-name-2{font-size:17px;color:#60C;padding:10px 0px;letter-spacing:1px;text-transform:uppercase;margin-top:25px;background:#036;color:#fff;border-radius:3px;}
   .box-2{margin:15px 0px;border-bottom:2px dashed #eee;}
   
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
    
 <section class="block-bg">
<div class="container">
     <div class="row">
<div class="col-ms-10 col-sm-10 col-xs-12" style="padding:0px;">
<ul class="list-inline display-list">
<li><input type="text" class="form-control radius0" disabled value="Name"></li>
<li><input type="text" class="form-control radius0" disabled value="Name"></li>
<li><input type="text" class="form-control radius0" disabled value="Name"></li>
<li><input type="text" class="form-control radius0" disabled value="Name"></li>
<li><input type="text" class="form-control radius0" disabled value="Name"></li>
<li><input type="text" class="form-control radius0" disabled value="Name"></li>
<div class="clearfix"></div>
</ul>
</div>
<div class="col-ms-2 col-sm-2 col-xs-6">
<div class="text-center">
<button class="btn btn-default btn-search-2">Search</button>
</div>
</div>
<div class="clearfix"></div>
</div>
</div>

</section>
<section class="block-4-section">
<div class="container">
  <div class="row marginTOP" style="background:#fff;padding:15px 0px;margin:10px 0px;border-radius:5px;">
  <div class="box-2">
    <div class="col-md-3 col-xs-5 text-center">
    <p class="title-name-2">Expertish</p>
    </div>
    <div class="col-md-9 col-xs-7" style="padding:0;">
    <ul class="list-inline ">
              <li class="modifi-list-item-2">
                <div class="col-xs-4" style="padding:0;"><img src="images/img-3.jpg" class="img-responsive"></div>
                  <div class="col-xs-5" style="padding:0"><p class="block-text"><a href="" class="text-center">Medical</a></p></div>
                <div class="col-xs-2"><div class="checkbox padding30" id="checkdiv" style="display:block;">
    <input type="checkbox" name="dsetting" id="defaultcard" value="1" class="no-styles">       
    <label for="defaultcard" class="my-label"><span></span></label>
         <input type="hidden" name="paymentnonce" id="paymentnonce" value="" />
  </div>
</div>
<div class="over"></div>
              </li>
              <li class="modifi-list-item-2">
                <div class="col-xs-4" style="padding:0;"><img src="images/img-3.jpg" class="img-responsive"></div>
                  <div class="col-xs-5" style="padding:0;"><p class="block-text"><a href="" class="text-center">Medical</a></p></div>
                <div class="col-xs-2" style="padding-right:0px;"><div class="checkbox padding30" id="checkdiv" style="display:block;">
    <input type="checkbox" name="dsetting" id="1" value="1" class="no-styles">       
    <label for="1" class="my-label"><span></span></label>
         <input type="hidden" name="paymentnonce" id="1" value="" />
  </div>
</div>

              </li>
              <li class="modifi-list-item-2">
                <div class="col-xs-4" style="padding:0;"><img src="images/img-3.jpg" class="img-responsive"></div>
                  <div class="col-xs-5" style="padding:0;"><p class="block-text"><a href="" class="text-center">Medical</a></p></div>
                <div class="col-xs-2" style="padding-right:0px;"><div class="checkbox padding30" id="checkdiv" style="display:block;">
    <input type="checkbox" name="dsetting" id="10" value="1" class="no-styles">       
    <label for="10" class="my-label"><span></span></label>
         <input type="hidden" name="paymentnonce" id="10" value="" />
  </div>
</div>

              </li>
              <li class="modifi-list-item-2">
                <div class="col-xs-4" style="padding:0;"><img src="images/img-3.jpg" class="img-responsive"></div>
                  <div class="col-xs-5" style="padding:0;"><p class="block-text"><a href="" class="text-center">Medical</a></p></div>
                <div class="col-xs-2" style="padding-right:0px;"><div class="checkbox padding30" id="checkdiv" style="display:block;">
    <input type="checkbox" name="dsetting" id="20" value="1" class="no-styles">       
    <label for="20" class="my-label"><span></span></label>
         <input type="hidden" name="paymentnonce" id="20" value="" />
  </div>
</div>

              </li>
              <div class="clearfix"></div>
            </ul>
    </div>
    <div class="clearfix"></div>
  </div>
  
  <div class="box-2">
    <div class="col-md-3 col-xs-5 text-center">
    <p class="title-name-2">Expertish</p>
    </div>
    <div class="col-md-9 col-xs-7" style="padding:0;">
    <ul class="list-inline ">
              <li class="modifi-list-item-2">
                <div class="col-xs-4" style="padding:0;"><img src="images/img-3.jpg" class="img-responsive"></div>
                  <div class="col-xs-5" style="padding:0"><p class="block-text"><a href="" class="text-center">Medical</a></p></div>
                <div class="col-xs-2"><div class="checkbox padding30" id="checkdiv" style="display:block;">
    <input type="checkbox" name="dsetting" id="14" value="1" class="no-styles">       
    <label for="14" class="my-label"><span></span></label>
         <input type="hidden" name="paymentnonce" id="14" value="" />
  </div>
</div>
<div class="over"></div>
              </li>
              <li class="modifi-list-item-2">
                <div class="col-xs-4" style="padding:0;"><img src="images/img-3.jpg" class="img-responsive"></div>
                  <div class="col-xs-5" style="padding:0;"><p class="block-text"><a href="" class="text-center">Medical</a></p></div>
                <div class="col-xs-2" style="padding-right:0px;"><div class="checkbox padding30" id="checkdiv" style="display:block;">
    <input type="checkbox" name="dsetting" id="17" value="1" class="no-styles">       
    <label for="17" class="my-label"><span></span></label>
         <input type="hidden" name="paymentnonce" id="1" value="" />
  </div>
</div>

              </li>
              <li class="modifi-list-item-2">
                <div class="col-xs-4" style="padding:0;"><img src="images/img-3.jpg" class="img-responsive"></div>
                  <div class="col-xs-5" style="padding:0;"><p class="block-text"><a href="" class="text-center">Medical</a></p></div>
                <div class="col-xs-2" style="padding-right:0px;"><div class="checkbox padding30" id="checkdiv" style="display:block;">
    <input type="checkbox" name="dsetting" id="50" value="1" class="no-styles">       
    <label for="50" class="my-label"><span></span></label>
         <input type="hidden" name="paymentnonce" id="10" value="" />
  </div>
</div>

              </li>
              <li class="modifi-list-item-2">
                <div class="col-xs-4" style="padding:0;"><img src="images/img-3.jpg" class="img-responsive"></div>
                  <div class="col-xs-5" style="padding:0;"><p class="block-text"><a href="" class="text-center">Medical</a></p></div>
                <div class="col-xs-2" style="padding-right:0px;"><div class="checkbox padding30" id="checkdiv" style="display:block;">
    <input type="checkbox" name="dsetting" id="60" value="1" class="no-styles">       
    <label for="60" class="my-label"><span></span></label>
         <input type="hidden" name="paymentnonce" id="20" value="" />
  </div>
</div>

              </li>
            </ul>
    </div>
    <div class="clearfix"></div>
  </div>
  
  <div class="box-2">
    <div class="col-md-3 col-xs-5 text-center">
    <p class="title-name-2">Expertish</p>
    </div>
    <div class="col-md-9 col-xs-7" style="padding:0;">
    <ul class="list-inline ">
              <li class="modifi-list-item-2">
                <div class="col-xs-4" style="padding:0;"><img src="images/img-3.jpg" class="img-responsive"></div>
                  <div class="col-xs-5" style="padding:0"><p class="block-text"><a href="" class="text-center">Medical</a></p></div>
                <div class="col-xs-2"><div class="checkbox padding30" id="checkdiv" style="display:block;">
    <input type="checkbox" name="dsetting" id="defaultcard" value="1" class="no-styles">       
    <label for="defaultcard" class="my-label"><span></span></label>
         <input type="hidden" name="paymentnonce" id="paymentnonce" value="" />
  </div>
</div>
<div class="over"></div>
              </li>
              <li class="modifi-list-item-2">
                <div class="col-xs-4" style="padding:0;"><img src="images/img-3.jpg" class="img-responsive"></div>
                  <div class="col-xs-5" style="padding:0;"><p class="block-text"><a href="" class="text-center">Medical</a></p></div>
                <div class="col-xs-2" style="padding-right:0px;"><div class="checkbox padding30" id="checkdiv" style="display:block;">
    <input type="checkbox" name="dsetting" id="1" value="1" class="no-styles">       
    <label for="1" class="my-label"><span></span></label>
         <input type="hidden" name="paymentnonce" id="1" value="" />
  </div>
</div>

              </li>
              <li class="modifi-list-item-2">
                <div class="col-xs-4" style="padding:0;"><img src="images/img-3.jpg" class="img-responsive"></div>
                  <div class="col-xs-5" style="padding:0;"><p class="block-text"><a href="" class="text-center">Medical</a></p></div>
                <div class="col-xs-2" style="padding-right:0px;"><div class="checkbox padding30" id="checkdiv" style="display:block;">
    <input type="checkbox" name="dsetting" id="10" value="1" class="no-styles">       
    <label for="10" class="my-label"><span></span></label>
         <input type="hidden" name="paymentnonce" id="10" value="" />
  </div>
</div>

              </li>
              <li class="modifi-list-item-2">
                <div class="col-xs-4" style="padding:0;"><img src="images/img-3.jpg" class="img-responsive"></div>
                  <div class="col-xs-5" style="padding:0;"><p class="block-text"><a href="" class="text-center">Medical</a></p></div>
                <div class="col-xs-2" style="padding-right:0px;"><div class="checkbox padding30" id="checkdiv" style="display:block;">
    <input type="checkbox" name="dsetting" id="20" value="1" class="no-styles">       
    <label for="20" class="my-label"><span></span></label>
         <input type="hidden" name="paymentnonce" id="20" value="" />
  </div>
</div>

              </li>
            </ul>
    </div>
    <div class="clearfix"></div>
  </div>
 
  </div>
</section>




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
