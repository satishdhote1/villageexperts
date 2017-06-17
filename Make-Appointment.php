<?php
session_start();
/*$x =  file_get_contents('http://ip-api.com/json/' . $_SERVER['REMOTE_ADDR']);
$xx = json_decode($x);
//print_r($xx);
$xxx =  $xx->timezone;
date_default_timezone_set($xxx);*/
//echo date("Y-m-d h:00 A");


?>
<!DOCTYPE html>

<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Make an Appointment</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <?php include 'vvheader.php';?>

    <!--Mask-->

   <section class="friend-family">

        <div class="p-t-0">

            <div class="">

            <div class="row">

            <div class="col-md-12  m-t-0" style="padding:0px;">
            <section class="bg-yellow text-xs-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 p-t-1 p-b-1">
                        <h3 class=""><b>Request An Appointment with <?php echo $_REQUEST['recieverFname'];  ?> </b>
                            <a href="friends-family.php"> <img src="images/Left.png" class="" style="cursor:pointer;position:relative;float:right;right:150px;"/></a> </h3>
                        </div>
                    </div>
                </div>
            </section>
    <div class="card-block text-xs-center">

                <!--Title-->
    <div class="clearfix"></div>
    <div class="loader"></div>
    <div class="alert alert-success connSuccess" style="display:none;margin-top: 10px;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span></span> Time Selected!
    </div>
    <div class="alert alert-warning connDanger" style="display:none;margin-top: 10px;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span></span>
    </div>

    <div class="col-md-6 col-md-offset-2" style="padding-left:0">
        <div class="text-xs-right pull-xs-left"><p class="white-text"><strong style="font-size: 30px;">Available =</strong> <label class="simbel" style="background-color: #FC6; color: #000; border: none;">A</label></p></div>
        <div class="text-xs-left pull-xs-right"><p class="white-text"><strong style="font-size: 30px;">Confirmed =</strong> <label class="simbel" style="background-color:#9595f9; color: #000; border: none;">C</label></p></div>
    </div>

    <div class="col-xs-3"><button class="btn btn-danger modify-btn-1 text-xs-right btn-lg modal__trigger btnDone" style="width: 90px; margin-top: 0px;">Done</button>
      
</div>
<div class="clearfix"></div>
                            

        <div class="" style="background:#eee;border-radius:10px;overflow:hidden;max-width:950px;margin:auto;">

            <table class="table-bordered table table-hover" align="center" >

   <thead> 
<!---------------------------------NEW TABLE ADD ON 12-11-2016--------------------------->
      <tr class="bg-gry"> 

       

       <!--  <th width="16%"  style="text-align:center;font-weight:bold"></th> -->
		 <th  style="text-align:center;font-weight:bold;width:100px;vertical-align:middle;">Time</th>
         <th colspan="2"  style="text-align:center;font-weight:bold;vertical-align:middle;"><p style="padding:0;margin:0;font-size:13px;"><?php echo date("l") ?></p><?php echo date("M d Y") ?></th> 

          <th colspan="2"  style="text-align:center;font-weight:bold;vertical-align:middle;"><p style="padding:0;margin:0;font-size:13px;"><?php echo date('l', strtotime("+1 day")); ?></p><?php echo date('M d Y', strtotime("+1 day")); ?></th>  
           <th colspan="2"  style="text-align:center;font-weight:bold;vertical-align:middle;"><p style="padding:0;margin:0;font-size:13px;"><?php echo date('l', strtotime("+2 day")); ?></p><?php echo date('M d Y', strtotime("+2 day")); ?></th>  

            <th colspan="2"  style="text-align:center;font-weight:bold;vertical-align:middle;"><p style="padding:0;margin:0;font-size:13px;"><?php echo date('l', strtotime("+3 day")); ?></p><?php echo date('M d Y', strtotime("+3 day")); ?></th> 

             <th colspan="2" style="text-align:center;font-weight:bold;vertical-align:middle;"><p style="padding:0;margin:0;font-size:13px;"><?php echo date('l', strtotime("+4 day")); ?></p><?php echo date('M d Y', strtotime("+4 day")); ?></th>
             
             <th colspan="2"  style="text-align:center;font-weight:bold;vertical-align:middle;"><p style="padding:0;margin:0;font-size:13px;"><?php echo date('l', strtotime("+5 day")); ?></p><?php echo date('M d Y', strtotime("+5 day")); ?></th> 
              <th colspan="2"  style="text-align:center;font-weight:bold;vertical-align:middle;"><p style="padding:0;margin:0;font-size:13px;"><?php echo date('l', strtotime("+6 day")); ?></p><?php echo date('M d Y', strtotime("+6 day")); ?></th> 

            
      </tr> 
      
       
