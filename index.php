<<<<<<< HEAD
<?php
include("config/connection.php");

session_start();

$conn=new connections();
$conn=$conn->connect();

$email = isset($_REQUEST['email'])?$_REQUEST['email']:'';
$isexpert = isset($_REQUEST['isexpert'])?$_REQUEST['isexpert']:'';
$isFriendreg = isset($_REQUEST['isFriendreg'])?$_REQUEST['isFriendreg']:'';
$expertData = array();
$fname = '';
$lname = '';
$country = '';
$city = '';
$phone = '';
$expertID='';
	   
if(!empty($email) && !empty($isexpert) && $isexpert == "yes"){
    $sql="select * from   friendsRegister where email = '$email' and (isexpert = 1 OR isexpert = 2)";
    $tableResult = mysqli_query($conn, $sql);

    if (mysqli_num_rows($tableResult) > 0)  {
        while($row = mysqli_fetch_assoc($tableResult)) {
        	$expertData[] = $row;
        }
      }

      $expertID = $expertData[0]['id'];
      $fname = $expertData[0]['fname'];
      $lname = $expertData[0]['lname'];
      $country = $expertData[0]['country'];
      $city = $expertData[0]['city'];
      $phone = $expertData[0]['experties'];
}

if(!empty($email) && !empty($isFriendreg) && $isFriendreg == "yes"){
    $sql="select * from   friendsRegister where email = '$email' and (isexpert = 0 OR isexpert = 2)";
    $tableResult = mysqli_query($conn, $sql);
        
      if (mysqli_num_rows($tableResult) > 0)  {
        while($row = mysqli_fetch_assoc($tableResult)) {
        	$expertData[] = $row;
        }
      }

      $expertID = $expertData[0]['id'];
      $fname = $expertData[0]['fname'];
      $lname = $expertData[0]['lname'];
      $country = $expertData[0]['country'];
      $city = $expertData[0]['city'];
      $phone = ($expertData[0]['phone'] == 0)?'':$expertData[0]['phone'];
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
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
   

    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">

</head>
<style>
.modi-img{width:80px;border:5px solid #FFF;border-radius:10px;}
.font-20 {
    font-size: 19px !important; /*change font size*/
    font-weight: 700;
}.ICON-holder img {
    background: #7b7bfc;
    border: 3px solid rgba(0,0,0,0);
    height: 100%;
    width: 100%;
}
.border-box-item {
    padding: 10px 0 0px 0px;
}
.container-fluid{max-width:1250px;}
.error{margin-top:20px;}
.upload-img-block {
    float: left;
    height: auto;
}
.upload-panel-box {
    float: left;
    margin: 0;
    padding: 0;
    width: 70%;
}
.upload-panel-box input.pImage {
    margin: 0px 0 0 5px;
  padding:5px 0px;
    width: 100%;border:0px;
}
input[type='file'] {
  color: transparent;
}
.form-control{
padding:4px;
}
.upload-img-block > img {
    width: 100%;
}
.col-md-5 .md-form.main-block .fa {
    color: #7b7bfc;
}
.resSec .fa {
    color: #008cba;
}
.log{width: 120px;background:#cdcdcd;text-align:center; font-weight:bolder}
.log:hover{background:#a6a6a6 !important}
.loginSec .fa {
    color: #008cba;
}
.btn-papl:hover, .btn-papl:focus {
    background-color: #9595f9 !important;}
.btn-danger:focus, .btn-danger:hover{    background-color: #9595f9 !important;}
.button{padding:10px 10px 5px;}

.btn2{
    border-radius: 4px;
    border: 0;
    color: #fff;
    margin: 10px 0px 0px -2px;
    white-space: normal !important;
    height: 59px !important;
    line-height: 40px !important;
}
.modify-btn-1{
  margin-left: 47px !important;
}

.col-md-chang{ width: 34.667%; !important;}
.border-box-item1{
 margin-right:238px !important;
}
</style>

<body style="background:url(img/normal/Experts-1.jpg) no-repeat 100% 100%;background-size:cover;background-attachment:fixed;">
    

    <!-- Start your project here-->

    <!--Navbar-->
    <nav class="navbar navbar-dark scrolling-navbar logo-scroll">
       
        <div class="container">

            <!--Collapse content-->
            <div class="logo-modify">
                <!--Navbar Brand-->
                <a class="navbar-brand" href="#" target="_blank"><img src="img/normal/logo.png"><p>VILLAGE EXPERTS</p></a>
                <!--Links-->
                
            </div>
            <!--/.Collapse content-->

        </div>
    </nav>
    <!--/.Navbar-->

    <!--Mask-->
    <div class="view hm-black-strong-1 p-b-2" style="height:auto;">
        <div class="full-bg-img" style="min-height:310px;position:relative;">
            <div class="container-fluid">
                <div class="row" id="">
                   <div class="col-md-12">
                     <h2 class="white-text text-uppercase text-xs-center m-t-2">A KNOWLEDGE EXCHANGE PLATFORM THAT ALLOWS YOU TO</h2>
                   </div>
                <div class="col-md-5 col-md-chang">
                  <div class="m-b-0">
                      <a class="btn btn-danger  modify-btn-1 text-xs-right btn-lg modal__trigger loginModal" <?php echo (isset($_SESSION['logged_user_id']) && !empty($_SESSION['logged_user_id']))?'href="friends-family.php" id="" data-toggle="" ':'href="" id="display-form" data-toggle="modal"' ?> data-target="#myModal"><span class="ICON-holder"><img src="images/icon-1.png"></span>Connect with Friends and Family</a>
                   </div>
                  <div class="m-b-0">
                    <a class="btn btn-lg btn-danger  waves-light text-xs-right modify-btn-1 modal__trigger" href="newProvider.php"><span class="ICON-holder"><img class="img-fluid img-rounded" src="images/icon-2.png"></span>Search for and Connect with an Expert</a>
                  </div>
                  <div class="m-b-0">
                    <a class="btn btn-lg btn-danger  text-xs-right modify-btn-1" href="ExpertRegistration.php"><span class="ICON-holder"><img class="img-fluid img-rounded" src="images/icon-3.png"></span>Sign up as an Expert</a>
                  </div>
                   <!--  <div class="text-xs-right m-b-1">
                       <a class="white-text bg-inverse p-l-1 p-t-1 p-b-1 p-r-1"><i class="fa fa-sign-in" style="padding-right:5px;"></i>Sign up as an Expert</a>
                    </div>-->                    
                </div>
                
        <!---RIGHT BLOCK-->
           <div class="col-md-5 col-xs-offset-1">
             <div id="" class="m-t-3">
                  <div class="box-modal" style="display: none;">
                  <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <p class="close backLogin" ><img src="images/Left.png" class="" style="cursor:pointer"></p>
                        <div class="text-xs-center">
                          <img src="img/normal/logo.png" width="35" style="margin:0px auto">
                        </div>
                      </div>
                      <div class="modal-body">
                            <div class="text-xs-right col-xs-4">
                                  <!--<a class="text-info teal-text m-r-2 backLogin" style="font-size:20px;font-family:Arial, Helvetica, sans-serif"></a>--> 
                                  
                             </div>
                             <div class="col-xs-8 SPloginLoader" style="padding-right:0;display:none;"> <hr>
                                <img src="images/ajax-loader.gif" id="" class="" style="">
                                <center><span class="SPerrors" style="display:none;color: red;" ></span></center>
                             </div>
                             <div class="clearfix"></div>
                             <div class="loginbut" style="padding:0px 0;width:100%;margin:auto;" >
                               <div class="col-md-6 text-xs-center">
                               		<span class="hideFirstSection"></span>
                                	<button class="button loginClick" style="width:150px;background-color:#cdcdcd;"><strong>LOGIN</strong><p style="font-size:12px;border-top:1px solid #fff;margin:0;padding-top:9px;">Returning User</p></button></div> <div class="col-md-6 text-xs-center">
                 			<button class="button button2 regClick"  style="width:150px; background-color:#9595f9;">
                                	<strong>REGISTER</strong><p style="font-size:12px;border-top:1px solid #fff;margin:0;padding-top:9px;">New User</p></button></div><div class="clearfix"></div>
                                </div>
                		
			      	<div  class="loginSec" style="padding:0px 25px;width:80%;margin:auto;display:none;" >
                       
                                <!--Body-->
                               <div class="text-success main-block">
                                    	<i class="fa fa-envelope prefix"> Email</i>
                              		<input type="text" class="form-control friendEmail" id="friendEmail">
                                    	<label for="form6"  class=""></label>
                                </div>
                                
                                <div class="text-success main-block">
                                    <i class="fa fa-lock prefix"> Password</i>
                                    <input type="password" class="form-control friendPwd" id="friendPwd">
                                    <label for="form4"  class=""></label>
                                </div>
					
                		<input type="hidden" id="friendLoginHidden" class="friendLoginHidden" value="friendsLogin">
       
                   		<div class="text-xs-center"> 
                       			<button class="btn log  modal__trigger friendLoginButton" id="friendLoginButton">LOGIN</button>
                     		</div>
                         </div>
			      
            <center><span class="regErrors" style="display:none;color: red;" ></span></center>
            <form id="addFriend" class="addFriend" action="ajax.php" method="post"  enctype="multipart/form-data">
            	<input type="hidden" name="tag" value="register">
                <input type="hidden" name="userType" value="addFriend">
                <?php 
                              if(!empty($email) && $isexpert == "yes")
                                {
                                  ?>
                                    <input type="hidden" name="isexpertreg" value="yes" class="isexpertreg">
                                    <input type="hidden" name="expertID" value="<?php echo $expertID;  ?>">
                                  <?php 
                                }
                                if(!empty($email) && $isFriendreg == "yes")
                                {
                                  ?>
                                    <input type="hidden" name="isFriendreg" value="yes" class="isFriendreg">
                                    <input type="hidden" name="expertID" value="<?php echo $expertID;  ?>">
                                  <?php 
                                }
                         ?>
                         
                <div class="row resSec" style="display: none;">
                         
                	<div style="border-bottom:1px solid #ccccfe;padding-bottom:15px">                            
                                                      
                		<div class="col-md-4 col-xs-12">

                             		<div class=" main-block">
                                		<i class="fa fa-user prefix"> First Name <span style="color:#F00;font-size:18px">*</span></i>
                                		<input id="fname" class="form-control fname" name="fname" tabindex="1" type="text" value="<?php echo $fname;?>">
                                		<label for="fname"></label>
                             		</div>
                          	</div>
                        
				<div class="col-md-4 col-xs-12">

                            		<div class=" main-block">
                                		<i class="fa fa-user prefix"> Last Name <span style="color:#F00;font-size:18px">*</span></i>
                                		<input id="form4 lname" class="form-control lname" name="lname" tabindex="2" type="text" value="<?php echo $lname;?>">
						<label for="form4"></label>
                            		</div>
                        	</div>
                        
				<div class="col-md-4 col-xs-12">

                             		<div class="main-block">
                                
					<?php /*if(!empty($email) && $isFriendreg == "yes")*/ ?>
                                		<i class="fa fa-phone prefix"> <?php if(!empty($email) && $isexpert == "yes"){echo "Experties";}else {echo "Phone";}?></i>
                                		<input id="form7 phone" class="form-control phone" name="phone" tabindex="3" type="text" value="<?php echo $phone; ?>">
                                		<label for="form4"></label>
                                

                             </div>
                        </div>

                         <div class="col-md-4 col-xs-12">

                             <div class=" main-block">

                                     <i class="fa fa-envelope prefix"> email<span style="color:#F00;font-size:18px">*</span></i>

                                    <input id="email" class="form-control email" name="email" tabindex="4" type="text" value="<?php echo $email;?>">

                                    <label for="email"></label>

                              </div>
                          </div>
                          <div class="col-md-4 col-xs-12">

                             <div class=" main-block">

                                    <i class="fa fa-location-arrow prefix"> Password<span style="color:#F00;font-size:18px">*</span></i>

                                    <input id="form8 pwds" class="form-control pwds" name="pwds" tabindex="5" type="password">

                                    <label for="form8"></label>

                              </div>
                            </div>
                          <div class="col-md-4 col-xs-12">

                             <div class=" main-block">

                                    <i class="fa fa-location-arrow prefix"> Confirm Password<span style="color:#F00;font-size:18px">*</span></i>

                                    <input id="form9 cpwd" class="form-control cpwd" name="cpwd" tabindex="6" type="password">

                                    <label for="form9" style="line-height:11px;"></label>

                                </div>
                          </div>

                         <div class="col-md-4 col-xs-12">

                             <div class=" main-block">

                                    <i class="fa fa-flag prefix"> City</i>

                                    <input id="form8 city" class="form-control city" name="city" tabindex="7" type="text" value="<?php echo $city;?>">

                                    <label for="form8"></label>

                              </div>
                          </div>
                          <div class="col-md-4 col-xs-12">

                             <div class=" main-block">

                                    <i class="fa fa-flag prefix"> Country</i>

                                    <input id="form9 country" class="form-control country" name="country" tabindex="8" type="text" value="<?php echo $country;?>">

                                    <label for="form9"></label>

                              </div>
                           </div>
                          <div class="col-md-4 col-xs-12">

                          <div class=" main-block">
                              <div class="upload-img-block"> <img src="images/placeholder/male3.jpg" id="preview" width="40" height="40">
                              </div>
                                 
                              <div class=" main-block upload-panel-box">

                              <i class="fa prefix"></i>
                              <p style="margin:0;font-size:12px;">Upload Image<span style="color:#F00;font-size:18px">*</span></p>
                              <input placeholder="upload-img" id="form2 pImage" class="form-control pImage" name="pImage" onchange="previewImage(this)" accept="image/*"  type="file">

                               </div>

                               </div>
                               </div>
                               <div class="clearfix"></div>
                               </div>
                              <div class="m-t-1">                           
                             <div class="col-xs-3"><p class="m-a-0 small" style="padding-top:17px;"><span style="color:#F00;font-size:18px">*</span> Required Fields</p></div>
                             <div class="col-xs-9 text-xs-center">
                             <button class="btn log  modal__trigger addFriendSubmit waves-effect waves-light" id="addFriendSubmit" style="margin-right:150px;text-transform:uppercase" type="submit">Register</button></div>
                            </div>
                           
                         </div>
                       </form>


                         </div>
                      <!--<div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>-->
                    </div>
                  </div>
                </div>
          </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    </div>
    <!--/.Mask-->
  <!-- end MODAL  -->
    <section class=" p-t-0 p-b-3 hm-black-strong-1">
         <div class="container">
           <div class="row" style="float: left;">
              <div class="">
                 <h5 class="text-xs-center p-a-1 p-b-1" style="width:100%; margin:auto;color:#fff;font-weight:bold; font-size:26px;line-height:40px;">CONNECTION IS ENABLED THROUGH A VIRTUAL OFFICE, POWERED BY OUR PROPRIETARY COMMUNICATION PLATFORM THAT ALLOWS YOU TO:</h5>
                <div class="row row m-b-0 border-box-item border-box-item1">
                  <div class="col-md-3 col-xs-1 text-xs-right">
                     <img src="images/see and talk.jpg" class="modi-img">
                  </div>
                  <div class="col-md-9 p-t-0 p-b-0">
                   <p class="btn btn2 font-20 text-xs-left" style="width: 800px">SEE AND TALK TO EACH OTHER</p>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="row m-b-0 border-box-item border-box-item1">
                  <div class="col-md-3 col-xs-1 text-xs-right">
                    <img src="images/Message.jpg" class="modi-img">
                  </div>
                  <div class="col-md-9 p-t-0 p-b-0">
                    <p class="btn btn2 font-20 text-xs-left" style="width: 800px">CHAT - INTERACTIVE TEXT MESSAGE</p>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="row m-b-0 border-box-item border-box-item1">
                  <div class="col-md-3 col-xs-1 text-xs-right">
                    <img src="images/documet.jpg" class="modi-img">
                  </div>
                  <div class="col-md-7 p-b-0">
                    <label class="btn btn2 font-20 text-xs-left" style="width: 800px">SHARE PDF DOCUMENTS, PICTURES, MOVIES IN OUR FILE VIEWER</label>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="row m-b-0 border-box-item border-box-item1">
                  <div class="col-md-3 col-xs-1 text-xs-right">
                    <img src="images/share screen.jpg" class="modi-img">
                  </div>
                  <div class="col-md-7 p-t-0 p-b-0">
                    <label class="btn btn2 font-20 text-xs-left" style="width: 800px">SHARE ANY OTHER DOCUMENTS THROUGH OUR SCREEN SHARE FEATURE</label>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="row m-b-0 border-box-item border-box-item1">
                  <div class="col-md-3 col-xs-1 text-xs-right">
                    <img src="images/record.png" class="modi-img">
                  </div>
                  <div class="col-md-7 p-t-0 p-b-0">
                         <label class="btn btn2 font-20 text-xs-left" style="width: 800px">RECORD INDIVIDUAL VOICE, VIDEO CLIPS</label>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="row m-b-0 border-box-item border-box-item1">
                   <div class="col-md-3 col-xs-1 text-xs-right">
                    <img src="images/recording.jpg" class="modi-img">
                   </div>
                   <div class="col-md-7 p-t-0 p-b-0">
                    <label class="btn btn2 font-20 text-xs-left" style="width: 800px">RECORD ENTIRE SESSIONS INCLUDING VOICE, VIDEO, ALL SHARED DOCUMENTS</label>
                   </div>
                   <div class="clearfix"></div>
                </div>
                <div class="row m-b-0 border-box-item border-box-item1">
                  <div class="col-md-3 col-xs-1 text-xs-right">
                   <img src="images/Listen  in.jpg" class="modi-img" style="min-height:100px;">
                  </div>
                  <div class="col-md-7 p-t-0 p-b-0">
                   <p class="btn btn2 font-20 text-xs-left " style="width: 800px">INVITE A THIRD PARTY TO 'LISTEN IN' AND VIEW ENTIRE SESSION</p>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>    
            <div class="clearfix"></div>
        </div>
    </section>
    <!--Main container-->
   
    <!-- /Start your project here-->
    

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
  $(function(){
    $(".backLogin").hide();
    
    $(document).on("click","#display-form",function(){//if login is hidden due to register in url
      $(".box-modal").show();
      $(".backLogin").show("medium");
      
    });
    
    if(window.location.hash == "#login")
    {
      $(".loginModal").click();
      $(".backLogin").show("medium");
      $(".loginbut").hide("medium");
      $(".loginSec").show("medium");
      $(".hideFirstSection").css("display","none");
    }
    if(window.location.hash == "#register")
    {
      $(".loginModal").click();
      $(".loginClick").hide();
      $(".hideFirstSection").css("display","none");

      //$(".regClick").css("margin-left","25%");
      $(".backLogin").show("medium");
      $(".loginbut").hide("medium");
      $(".loginSec").hide("medium");
      $(".resSec").show("medium");
      
    }
    $(document).on("click",".loginModal",function(){//if login is hidden due to register in url
      $(".loginClick").show();
      $(".hideFirstSection").css("display","block");
      $(".regClick").css("margin-left","0px");
    });
    
    $(document).on("click",".loginClick",function(){
      $(".backLogin").show("medium");
      $(".loginbut").hide("medium");
      $(".loginSec").show("medium");
      $(".hideFirstSection").css("display","none");
    });
    $(document).on("click",".regClick",function(){
      //window.location.href = "index -2.html";
      $(".backLogin").show("medium");
      $(".loginbut").hide("medium");
      $(".loginSec").hide("medium");
      $(".resSec").show("medium");
      $(".hideFirstSection").css("display","none");
  
    });
    
    
    $(document).on("click",".backLogin",function(){
      $(".backLogin").hide("medium");
      $(".loginbut").show("medium");
      $(".loginSec").hide("medium");
      $(".resSec").hide("medium");
      $(".backLogin").show("medium");
      $(".loginClick").show("medium");
      //$(".hideFirstSection").show();
      //alert($('.loginbut').css('display'));
      if ( $('.hideFirstSection').is(":visible")){
          $(".box-modal").hide();
        }
        else
        {
          $(".hideFirstSection").css("display","block");
        }
    });
    

function getCurrentScroll() {
 return window.pageYOffset;
 }
});
</script>
  
   


</body>

</html>
=======
<?php
	session_start();
require('config.php');
  $general_user = "";
if(isset($_SESSION['SESS_ID'])) {
	$SPID=$_SESSION['SESS_ID'];
  $general_user = $SPID;
	$qryProfile=mysqli_query($bd, "SELECT * FROM service_provider WHERE SPID='$SPID'");
	if($memProfile=mysqli_fetch_assoc($qryProfile)) {
		$fname=$memProfile['First_Name'];
		$lname=$memProfile['Last_Name'];
	}
}

if(isset($_SESSION['SESS_SR_ID'])) {
	$SRID=$_SESSION['SESS_SR_ID'];
  $general_user = $SRID;
	$qryProfile=mysqli_query($bd, "SELECT * FROM service_requester WHERE SRID='$SRID'");
	if($memProfile=mysqli_fetch_assoc($qryProfile)) {
		$sremail=$memProfile['email'];
    $srfname=$memProfile['First_Name'];
    $srlname=$memProfile['Last_Name'];
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Service Exchange</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div id="header">
  <div class="container">
  <a href="#"><div id="logo"><img src="images/logo.jpg" alt="logo"></div></a>
  <?php
  if(isset($_SESSION['SESS_ID'])) {
	?>
    <div class="main_image_box">
  <div class="main_image"><img src="profile_images/no-profile-img-male.gif" alt="image"></div>
  <span class="main_image_name_text"><a href="service_provider_page.php"><?php echo $fname." ".$lname;?></a> | <a href="logout.php">Log out</a></span>
  </div>
    <?php
}
elseif(isset($_SESSION['SESS_SR_ID'])){
	?>
    <div class="main_image_box" style="float:left;">
  
  <span class="main_image_name_text" id="pnotification"></span>
  </div>

    <div class="main_image_box">
  <div class="main_image"><img src="profile_images/no-profile-img-male.gif" alt="image"></div>
  <span class="main_image_name_text"><a href="service_requestor_profile_page.php"><?php echo $srfname." ".$srlname;?></a> | <a href="logout.php">Log out</a></span>
  </div>
    <?php
}
else {
?>
  
  <div class="right_header" style="width: 410px;">
  <span class="service_text" style="text-align:center; font-size:16px;">Login</span>
  <div class="button_box">
  <a href="service_provider_login.php"><div class="sign_up_button">Service Provider</div></a>
  <a href="service_requestor_login.php"><div class="log_in_button" style="float: left; margin-left: 10px;">Service Requestor</div></a>
  <a href="nm_login_page.php"><div class="sign_up_button">Group Members</div></a>
  </div>
  </div>
  <div class="right_one_header" style="">
  <!--<div onClick="show_login();" onMouseOver="show_login();" onMouseOut="hide_login();"><span class="service_text">Service Provider Login</span>-->
  <!--Demo-->
  <div class="right_header" style="width: 270px;">
  <span class="service_text" style="text-align:center; font-size:16px;">Register</span>
  <div class="button_box">
  <a href="service_provider_page.php"><div class="sign_up_button">Service Provider</div></a>
  <a href="service_requestor_profile_page.php"><div class="log_in_button">Service Requestor</div></a>
  </div>
  </div>
  <!--//Demo-->
  
  <div class="expart_log_in_bg" id="sp_login_form" style="">
  <form action="sp_login.php" method="post">
  <div class="user_box">
  <span class="user_text">Email</span>
  <div class="user_fild_box"><input name="email" class="user_fild_box_main" type="email" required></div>
  </div>
  <div class="user_box">
  <span class="user_text">Password</span>
  <div class="user_fild_box"><input name="pwd" class="user_fild_box_main" type="password" required></div>
  </div>  
  <input type="submit" class="sign_up_button" value="Log In">
  </form>
  <a href="service_provider_page.php"><div class="sign_up_button">Register</div></a>
  </div>
  </div>
  <script>
  function show_login(){
	 
		  document.getElementById("sp_login_form").style.display="block";
	  
  }
  function hide_login(){
	 
		  document.getElementById("sp_login_form").style.display="none";
	  
  }
  </script>
  </div>
  <?php
}
?>
  </div>
  </div>
  <div class="main_body_box" style="background:none; margin-top:60px;">
      <div class="container"> 
  <a href="demotest">
  <div class="log_in_button" style="width:320px; float:left; margin-top:20px; margin-left:30px;">Goto Test Page</div>
  </a>
  <div class="clearfix"></div>
      	<div class="col-lg-4">
        	<div class="main-box">
            	<div class="icon-box">
                <img src="images/team.png" alt="team">
                </div>
                <a class="redirect-btn" href="groups.php">My Groups</a>
            </div>
        </div>
 
      	<div class="col-lg-4">
        	<div class="main-box">
            	<div class="icon-box">
                <img src="images/old-sp.png" alt="team">
                </div>
                <a class="redirect-btn" href="known_service_provider.php">Known Service Provider</a>
            </div>
        </div>
 
      	<div class="col-lg-4">
        	<div class="main-box">
            <div class="icon-box">
              <img src="images/new-sp.png" alt="team">
            </div>
            <a class="redirect-btn" href="new_search.php">New Service Provider</a>
          </div>
        </div>
      </div>  
      <hr />
      <div class="copy_text">Copyrights 2015.  All Rights Reserved</div>
  </div>
  
  
  
  
  <div id="notification" style="position: absolute; right: 20px; bottom: 20px; width: 320px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; padding: 20px; border: 1px solid rgb(18, 116, 191); display:none;">
  </div>
  
  
  

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script>
setInterval(pal, 3000); // Update every 3 seconds 

function pal() 
{ 
//alert("sd");
$.post("updatestatus.php");
} 
</script>
   
   
   
<script>
  setInterval(update, 10000); // Update every 10 seconds 

function update() 
{ 
//alert("sd");
//$.post("updatestatus.php"); // Sends request to update.php 
} 
</script>
    
     <script>
 $("#expertise").change(function() {
    var selected = $(this).val(); // or this.value
	if(selected) {
		$.ajax({
			url : "search-filter.php?q="+selected,
			success : function (data) {
				$("#specl").html(data);
			}
		});
	}
});
  </script>
<?php
if(isset($_SESSION['SESS_ID'])) {
	?>
<script>
  setInterval("checkcommunication('<?php echo $_SESSION['SESS_ID']; ?>')", 10000); // Update every 10 seconds 

function checkcommunication(spid) 
{ 
//alert(spid);
$.ajax({
	url : "checkcommunication.php",
	success : function (data) {
		//$("#test1").html(data);
		//alert(data);
		if(data==spid) {
			var audio = new Audio('sounds/final-warn-sound.mp3');
			audio.play();
				window.setTimeout(function(){
        			location.href = "https://www.villageexperts.com:8084/#/"+spid;
    			}, 3000);
			
		}
	}
});
} 
</script>

<script>
  setInterval("checksearch('<?php echo $_SESSION['SESS_ID']; ?>')", 1000); // Update every 1 seconds 

function checksearch(spid) 
{ 
//alert(spid);
$.ajax({
	url : "checksearch.php",
	success : function (data) {
		//$("#test1").html(data);
		//alert(data);
		if(data==spid) {
			document.getElementById("notification").style.display="block";
			var htmlval="<div style='width: 30px; float: right; margin-top: -20px; margin-right: -20px; cursor:pointer;' onclick='hide_notification();'><img src='images/close.png' alt='close'></div><div style='float:left; width:100%;'>You are under active selection process</div>";
			$('#notification').html(htmlval);
			var audio = new Audio('sounds/warn-sound.mp3');
			audio.play();
		}
	}
});
} 
function hide_notification(){
	$('#notification').html("");
	document.getElementById("notification").style.display="none";
}
</script>
<?php } ?>
<?php
if(isset($_SESSION['SESS_SR_ID'])) {
	?>
<script>
  setInterval("chknotification('<?php echo $_SESSION['SESS_SR_ID']; ?>')", 10000); // Update every 10 seconds 

function chknotification(srid) 
{ 
$.ajax({
	url : "chknotification.php?srid="+srid,
	success : function (data) {
		$("#pnotification").html(data);
	}
});
} 
</script>
<?php }?>



<!--Service Requester Status-->
<?php
if(isset($_SESSION['SESS_SR_ID'])) {
?>
<script>
setInterval(last_seen, 10000); // Update every 10 seconds
function last_seen() 
{ 
$.ajax({
	url : "requester_status.php",
	success : function (data) {
		if(data) {
    	
		}
	}
});
} 
</script>
<?php
}

if($_SESSION['SESS_ID']||$_SESSION['SESS_SR_ID']) {
?>
<script>
  setInterval("checkcommunication_group('<?php echo $general_user; ?>')", 10000); // Update every 10 seconds 
function checkcommunication_group(spid) 
{ 
$.ajax({
  url : "checkcommunication_group.php",
  success : function (data) {
    if(data=='error') {
    }
    else{
      var audio = new Audio('sounds/final-warn-sound.mp3');
      audio.play();
        window.setTimeout(function(){
              location.href = "https://www.villageexperts.com:8084/#/"+data;
          }, 3000);      
    }
  }
});
} 
</script>
<?php } ?>

  <?php
  if(isset($_GET['error'])){
    $error=str_replace('"','',$_GET['error']);
    if($error=='loginerror') {
  ?>
    <div style="width: 100%; height: 100%; position: fixed; background: rgba(0, 0, 0, 0.78);" id="notif_box">
      <div style="width: 300px;padding-right: 20px; background: #fff; color: #F00; margin: auto; margin-top: 220px; font-size: 18px; text-align: right;"><a href="javascript:void(0);" title="Close" style="color: #F00;" onclick="close_notif();">X</a></div>     
      <div style="width: 300px; padding: 20px; background: #fff; color: #F00; margin: auto; font-size: 18px; padding-top: 0px;">You have to login to access the page. Thank You!</div>      
    </div>
  <?php
    }
    elseif ($error=='wrongpassword') {
    ?>
      <div style="width: 100%; height: 100%; position: fixed; background: rgba(0, 0, 0, 0.78);" id="notif_box">
        <div style="width: 300px;padding-right: 20px; background: #fff; color: #F00; margin: auto; margin-top: 220px; font-size: 18px; text-align: right;"><a href="javascript:void(0);" title="Close" style="color: #F00;" onclick="close_notif();">X</a></div>
        <div style="width: 300px; padding: 20px; background: #fff; color: #F00; margin: auto; font-size: 18px; padding-top: 0px;">Username or password is wrong. Please try again. Thank You!</div>      
      </div>
    <?php
    }
  }
  ?>
    <script type="text/javascript">
      function close_notif() {
        document.getElementById("notif_box").style.display="none";
      }
    </script>


  </body>
</html>
>>>>>>> 4008c735ab917a2272e16fb62849aa617a073480
