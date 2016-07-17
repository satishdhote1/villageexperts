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
//$sql2="select * from 	sp_sub_specialisation where specialisation_id = 5 order by sub_specialisation";
$sql2="select * from 	sp_sub_specialisation  order by sub_specialisation";
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
	.sear-section{padding-top:260px;}
	.btn-search-2{background:#ff8003;border:0px;padding:7px 45px;color:#fff;transition:all ease-in-out 0.2s 0s;margin-top:20px;}
	.btn-search-2:hover{background:#697bff;color:#eaecff;}
	.radius0{border-radius:0px;}
	.display-list > li {
    width: 158px;
}
.display-list{margin:20px 0px;padding:0px}
.img-provider {
    border-radius: 50%;
    height: 120px;
    margin: 15px auto;
    overflow: hidden;
    width: 120px;
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
    
    
    
<section class="block-bg">
<div class="container">
     <div class="row">
 <form action="result.php?source=newProvider" method="post" name="search" id="search" >
<div class="col-ms-10 col-sm-10 col-xs-12" style="padding:0px;">
<ul class="list-inline display-list">
<li>
<input type="text" placeholder="Experties" readonly class="form-control radius0 specialisation" value="" name="specialisation">
<input type="hidden" readonly class="SpecialisationIDS" value="" name="SpecialisationIDS">	
</li>
<li>
<input type="text"  placeholder="Sub Specialization"readonly class="subSpecial form-control radius0" value="" name="subSpecial">
<input type="hidden" readonly class="SubSpecialIDS" value="" name="SubSpecialIDS">
</li>
<li>
	<input type="text" placeholder="Degree" readonly class="degree form-control radius0" value="" name="degree">
        <input type="hidden" readonly class="DegreeIDS" value="" name="DegreeIDS">
</li>
<li>
	<input type="text" placeholder="Experience" readonly class="experience form-control radius0" value="" name="experience">
        <input type="hidden" readonly class="ExperienceIDS" value="" name="ExperienceIDS">
</li>
<li>
	<input type="text"  placeholder="Rate Per Hour"readonly class="rate form-control radius0" value="" name="rate">
	<input type="hidden" readonly class="RateIDS" value="" name="RateIDS">
</li>
<li>
	 <input type="text" placeholder="Language" readonly class="language form-control radius0" value="" name="language">
          <input type="hidden" readonly class="LanguageIDS" value="" name="LanguageIDS">
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



<section class="sear-section">
<div class="container">
  <div class="row marginTOP">
    <div class="col-md-12">
      <h1 class="search-title">Expertise</h1>
      <div class="background-blue">
        <div class="row">
          <div class="col-md-12">
            <ul class="list-inline search-list specialData">
            <?php foreach($specialData as $specialDatas) { ?>
              <li class="bg-gray" id="<?php echo $specialDatas['specialisation_id']; ?>">
                <div class="search-profile text-center">
                <div class="img-provider">
                <img src="images/specialization/<?php echo $specialDatas['images']; ?>">
                </div>
                
                  <p class=""><a href="javascript:void(0);" class="search-parson-position text-center expertiesLabel" id="expertiesLabel" for="<?php echo $specialDatas['specialisation_id']; ?>" dir="<?php echo $specialDatas['specialisation']; ?>"><?php echo $specialDatas['specialisation']; ?></a></p>
                </div>
              </li>
               <?php } ?>
            </ul>
          </div>
        
        </div>
      </div>
    </div>
    
    
    
    
    
  </div>
  <div class="row marginTOP">
    <div class="col-md-12">
      <h1 class="search-title">Sub Specialization</h1>
      <div class="background-blue">
        <div class="row">
          <div class="col-md-12">
            <ul class="list-inline search-list setSubSpecialData">
             <?php foreach($subspecialData as $subspecialDatas) { ?>
              <li class="bg-gray" id="<?php echo $subspecialDatas['sub_specialisation_id']; ?>">
                <div class="search-profile text-center">
                <div class="img-provider"><img src="images/SubSpecialization/<?php echo $subspecialDatas['SubSpImages']; ?>">
                </div>
                  <p class=""><a href="javascript:void(0);" class="search-parson-position text-center subExpertiesLabel" for="<?php echo $subspecialDatas['sub_specialisation_id']; ?>" dir="<?php echo $subspecialDatas['sub_specialisation']; ?>" ><?php echo $subspecialDatas['sub_specialisation']; ?></a></p>
                </div>
              </li>
               <?php } ?>
             
            </ul>
          </div>
        </div>
      </div>
    </div>
    
    
    
    
    
  </div>
  <div class="row marginTOP">
    <div class="col-md-12">
      <h1 class="search-title">Degree</h1>
      <div class="background-blue">
        <div class="row">
          <div class="col-md-12">
            <ul class="list-inline search-list">
              <?php foreach($education as $educationDatas) { ?>
              <li class="bg-gray" id="<?php echo $educationDatas['EducationID']; ?>">
                <div class="search-profile text-center">
                <div class="img-provider">
                <img src="images/education/<?php echo $educationDatas['Image']; ?>">
                </div>
                  <p class=""><a href="javascript:void(0);" class="search-parson-position text-center degreeLabel" id="degreeLabel" for="<?php echo $educationDatas['EducationID']; ?>" dir="<?php echo $educationDatas['Education']; ?>"><?php echo $educationDatas['Education']; ?></a></p>
                </div>
              </li>
               <?php } ?>
             </ul>
          </div>
        
        </div>
      </div>
    </div>
  </div>
  
  <?php /*?><div class="row marginTOP">
    <div class="col-md-12">
      <h1 class="search-title">Experience</h1>
      <div class="background-blue">
        <div class="row">
          <div class="col-md-12">
            <ul class="list-inline search-list">
               <?php foreach($experience as $experienceDatas) { ?>
              <li class="bg-gray" id="<?php echo $experienceDatas['ExperienceID']; ?>">
                <div class="search-profile text-center"><img src="images/experience/<?php echo $experienceDatas['Image']; ?>">
                  <p class=""><a href="javascript:void(0);" class="search-parson-position text-center experienceLabel" dir="<?php echo $experienceDatas['Experience']; ?>" for="<?php echo $experienceDatas['ExperienceID']; ?>"><?php echo $experienceDatas['Experience']; ?></a></p>
                </div>
              </li>
               <?php } ?>
            </ul>
          </div>
        
        </div>
      </div>
    </div>
    </div><?php */?>
    <div class="row marginTOP">
    <div class="col-md-12">
      <h1 class="search-title">Experience</h1>
      <div class="background-blue">
        <div class="row">
          <div class="col-md-12">
            <ul class="list-inline search-list">
 	  <h4 class="text-center" style="color:#fff;">Select minimum experience you are looking for:</h4>
         <div class="seclect-box" style="width:100%!important">
        <input type="range" min="5" max="100" step="5" value="5" data-rangeslider2>$<span id="js-outputExperience"></span>
	</div>
          </ul>
          </div>
        
        </div>
      </div>
    </div>
    </div>
   
   <div class="row marginTOP">
    <div class="col-md-12">
      <h1 class="search-title">rate per hour</h1>
      <div class="background-blue">
        <div class="row">
          <div class="col-md-12">
            <ul class="list-inline search-list">
 	  <h4 class="text-center" style="color:#fff;">Select maximum rate you willing to pay:</h4>
         <div class="seclect-box" style="width:100%!important">
         <input type="range" min="0" max="100" step="1" value="1" data-rangeslider>$<span id="js-output"></span>
	</div>
          </ul>
          </div>
        
        </div>
      </div>
    </div>
    </div>
    <div class="row marginTOP">
    <div class="col-md-12">
      <h1 class="search-title">Language</h1>
      <div class="background-blue">
        <div class="row">
          <div class="col-md-12">
            <ul class="list-inline search-list">
              <?php foreach($language as $languageDatas) { ?>
              <li class="bg-gray" id="<?php echo $languageDatas['language_id']; ?>">
                <div class="search-profile text-center">
                <div class="img-provider"><img src="images/Languages/<?php echo $languageDatas['images']; ?>"></div>
                  <p class=""><a href="javascript:void(0);" class="search-parson-position text-center languageLabel" id="languageLabel" dir="<?php echo $languageDatas['languages']; ?>" for="<?php echo $languageDatas['language_id']; ?>"><?php echo $languageDatas['languages']; ?></a></p>
                </div>
              </li>
               <?php } ?>
            </ul>
          </div>
        
        </div>
      </div>
    </div> 
    
    
    
  </div>
  
  
  </div>
</section>




<!-- jQuery Version 1.11.1 --> 
<script src="js/jquery.js"></script> 
<script src="js/rangeslider.js-2.1.1/rangeslider.min.js"></script> 
<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script>
<script src="js/newProvider.js"></script>
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
