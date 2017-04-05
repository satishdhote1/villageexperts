<?php
include("config/connection.php");
//session_start();
$conn=new connections();
$conn=$conn->connect();
//print_r($conn);die();
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
$sql2="select * from  sp_sub_specialisation where specialisation_id = ".$specialData[0]['specialisation_id']." order by sub_specialisation";
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
$sql3="select * from  education ORDER BY EducationID";
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
$sql4="select * from  experience ORDER BY ExperienceID";
$tableResult4 = mysqli_query($conn, $sql4);

$experience = array();
if (mysqli_num_rows($tableResult4) > 0)
{
    while($row = mysqli_fetch_assoc($tableResult4)) {
    $experience[] = $row;
    }
}

  //Get Sub Language Data
$sql5="select * from  sp_language ORDER BY languages";
$tableResult5 = mysqli_query($conn, $sql5);
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
    <meta name="viewport" content="width=device-width, initial-scale=1,">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>Village Expert</title>

    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css">
   

    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .md-form.main-block > label, .main-block-2 label {
        font-family: arial;
        font-size: 15px;
        line-height: 35px;
        text-transform: capitalize;
        }
        .upload-img{
            width:170px; height:170px;overflow:hidden;margin:auto;border-radius:10px;padding:10px;border:1px solid #eee; box-shadow:0px 0px 10px rgba(0,0,0,0.5)}
        .main-block fieldset.form-group {
            height: 54px;
            margin-top: 10px;
        }
        .btn-amber:focus, .btn-amber:hover {
            background-color: #9595f9 !important;
        }
    </style>
 <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css">
</head>


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
<div class="container-fluid">
<div class="row m-t-3"> 
    <!--Mask-->
    <div class="col-md-10 col-md-offset-1"> 
      <!--Form-->
      <div class="card" style="border-radius:10px;overflow:hidden;">
        <div class="card-block" style="padding:0;">
           <a href="index.php" class="back-to"><p class="close backLogin" ><img src="images/Left.png" class="" style="cursor:pointer;padding-top:11px;margin-right: 15px;"></p></a>
          <!--Header-->
          <div class="text-xs-center text-danger">
          <h3 style="line-height:60px; color:#000;background:#CCCCFF  ;font-weight:bold;"><img width="50px" style="float:left;padding:3px;" src="img/normal/logo.png">Expert Registration</h3>
            <div class="clearfix"></div>
          </div>
          <div style="padding:0px 25px;"> 
            <!--Body-->
            <div class="row">
              <div class="col-md-12"> <span class="SPregErrors" style="display:none;color='red'" ></span> <img src="images/ajax-loader.gif" id="SPloader" class="SPloader" style="display:none">
                <div class="row">
                  <form class="form-horizontal SPform" role="form" id="SPform" name="SPform" action="ajax.php" method="post"  enctype="multipart/form-data">
                    <div class="col-md-6"> 
                      
                   <div style="width:80%;margin:auto">

                      <input type="hidden" name="tag" value="SPregister">

                      <div class="md-form main-block">
                        <input type="text" id="form2 fname" class="form-control fname"  name="SPfname">
                        <label for="form2">First Name<span style="color:#F00;font-size:18px">*</label>
                      </div>
                      <div class="md-form main-block">
                        <input type="text" id="form2 lname" class="form-control lname" name="SPlname" >
                        <label for="form2">Last Name<span style="color:#F00;font-size:18px">*</label>
                      </div><div class="md-form main-block">
                        <input type="text" id="form8 email" class="form-control email" name="SPemail">
                        <label for="form8">email<span style="color:#F00;font-size:18px">*</label>
                      </div><div class="md-form main-block">
                        <input type="text" id="form7 phone" class="form-control phone" name="SPmobile">
                        <label for="form7">Mobile</label>
                      </div><div class="md-form main-block">
                        <input type="text" id="form4 city" class="form-control city" name="SPcity">
                        <label for="form4">City</label>
                      </div><div class="md-form main-block">
                        <input id="form9 country" class="form-control country" type="text" name="SPcountry">
                         <label for="form9">Country</label>
                         </div><div class="md-form main-block">
                        <input type="password" id="form14 pwds" class="form-control pwds" name="pwds">
                        <label for="form14">Password</label>
                      </div>
                      <div class="md-form main-block">
                        <input type="password" id="form15 cpwd" class="form-control cpwd" name="cpwd">
                        <label for="form15">Confirm Password</label>
                      </div>
                     <!--  <div class="file-field">
                        <div class="btn btn-papl" style="height:40px;margin-left:0; padding: 10px 0;
    width: 125px;float:left;">
    <input type="file" style="opacity:0;" id="pImage" class="pImage" name="pImage" onchange="previewImage(this)" accept="image/*">
                      <i class="fa fa-upload white-text"></i> 
                      <span>Browse<span style="color:#F00;font-size:18px">*</span></span>
                        
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text" placeholder="Upload your Image" disabled style="border-bottom:0px;padding-top: 10px;">
                        </div>
                      </div>
                      <div class="clearfix"></div> -->
                    <div class="file-field">
                        <div class="btn btn-papl" style="height:40px;margin-left:0; padding: 10px 0;
    width: 125px;float:left;"><i class="fa fa-upload white-text"></i> <span>Browse</span>
                          <input type="file" style="opacity:0;position: absolute;top:0;height: 40px;left: 0;" id="pImage" class="pImage" name="pImage" onchange="previewImage(this)" accept="image/*">
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text" placeholder="Upload your Image" disabled style="border-bottom:0px;padding-top: 10px;">
                        </div>
                      </div>
                      <div class="clearfix"></div>
                      
                    </div>
                    </div>
                    
                    
                    <div class="col-md-6">
                      <div style="width:80%;margin:auto">
                      
                      <div class="md-form main-block">
                        <fieldset class="form-group">
                          <select id="SPexpertise expertiesLabel" class="form-control SPexpertise expertiesLabel" name="SPexpertise">
                          <option value="">Select Expertise </option>
                          <?php foreach($specialData as $specialDatas) { ?>
                            
                            <option value="<?php echo $specialDatas['specialisation_id']; ?>"><?php echo $specialDatas['specialisation']; ?></option>
                            <?php }?>
                          </select>
                        </fieldset>
                      </div>
                      <div class="md-form main-block">
                        <fieldset class="form-group">
                          <select id="SP_Sub_Expertise" class="form-control SP_Sub_Expertise" name="SP_Sub_Expertise">
                            <option value="">Select Sub-Expertise </option>
                            <?php foreach($subspecialData as $subspecialDatas) { ?>
                            <option value="<?php echo $subspecialDatas['sub_specialisation_id']; ?>"><?php echo $subspecialDatas['sub_specialisation']; ?></option>
                            <?php }?>
                          </select>
                        </fieldset>
                      </div>
                          <div class="md-form main-block">
                            <fieldset class="form-group">
                              <select id="SPEducation" class="form-control SPEducation" name="SPEducation">
                                <option>Select Degree</option>
                                <?php foreach($education as $educations) { ?>
                                <option value="<?php echo $educations['EducationID']; ?>"><?php echo $educations['Education']; ?></option>
                                <?php }?>
                              </select>
                            </fieldset>
                          </div>
                          <div class="md-form main-block">
                            <fieldset class="form-group">
                              <select id="SPExperience" class="form-control SPExperience" name="SPExperience">
                                <option>Year Of Experience</option>
                                <?php foreach($experience as $experiences) { ?>

                                <option value="<?php echo $experiences['ExperienceID']; ?>"><?php echo $experiences['Experience']; ?></option>
                                <?php }?>
                              </select>
                            </fieldset>
                          </div>
                          <div class="md-form main-block">
                            <input type="text" id="form10 SPRate" class="form-control SPRate" name="SPrateType1">
                            <label for="form10" style="padding-left:15px;">Hourly Rate (US $)</label>
                          </div>
                          <div class="md-form main-block">
                            <fieldset class="form-group">
                              <select id="SPsrvcTime" class="form-control SPsrvcTime" name="SPsrvcTime">
                                <option>Offer Free Service</option>
                                <option>10 mins</option>
                                <option>20 mins</option>
                                 <option>30 mins</option>
                              </select>
                            </fieldset>
                          </div>
                          <div class="md-form main-block" style="margin-bottom:0px;">
                            <fieldset class="form-group form-control" style="padding:0;height:38px;">
                               <div class="col-xs-5" style="padding:5px 0 0 15px">Choose Language/s</div>
                                <div class="col-xs-7" style="padding-right:0;">
                                  <select id="example-getting-started" multiple="multiple" class="form-control SPlanguage" name="SPlanguage">
                                   <?php foreach($language as $languageDatas) { ?>
                                     <option value="<?php echo $languageDatas['language_id']; ?>"><?php echo $languageDatas['languages']; ?></option>
                                    <?php }?>
                                  </select>
                                </div>
                            </fieldset>
                          </div>
                          <div class="md-form main-block">
                            <input type="text" id="" class="form-control ammount" name="ammount">
                            <label for="11" style="padding-left:15px;">Payment Deposit to Bank:</label>
                          </div>
                          <div class="md-form main-block">
                            <input type="text" id="" class="form-control accNo"  name="accNo">
                            <label for="12" style="padding-left:15px;">Bank Account Number:</label>
                          </div>
                          <div class="md-form main-block">
                            <input type="text" id="" class="form-control bankRoutingNo"  name="bankRoutingNo">
                            <label for="13" style="padding-left:15px;">Bank Routing Number:</label>
                          </div>
                      </div>
                      
                        <div class="">
                            <div class="upload-img"> <img id="preview" class="SPshowImage" src="images/placeholder/maleDummy.png" style="max-width:200px;width:100%;"> </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-2"><p class="m-a-0 small" style=" padding-top: 33px;"><span style="color:#F00;font-size:18px">*</span>Required Fields</p></div>
                    <div class="col-md-8">
                      <button type="submit" class="btn SPsubmit btn-amber p-a-1" id="SPsubmit" name="SPsubmit" style="width:75%; margin-left: 80px;margin-top:10px;margin-bottom:20px;padding:5px 0px !important;font-size:25px;font-weight:bold; background: #CCCCFF ;color:#000;text-transform:uppercase">Register</button>
                    </div>
                    </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/Second column--> 
    </div>
 </div>
 </div>
    <!--Main container-->
    

    <!-- /Start your project here-->
    

    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
  
  <script src="js/formSubmission.js"></script>
    <script src="js/connectMe.js"></script>
    <script src="js/instantImageShow.js"></script>
    <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript">
	
    $(function(){
      //alert();
        $('#example-getting-started').multiselect();

        $(document).on("change",".expertiesLabel",function() {
          var expertId = $(this).val();
         // alert(expertId);
          resultData = "<option value=''>Select Sub-Expertise </option>";
	 resultData2 = "<option value=''>Select Degree </option>";
          if(expertId !="")
          {
             // alert(expertId);
              $.ajax({
              type:"POST",
              url:"getSearchData.php",
              data:{getDataOf:"subSpecial",id:expertId},
              dataType:'json',
              success: function (result) {
              console.log(result);
                if(result.success == 1)
                {
                  $.each(result.datas, function(i, item) {
              		  var id = item.sub_specialisation_id;
                      var values = item.sub_specialisation;
                      var images = item.SubSpImages;
      
                        resultData = resultData + '<option value="'+id+'">'+values+'</option>';
                   });
                  console.log("resultData=="+resultData);
                    $('.SP_Sub_Expertise').html(resultData);
		
		$.each(result.educationData, function(i, item) {
              		  var id = item.EducationID;
                      var values = item.Education;
                      var specialisation_id = item.specialisation_id;
      
                        resultData2 = resultData2 + '<option value="'+id+'">'+values+'</option>';
                   });
                  console.log("resultData=="+resultData2);
                    $('.SPEducation').html(resultData2);
			
                }
              },
              error: function (error) {
              //$(".loader-exp").hide();
              alert("Not Succesful !");
              }
              });
          }
            });

    });
</script>
  
   


</body>

</html>
