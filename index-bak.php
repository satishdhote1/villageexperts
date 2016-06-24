<?php
include("initialDBdata.php");//registration for data
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>village expert</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/mainstyle.css" rel="stylesheet">
</head>
<body class="bodybg">
<div class="container-fluid header-part">
  <div class="row">
    <div class="col-md-12 text-center">
      <div class="logo"> <img src="images/logo.png" alt="logo" > </div>
      <div class="over-lap">
        <div class="profile pull-left"> <img src="images/img-3.jpg" class="img-responsive"> </div>
        <div class="pull-right">
          <p class="loginname">SUBHASIS NASKAR</p>
          <button class="btn btn-info bg-blue">Logout</button>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="col-md-6 col-md-offset-3 bg-login">
    <div class="row">
      <div class="header-bg">
        <div class="col-xs-6 text-center">
          <p class="title">Registration<i class="fa fa-edit" style="padding-left:10px;color:#999"></i></p>
        </div>
        <div class="col-xs-6 text-center">
          <p class="title">LOGIN<i class="fa fa-lock" style="padding-left:10px;color:#999"></i></p>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="col-xs-6 text-center">
      <!--service Provider Registration-->
        <div class="">
          <button class="btn btn-info btn-service bg-btn"  data-toggle="modal"     data-target="#sp-registration">Service Provider</button>
          <div class="modal fade" id="sp-registration" tabindex="-1" role="dialog"     aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modify-modal-width">
              <div class="modal-content">
                <div class="">
                  <button type="button" class="close close-btn" data-dismiss="modal" aria-hidden="true"> &times; </button>
                  <h4 class="modal-title hder" id="myModalLabel"> SP Registration </h4>
                </div>
                <span class="SPregErrors" style="display:none;color='red'" ></span>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-5 ">
                    <form class="form-horizontal SPform" role="form" id="SPform" enctype="multipart/form-data" action="" method="post">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Name</label>
                        <div class="col-sm-8">
                          <input class="form-control SPname" id="SPname" type="text" name"SPname" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Address</label>
                        <div class="col-sm-8">
                          <textarea class="form-control SPaddress" id="SPaddress" name="SPaddress" rows="3"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="disabledTextInput"  class="col-sm-4 control-label"> City</label>
                        <div class="col-sm-8">
                          <input type="text" name="SPcity" class="form-control SPcity" id="SPcity" placeholder="Enter Your City">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="disabledSelect"  class="col-sm-4 control-label">Country </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control SPcountry" name="SPcountry" id="SPcountry">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label" for="inputSuccess"> Pin</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control SPpin" name="SPpin" id="SPpin">
                        </div>
                      </div>
                      <div class="form-group ">
                        <label class="col-sm-4 control-label" for="inputWarning"> Mobile </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control SPmobile" id="SPmobile" name="SPmobile">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label" for=" ">Email </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control SPemail" id="SPemail" name="SPemail">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label" for=" ">Sex </label>
                        <div class="col-sm-8">
                          <input type="radio" value="M" name="sex">
                          <span style="color:#666;padding-right:15px;padding-left:10px;"> Male</span>
                          <input type="radio" value="F" name="sex">
                          <span style="color:#666;padding-right:15px;padding-left:10px;"> Female</span> </div>
                      </div>
                      </div>
                      <div class="col-md-7 form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-5 control-label" for=" ">Specialisation </label>
                        <div class="col-sm-6">
                          <select style="max-width: 353px" onchange="get_specialisation();" id="SPspecialisation_id" class="form-control-modify form-control SPspecialisation_id" name="specialisation_id">
                            <option value="-1">Select Any Specialisation</option>
                            <?php
                            foreach($specialisation as  $special)
							{
								?>
                            <option value="<?php  echo $special['specialisation_id'];  ?>"><?php echo $special['specialisation'] ; ?></option>
                            <?php
							}
                            
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5 control-label" for=" ">Sub Specialisation * </label>
                        <div class="col-sm-6">
                          <select style="max-width: 353px" onchange="get_sub_specialisation();" id="SPsubSpecialisation_id" class="form-control-modify form-control SPsubSpecialisation_id" name="subSpecialisation_id">
                            <option value="-1">Select Sub Specialisation</option>
                            <?php
                            foreach($subSpecialisation as  $sub)
							{
								?>
                            <option value="<?php  echo $sub['sub_specialisation_id'];  ?>"><?php echo $sub['sub_specialisation'] ; ?></option>
                            <?php
							}
                            
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5 control-label" for=" ">Year Of Experience * </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control SPexperience" id="SPexperience" name="SPexperience">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5 control-label" for=" ">Rate Per Hour * </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control SPrph" id="SPrph" name="SPrph">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5 control-label" for=" ">Language * </label>
                        <div class="col-sm-6">
                          <select style="max-width: 353px" onchange="getLaunguages();" id="SPlaunguages" class="form-control-modify form-control SPlaunguages" name="Launguages">
                            <option value="-1">Select Any Launguage</option>
                            <?php
                            foreach($launguages as  $lang)
							{
								?>
                            <option value="<?php  echo $lang['language_id'];  ?>"><?php echo $lang['language'] ; ?></option>
                            <?php
							}
                            
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5 control-label" for=" ">Time Zone </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control SPtimezone" id="SPtimezone" name="SPtimezone">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5 control-label" for=" ">Password * </label>
                        <div class="col-sm-6">
                          <input type="password" class="form-control SPpassword" id="SPpassword " name="SPpassword">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5 control-label" for=" ">Confirm Password * </label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control  SPcpassword" id="SPcpassword" name="SPcpassword">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-5 control-label" for=" ">Upload your photo </label>
                        <div class="col-sm-6">
                          <input type="file" style="padding:0px;" class="form-control-modify form-control SPimage" id="SPimage" size="40" id="photo" name="SPimage">
                          <input type="button" value="Upload" id="SPupload" class="btn btn-info upload SPupload" name="SPupload">
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-4 col-md-offset-4 border4sd" > <img id="SPshowImage" class="SPshowImage" src="images/img-3.jpg"> </div>
                </div>
                <div class="modal-footer row">
                  <div class="col-md-6 text-center">
                    <button type="button" class="btn btn-primary SPsubmit" id="SPsubmit" name="SPsubmit">Register as a Service Provider</button>
                  </div>
                  <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-close-mdfy" data-dismiss="modal">Close </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--//service Provider Registration-->
        <!--service Requester Registration-->
        
        <div class="">
          <button class="btn btn-info btn-service bg-btn"  data-toggle="modal"     data-target="#sr-registration">Service Requestor</button>
          <div class="modal fade" id="sr-registration" tabindex="-1" role="dialog"     aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modify-modal-width">
              <div class="modal-content">
                <div class="">
                  <button type="button" class="close close-btn" data-dismiss="modal" aria-hidden="true"> &times; </button>
                  <h4 class="modal-title hder" id="myModalLabel"> SR Registration </h4>
                </div>
                 <span class="SRregErrors" style="display:none;color='red'" ></span>
                 
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-5 ">
                      <form class="form-horizontal SRform" role="form" id="SRform" enctype="multipart/form-data" action="" method="post">
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Name</label>
                          <div class="col-sm-8">
                            <input class="form-control SRname" id="SRname" type="text" name="SRname" >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Address</label>
                          <div class="col-sm-8">
                            <textarea class="form-control SRaddress" id="SRaddress" name="SRaddress" rows="3"></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="disabledTextInput"  class="col-sm-4 control-label"> city / Town </label>
                          <div class="col-sm-8">
                            <input type="text"  class="form-control SRcity" id="SRcity" name="SRcity"  placeholder="Enter City">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="disabledSelect"  class="col-sm-4 control-label">Country </label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control SRcountry" id="SRcountry" name="SRcountry"  >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label" for="inputSuccess"> Pin</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control SRpin" id="SRpin" name="SRpin">
                          </div>
                        </div>
                        <div class="form-group ">
                          <label class="col-sm-4 control-label" for="inputWarning"> Mobile </label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control SRmobile" id="SRmobile" name="SRmobile">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label" for=" ">Email </label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control SRemail" id="SRemail" name="SRemail">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label" for=" ">Sex </label>
                          <div class="col-sm-8">
                            <input type="radio" value="M" name="sex">
                            <span style="color:#666;padding-right:15px;padding-left:10px;"> Male</span>
                            <input type="radio" value="F" name="sex">
                            <span style="color:#666;padding-right:15px;padding-left:10px;"> Female</span> </div>
                        </div>
                      </form>
                    </div>
                    <div class="col-md-7">
                      <form role="form" class="form-horizontal">
                        <div class="form-group">
                          <label class="col-sm-5 control-label" for=" ">Password * </label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control SRpassword" id="SRpassword" name="SRpassword">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-5 control-label" for=" ">Confirm Password * </label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control SRcpassword" id="SRcpassword" name="SRcpassword">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-5 control-label" for=" ">Upload your photo </label>
                          <div class="col-sm-6">
                            <input type="file" style="padding:0px;" class="form-control-modify form-control SRphoto" id="SRphoto" size="40" id="photo" name="SRimage">
                            <input type="button" value="Upload" id="SRupload" class="btn btn-info upload SRupload" name="SRupload">
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-4 col-md-offset-4 border4sd" > <img id="SRshowImage" class="SRshowImage" src="images/img-3.jpg"> </div>
                  </div>
                  <div class="modal-footer row">
                    <div class="col-md-6 text-center">
                      <button type="button" class="btn btn-primary SRsubmit" name="SRsubmit" id="SRsubmit">Register as a Service Provider</button>
                    </div>
                    <div class="col-md-6 text-right">
                      <button type="button" class="btn btn-close-mdfy" data-dismiss="modal">Close </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--//service Requester Registration-->
    <div class="col-xs-6 text-center">
      <div class="">
        <button class="btn btn-info btn-service bg-btn serviseproviderLogin" data-toggle="modal"     data-target="#SPLogin">Service Provider</button>
        <div class="modal fade" id="SPLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog width-modify">
            <div class="modal-content">
             
                
                  <div class="modal-header"> <span style="font-size:18px"><b>Service Provider LOGIN</b></span>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                  </div>
                  <span class="SPerrors" style="display:none;color='red'" ></span>
              <div class="SPmodalHide">
                  <div class="modal-body ">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group" style="position:relative">
                          <input type="hidden" class="SPLoginHidden" id="SPLoginHidden" value="SPLoginHidden" name="SPLoginHidden">
                          <input type="email"   required="requied" class="form-control SPloginEmail" id="SPloginEmail" name="SPloginEmail" placeholder="Email">
                          <span class="icon-block"><i aria-hidden="true" class="fa fa-user"></i> </span> </div>
                        <div class="form-group" style="position:relative; margin-top:25px;">
                          <input type="password"  required="requied" class="form-control SPloginPwd" id="SPloginPwd" name="SPloginPwd" placeholder="Password">
                          <span class="icon-block"><i aria-hidden="true" class="fa fa-lock"></i> </span> </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <button type="button" class="btn btn-default"  data-dismiss="modal">Close </button>
                    </div>
                    <button type="button" class="btn btn-primary btn-modify-submit SPloginSubmit" id="SPloginSubmit" name="SPloginSubmit">LOGIN </button>
                  </div>
                  </div>
                
              </div>
              <!-- /.modal-content --> </div>
          </div>
          <div class="">
            <button class="btn btn-info btn-service bg-btn" data-toggle="modal" data-target="#SRLogin">Service Requester</button>
            <div class="modal fade" id="SRLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog width-modify">
              
                <div class="modal-content">
                
                    <div class="modal-header"> <span style="font-size:18px"><b>Service Requester LOGIN</b></span>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                    </div>
                    <span class="SRerrors" style="display:none;color='red'"></span>
                  <div class="SRmodalHide">
                    <div class="modal-body ">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group" style="position:relative">
                            <input type="hidden" class="SRLoginHidden" id="SRLoginHidden" name="SRLoginHidden" value="SRLoginHidden">
                            <input type="email"   required="requied" class="form-control SRLoginEmail" id="SRLoginEmail" name="SRLoginEmail" placeholder="Email">
                            <span class="icon-block"><i aria-hidden="true" class="fa fa-user"></i> </span> </div>
                          <div class="form-group" style="position:relative; margin-top:25px;">
                            <input type="password"  required="requied" class="form-control SRLoginPwd" id="SRLoginPwd" name="SRLoginPwd" placeholder="Password">
                            <span class="icon-block"><i aria-hidden="true" class="fa fa-lock"></i> </span> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <button type="button" class="btn btn-default"  data-dismiss="modal">Close </button>
                    </div>
                    <button type="button" class="btn btn-primary btn-modify-submit SRLoginSubmit" id="SRLoginSubmit" name="SRLoginSubmit">LOGIN </button>
                  </div>
                </div>
                <!-- /.modal-content --> </div>
            </div>
          </div>
          <div class="">
            <button class="btn btn-info btn-service bg-btn" data-toggle="modal" data-target="#GMLogin">Group Member</button>
            <div class="modal fade" id="GMLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog width-modify">
                <div class="modal-content">
                
                    <div class="modal-header"> <span style="font-size:18px"><b>Group Member LOGIN</b></span>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                    </div>
                    <span class="GMerrors" style="display:none"></span>
                  <div class="GMmodalHide">
                    <div class="modal-body ">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group" style="position:relative">
                            <input type="hidden" class="GMLoginHidden" id="GMLoginHidden" name"GMLoginHidden" value="GMLoginHidden">
                            <input type="email"   required="requied"  class="form-control GMLoginEmail" id="GMLoginEmail" name="GMLoginEmail" placeholder="Email">
                            <span class="icon-block"><i aria-hidden="true" class="fa fa-user"></i> </span> </div>
                          <div class="form-group" style="position:relative; margin-top:25px;">
                            <input type="password" required class="form-control GMLoginPwd" id="GMLoginPwd" name="GMLoginPwd" placeholder="Password">
                            <span class="icon-block"><i aria-hidden="true" class="fa fa-lock"></i> </span> </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <button type="button" class="btn btn-default"  data-dismiss="modal">Close </button>
                      </div>
                      <button type="button" class="btn btn-primary btn-modify-submit GMLoginSubmit" id="GMLoginSubmit" name="GMLoginSubmit">LOGIN </button>
                    </div>
                  </div>
                </div>
                <!-- /.modal-content --> </div>
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
<script src="js/formSubmission.js"></script>
</body>
</html>
