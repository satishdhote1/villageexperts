<?php
include("config/connection.php");
$conn=new connections();
$conn=$conn->connect();

session_start();
$user_pic = $_SESSION['logged_user_image'];
$user_name  = $_SESSION['logged_user_name'];
//Get specialization Data
$sql="select * from   sp_specialisation order by specialisation";
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

		$sql2="select * from  sp_sub_specialisation where specialisation_id = 1 order by sub_specialisation";
	
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
$sql3="select * from  education where specialisation_id = 1 order by priority asc";
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
$sql4="select * from  experience";
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
$sql5="select * from  sp_language order by languages";
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
<link href="css/style.css" rel="stylesheet">
<link href="js/rangeslider.js-2.1.1/rangeslider.css" rel="stylesheet">
<!-- <script src="js/rangeslider.min.js"></script> 
<script src="js/rangeslider.js"></script> -->
</head>
<style>
.top-10{top:122px;}
.top-0{top:0px;}
.btn-search-2{margin-top:21% !important;}
.providerLabel {
	font-size: 13px;
}
input[type="text"] {
	color: #f93;
}
.over-lap {
	display: block !important
}
.block-bg-1 {
	background: #fff;
	padding: 0px 0px;
	position: fixed;
	width: 100%;
	z-index: 100000;transition:all 0.2s ease-in-out 0s;
}
.header-part {
	position: fixed;
	z-index: 100000;
	background: #E9E9EA;
}
.sear-section {
	padding-top: 100px;
}
.btn-search-2 {
	background: #ff8003;
	border: 0px;
	padding: 7px 45px;
	color: #fff;
	transition: all ease-in-out 0.2s 0s;
	margin-top: 28%;
}
.btn-search-2:hover {
	background: #697bff;
	color: #eaecff;
}
.btn-search-3-newProvider {
	width: 50%;
	background: #7b7bfc;
	margin-bottom: 1%;
	border: 0px;
	padding: 5px 41px;
	color: #000;
	transition: all ease-in-out 0.2s 0s;
	font-size: 26px;
}
.btn-search-3-newProvider:hover {
	background: #697bff;
	color: #eaecff;
}
.radius0 {
	border-radius: 0px;
}
.display-list > li {
	width: 155px;
}
.right-radius {
	border-radius: 6px;
}
.display-list {
	margin: 10px 0px;
	padding: 0px
}
.img-provider {
	border-radius: 50%;
	height: 120px;
	margin: 15px auto;
	overflow: hidden;
	width: 120px;
}
.liBGColor {
	background: #ed9100;
}
.list-inline > li {
	display: inline-block;
	padding-left: 5px;
	padding-right: 5px;
}
.btn-search-2 {
	background: #ccccff;
	border: 0 none;
	color: #000;
	margin-top: 27%;
	padding: 7px 45px;
	transition: all 0.2s ease-in-out 0s;
}
.porovider-title a {
	border-radius: 10px;
	font-size: 16px;
	margin: 0;
	overflow: hidden;
	text-align: center;
}

.porovider-title {
	margin: 5px 0;
}

.search-list li.bg-gray{
  /*width: 37% !important;*/
  width: auto !important;
}
</style>
<body style="background:url(img/normal/Experts-1.jpg) no-repeat 100% 100%;background-size:cover;background-attachment:fixed;">
<div class="over-lap">
        <div class="profile pull-left"> <img src="<?php echo $user_pic; ?>" class="img-responsive"> </div>
        <div class="pull-right">
          <p class="loginname">

       <?php  echo $user_name; ?>
          </p>
           <div class=""><a href="index.php" class="back-to"><img src="images/Left.png" class="" style="cursor:pointer"></a></div>
        </div>
        <div class="clearfix"></div>
      </div>
<nav class="navbar navbar-dark scrolling-navbar logo-scroll">
  <div class="container"> 
    
    <!--Collapse content-->
    <div class="logo-modify"> 
      <!--Navbar Brand--> 
      <a class="navbar-brand" href="#" target="_blank"><img src="img/normal/logo.png">
      <p>VILLAGE EXPERTS</p>
      </a> 
      <!--Links--> 
      
    </div>
    <!--/.Collapse content--> 
    
  </div>
