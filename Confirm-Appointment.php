<?php
include("config/connection.php");

$conn=new connections();
$conn=$conn->connect();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Confirm Appointment</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid blue;
  border-bottom: 16px solid blue;
  margin-left:50%;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.box-table-2.conform > span {
    line-height: 30px;
    margin: 0;
    padding: 0;
}
.btn-online {
    font-size: 12px;
	font-weight:normal;
}
.friend-family .row {
    margin: 0 !important;
}
.bg-gry{background:#d2d2d2;}
.bg-yellow{background:#ffcc66;}
.done-btn{font-weight:bold;font-size:25px;border-radius:5px;}

.box-table-1:hover{
background-color: #b38f00;


	}
.box-table-2:hover{
background-color: #4d4dff;
	}
.box-table-1{
	 border:none;
}	
.box-table-2{
	 border:none;
}
.conform{background-color:#7b7bfc;}	

</style>

<body>


    <nav class="navbar navbar-dark  " style="background:#ccccff;">

        <div class="container">

            <!--Collapse content-->

            <div class="logo-modify">

                <!--Navbar Brand-->

                <a class="navbar-brand" href="#" target="_blank"><img src="img/normal/logo.png"><p class="brand-text">VILLAGE EXPERTS</p></a>

             </div>   

             </div>
    </nav>

    <!--/.Navbar-->



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
                                    <h3 class=""><b>Confirm Appointment  </b><a href="/"> <img src="images/Left.png" class="" style="cursor:pointer;position:relative;float:right;right:150px;"/></a> </h3>
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
                          <span></span> Time Confirmed!
                        </div>
                        <div class="alert alert-warning connDanger" style="display:none;margin-top: 10px;">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <span></span>
                        </div>
                        <div class="col-md-6 col-md-offset-2" style="padding-left:0">
                            <div class="text-xs-right pull-xs-left"><p class="white-text"><strong style="font-size: 30px;">Available =</strong> <label class="simbel" style="background-color: #FC6; color: #000; border: none;">A</label></p></div>
                            <div class="text-xs-left pull-xs-right"><p class="white-text"><strong style="font-size: 30px;">Confirmed =</strong> <label class="simbel" style="background-color:#9595f9; color: #000; border: none;">C</label></p></div>
                        </div>
                        <div class="col-xs-3">
                            <button class="btn btn-danger modify-btn-1 text-xs-right btn-lg modal__trigger btnDone" style="width: 90px; margin-top: 0px;">Done</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="" style="background:#eee;border-radius:10px;overflow:hidden;max-width:950px;margin:auto;">
                        <?php
                        $apptData = '';
                        $sql="select * from appointment where  aptmakeremail='".$_REQUEST['email']."' and aptconfirmemail='".$_REQUEST['senderEmail']."' and apptstatus=0 order by id desc limit 1";
                        //die($sql);
                        $tableResult = mysqli_query($conn, $sql);
                        //print_r($tableResult);
                        if (mysqli_num_rows($tableResult) > 0)
                        {//$apptData['fname']
                        //die("test2");
                        $apptData = mysqli_fetch_assoc($tableResult);
                        }
                                    //print_r($apptData);

                        $appt1 = isset($apptData['aptdate1'])?$apptData['aptdate1']:'';
                        $appt2 = isset($apptData['aptdate2'])?$apptData['aptdate2']:'';
                        $appt3 = isset($apptData['aptdate3'])?$apptData['aptdate3']:'';
                        $appt4 = isset($apptData['aptdate4'])?$apptData['aptdate4']:'';
                        $appt5 = isset($apptData['aptdate5'])?$apptData['aptdate5']:'';

                        $appt1 = strtotime($appt1);
                        $appt2 = strtotime($appt2);
                        $appt3 = strtotime($appt3);
                        $appt4 = strtotime($appt4);
                        $appt5 = strtotime($appt5);

                        ?>

                            <table class="table-bordered table table-hover" align="center" >

                                <thead>
                                    <!---------------------------------NEW TABLE ADD ON 12-11-2016--------------------------->
                                    <tr class="bg-gry">

                                    <!--  <th width="16%"  style="text-align:center;font-weight:bold"></th> -->
                                    <th  style="text-align:center;font-weight:bold;width:100px;vertical-align:middle;">Time</th>
                                    <th colspan="2"  style="text-align:center;font-weight:bold;vertical-align:middle;"><p style="padding:0;margin:0;font-size:13px;"><?php echo date("l") ?></p><?php echo date("d M Y") ?></th>
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

                                    $confAppt1 = date("m/d/Y", strtotime("+0 day"))." ".date("h:00 A",strtotime("+$i hour"));
                                    $confAppt1 = strtotime($confAppt1);

                                    $confAppt2 = date("m/d/Y", strtotime("+1 day"))." ".date("h:00 A",strtotime("+$i hour"));
                                    $confAppt2 = strtotime($confAppt2);

                                    $confAppt3 = date("m/d/Y", strtotime("+2 day"))." ".date("h:00 A",strtotime("+$i hour"));
                                    $confAppt3 = strtotime($confAppt3);

                                    $confAppt4 = date("m/d/Y", strtotime("+3 day"))." ".date("h:00 A",strtotime("+$i hour"));
                                    $confAppt4 = strtotime($confAppt4);

                                    $confAppt5 = date("m/d/Y", strtotime("+4 day"))." ".date("h:00 A",strtotime("+$i hour"));
                                    $confAppt5 = strtotime($confAppt5);

                                    $confAppt6 = date("m/d/Y", strtotime("+5 day"))." ".date("h:00 A",strtotime("+$i hour"));
                                    $confAppt6 = strtotime($confAppt6);

                                    $confAppt7 = date("m/d/Y", strtotime("+6 day"))." ".date("h:00 A",strtotime("+$i hour"));
                                    $confAppt7 = strtotime($confAppt7);

                                  ?>
                                  <tr>

                                  <td style="font-weight:bold; width: 10%;" class="bg-normel" ><?php  echo date("h:00 A",strtotime("+$i hour")); ?></td>
                                  <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("m/d/Y", strtotime("+0 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" style="<?php  echo ($confAppt1 == $appt1)|| ($confAppt1 == $appt2) || ($confAppt1 == $appt3)|| ($confAppt1 == $appt4) || ($confAppt1 == $appt5)?'background-color: #b38f00':'cursor:not-allowed'; ?>"><span class="" style="border: none;">A</span></button></td>

                                 <?php /* ?> style="<?php  echo ($confAppt1 == $appt1)|| ($confAppt1 == $appt2) || ($confAppt1 == $appt3)|| ($confAppt1 == $appt4) || ($confAppt1 == $appt5)?'background-color: #4d4dff':'cursor:not-allowed'; ?>" <?php */ ?>

                                  <td class="box-table-2"><button class="box-table-2 makeApptConf" dir="<?php echo date("m/d/Y", strtotime("+0 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>"  style="<?php  echo ($confAppt1 == $appt1)|| ($confAppt1 == $appt2) || ($confAppt1 == $appt3)|| ($confAppt1 == $appt4) || ($confAppt1 == $appt5)?'cursor:pointer':'cursor:not-allowed'; ?>"> <span class="" style="border: none;">C</span></button></td>

                                  <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("m/d/Y", strtotime("+1 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" style="<?php  echo (($confAppt2 == $appt1)|| ($confAppt2 == $appt2) || ($confAppt2 == $appt3)|| ($confAppt2 == $appt4) || ($confAppt2 == $appt5))?'background-color: #b38f00':'cursor:not-allowed'; ?>"><span class="" style="border: none;">A</span></button></td>

                                  <?php /* ?>style="<?php  echo (($confAppt2 == $appt1)|| ($confAppt2 == $appt2) || ($confAppt2 == $appt3)|| ($confAppt2 == $appt4) || ($confAppt2 == $appt5))?'background-color: #4d4dff':'cursor:not-allowed'; ?>"<?php */ ?>

                                  <td class="box-table-2"><button class="box-table-2 makeApptConf" dir="<?php echo date("m/d/Y", strtotime("+1 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour"));  ?>"  style="<?php  echo (($confAppt2 == $appt1)|| ($confAppt2 == $appt2) || ($confAppt2 == $appt3)|| ($confAppt2 == $appt4) || ($confAppt2 == $appt5))?'cursor:pointer':'cursor:not-allowed'; ?>"> <span class="" style="border: none;">C</span></button></td>

                                  <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("m/d/Y", strtotime("+2 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" style="<?php  echo (($confAppt3 == $appt1)|| ($confAppt3 == $appt2) || ($confAppt3 == $appt3)|| ($confAppt3 == $appt4) || ($confAppt3 == $appt5))?'background-color: #b38f00':'cursor:not-allowed'; ?>"><span class="" style="border: none;">A</span></button></td>

                                    <?php /* ?>style="<?php  echo (($confAppt3 == $appt1)|| ($confAppt3 == $appt2) || ($confAppt3 == $appt3)|| ($confAppt3 == $appt4) || ($confAppt3 == $appt5))?'background-color: #4d4dff':'cursor:not-allowed'; ?>"<?php */ ?>

                                  <td class="box-table-2"><button class="box-table-2 makeApptConf" dir="<?php echo date("m/d/Y", strtotime("+2 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>"  style="<?php  echo (($confAppt3 == $appt1)|| ($confAppt3 == $appt2) || ($confAppt3 == $appt3)|| ($confAppt3 == $appt4) || ($confAppt3 == $appt5))?'cursor:pointer':'cursor:not-allowed'; ?>"> <span class="" style="border: none;">C</span></button></td>

                                  <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("m/d/Y", strtotime("+3 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" style="<?php  echo (($confAppt4 == $appt1)|| ($confAppt4 == $appt2) || ($confAppt4 == $appt3)|| ($confAppt4 == $appt4) || ($confAppt4 == $appt5))?'background-color: #b38f00':'cursor:not-allowed'; ?>"><span class="" style="border: none;">A</span></button></td>

                                    <?php /* ?>style="<?php  echo (($confAppt4 == $appt1)|| ($confAppt4 == $appt2) || ($confAppt4 == $appt3)|| ($confAppt4 == $appt4) || ($confAppt4 == $appt5))?'background-color: #4d4dff':'cursor:not-allowed'; ?>"<?php */ ?>

                                  <td class="box-table-2"><button class="box-table-2 makeApptConf" dir="<?php echo date("m/d/Y", strtotime("+3 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour"));  ?>" style="<?php  echo (($confAppt4 == $appt1)|| ($confAppt4 == $appt2) || ($confAppt4 == $appt3)|| ($confAppt4 == $appt4) || ($confAppt4 == $appt5))?'cursor:pointer':'cursor:not-allowed'; ?>"> <span class="" style="border: none;">C</span></button></td>

                                  <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("m/d/Y", strtotime("+4 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" style="<?php  echo (($confAppt5 == $appt1)|| ($confAppt5 == $appt2) || ($confAppt5 == $appt3)|| ($confAppt5 == $appt4) || ($confAppt5 == $appt5))?'background-color: #b38f00':'cursor:not-allowed'; ?>"><span class="" style="border: none;">A</span></button></td>

                                    <?php /* ?>style="<?php  echo (($confAppt5 == $appt1)|| ($confAppt5 == $appt2) || ($confAppt5 == $appt3)|| ($confAppt5 == $appt4) || ($confAppt5 == $appt5))?'background-color: #4d4dff':'cursor:not-allowed'; ?>"<?php */ ?>

                                  <td class="box-table-2"><button class="box-table-2 makeApptConf" dir="<?php echo date("m/d/Y", strtotime("+4 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" style="<?php  echo (($confAppt5 == $appt1)|| ($confAppt5 == $appt2) || ($confAppt5 == $appt3)|| ($confAppt5 == $appt4) || ($confAppt5 == $appt5))?'cursor:pointer':'cursor:not-allowed'; ?>"> <span class="" style="border: none;">C</span></button></td>

                                  <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("m/d/Y", strtotime("+5 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" style="<?php  echo (($confAppt6 == $appt1)|| ($confAppt6 == $appt2) || ($confAppt6 == $appt3)|| ($confAppt6 == $appt4) || ($confAppt6 == $appt5))?'background-color: #b38f00':'cursor:not-allowed'; ?>"><span class="" style="border: none;">A</span></button></td>

                                   <?php /* ?>style="<?php  echo (($confAppt6 == $appt1)|| ($confAppt6 == $appt2) || ($confAppt6 == $appt3)|| ($confAppt6 == $appt4) || ($confAppt6 == $appt5))?'background-color: #4d4dff':'cursor:not-allowed'; ?>"<?php */ ?>

                                  <td class="box-table-2"><button class="box-table-2 makeApptConf" dir="<?php echo date("m/d/Y", strtotime("+5 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" style="<?php  echo (($confAppt6 == $appt1)|| ($confAppt6 == $appt2) || ($confAppt6 == $appt3)|| ($confAppt6 == $appt4) || ($confAppt6 == $appt5))?'cursor:pointer':'cursor:not-allowed'; ?>" > <span class="" style="border: none;">C</span></button></td>

                                  <td class="box-table-1"><button class="box-table-1 makeAppt" dir="<?php echo date("m/d/Y", strtotime("+6 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>" style="<?php  echo (($confAppt7 == $appt1)|| ($confAppt7 == $appt2) || ($confAppt7 == $appt3)|| ($confAppt7 == $appt4) || ($confAppt7 == $appt5))?'background-color: #b38f00':'cursor:not-allowed'; ?>"><span class="" style="border: none;">A</span></button></td>

                                    <?php /* ?>style="<?php  echo (($confAppt7 == $appt1)|| ($confAppt7 == $appt2) || ($confAppt7 == $appt3)|| ($confAppt7 == $appt4) || ($confAppt7 == $appt5))?'background-color: #4d4dff':'cursor:not-allowed'; ?><?php */ ?>

                                  <td class="box-table-2"><button class="box-table-2 makeApptConf" dir="<?php echo date("m/d/Y", strtotime("+6 day")); ?>" for="<?php  echo date("h:00 A",strtotime("+$i hour")); ?>"  style="<?php  echo (($confAppt7 == $appt1)|| ($confAppt7 == $appt2) || ($confAppt7 == $appt3)|| ($confAppt7 == $appt4) || ($confAppt7 == $appt5))?'cursor:pointer':'cursor:not-allowed'; ?>"> <span class="" style="border: none;">C</span></button></td>


                                  </tr>
                                  <?php
                                  }

                                  ?>

                                  </tbody>

                            </table>

                        </div>
                    </div>

                </div>

                <span style="margin-left: 41%;"></span>
                    <input type="checkbox" name="notSuitableDate" class="notSuitableDate">
                    <span style="padding-left: 1%;">None of the above dates suit me.</span>
                </span>

                <div class="clearfix"></div>

                   <!-- <div class="col-md-12 col-xs-12">

                    <button class="btn btn-lg btn-mdb pull-right"><i class="fa fa-user-plus" style="padding-right:5px"></i>Add a Friend</button>

                    </div>-->

                </div>

                <div class="clearfix"></div>
                <div class="alert alert-success connSuccess" style="display:none;margin-top: 10px;">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <span></span> Time Confirmed!
                </div>
                <div class="alert alert-warning connDanger" style="display:none;margin-top: 10px;">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <span></span>
                </div>
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
	<script type="text/javascript" src="js/tether.min.js"></script>
<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
	<script src="js/connectMe.js"></script>
    <!-- MDB core JavaScript -->
	 <script type="text/javascript" src="js/mdb.min.js"></script>
	
	<script type="text/javascript">

	$(function(){
   
var makeApptVal = '';
$(".makeAppt >span").css("color","#ffcc66");
$(".makeApptConf >span").css("color","#9999ff");
$(".loader").hide();
$(".form_datetime").datetimepicker({
    defaultDate: new Date(),
    format: "dd MM yyyy - HH:ii P",
    linkField: "mirror_field",
    linkFormat: "yyyy-mm-dd hh:ii",
    showMeridian: true,
    autoclose: true,
    todayBtn: true
});

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

$(document).on("click",".makeApptConf",function(){
    $(".makeApptConf").css("background-color","#9999ff");
    var curOBJ1 =$(this);
    var availDate = $(this).attr("dir");
    var availTime = $(this).attr("for");
    var availDateTime = availDate +" "+ availTime;
    var x = curOBJ1.css('cursor');
    //hexc(x);

    if(x != "not-allowed") {
        curOBJ1.css("background-color","#4d4dff");
        makeApptVal = availDateTime;
        $(".connSuccess > span").text(makeApptVal);
        $(".connSuccess").css("display","block");
    } else {
        $(".connDanger > span").text("Please click only higlighted blue colored button('C') to confirm appointment!");
        $(".connDanger").css("display","block");
        setTimeout(function(){
         $(".connDanger").css("display","none");
        }, 3000);
    }
    color = '';
      
});

    //Done button click
    $(document).on("click",".btnDone",function(){
          var email = $(".FLapptEmails").val();
            var recieverFname = $(".FLapptRecieverFname").val();
            var senderEmail = $(".FLapptSenderEmail").val();
            var senderName = $(".FLapptSenderName").val();
            var appointTime = makeApptVal;
            if(appointTime != "" && appointTime != "0")
            {
              $(".loader").show();
               $.ajax({
                    url:'ajax.php',
                    type: 'POST',
                    dataType: "json",
                    data: {email:email,tag:"ConfirmAppointment",recieverFname:recieverFname,senderEmail:senderEmail,senderName:senderName,appointTime:appointTime},  
                    success: function(data)    // A function to be called if request succeeds
                    {
                      $(".loader").hide();
                    if(data.success == 1)
                    {
                      alert("Appointment Confirmed Successfuly!");
                      setTimeout(function(){ window.location.href="/"; }, 2000);
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

    //Not suitabe checkbx click

     $(document).on("click",".notSuitableDate",function(){

      if(this.checked) {
          var email = $(".FLapptEmails").val();
            var recieverFname = $(".FLapptRecieverFname").val();
            var senderEmail = $(".FLapptSenderEmail").val();
            var senderName = $(".FLapptSenderName").val();
            //var appointTime = makeApptVal;
            
              $(".loader").show();
               $.ajax({
                    url:'ajax.php',
                    type: 'POST',
                    dataType: "json",
                    data: {email:email,tag:"notConfirmAppointment",recieverFname:recieverFname,senderEmail:senderEmail,senderName:senderName},  
                    success: function(data)    // A function to be called if request succeeds
                    {
                      $(".loader").hide();
                    if(data.success == 1)
                    {
                      alert("Appointment Declined Successfuly!");
                      setTimeout(function(){ window.location.href="/"; }, 2000);
                    }
                    else
                    {
                      alert("Error occured during declining of Appointment!");
                    }
                    },      
                    error: function () {
                      $(".loader").hide();
                       alert("Error occured!");
                    }  
                 }); 
             }
              
    });




    $(document).on("click",".makeAppt",function(){

       $(".connDanger > span").text("Please click only adjascent higlighted blue colored button('C') to confirm appointment!");
       $(".connDanger").css("display","block");
         setTimeout(function(){
             $(".connDanger").css("display","none");
         }, 3000);
      console.log("clicked on confirm button..");

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

function hexc(colorval) {
    var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    delete(parts[0]);
    for (var i = 1; i <= 3; ++i) {
        parts[i] = parseInt(parts[i]).toString(16);
        if (parts[i].length == 1) parts[i] = '0' + parts[i];
    }
    color = '#' + parts.join('');
}

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