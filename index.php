
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
    //$sql="select * from   friendsRegister where email = '$email' and (isexpert = 1 OR isexpert = 2)";
    $sql="select * from friendsRegister where email = '$email' and id in (select userid from friendsExpertInfo where isexpert = 1)";
    //echo $sql;die();
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
    //$sql="select * from   friendsRegister where email = '$email' and (isexpert = 0 OR isexpert = 2)";
    $sql="select * from   friendsRegister where email = '$email' and id in (select userid from friendsExpertInfo where isexpert = 0)";
    //die($sql);
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


<body>

    <!-- Start your project here-->

    <!--Navbar-->
    <nav class="navbar navbar-dark scrolling-navbar logo-scroll">
       
        <div class="container">

            <!--Collapse content-->
            <div class="logo-modify">
                <!--Navbar Brand-->
                <a class="navbar-brand" href="#" target="_blank"><img src="img/normal/logo.png"><p>VILLAGE EXPERTS</p></a>
                <!--Links-->
                <div class="btn-primary col-md-2" href="#" target="_blank" style="background: transparent;padding: 10px;float: right;">About</div>
                <div class="btn-primary col-md-2" href="#" target="_blank" style="background: transparent;padding: 10px;float: right;">Contact US</div>
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
                            <div class="text-xs-right">
                              <!--<a class="text-info teal-text m-r-2 backLogin" style="font-size:20px;font-family:Arial, Helvetica, sans-serif"></a>-->
                                <div class="loginbut" style="padding:0px 0;width:100%;margin:auto;" >
                                    <div class="text-xs-center">
                                        <span class="hideFirstSection"></span>

                                        <div class="col-xs-8 SPloginLoader" style="padding-right:0;display:none;"> <hr>
                                            <img src="images/ajax-loader.gif" id="" class="" style="">
                                            <center><span class="SPerrors" style="display:none;color: red;" ></span></center>
                                        </div>

                                        <div  class="loginSec" >

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

                                            <div class="text-xs-center row">
                                                <button class="btn log  modal__trigger friendLoginButton" id="friendLoginButton">LOGIN</button><br/>
                                                <button class="col-md-4 btn log" id="friendForgetPasswordButtonButton">Forgot Password</button>
                                                <button class="col-md-4 button button2 regClick">
                                                    <strong>REGISTER</strong>
                                                    <p class="button2subheading">New User</p>
                                                </button>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>

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
                                else
                                {
                                    ?>
                                    <input type="hidden" name="isexpertreg" value="" class="isexpertreg">
                                    <input type="hidden" name="expertID" value="">
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
                                                 <i class="fa fa-envelope prefix"> Email<span style="color:#F00;font-size:18px">*</span></i>
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
                                                  <div class="upload-img-block"> <img src="images/placeholder/male3.jpg" id="preview" width="10%" height="10%">
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
                                         <div class="text-xs-center row ">
                                            <button class="btn log  modal__trigger addFriendSubmit waves-effect waves-light" id="addFriendSubmit" style="margin-right:150px;text-transform:uppercase" type="submit">Register</button>
                                            <button class="col-md-4 button loginClick" style="width:150px;background-color:#cdcdcd;"><strong>LOGIN</strong><p style="font-size:12px;border-top:1px solid #fff;margin:0;padding-top:9px;">Returning User</p></button></div> <div class="col-md-6 text-xs-center">
                                         </div>

                                     </div>

                                </div>
                            </form>


                      </div>

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
    <div id="pwdModal" class="forgetpasswordModal modal fade in" tabindex="-1" role="dialog" aria-hidden="false" style="display: block;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="text-center">What's My Password?</h3>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="text-center">

                                    <p>If you have forgotten your password you can reset it here.</p>
                                    <div class="panel-body">
                                        <fieldset>
                                            <div class="form-group">
                                                <input class="form-control input-lg emailFP" placeholder="E-mail Address" name="emailFP" type="email">
                                            </div>
                                            <i class="btn btn-lg btn-primary btn-block submitFP waves-input-wrapper waves-effect waves-light" style="color:rgb(255, 255, 255);background:rgba(0, 0, 0, 0)"><input class="waves-button-input" value="Send My Password" type="button" style="background-color:rgba(0,0,0,0);"></i>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-12">
                        <button class="btn waves-effect waves-light" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    
    if(window.location.hash == "#login"){
      $(".loginModal").click();
      $(".backLogin").show("medium");
      $(".loginbut").hide("medium");
      $(".loginSec").show("medium");
      $(".hideFirstSection").css("display","none");
    }
	  
    if(window.location.hash == "#register"){
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