</nav>
<section class="block-bg-1">
  <div class="container">
    <div class="row">
      <form action="result.php?source=newProvider" method="post" name="search" id="search" style="color:#afba00;">
        <div class="col-ms-10 col-sm-10 col-xs-12" style="padding:0px;">
          <ul class="list-inline display-list">
            <li>
              <label class="providerLabel">EXPERTISE</label>
              <input type="text" placeholder="Expertise" readonly class="form-control radius0 specialisation" value="Computers" name="specialisation">
              <input type="hidden" readonly class="SpecialisationIDS" value="" name="SpecialisationIDS">
            </li>
            <li>
              <label class="providerLabel">SUB EXPERTISE</label>
              <input type="text"  placeholder="Sub Expertise"readonly class="subSpecial form-control radius0" value="" name="subSpecial">
              <input type="hidden" readonly class="SubSpecialIDS" value="" name="SubSpecialIDS">
            </li>
            <li>
              <label class="providerLabel">EDUCATION</label>
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
              <label class="providerLabel">RATE PER HOUR</label>
              <input type="text"  placeholder="Rate Per Hour" readonly class="rate form-control radius0" value="" name="rate">
              <input type="hidden" readonly class="RateIDS" value="" name="RateIDS">
            </li> 
            <div class="clearfix"></div>
          </ul>
        </div>
        <div class="col-ms-2 col-sm-2 col-xs-6">
          <div class="text-center">
            <button  class="btn btn-default btn-search-2 btn-search-3-searchProvider">SEARCH</button>
          </div>
        </div>
      </form>
      <div class="clearfix"></div>
    </div>
    <div class="col-xs-12 text-xs-center">
    <!--<div ><label class="providerLabel" style="text-transform:uppercase;">Matching Experts<span style="border:1px solid #000;border-radius:50%;   display: inline-block; margin-left: 10px;padding: 9px;font-size:20px;font-weight:bold;margin-bottom: 2px;">999</span></label></div>-->
    </div>
  </div>
