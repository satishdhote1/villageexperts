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

<title>Test---Village Expert</title>



<!-- Bootstrap Core CSS -->

<link rel="stylesheet" href="css/font-awesome.min.css">

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/mainstyle.css" rel="stylesheet">

<link href='https://fonts.googleapis.com/css?family=Dosis|Source+Sans+Pro' rel='stylesheet' type='text/css'>

</head>

<body class="bodybg">

<div class="loader-exp" style="display:none;">

<p><img src="images/ajax-loader.gif"></p>

</div>

<div class="container-fluid header-part">

  <div class="row">

    <div class="col-md-12 text-center">

      <div class="logo"> <img src="images/logo.png" alt="logo" > </div>

      <div class="over-lap">

        <div class="profile pull-left"> <img src="images/img-3.jpg" class="img-responsive"> </div>

        <div class="pull-right">

          <p class="loginname">Test</p>

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

                  <h4 class="modal-title hder" id="myModalLabel"><span class="sp-logo"><img src="images/logo.png"></span>Service Provider Registration</h4>

                </div>

                <span class="SPregErrors" style="display:none;color='red'" ></span>

                <img src="images/ajax-loader.gif" id="SPloader" class="SPloader" style="display:none">

                <div class="modal-body">

                  <div class="row">

                   <form class="form-horizontal SPform" role="form" id="SPform" enctype="multipart/form-data" action="ajax.php" method="post">

                    <div class="col-md-5 ">

                   <!-- <form class="form-horizontal SPform" role="form" id="SPform" enctype="multipart/form-data" action="ajax.php" method="post">-->

                      <div class="form-group">

                        <label class="col-sm-4 control-label">Name</label>

                        <div class="col-sm-8">

                        <input type="hidden" name="tag" value="register">

                        <input type="hidden" name="userType" value="SPregister">

                          <input class="form-control SPname" id="SPname" type="text" name="SPname" >

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

                          <input type="text" name="SPcity" class="form-control SPcity" id="SPcity" placeholder="">

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

                          <input type="radio" value="M" name="sex" style="margin-top:10px;">

                          <span style="color:#666;padding-right:15px;padding-left:10px;"> Male</span>

                          <input type="radio" value="F" name="sex">

                          <span style="color:#666;padding-right:15px;padding-left:10px;"> Female</span> </div>

                      </div>

                      </div>

                      <div class="col-md-7 form-horizontal">

                      <div class="form-group">

                        <label class="col-sm-5 control-label" for=" ">Specialisation *</label>

                        <div class="col-sm-6">

                          <select style="max-width: 353px"  id="SPspecialisation_id" class="form-control-modify form-control SPspecialisation_id" name="SPspecialisation_id">

                            <option value="">Select Any Specialisation</option>

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

                          <select style="max-width: 353px" id="SPsubSpecialisation_id" class="form-control-modify form-control SPsubSpecialisation_id" name="SPsubSpecialisation_id">

                            

                           

                          </select>

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="col-sm-5 control-label" for=" ">Year Of Experience * </label>

                        <div class="col-sm-6">

                         <select style="max-width: 353px"  id="SPexperience" class="form-control-modify form-control SPexperience" name="SPexperience">

                            <option value="">Select Any Experience</option>

                            <?php

                            foreach($experience as  $experiences)

							{

								?>

                            <option value="<?php  echo $experiences['ExperienceID'];  ?>"><?php echo $experiences['Experience'] ; ?></option>

                            <?php

							}

                            

                            ?>

                          </select>

                        </div>

                      </div>

                     <div class="form-group">

                        <label class="col-sm-5 control-label" for=" ">Rate Per 10Min* </label>

                        <div class="col-sm-6">

                          <input type="text" class="form-control SPrateType1" id="SPrateType1" name="SPrateType1">

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="col-sm-5 control-label" for=" ">Rate Per 30Min* </label>

                        <div class="col-sm-6">

                          <input type="text" class="form-control SPrateType2" id="SPrateType2" name="SPrateType2">

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="col-sm-5 control-label" for=" ">Rate Per 60Min* </label>

                        <div class="col-sm-6">

                          <input type="text" class="form-control SPrateType3" id="SPrateType3" name="SPrateType3">

                        </div>

                      </div>

                      

                      <div class="form-group">

                        <label class="col-sm-5 control-label" for=" ">Language * </label>

                        <div class="col-sm-6">

                          <select style="max-width: 353px" onchange="getLaunguages();" id="SPlaunguages" class="form-control-modify form-control SPlaunguages" name="SPlaunguages">

                            <option value="">Select Any Language</option>

                            <?php

                            foreach($launguages as  $lang)

							{

								?>

                            <option value="<?php  echo $lang['language_id'];  ?>"><?php echo $lang['languages'] ; ?></option>

                            <?php

							}

                            

                            ?>

                          </select>

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="col-sm-5 control-label" for=" ">Degree</label>

                        <div class="col-sm-6">

                          

                            <select style="max-width: 353px" id="SPdegree" class="form-control-modify form-control SPdegree" name="SPdegree">

                            <option value="">Select Any Degree</option>

                            <?php

                            foreach($education as  $educations)

							{

								?>

                            <option value="<?php  echo $educations['EducationID'];  ?>"><?php echo $educations['Education'] ; ?></option>

                            <?php

							}

                            

                            ?>

                          </select>





                        </div>

                      </div>
						<div class="form-group">

                        <label class="col-sm-5 control-label" for=" ">Institution* </label>

                        <div class="col-sm-6">

                          <input type="text" class="form-control SPinstitute" id="SPinstitute" name="SPinstitute">

                        </div>

                      </div>
                      <div class="form-group">

                        <label class="col-sm-5 control-label" for=" ">Year Of Passing* </label>

                        <div class="col-sm-6">

                          
                           <select style="max-width: 353px" id="SPyop" class="form-control-modify form-control SPyop" name="SPyop">

                            <option value="">Select an Year</option>

                            <?php

                            for($i=1950;$i<=date('Y');$i++)

							{

								?>

                            <option value="<?php  echo $i;  ?>"><?php echo $i ; ?></option>

                            <?php

							}

                            

                            ?>

                          </select>

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

                          <input type="password" class="form-control  SPcpassword" id="SPcpassword" name="SPcpassword">

                        </div>

                      </div>

                      <div class="form-group">

                        <label class="col-sm-5 control-label" for=" ">Upload your photo </label>

                        <div class="col-sm-6">

                          <input type="file" style="padding:0px;" class="form-control-modify form-control SPimage" 

                          id="SPimage" size="40" id="photo"  name="file" onchange="previewImage(this)" accept="image/*">

                          <!--<input type="button" value="Upload" id="SPupload" class="btn btn-info upload SPupload" name="SPupload">name="SPimage"-->

                        </div>

                      </div>

                    

                  </div>

                  <div class="clearfix"></div>

                   

                  <div class="col-md-4 col-md-offset-2 border4sd" > 

                    <img src="images/ajax-loader.gif" id="SPimageloader" class="SPimageloader" style="display:none">

                  <div class="SPimageErrors" style="display:none;color='red'" ></div>

                 <!-- <img id="SPshowImage preview" class="SPshowImage img-responsive" src="images/img-3.jpg">--> 

                  <img id="preview" class="SPshowImage img-responsive" src="images/img-3.jpg">

                 </div>

                 <div>

                 <button type="submit" class="btn btn-primary SPsubmit" id="SPsubmit" name="SPsubmit">Register</button>

                </div>

                </form>

                </div>

                <div class="modal-footer row">

                  <div class="col-md-6 text-center">

                    <!--<button type="button" class="btn btn-primary SPsubmit" id="SPsubmit" name="SPsubmit">Register</button>-->

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

          <button class="btn btn-info btn-service bg-btn"  data-toggle="modal"  disabled   data-target="#sr-registration">Service Requester</button>

          <div class="modal fade" id="sr-registration" tabindex="-1" role="dialog"     aria-labelledby="myModalLabel" aria-hidden="true">

            <div class="modal-dialog modify-modal-width">

              <div class="modal-content">

                <div class="">

                  <button type="button" class="close close-btn" data-dismiss="modal" aria-hidden="true"> &times; </button>

                 <h4 class="modal-title hder" id="myModalLabel"><span class="sp-logo"><img src="images/logo.png"></span>Service Requester Registration</h4>

                </div>

                 <img src="images/ajax-loader.gif" id="SRloader" class="SRloader" style="display:none">

                 <span class="SRregErrors" style="display:none;color='red'" ></span>

                 

                <div class="modal-body">

                  <div class="row">

                  <form class="form-horizontal SRform" role="form" id="SRform" enctype="multipart/form-data" action="ajax.php" method="post">

                    <div class="col-md-5 ">

                      

                        <div class="form-group">

                          <label class="col-sm-4 control-label">Name</label>

                          <input type="hidden" name="tag" value="register">

                           <input type="hidden" name="userType" value="SRregister">

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

                          <label for="disabledTextInput"  class="col-sm-4 control-label">City</label>

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

                            <input type="radio" value="M" name="sex" style="margin-top:10px;">

                            <span style="color:#666;padding-right:15px;padding-left:10px;"> Male</span>

                            <input type="radio" value="F" name="sex">

                            <span style="color:#666;padding-right:15px;padding-left:10px;"> Female</span> </div>

                        </div>

                      

                    </div>

                    <div class="col-md-7">

                      

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

                            <input type="file" style="padding:0px;" class="form-control-modify form-control SRimage" id="SRimage" size="40" id="photo" name="file" onchange="previewImage(this)" accept="image/*">

                            <!--<input type="button" value="Upload" id="SRupload" class="btn btn-info upload SRupload" name="SRupload">-->

                          </div>

                        </div>

                      

                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-4 col-md-offset-4 border4sd" > 

                      <div class="SRimageErrors" style="display:none;color='red'" ></div>

                    <img id="previewLogo" class="SRshowImage img-responsive" src="images/img-3.jpg"> </div>

                    <button type="submit" class="btn btn-primary SRsubmit" name="SRsubmit" id="SRsubmit">Register</button>

                    </form>

                  </div>

                  <div class="modal-footer row">

                    <div class="col-md-6 text-center">

                      <!--<button type="button" class="btn btn-primary SRsubmit" name="SRsubmit" id="SRsubmit">Register</button>-->

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

        

        <!--Group Head registration-->

        	<div class="">

          <button class="btn btn-info btn-service bg-btn"  data-toggle="modal"     data-target="#gh-registration">Group Member</button>

          <div class="modal fade" id="gh-registration" tabindex="-1" role="dialog"     aria-labelledby="myModalLabel" aria-hidden="true">

            <div class="modal-dialog modify-modal-width">

              <div class="modal-content">

                <div class="">

                  <button type="button" class="close close-btn" data-dismiss="modal" aria-hidden="true"> &times; </button>

                  <h4 class="modal-title hder" id="myModalLabel"><span class="sp-logo"><img src="images/logo.png"></span>Group Member Registration</h4>

                </div>

                <span class="SPregErrors" style="display:none;color='red'" ></span>

                

                <div class="modal-body">

                  <div class="row">

                   <form name="newMember" id="newMember" method="post" action="add-new-member-save.php" enctype="multipart/form-data">

          <div class="row witdh-modify">

            <div class="col-sm-6">

              <div class="form-group form-group-gap">

              <input type="hidden" class="" name="memberRegFresh" value="1">

                <?php /*?><input type="hidden" class="gmID" name="gmID" value="<?php echo $getGM_id; ?>">

                <input type="hidden" class="groupName" name="groupName" value="<?php echo $getgroupName; ?>"><?php */?>

                <label class="col-sm-3 control-label" for="firstname">Member Name *</label>

                <div class="col-sm-9">

                  <input type="text" value="" id="member-Name" placeholder="Member-Name" class="form-control dorder0" name="member-Name">

                </div>

                <div class="clearfix"></div>

              </div>

              <div class="form-group form-group-gap">

                <label class="col-sm-3 control-label" for="Mobile Number">Mobile Number</label>

                <div class="col-sm-9">

                  <input type="text" value="" id="mobileNo" placeholder="Mobile-Number" class="form-control dorder0 mobileNo" name="mobileNo">

                </div>

                <div class="clearfix"></div>

              </div>

              <div class="form-group form-group-gap">

                <label class="col-sm-3 control-label" for="firstname">Email *</label>

                <div class="col-sm-9">

                  <input type="text" value="" id="email" placeholder="Email" class="form-control dorder0 email" name="Email">

                </div>

                <div class="clearfix"></div>

              </div>

            </div>

            <div class="col-sm-6">

              <div class="text-right">

                <input type="submit" class="group-submit" value="Register Member" id="submit" name="submit">

              </div>

            </div>

          </div>

        </form>

                </div>

                <div class="modal-footer row">

                  <div class="col-md-6 text-center">

                    <!--<button type="button" class="btn btn-primary SPsubmit" id="SPsubmit" name="SPsubmit">Register</button>-->

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

        

        

      </div>

        

      </div>

    </div>

    <!--//service Requester Registration-->

    <div class="col-xs-6 text-center" style="background:#ebebeb;">

      <div class="">

        <button class="btn btn-info btn-service bg-btn serviseproviderLogin" data-toggle="modal"     data-target="#SPLogin">Service Provider</button>

        <?php 

		if(isset($_GET['success'])&& $_GET['success'] == 1 && $_GET['type'] == 'SP')

		{

		?>

        <input type="hidden" name="sploginModalshow" class="sploginModalshow" value="1">

        <?php

		}

		?>

        <div class="modal fade" id="SPLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

          <div class="modal-dialog width-modify">

            <div class="modal-content">

             

                

                  <div class="modal-header"  style="background:#e2ffaa;"><h4 class="modal-title hder2 text-right"><span class="profile-icon"><img src="images/icon-logo.png"></span>Service Provider LOGIN</h4>

                    <button type="button" class="close close-btn" data-dismiss="modal" aria-hidden="true"> &times; </button>

                  </div>

                   <img src="images/ajax-loader.gif" id="SPloginLoader" class="SPloginLoader" style="display:none">

                  <span class="SPerrors" style="display:none;color='red'" ></span>

              <div class="SPmodalHide">

                  <div class="modal-body ">

                    <div class="row">

                      <div class="col-md-12">

                        <div class="form-group" style="position:relative">

                          <input type="hidden" class="SPLoginHidden" id="SPLoginHidden" value="SPLoginHidden" name="SPLoginHidden">

                          <input type="email"   required="requied" class="form-control SPloginEmail" id="SPloginEmail" name="SPloginEmail" placeholder="Email" value="<?php echo (isset($_GET['email'])&&

							 isset($_GET['type']) && $_GET['type'] == "SP")?$_GET['email']:'';  ?>">

                          <span class="icon-block"><i aria-hidden="true" class="fa fa-user"></i> </span> </div>

                        <div class="form-group" style="position:relative; margin-top:25px;">

                          <input type="password" autofocus required class="form-control SPloginPwd" id="SPloginPwd" name="SPloginPwd" placeholder="Password">

                          <span class="icon-block"><i aria-hidden="true" class="fa fa-lock"></i> </span> </div>

                      </div>

                    </div>

                  </div>

                  

                  

                  <div class="row-new">

                    <div class="col-sm-6 text-left">

                      <button type="button" class="btn btn-default"  data-dismiss="modal" style="padding: 8px 28px;">Close </button>

                    </div>

                    <div class="col-sm-6 text-right">

                    <button type="button" class="btn btn-primary btn-modify-submit SPloginSubmit" id="SPloginSubmit" name="SPloginSubmit">LOGIN </button>

                    </div>

                     <div class="clearfix"></div>

                  </div>

                  

                  

                  </div>

                

              </div>

              <!-- /.modal-content --> </div>

          </div>

          <div class="">

            <button class="btn btn-info btn-service bg-btn" data-toggle="modal" data-target="#SRLogin">Service Requester</button>

            <?php 

		if(isset($_GET['success'])&& $_GET['success'] == 1 && $_GET['type'] == 'SR')

		{

		?>

        <input type="hidden" name="srloginModalshow" class="srloginModalshow" value="1">

        <?php

		}

		?>

            <div class="modal fade" id="SRLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

              <div class="modal-dialog width-modify">

              

                <div class="modal-content">

                

                    <div class="modal-header"  style="background:#e2ffaa;"><h4 class="modal-title hder2 text-right"><span class="profile-icon"><img src="images/icon-logo.png"></span>Service Requester LOGIN</h4>

                      <button type="button" class="close close-btn" data-dismiss="modal" aria-hidden="true"> &times; </button>

                    </div>

                    <img src="images/ajax-loader.gif" id="SRloginLoader" class="SRloginLoader" style="display:none">

                    <span class="SRerrors" style="display:none;color='red'"></span>

                  <div class="SRmodalHide">

                    <div class="modal-body ">

                      <div class="row">

                        <div class="col-md-12">

                          <div class="form-group" style="position:relative">

                            <input type="hidden" class="SRLoginHidden" id="SRLoginHidden" name="SRLoginHidden" value="SRLoginHidden">

                            <input type="email"   required="requied" class="form-control SRLoginEmail" id="SRLoginEmail" name="SRLoginEmail" placeholder="Email" value="<?php echo (isset($_GET['email'])&&

							 isset($_GET['type']) && $_GET['type'] == "SR")?$_GET['email']:'';  ?>">

                            <span class="icon-block"><i aria-hidden="true" class="fa fa-user"></i> </span> </div>

                          <div class="form-group" style="position:relative; margin-top:25px;">

                            <input type="password"  autofocus required class="form-control SRLoginPwd" id="SRLoginPwd" name="SRLoginPwd" placeholder="Password">

                            <span class="icon-block"><i aria-hidden="true" class="fa fa-lock"></i> </span> </div>

                        </div>

                      </div>

                    </div>

                  </div>

                  <div class="row-new">

                    <div class="col-sm-6 text-left">

                      <button type="button" class="btn btn-default"  data-dismiss="modal" style="padding: 8px 28px;">Close </button>

                    </div>

                    <div class="col-sm-6 text-right">

                    <button type="button" class="btn btn-primary btn-modify-submit SRLoginSubmit" id="SRLoginSubmit" name="SRLoginSubmit">LOGIN </button>

                  </div>

                   <div class="clearfix"></div>

                </div>

                <!-- /.modal-content --> </div>

            </div>

          </div>

          <div class="">

            <button class="btn btn-info btn-service bg-btn" data-toggle="modal" data-target="#GMLogin">Group Member</button>

            <?php 

		if(isset($_GET['success'])&& $_GET['success'] == 1 && $_GET['type'] == 'GM')

		{

		?>

        <input type="hidden" name="gmloginModalshow" class="gmloginModalshow" value="1">

        <?php

		}

		?>

            <div class="modal fade" id="GMLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

              <div class="modal-dialog width-modify">

                <div class="modal-content">

                

                    <div class="modal-header" style="background:#e2ffaa;">

                    <h4 class="modal-title hder2 text-right"><span class="profile-icon"><img src="images/icon-logo.png"></span>Group Member LOGIN</h4>

                      <button type="button" class="close close-btn" data-dismiss="modal" aria-hidden="true"> &times; </button>

                    </div>

                    <img src="images/ajax-loader.gif" id="GMloginLoader" class="GMloginLoader" style="display:none">

                    <span class="GMerrors" style="display:none"></span>

                  <div class="GMmodalHide">

                    <div class="modal-body ">

                      <div class="row">

                        <div class="col-md-12">

                          <div class="form-group" style="position:relative">

                            <input type="hidden" class="GMLoginHidden" id="GMLoginHidden" name="GMLoginHidden" value="GMLoginHidden">

                            <input type="email"   required="requied"  class="form-control GMLoginEmail" id="GMLoginEmail" name="GMLoginEmail" placeholder="Email" value="<?php echo (isset($_GET['email'])&&

							 isset($_GET['type']) && $_GET['type'] == "GM")?$_GET['email']:'';  ?>">

                            <span class="icon-block"><i aria-hidden="true" class="fa fa-user"></i> </span> </div>

                          <div class="form-group" style="position:relative; margin-top:25px;">

                            <input type="password" required class="form-control GMLoginPwd" id="GMLoginPwd" name="GMLoginPwd" placeholder="Password">

                            <span class="icon-block"><i aria-hidden="true" class="fa fa-lock"></i> </span> </div>

                        </div>

                      </div>

                    </div>

                    <div class="row-new">

                      <div class="col-sm-6 text-left">

                        <button type="button" class="btn btn-default"  data-dismiss="modal" style="padding: 8px 28px;">Close </button>

                      </div>

                      <div class="col-sm-6 text-right">

                      <button type="button" class="btn btn-primary btn-modify-submit GMLoginSubmit" id="GMLoginSubmit" name="GMLoginSubmit">LOGIN </button>

                    </div>

                     <div class="clearfix"></div>

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

<script src="js/jquery.validate.min.js"></script>

<script src="js/instantImageShow.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.0/jquery.scrollTo.min.js"></script>

</body>

</html>

