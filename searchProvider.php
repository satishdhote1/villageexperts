
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
			
					//Get Sub Degree Data
$sql3="select * from 	education ORDER BY EducationID";
			$tableResult3 = mysqli_query($conn, $sql3);
			//print_r($tableResult);

				$education = array();
			if (mysqli_num_rows($tableResult3) > 0)  
			{
				while($row = mysqli_fetch_assoc($tableResult3)) {
				$education[] = $row;
				}
			}



			//Get Sub specialization Data
$sql4="select * from 	experience ORDER BY ExperienceID";
			$tableResult4 = mysqli_query($conn, $sql4);
			//print_r($tableResult);

				$experience = array();
			if (mysqli_num_rows($tableResult4) > 0)  
			{
				while($row = mysqli_fetch_assoc($tableResult4)) {
				$experience[] = $row;
				}
			}
			
			//Get Sub Language Data
$sql5="select * from 	sp_language ORDER BY languages";
			$tableResult5 = mysqli_query($conn, $sql5);
			//print_r($tableResult);

				$language = array();
			if (mysqli_num_rows($tableResult5) > 0)  
			{
				while($row = mysqli_fetch_assoc($tableResult5)) {
				$language[] = $row;
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
<title>Village Expert</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/mainstyle.css" rel="stylesheet">
<link href="js/rangeslider.js-2.1.1/rangeslider.css" rel="stylesheet">
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
	.btn-search-2{background:#ff8003;border:0px;padding:7px 45px;color:#fff;transition:all ease-in-out 0.2s 0s;margin-top:28%;/*20px;*/}
	.btn-search-2:hover{background:#697bff;color:#eaecff;}
	.btn-search-3 {width:50%;background: #ff8003; border: 0px;padding: 5px 41px;color: #fff;transition: all ease-in-out 0.2s 0s;font-size:26px;}
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
 /*background-color: #707297;*/
}
input[type="radio"]:checked + label span {
 /*background-color: #EC2B8C;*/
}

input[type="checkbox"] + label span, input[type="radio"]:checked + label span {
 /*-webkit-transition: background-color 0.4s linear;
 -o-transition: background-color 0.4s linear;
 -moz-transition: background-color 0.4s linear;
 transition: background-color 0.4s linear;*/
}
input[type="radio"] + label span, input[type="radio"]:checked + label span {
 -webkit-transition: background-color 0.4s linear;
 -o-transition: background-color 0.4s linear;
 -moz-transition: background-color 0.4s linear;
 transition: background-color 0.4s linear;
}
.modifi-list-item-2{width:19%;display:inline-block;border:1px solid #a1a5ff;position:relative;transition:all 0.5s ease-in-out 0s;margin-right:5px;border-radius:3px;margin-bottom:15px;}
.block-text{margin:0px;}
.block-text a {
    color: #7d71a3;
    display: inherit;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 14px;
    letter-spacing: 1px;
    margin: 0px 0 0 0;
    padding: 6px 0;
    text-transform: uppercase;
   border-bottom:1px solid #7d71a3;text-align:center; border-top:1px solid #7d71a3; min-height:70px;
    max-height: 70px;
    overflow: hidden;
   
  }
   .checkbox label.my-label{margin:0px 0 0 0 !important;padding-left:0px;}
   .over{height:100%;width:100%;background:rgba(0,0,0,0.5);position:absolute;top:0;left:0;display:block;transition:all 05s ease-in-out 0s;}
   .modifi-list-item-2:hover{background:rgba(0,0,0,0.1);}
   .modifi-list-item-2:hover .over{display:block;transition:all 02s ease-in-out 0s;}
   .back-ground{background:#036;border-radius:5px;}
   .title-name-2{font-size:17px;color:#60C;padding:10px 0px;letter-spacing:1px;text-transform:uppercase;margin-top:0px/*25px*/;color:#fff;border-radius:3px;}
   .box-2{margin:15px 0px 25px 0px;border-bottom:2px dashed #999;}
.checkbox-icon {
    height: 140px;
    margin: 20px auto;
   
    overflow: hidden;
    width: 140px;
	border-radius:50%;
}
   .checkbox-icon img{width:100%;height:100%;}
   input[type="text"]{color:#f93;}
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
          <div class=""><a href="logout.php" class="btn btn-info bg-blue logout">Logout</a></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    </div>
    </div>
    
 <section class="block-bg">
<div class="container">
     <div class="row">
 <form action="result.php?source=searchProvider" method="post" name="search" id="search"  style="color:#afba00;">
<div class="col-ms-10 col-sm-10 col-xs-12" style="padding:0px;">
<ul class="list-inline display-list" >
<li>
	<label class="providerLabel">EXPERTISE</label>
<input type="text" placeholder="Expertise" readonly class="form-control radius0 specialisation" value="" name="specialisation" style="color:#f93a">
<input type="hidden" readonly class="SpecialisationIDS" value="" name="SpecialisationIDS">	
</li>
<li>
<label class="providerLabel">SUB SPECIALISATION</label>
<input type="text"  placeholder="Sub Specialization"readonly class="subSpecial form-control radius0" value="" name="subSpecial">
<input type="hidden" readonly class="SubSpecialIDS" value="" name="SubSpecialIDS">
</li>
<li>
	<label class="providerLabel">DEGREE</label>
	<input type="text" placeholder="Degree" readonly class="degree form-control radius0" value="" name="degree">
        <input type="hidden" readonly class="DegreeIDS" value="" name="DegreeIDS">
</li>
<li>
	<label class="providerLabel">LANGUAGE</label>
	 <input type="text" placeholder="Language" readonly class="language form-control radius0" value="" name="language">
          <input type="hidden" readonly class="LanguageIDS" value="" name="LanguageIDS">
</li>
<li>
	<label class="providerLabel">EXPERIENCE</label>
	<input type="text" placeholder="Experience" readonly class="experience form-control radius0" value="" name="experience">
        <input type="hidden" readonly class="ExperienceIDS" value="" name="ExperienceIDS">
</li>
<li>
	<label class="providerLabel">RATE/HOUR</label>
	<input type="text"  placeholder="Rate Per Hour"readonly class="rate form-control radius0" value="" name="rate">
	<input type="hidden" readonly class="RateIDS" value="" name="RateIDS">
</li>
<div class="clearfix"></div>
</ul>
</div>
<div class="col-ms-2 col-sm-2 col-xs-6">
<div class="text-center">
<button type="submit" class="btn btn-default btn-search-2">Search</button>
</div>
</div>
</form>
<div class="clearfix"></div>
</div>
</div>

</section>
<section class="block-4-section">
<div class="container">
  <div class="row marginTOP" style="background:#ffffaa;/*#fff;*/padding:15px 0px;margin:10px 0px;border-radius:5px;">
 <!-- set expertise-->
  <div class="box-2">
    <div class="col-md-3 col-xs-5 text-center">
    <div class="back-ground">
    <p class="title-name-2">Expertise</p>
    </div>
    </div>
    <div class="col-md-9 col-xs-7" style="padding:0;">
    <ul class="list-inline specialData">
    		 <?php foreach($specialData as $specialDatas) { ?>
              <li class="modifi-list-item-2 expertiesLabel" id="<?php echo $specialDatas['specialisation_id']; ?>" for="<?php echo $specialDatas['specialisation_id']; ?>" dir="<?php echo $specialDatas['specialisation']; ?>">
                <div class="col-xs-12 text-center" style="padding:0;"><div class="checkbox-icon">
        <img src="images/specialization/<?php echo !empty($specialDatas['images'])?$specialDatas['images']:"img-3.jpg"; ?>"> </div></div>
                 <div class="col-xs-12" style="padding:0"><p class="block-text"><a href="javascript:void(0);" class="text-center"><?php echo $specialDatas['specialisation']; ?></a></p></div>
                  <!--<div class="col-xs-12 text-center">
                    <div class="checkbox padding30" id="checkdiv" style="display:block;margin:7px 0px">
                      <input type="checkbox" name="checkExp[1][]" id="checkExp" value="1" class="no-styles">       
                      <label for="expert<?php echo $specialDatas['specialisation_id']; ?>" class="my-label"><span class="expertiesLabel" id="expertiesLabel" for="<?php echo $specialDatas['specialisation_id']; ?>" dir="<?php echo $specialDatas['specialisation']; ?>"></span></label>
                     <input type="hidden" name="paymentnonce" id="paymentnonce" value="" />
				   </div>
				 </div>-->
			    <div class="setHooverExprt<?php echo $specialDatas['specialisation_id']; ?> removeExp" id=""></div>
              </li>
              <?php } ?>
              <div class="clearfix"></div>
            </ul>
    </div>
    <div class="clearfix"></div>
  </div>
<!-- set Sub Specialization-->
  <div class="box-2 moveSubSpecial">
    <div class="col-md-3 col-xs-5 text-center">
    <div class="back-ground">
    <p class="title-name-2">Sub Specialization</p>
    </div>
    </div>
    <div class="col-md-9 col-xs-7" style="padding:0;">
    <ul class="list-inline setSubSpecialData">
              <?php foreach($subspecialData as $subspecialDatas) { ?>
              <li class="modifi-list-item-2 subExpertiesLabel" id="<?php echo $subspecialDatas['sub_specialisation_id']; ?>" for="<?php echo $subspecialDatas['sub_specialisation_id']; ?>" dir="<?php echo $subspecialDatas['sub_specialisation']; ?>">
                <div class="col-xs-12  text-center" style="padding:0;"><div class="checkbox-icon"><img  src="images/SubSpecialization/<?php echo !empty($subspecialDatas['SubSpImages'])?$subspecialDatas['SubSpImages']:"img-3.jpg"; ?>"></div></div>
                 <div class="col-xs-12 text-center" style="padding:0"><p class="block-text"><a href="javascript:void(0);" class="text-center"><?php echo $subspecialDatas['sub_specialisation']; ?></a></p></div>
                  <!--<div class="col-xs-12 text-center">
                    <div class="checkbox padding30" id="checkdiv" style="display:block;margin:7px 0px">
                      <input type="checkbox" name="subSpecial[1][]" id="subSpecial" value="1" class="no-styles">       
                      <label for="subSpecial<?php echo $subspecialDatas['sub_specialisation_id']; ?>" class="my-label"><span class="subExpertiesLabel" id="subExpertiesLabel" for="<?php echo $subspecialDatas['sub_specialisation_id']; ?>" dir="<?php echo $subspecialDatas['sub_specialisation']; ?>"></span></label>
                     <input type="hidden" name="paymentnonce" id="paymentnonce" value="" />
				   </div>
				 </div>-->
			    <div class="setHooverSubExprt<?php echo $subspecialDatas['sub_specialisation_id']; ?> removeSubExp" id=""></div>
              </li>
              <?php } ?>
              <div class="clearfix"></div>
            </ul>
    </div>
    <div class="clearfix"></div>
  </div>
  <!-- set Degree-->
  <div class="box-2 moveDegree">
    <div class="col-md-3 col-xs-5 text-center">
    <div class="back-ground">
    <p class="title-name-2">Degree</p>
    </div>
    </div>
    <div class="col-md-9 col-xs-7" style="padding:0;">
    <ul class="list-inline ">
              <?php foreach($education as $educationDatas) { ?>
              <li class="modifi-list-item-2 degreeLabel" id="<?php echo $educationDatas['EducationID']; ?>" for="<?php echo $educationDatas['EducationID']; ?>" dir="<?php echo $educationDatas['Education']; ?>" >
                <div class="col-xs-12 text-center" style="padding:0;"><div class="checkbox-icon">
                <img src="images/education/<?php echo !empty($educationDatas['Image'])?$educationDatas['Image']:"img-3.jpg"; ?>" class=""></div></div>
                 <div class="col-xs-12 text-center" style="padding:0"><p class="block-text"><a href="javascript:void(0);" class="text-center"><?php echo $educationDatas['Education']; ?></a></p></div>
                  <!--<div class="col-xs-12 text-center">
                    <div class="checkbox padding30" id="checkdiv" style="display:block;margin:7px 0px">
                      <input type="checkbox" name="degree[1][]" id="degree<?php echo $educationDatas['EducationID']; ?>" value="1" class="no-styles">       
                      <label for="degree<?php echo $educationDatas['EducationID']; ?>" class="my-label"><span class="degreeLabel" id="degreeLabel" for="<?php echo $educationDatas['EducationID']; ?>" dir="<?php echo $educationDatas['Education']; ?>"></span></label>
                     <input type="hidden" name="paymentnonce" id="paymentnonce" value="" />
				   </div>
				 </div>-->
			    <div class="setHooverDegree<?php echo $educationDatas['EducationID']; ?> removeDeg" id=""></div>
              </li>
              <?php } ?>
              <div class="clearfix"></div>
            </ul>
    </div>
    <div class="clearfix"></div>
  </div>
  
 <?php /*?> <div class="box-2">
    <div class="col-md-3 col-xs-5 text-center">
    <p class="title-name-2">Experience</p>
    </div>
    <div class="col-md-9 col-xs-7" style="padding:0;">
    <ul class="list-inline">
              <?php foreach($experience as $experienceDatas) { ?>
              <li class="modifi-list-item-2" id="<?php echo $experienceDatas['ExperienceID']; ?>">
                <div class="col-xs-4 div-image-size-provider" style="padding:0;"><img src="images/experience/<?php echo !empty($experienceDatas['SubSpImages'])?$experienceDatas['SubSpImages']:"img-3.jpg"; ?>" class="img-responsive"></div>
                 <div class="col-xs-5" style="padding:0"><p class="block-text"><a href="javascript:void(0);" class="text-center"><?php echo $experienceDatas['Experience']; ?></a></p></div>
                  <div class="col-xs-2">
                    <div class="checkbox padding30" id="checkdiv" style="display:block;">
                      <input type="checkbox" name="experience[1][]" id="experience<?php echo $experienceDatas['ExperienceID']; ?>" value="1" class="no-styles">       
                      <label for="experience<?php echo $experienceDatas['ExperienceID']; ?>" class="my-label"><span class="experienceLabel" id="experienceLabel" for="<?php echo $experienceDatas['ExperienceID']; ?>" dir="<?php echo $experienceDatas['Experience']; ?>"></span></label>
                     <input type="hidden" name="paymentnonce" id="paymentnonce" value="" />
				   </div>
				 </div>
			    <div class="" id="setHooverExpr"></div>
              </li>
              <?php } ?>
              <div class="clearfix"></div>
            </ul>
    </div>
    <div class="clearfix"></div>
  </div><?php */?>
   
  
  
  <div class="box-2 moveLang">
    <div class="col-md-3 col-xs-5 text-center">
    <div class="back-ground">
    <p class="title-name-2">Language</p>
    </div>
    </div>
    <div class="col-md-9 col-xs-7" style="padding:0;">
    <ul class="list-inline ">
              <?php foreach($language as $languageDatas) { ?>
              <li class="modifi-list-item-2 languageLabel" id="<?php echo $languageDatas['language_id']; ?>" for="<?php echo $languageDatas['language_id']; ?>" dir="<?php echo $languageDatas['languages']; ?>">
                <div class="col-xs-12 text-center" style="padding:0;"><div class="checkbox-icon">
                <img src="images/Languages/<?php echo !empty($languageDatas['images'])?$languageDatas['images']:"img-3.jpg"; ?>" class=""></div></div>
                 <div class="col-xs-12 text-center" style="padding:0"><p class="block-text"><a href="javascript:void(0);" class="text-center"><?php echo $languageDatas['languages']; ?></a></p></div>
                  <!--<div class="col-xs-12 text-center">
                    <div class="checkbox padding30" id="checkdiv" style="display:block;margin:7px 0px">
                      <input type="checkbox" name="language[][]" id="language<?php echo $languageDatas['language_id']; ?>" value="1" class="no-styles">       
                      <label for="language<?php echo $languageDatas['language_id']; ?>" class="my-label">
                      <span class="languageLabel" id="languageLabel" for="<?php echo $languageDatas['language_id']; ?>" dir="<?php echo $languageDatas['languages']; ?>"></span></label>
                     <input type="hidden" name="paymentnonce" id="paymentnonce" value="" />
				   </div>
				 </div>-->
			    <div class="setHooverLan<?php echo $languageDatas['language_id']; ?> removeLan" id=""></div>
              </li>
              <?php } ?>
              <div class="clearfix"></div>
            </ul>
    </div>
    <div class="clearfix"></div>
  </div>
 
 
<div class="box-2 moveExper">
    <div class="col-md-3 col-xs-5 text-center">
    <span id="js-outputExperience" style="font-size:25px; color:#fb7f1e;"></span><span style="font-size:25px; color:#fb7f1e;"> Year</span>
    <div class="back-ground">
    <p class="title-name-2">Experience</p>
    </div>
    </div>
    <div class="col-md-9 col-xs-7" style="padding:0;">
    <ul class="list-inline">
              <h4>Select minimum experience you are looking for:</h4>
         <div class="seclect-box" style="width:100%!important">
         <input type="range" min="1" max="30" step="1" value="0" data-rangeslider2>
	</div>            </ul>
    </div>
    <div class="clearfix"></div>
  </div>
  
  <div class="box-2 moveRPH">
    <div class="col-md-3 col-xs-5 text-center">
    	<span style="font-size:25px; color:#00ff00;">$ </span><span id="js-output" style="font-size:25px; color:#00ff00;"></span>
    <div class="back-ground">
    <span id="js-output"></span>
    <p class="title-name-2">rate per hour</p>
    </div>
    </div>
    <div class="col-md-9 col-xs-7" style="padding:0;">
    <ul class="list-inline">
              <h4>Select maximum rate you willing to pay:</h4>
         <div class="seclect-box" style="width:100%!important">
         <input type="range" min="1" max="100" step="1" value="0" data-rangeslider>
	</div>            </ul>
    </div>
    <div class="clearfix"></div>
  </div>
 <div class="text-center">
<button type="submit" class="btn btn-default btn-search-3">Search</button>
</div>
  </div>
</section>




<!-- jQuery Version 1.11.1 --> 
<script src="js/jquery.js"></script> 
<script src="js/rangeslider.js-2.1.1/rangeslider.min.js"></script> 
<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script>
<script src="js/searchProvider.js"></script>
<script src="js/connectMe.js"></script>
<!--<script src="js/search.js"></script>-->
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