</section>
<section class="sear-section">
  <div class="container"> 
    
    <!--This IS for Expertise-->
    
    <div class="row marginTOP">
      <div class="col-md-12">
        <h1 class="search-title">Expertise</h1>
        <div class="background-blue">
          <div class="row">
            <div class="col-md-12 right-radius">
              <ul class="list-inline search-list specialData ">
              <?php foreach($specialData as $specialDatas) { ?>
                <li class="bg-gray exp removeExp expertiesLabel" id="<?php echo $specialDatas['specialisation_id']; ?>" for="<?php echo $specialDatas['specialisation_id']; ?>" dir="<?php echo $specialDatas['specialisation']; ?>">
                  <p class="porovider-title">
                  <a href="#" class="search-parson-position text-center "><?php echo $specialDatas['specialisation']; ?></a>
                   </p>
                </li>
                 <?php } ?>
                
               
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!--This is for Sub Specialization-->
    
    <div class="row marginTOP">
      <div class="col-md-12">
        <h1 class="search-title">Sub Expertise</h1>
        <div class="background-blue">
          <div class="row">
            <div class="col-md-12 right-radius">
              <ul class="list-inline search-list SUBspecialData ">
              <?php foreach($subspecialData as $subspecialDatas) { ?>
                <li class="bg-gray exp removeExp subExpertiesLabel" id="<?php echo $subspecialDatas['sub_specialisation_id']; ?>" for="<?php echo $subspecialDatas['sub_specialisation_id']; ?>" dir="<?php echo $subspecialDatas['sub_specialisation']; ?>">
                 <p class="porovider-title"><a href="#" class="search-parson-position text-center "><?php echo $subspecialDatas['sub_specialisation']; ?>
                </a></p>
                </li>
                <?php  } ?>
               
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!--This IS for Degree-->
    
    <div class="row marginTOP">
      <div class="col-md-12">
        <h1 class="search-title">Education</h1>
        <div class="background-blue">
          <div class="row">
            <div class="col-md-12 right-radius">
              <ul class="list-inline search-list degreeData ">
              <?php foreach($education as $educationDatas) { ?>
                <li class="bg-gray exp removeExp degreeLabel" id="<?php echo $educationDatas['EducationID']; ?>" for="<?php echo $educationDatas['EducationID']; ?>" dir="<?php echo $educationDatas['Education']; ?>">
                 <p class="porovider-title"><a href="#" class="search-parson-position text-center "><?php echo $educationDatas['Education']; ?>
                  </a></p>
                </li>
                <?php  } ?>
               
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
       <!--This IS for Language-->
       <!--This IS for Degree-->
    
    <div class="row marginTOP">
      <div class="col-md-12">
        <h1 class="search-title">LANGUAGE</h1>
        <div class="background-blue">
          <div class="row">
            <div class="col-md-12 right-radius">
              <ul class="list-inline search-list languageData ">
              <?php foreach($language as $languageDatas) { ?>
                <li class="bg-gray exp removeExp languageLabel" id="<?php echo $languageDatas['language_id']; ?>" for="<?php echo $languageDatas['language_id']; ?>" dir="<?php echo $languageDatas['languages']; ?>">
                 <p class="porovider-title"><a href="#" class="search-parson-position text-center "><?php echo $languageDatas['languages']; ?>
                  </a></p>
                </li>
                <?php  } ?>
               
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
       <!--This IS for Language-->
    
    
    
    <!--This IS for Experience-->
    
    
   <div class="row marginTOP">
    <div class="col-md-6">
      <h1 class="search-title">Experience</h1>
      <div class="background-blue">
        <div class="row setExperienceData">
          <div class="col-md-12">
            <ul class="list-inline search-list">
 	  <h4 class="text-center right-radius" style="color:#fff;font-size:18px;"><span class="badge pull-left" style="padding:5px;background:#FFF;margin-left:5px;color:#F00;margin-right:15px;" id="js-outputExperience">0-5</span>Select minimum experience you are looking for:</h4>
         <div class="seclect-box" style="width:100%!important">
        <input type="range" min="1" max="30" step="1" value="0" data-rangeslider2>
	</div>
          </ul>
          </div>
        
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <h1 class="search-title">Rate per Hour</h1>
      <div class="background-blue">
        <div class="row">
          <div class="col-md-12">
            <ul class="list-inline search-list">
 	  <h4 class="text-center right-radius" style="color:#fff;font-size:18px;"><span class="badge pull-left" style="padding:5px;background:#FFF;margin-left:5px;color:#F00;margin-right:15px;">$<span id="js-output"></span></span>Select maximum rate you willing to pay:</h4>
         <div class="seclect-box" style="width:100%!important">
         <input type="range" min="1" max="100" step="1" value="0" data-rangeslider>
	</div>
          </ul>
          </div>
        
        </div>
      </div>
    </div>
    </div>
    
<!--This is for Rate per Hour-->
 
    <!--This is for Rate per Hour-->
  
    
    <!--This is for submit button-->
    
    <div class="row marginTOP">
      <div class="col-md-12">
        <div class="text-xs-center">
          <button  class="btn btn-default btn-search-2 btn-search-3-searchProvider" style="text-transform:uppercase;">Search</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- jQuery Version 1.11.1 --> 
<script src="js/jquery-2.2.3.min.js"></script> 
<script src="js/rangeslider.js-2.1.1/rangeslider.min.js"></script> 
<script src="js/searchProvider.js"></script> 
<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script> 

 
<script type="text/javascript">

$(function(){
 var shrinkHeader =100;
 $(window).scroll(function() {
 var scroll = getCurrentScroll();
 if ( scroll >= shrinkHeader ) {
 $(".block-bg-1").css("top","0");
 }
 else {
 $(".block-bg-1").css("top","127px");
 }
 });
function getCurrentScroll() {
 return window.pageYOffset;
 }
});
</script>

<!--<script src="js/search.js"></script>-->
</body>
</html>