<!---------------------------------NEW TABLE ADD ON 12-11-2016 END------------------>

   </thead> 

   <tbody> 
   <?php 
      $isConfirmation = isset($_REQUEST['confirm'])?$_REQUEST['confirm']:'';
   ?>
   <input type="hidden" name="emails" value="<?php  echo $_REQUEST['email']; ?>" class="FLapptEmails">
   <input type="hidden" name="recieverFname" value="<?php  echo $_REQUEST['recieverFname']; ?>" class="FLapptRecieverFname">
   <input type="hidden" name="senderEmail" value="<?php  echo $_REQUEST['senderEmail']; ?>" class="FLapptSenderEmail">
   <input type="hidden" name="senderName" value="<?php  echo $_REQUEST['senderName']; ?>" class="FLapptSenderName">
    <input type="hidden" name="isConfirmation" value="<?php  echo $isConfirmation; ?>" class="isConfirmation">

   <?php 
   for($i=0;$i<24;$i++)
   {
  ?>
   <tr>

   <td style="font-weight:bold; width: 10%;" class="bg-normel" ><?php  echo date("h:00 A",strtotime("+$i hour")); ?></td>
   <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("m/d/Y", strtotime("+0 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" ><span class="" style="border: none;">A</span></button></td>

   <td class="box-table-2"><button class="box-table-2 makeApptConf" dir="<?php echo date("m/d/Y", strtotime("+0 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>"  > <span class="" style="border: none;">C</span></button></td>

    <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("m/d/Y", strtotime("+1 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" ><span class="" style="border: none;">A</span></button></td>

   <td class="box-table-2"><button class="box-table-2 makeApptConf" dir="<?php echo date("m/d/Y", strtotime("+1 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour"));  ?>"  > <span class="" style="border: none;">C</span></button></td>

      <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("m/d/Y", strtotime("+2 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" ><span class="" style="border: none;">A</span></button></td>

   <td class="box-table-2"><button class="box-table-2 makeApptConf" dir="<?php echo date("m/d/Y", strtotime("+2 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>"  > <span class="" style="border: none;">C</span></button></td>

    <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("m/d/Y", strtotime("+3 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" ><span class="" style="border: none;">A</span></button></td>

   <td class="box-table-2"><button class="box-table-2 makeApptConf" dir="<?php echo date("m/d/Y", strtotime("+3 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour"));  ?>"  > <span class="" style="border: none;">C</span></button></td>

    <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("m/d/Y", strtotime("+4 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" ><span class="" style="border: none;">A</span></button></td>

   <td class="box-table-2"><button class="box-table-2 makeApptConf" dir="<?php echo date("m/d/Y", strtotime("+4 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" > <span class="" style="border: none;">C</span></button></td>

    <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("m/d/Y", strtotime("+5 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" ><span class="" style="border: none;">A</span></button></td>

   <td class="box-table-2"><button class="box-table-2 makeApptConf" dir="<?php echo date("m/d/Y", strtotime("+5 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>"  > <span class="" style="border: none;">C</span></button></td>

    <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("m/d/Y", strtotime("+6 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" ><span class="" style="border: none;">A</span></button></td>

   <td class="box-table-2"><button class="box-table-2 makeApptConf" dir="<?php echo date("m/d/Y", strtotime("+6 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>"  > <span class="" style="border: none;">C</span></button></td>
   
   
</tr>
<?php 
}

?>
 
   </tbody> 

</table> 

                          

               

       </div>

       

                              

                        </div>

                </div>


                <div class="clearfix"></div>

               <!-- <div class="col-md-12 col-xs-12">

                <button class="btn btn-lg btn-mdb pull-right"><i class="fa fa-user-plus" style="padding-right:5px"></i>Add a Friend</button>

                </div>-->

            </div>

            <div class="clearfix"></div>
			<!-- <div class="alert alert-success connSuccess" style="display:none;margin-top: 10px;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Connected ! </strong><?php echo $user_name; ?> successfully Connected to <span></span>.
  Redirecting...
</div> -->
            </div>

        </div>

    </section>
 <!--First Modal for Make Appointment! -->
		<div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="text-xs-center">
                          <img src="img/normal/logo.png" width="35" style="margin:0px auto">
                        </div>
                      </div>
                      <div class="modal-body" style="background-color:grey;">
                        		<div class="col-xs-12 SPloginLoader" style="padding-right:0;display:none;"> <hr>
                                <img src="images/ajax-loader.gif" id="" class="" style="">
                                <center><span class="SPerrors" style="display:none;color: red;" ></span></center>
                                </div>
                               <div class="clearfix"></div>
                               <div class="alert alert-success requestSuccess" style="display:none;margin-top: 10px;">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong class="customMsg1">Request Sent Successfuly!</strong>
                                  </div>
                                   <div class="clearfix"></div>
								<div  class="loginSec" style="padding:0px 25px;width:50%;margin:auto;" >
                        		
                                   <input type="hidden" id="senderNames" class="senderNames"  value="<?php echo $user_name." ".$_SESSION['logged_user_lname']; ?>"  />
                       			<div class="input-append date form_datetime" >
    								<input size="16" type="text" value="" readonly placeholder="Select Date" class="defaultDates">
                                	<span class="add-on"><i class="icon-remove"></i></span>
                               		<span class="add-on"><i class="icon-th"></i></span>
                                    <input type="hidden" id="mirror_field" class="mirror_field" value=""  />
                                   
                            	</div>
								<div class="text-xs-right m-b-3"> 
          						   <button class="btn btn-danger waves-effect waves-light makeAppointment" style="cursor:pointer;" id="makeAppointment">Make Appointment</button>
          						</div> 
                                </div>
                         </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
         </div>
 <!--End of First Modal for Make Appointment! -->
   
<!--Second Modal for ADD FRIEND! -->

 				<div id="myModal2" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="text-xs-center">
                          <img src="img/normal/logo.png" width="35" style="margin:0px auto">
                        </div>
                      </div>
                      <div class="modal-body">
                        		<div class="col-xs-12 SPloginLoader" style="padding-right:0;display:none;"> <hr>
                                <img src="images/ajax-loader.gif" id="" class="" style="">
                                <center><span class="SPerrors" style="display:none;color: red;" ></span></center>
                                </div>
                               <div class="clearfix"></div>
                               <div class="alert alert-success requestSuccess2" style="display:none;margin-top: 10px;">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong class="customMsg2">Request Sent Successfuly!</strong>
                                  </div>
                                   <div class="clearfix"></div>
								<div  class="" style="padding:0px 25px;width:50%;margin:auto;" >
                        		<input  type="text" value=""  placeholder="Enter Email" class="emailText">
                                </div>
 								<div class="text-xs-center m-b-3"> 
          						   <button class="btn btn-danger waves-effect waves-light requestMail" style="cursor:pointer;" id="requestMail">Send Invitation!</button>						</div>
                         </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>




         </div>
    

  

    <!-- /Start your project here-->

    



    <!-- SCRIPTS -->



    <!-- JQuery -->

    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
 <!-- Bootstrap tooltips -->
	<!-- <script type="text/javascript" src="js/tether.min.js"></script> -->
<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script> -->
	<script src="js/connectMe.js"></script>
    <!-- MDB core JavaScript -->
	 <!-- <script type="text/javascript" src="js/mdb.min.js"></script> -->
	
	<script type="text/javascript">

	$(function(){
var makeApptArr = [];
var makeApptString='';
$(".makeAppt >span").css("color","#ffcc66");
$(".makeApptConf >span").css("color","#9999ff");
$(".loader").hide();
/*$(".form_datetime").datetimepicker({
	 	 defaultDate: new Date(),
        format: "dd MM yyyy - HH:ii P",
		 linkField: "mirror_field",
		 linkFormat: "yyyy-mm-dd hh:ii",
        showMeridian: true,
        autoclose: true,
        todayBtn: true
    });*/

 var shrinkHeader = 150;

 $(window).scroll(function() {

 var scroll = getCurrentScroll();

 if ( scroll >= shrinkHeader ) {

 $('.logo-scroll').addClass('logo-hdr');

 }

 else {

 $('.logo-scroll').removeClass('logo-hdr');

 }

 });

function getCurrentScroll() {

 return window.pageYOffset;

 }

//Connection code
$(document).on("click",".connectMember",function(){
			//alert("test");
			var memberName= $(this).attr("dir");
			$(".connSuccess > span").text(memberName);
			$(".connSuccess").css("display","block");
			//$("html, body").animate({ scrollTop: $(".connSuccess").scrollTop() }, 1000);//scroll to top
			var memberId =  $(this).attr("for"); 
			var imagePath =  $(this).attr("memberImage");
			var memberEmail= $(this).attr("memberEmail"); 
			$('html,body').animate({ scrollTop: 9999 }, 1000);
			 setTimeout(function(){
			 location.href="connect.php?memberId="+memberId+"&search=FaF&imagePath="+imagePath+"&memberName="+memberName+"&memberEmail="+memberEmail;

			}, 4000);

		});
  
    $(document).on("click",".makeApptConf",function(){
        $(".connDanger > span").text("Please click on any yellow button to make appointment!");
         $(".connDanger").css("display","block");
         setTimeout(function(){
             $(".connDanger").css("display","none");
         }, 3000);
      console.log("clicked on confirm button..");
    });

		$(document).on("click",".makeAppt",function(){
      var curOBJ1 =$(this);
			var availDate = $(this).attr("dir");
			var availTime = $(this).attr("for");
			var availDateTime = availDate +" "+ availTime;
			
			
				if($.inArray(availDateTime, makeApptArr) < 0)
				{
          if(makeApptArr.length < 5)
          {
              if(makeApptArr.length == 4){makeApptString = makeApptString + availDateTime;}
              else{makeApptString = makeApptString + availDateTime + " , "}
              
              curOBJ1.removeClass("cngBGC2");
                curOBJ1.addClass("cngBGC1");
              //$(".connSuccess > span").text(makeApptString);
             //$(".connSuccess").css("display","block");
    				  makeApptArr.push(availDateTime);
          }
          else
          {
            alert("Maximum Date selection(5) crossed!");
          }
				}
				else{
          //curOBJ1.css("background-color","#ffcc66 !important");
          curOBJ1.removeClass("cngBGC1");
            curOBJ1.addClass("cngBGC2");
					alert("This Date Time is being removed!");
          var removeItem = availDateTime;

          makeApptArr = jQuery.grep(makeApptArr, function(value) {
          return value != removeItem;
          
          
          //console.log("arr=="+makeApptArr);
          });
				}
			

			console.log(JSON.stringify(makeApptArr));
		});
		//Done button click
		$(document).on("click",".btnDone",function(){
          var isConfirmation = $(".isConfirmation").val();
            var email = $(".FLapptEmails").val();
            var recieverFname = $(".FLapptRecieverFname").val();
            var senderEmail = $(".FLapptSenderEmail").val();
            var senderName = $(".FLapptSenderName").val();
            var appointTime = JSON.stringify(makeApptArr);
        
            if(makeApptArr.length > 0)
            {
              $(".loader").show();
			         $.ajax({
                    url:'ajax.php',
                    type: 'POST',
                    dataType: "json",
                    data: {email:email,tag:"makeAppointment",recieverFname:recieverFname,senderEmail:senderEmail,senderName:senderName,appointTime:appointTime},  
                    success: function(data)    // A function to be called if request succeeds
                    {
                      $(".loader").hide();
                    if(data.success == 1)
                    {
                      alert("Appointment Request sent Successfuly!");
                      setTimeout(function(){ window.history.back(); }, 2000);
                    }
                    else
                    {
                      alert("Error occured during making of Appointment!");
                    }
                    },      
                    error: function () {
                      $(".loader").hide();
                       alert("Error occured!");
                    }  
							   }); 
              }
              else
              {
                  alert("No dates Selected!");
              }

		});
//Make appointment
							$(document).on("click",".makeAppointment",function(){
							$(".loader-exp").show();
							var email = $(".appoint").attr("memberEmail");
							var recieverFname = $(".appoint").attr("dir");
							var senderName = $(".senderNames").val();
							var appointTime =  $(".mirror_field").val();
							//console.log(appointTime);
							 $(".requestSuccess").show();
							$(".customMsg1").text("please wait...");
							if(appointTime !="")
							{
							  $.ajax({

								url:'ajax.php',

								type: 'POST',

								dataType: "json",

								data: {email:email,tag:"makeAppointment",recieverFname:recieverFname,senderName:senderName,appointTime:appointTime},  

								success: function(data)    // A function to be called if request succeeds

								{

									 $(".loader-exp").hide();

								console.log(data);

								 if(data.success == 1)

								 {

                                                                           $(".loader-exp").hide();

									 
									$(".customMsg1").text("Request Sent Successfuly!");

									

								 }

								 else

								 {

									 $(".customMsg1").text("Error occured!");
										

								 }

								} ,      

								 error: function () {

 									$(".loader-exp").hide();
									$(".customMsg1").text("Error occured!");
									alert("Error occured!");

								}  

								 });
							}
							else
							{
							  $(".customMsg1").text("Please select an appointment date!");	
							}
							});
							
							$(document).on("click",".clearRequestMailData",function(){
								 $(".requestSuccess2").hide();
								 
							});
							//add friend through email
							$(document).on("click",".requestMail",function(){
							
							var email = $(".emailText").val();
							
							//console.log(appointTime);
							 $(".requestSuccess2").show();
							$(".customMsg2").text("please wait...");
							if(email != "")
							{
								$.ajax({

								url:'ajax.php',

								type: 'POST',

								dataType: "json",

								data: {email:email,tag:"requestMail"},  

								success: function(data)    // A function to be called if request succeeds

								{

									 $(".loader-exp").hide();

								console.log(data);

								 if(data.success == 1)

								 {

                                                                           $(".loader-exp").hide();

									 
									$(".customMsg2").text("Request Sent Successfuly!");
									

								 }

								 else

								 {

									 $(".customMsg2").text("Error occured!");
										

								 }

								} ,      

								 error: function () {

 									$(".loader-exp").hide();
									$(".customMsg2").text("Error occured!");
									alert("Error occured!");

								}  

								 });
							}
							else
							{
								$(".customMsg2").text("Email Can't be empty!");
							}
							});

});

</script>

  

   





</body>



</html>

<?php
 
/*}
else
{
	$passStr = 'You are not authorized.Redirecting....';
										$passImg = 'groupPhotos/img-3.jpg';
										header("location:well-come.php?passStr=$passStr&passImg=$passImg&redirect=index");
	
}*/


/*
<td style="font-weight:bold; width: 10%;" class="bg-normel" ><?php  echo date("h:00 A",strtotime("+$i hour")); ?></td>
   <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("Y-m-d", strtotime("+0 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" <?php echo (!empty($isConfirmation) && $isConfirmation == 'yes')?"disabled":''; ?>><span class="" style="border: none;">A</span></button></td>
   <td class="box-table-2"><button class="box-table-2 makeAppt" dir="<?php echo date("Y-m-d", strtotime("+0 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" <?php  echo (empty($isConfirmation))?"disabled":''; ?> > <span class="" style="border: none;">C</span></button></td>
   
    <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" <?php  echo (!empty($isConfirmation) && $isConfirmation == 'yes')?"disabled":''; ?>><span class="" style="border: none;">A</span></button></td>
   <td class="box-table-2"><button class="box-table-2 makeAppt" dir="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour"));  ?>" <?php echo (empty($isConfirmation))?"disabled":''; ?> > <span class="" style="border: none;">C</span></button></td>
      <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("Y-m-d", strtotime("+2 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" <?php  echo (!empty($isConfirmation) && $isConfirmation == 'yes')?"disabled":''; ?>><span class="" style="border: none;">A</span></button></td>
   <td class="box-table-2"><button class="box-table-2 makeAppt" dir="<?php echo date("Y-m-d", strtotime("+2 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" <?php  echo (empty($isConfirmation))?"disabled":''; ?> > <span class="" style="border: none;">C</span></button></td>
    <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("Y-m-d", strtotime("+3 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" <?php  echo (!empty($isConfirmation) && $isConfirmation == 'yes')?"disabled":''; ?>><span class="" style="border: none;">A</span></button></td>
   <td class="box-table-2"><button class="box-table-2 makeAppt" dir="<?php echo date("Y-m-d", strtotime("+3 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour"));  ?>" <?php echo (empty($isConfirmation))?"disabled":''; ?> > <span class="" style="border: none;">C</span></button></td>
    <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("Y-m-d", strtotime("+4 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" <?php  echo (!empty($isConfirmation) && $isConfirmation == 'yes')?"disabled":''; ?>><span class="" style="border: none;">A</span></button></td>
   <td class="box-table-2"><button class="box-table-2 makeAppt" dir="<?php echo date("Y-m-d", strtotime("+4 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" <?php  echo (empty($isConfirmation))?"disabled":''; ?>> <span class="" style="border: none;">C</span></button></td>
    <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("Y-m-d", strtotime("+5 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" <?php  echo (!empty($isConfirmation) && $isConfirmation == 'yes')?"disabled":''; ?>><span class="" style="border: none;">A</span></button></td>
   <td class="box-table-2"><button class="box-table-2 makeAppt" dir="<?php echo date("Y-m-d", strtotime("+5 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" <?php  echo (empty($isConfirmation))?"disabled":''; ?> > <span class="" style="border: none;">C</span></button></td>
    <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("Y-m-d", strtotime("+6 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" <?php  echo (!empty($isConfirmation) && $isConfirmation == 'yes')?"disabled":''; ?>><span class="" style="border: none;">A</span></button></td>
   <td class="box-table-2"><button class="box-table-2 makeAppt" dir="<?php echo date("Y-m-d", strtotime("+6 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" <?php  echo (empty($isConfirmation))?"disabled":''; ?> > <span class="" style="border: none;">C</span></button></td>
   */