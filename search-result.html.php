<?php
include("config/connection.php");
session_start();

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
<link href='https://fonts.googleapis.com/css?family=Oswald|Roboto' rel='stylesheet' type='text/css'>
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
          <div class=""><a href="logout.php" class="btn btn-info bg-blue logout">Logout</a></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid container-bg">
  <div class="row">
    <div class="col-md-12 text-center">
      <button class="btn-nav">
      <div class="pull-left margin-left20">
        <div class="bar arrow-top-r"></div>
        <div class="bar arrow-middle-r"></div>
        <div class="bar arrow-bottom-r"></div>
      </div>
      <div class="pull-right">
        <p class="search">Click for Search</p>
      </div>
      </button>
    </div>
    <form>
    <nav class="nav-container hidden hideNav">
      <ul class="nav-list">
        <li class="list-item  back-color-5 expertiseClick" id="expertiseClick">Expertise
          <div class="select-item"><img src="images/img-3.jpg" class="img-responsive"></div>
          <p class="value-holder"><input type="text" disabled="disabled" class="specialisation" value="" name="specialisation"></p>
        </li>
       
        <li class="list-item back-color-3 disable-section subSpecialClick" id="subSpecialClick">Sub Specialisation
          <div class="select-item"><img src="images/img-3.jpg" class="img-responsive"></div>
          <p class="value-holder"><input type="text" disabled="disabled" class="subSpecial" value="" name="subSpecial"></p>
        </li>
        <li class="list-item back-color-4 degreeClick" id="degreeClick">Degree
          <div class="select-item"><img src="images/img-3.jpg" class="img-responsive"></div>
          <p class="value-holder"><input type="text" disabled="disabled" class="degree" value="" name="degree"></p>
        </li>
        <li class="list-item back-color-2 rateClick" id="rateClick">rate per hour
          <div class="select-item"><img src="images/img-3.jpg" class="img-responsive"></div>
          <p class="value-holder"><input type="text" disabled="disabled" class="rate" value="" name="rate"></p>
        </li>
        <li class="list-item back-color-6 languageClick" id="languageClick">Language
          <div class="select-item"><img src="images/img-3.jpg" class="img-responsive"></div>
          <p class="value-holder"><input type="text" disabled="disabled" class="language" value="" name="language"></p>
        </li>
      </ul>
       <div class="text-right">
        <button class="btn-result" type="submit">Click for Result</button>
      </div>
    </nav>
    
   
    </form>
    <div class="col-md-10 col-md-offset-2">
      <div class="panel-box">
        <div id="lang-box">
          <div class="search-header">Search for <i><font color="#fff"><span class="searchHeader">Language</span></font></i><span><i class="fa fa-search"></i></span></div>
          <div class="search-inner-block" >
            <div class="row">
              <div class="col-md-12 searchResult">
                
                
                     
                  
                </div>
            </div>
          </div>
        </div>
        <div id="expertise-box">
          <div class="search-header">Search for Exparts<span><i class="fa fa-search"></i></span></div>
          <div class="search-inner-block" >
            <div class="row">
              <div class="col-md-6">
                <div class="seclect-box">
                  <div class="col-sm-3 no-padding">
                    <div class="search-box"> <img src="images/img-3.jpg"> </div>
                  </div>
                  <div class="col-sm-7 no-padding">
                    <p class="check-name">Demo Text</p>
                  </div>
                  <div class="col-sm-2"> 
                    <!-- .squaredOne -->
                    <div class="squaredOne">
                      <input type="checkbox" value="None" id="1" name="check" checked />
                      <label for="1"></label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="seclect-box">
                  <div class="col-sm-3 no-padding">
                    <div class="search-box"> <img src="images/img-3.jpg"> </div>
                  </div>
                  <div class="col-sm-7 no-padding">
                    <p class="check-name">Demo Text</p>
                  </div>
                  <div class="col-sm-2"> 
                    <!-- .squaredOne -->
                    <div class="squaredOne">
                      <input type="checkbox" value="None" id="2" name="check" checked />
                      <label for="2"></label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="seclect-box">
                  <div class="col-sm-3 no-padding">
                    <div class="search-box"> <img src="images/img-3.jpg"> </div>
                  </div>
                  <div class="col-sm-7 no-padding">
                    <p class="check-name">Demo Text</p>
                  </div>
                  <div class="col-sm-2"> 
                    <!-- .squaredOne -->
                    <div class="squaredOne">
                      <input type="checkbox" value="None" id="3" name="check"  />
                      <label for="3"></label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="seclect-box">
                  <div class="col-sm-3 no-padding">
                    <div class="search-box"> <img src="images/img-3.jpg"> </div>
                  </div>
                  <div class="col-sm-7 no-padding">
                    <p class="check-name">Demo Text</p>
                  </div>
                  <div class="col-sm-2"> 
                    <!-- .squaredOne -->
                    <div class="squaredOne">
                      <input type="checkbox" value="None" id="4" name="check" />
                      <label for="4"></label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="seclect-box">
                  <div class="col-sm-3 no-padding">
                    <div class="search-box"> <img src="images/img-3.jpg"> </div>
                  </div>
                  <div class="col-sm-7 no-padding">
                    <p class="check-name">Demo Text</p>
                  </div>
                  <div class="col-sm-2"> 
                    <!-- .squaredOne -->
                    <div class="squaredOne">
                      <input type="checkbox" value="None" id="5" name="check" />
                      <label for="5"></label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="seclect-box">
                  <div class="col-sm-3 no-padding">
                    <div class="search-box"> <img src="images/img-3.jpg"> </div>
                  </div>
                  <div class="col-sm-7 no-padding">
                    <p class="check-name">Demo Text</p>
                  </div>
                  <div class="col-sm-2"> 
                    <!-- .squaredOne -->
                    <div class="squaredOne">
                      <input type="checkbox" value="None" id="6" name="check" />
                      <label for="6"></label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="seclect-box">
                  <div class="col-sm-3 no-padding">
                    <div class="search-box"> <img src="images/img-3.jpg"> </div>
                  </div>
                  <div class="col-sm-7 no-padding">
                    <p class="check-name">Demo Text</p>
                  </div>
                  <div class="col-sm-2"> 
                    <!-- .squaredOne -->
                    <div class="squaredOne">
                      <input type="checkbox" value="None" id="7" name="check"  />
                      <label for="7"></label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="seclect-box">
                  <div class="col-sm-3 no-padding">
                    <div class="search-box"> <img src="images/img-3.jpg"> </div>
                  </div>
                  <div class="col-sm-7 no-padding">
                    <p class="check-name">Demo Text</p>
                  </div>
                  <div class="col-sm-2"> 
                    <!-- .squaredOne -->
                    <div class="squaredOne">
                      <input type="checkbox" value="None" id="8" name="check"  />
                      <label for="8"></label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="seclect-box">
                  <div class="col-sm-3 no-padding">
                    <div class="search-box"> <img src="images/img-3.jpg"> </div>
                  </div>
                  <div class="col-sm-7 no-padding">
                    <p class="check-name">Demo Text</p>
                  </div>
                  <div class="col-sm-2"> 
                    <!-- .squaredOne -->
                    <div class="squaredOne">
                      <input type="checkbox" value="None" id="9" name="check"  />
                      <label for="9"></label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="seclect-box">
                  <div class="col-sm-3 no-padding">
                    <div class="search-box"> <img src="images/img-3.jpg"> </div>
                  </div>
                  <div class="col-sm-7 no-padding">
                    <p class="check-name">Demo Text</p>
                  </div>
                  <div class="col-sm-2"> 
                    <!-- .squaredOne -->
                    <div class="squaredOne">
                      <input type="checkbox" value="None" id="10" name="check"  />
                      <label for="10"></label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="seclect-box">
                  <div class="col-sm-3 no-padding">
                    <div class="search-box"> <img src="images/img-3.jpg"> </div>
                  </div>
                  <div class="col-sm-7 no-padding">
                    <p class="check-name">Demo Text</p>
                  </div>
                  <div class="col-sm-2"> 
                    <!-- .squaredOne -->
                    <div class="squaredOne">
                      <input type="checkbox" value="None" id="11" name="check"  />
                      <label for="11"></label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="seclect-box">
                  <div class="col-sm-3 no-padding">
                    <div class="search-box"> <img src="images/img-3.jpg"> </div>
                  </div>
                  <div class="col-sm-7 no-padding">
                    <p class="check-name">Demo Text</p>
                  </div>
                  <div class="col-sm-2"> 
                    <!-- .squaredOne -->
                    <div class="squaredOne">
                      <input type="checkbox" value="None" id="12" name="check"  />
                      <label for="12"></label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>


<!-- jQuery Version 1.11.1 --> 
<script src="js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/search.js"></script> 

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
