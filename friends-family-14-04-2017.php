<?php
error_reporting(E_ALL);
include("config/connection.php");
session_start();
if(isset($_SESSION['logged_user_id']) && !empty($_SESSION['logged_user_id']))
{

$conn=new connections();
$conn=$conn->connect();
$userID = $_SESSION['logged_user_id'];
$userNme = $_SESSION['logged_user_fname'];
$imagePath = $_SESSION['logged_user_image'];
$curUserParentId = '';
$curUserParentIdArr = array();
$sql = '';
$sql2 = '';
$gotFriendParent = 0;

$sqlParent = "select parentID from friendsExpertInfo where userid = $userID AND isexpert = 0";
$tableResultParent = mysqli_query($conn, $sqlParent);
$resultParentData = array();
$resultParent = '';
if (mysqli_num_rows($tableResultParent) > 0)  {
    while($row = mysqli_fetch_assoc($tableResultParent)) {
            $resultParentData[] = $row['parentID'];
    }
    $resultParent = implode(',', $resultParentData);
    $gotFriendParent = 1;
}

$sqlParent2 = "select userid from friendsExpertInfo where parentID = $userID AND isexpert = 0";
$tableResultParent2 = mysqli_query($conn, $sqlParent2);
$resultParentData = array();
if (mysqli_num_rows($tableResultParent2) > 0)  {
    while($row = mysqli_fetch_assoc($tableResultParent2)) {
        $resultParentData[] = $row['userid'];
    }
    if($gotFriendParent == 1)
        $resultParent = $resultParent . "," . implode(',', $resultParentData);
    else
        $resultParent = implode(',', $resultParentData);
}

$sql="select * from friendsRegister where id in($resultParent)";
$tableResult = mysqli_query($conn, $sql);
$userData = array();
if (mysqli_num_rows($tableResult) > 0)  {
    while($row = mysqli_fetch_assoc($tableResult)) {
        $userData[] = $row;
    }
}

//expert data
$sqlParent3 = "select parentID from friendsExpertInfo where userid = $userID AND isexpert = 1";
$tableResultParent3 = mysqli_query($conn, $sqlParent3);
$resultParentData3 = array();
$resultParent3 = '';
$gotExpertParent = 0;
if (mysqli_num_rows($tableResultParent3) > 0)  {
    while($row = mysqli_fetch_assoc($tableResultParent3)) {
        $resultParentData3[] = $row['parentID'];
    }
    $resultParent3 = implode(',', $resultParentData3);
    $gotExpertParent = 1;
}

$sqlParent4 = "select userid from friendsExpertInfo where parentID = $userID AND isexpert = 1";
$tableResultParent4 = mysqli_query($conn, $sqlParent4);
$resultParentData4 = array();
if (mysqli_num_rows($tableResultParent4) > 0)
{
    while($row = mysqli_fetch_assoc($tableResultParent4)) {
        $resultParentData4[] = $row['userid'];
    }
    if($gotExpertParent == 1)
     $resultParent3 = $resultParent3 . "," . implode(',', $resultParentData4);
    else
      $resultParent3 = implode(',', $resultParentData4);
}


$sql4="select * from friendsRegister where id in($resultParent3)";
$tableResult4 = mysqli_query($conn, $sql4);
$expertData = array();
if (mysqli_num_rows($tableResult4) > 0)  {
    while($row = mysqli_fetch_assoc($tableResult4)) {
    $expertData[] = $row;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Village Expert</title>

    <!-- Font Awesome -->
    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">

     <!--<link href="css/font-awesome.min.css" rel="stylesheet">-->
     <!-- Material Design Bootstrap -->
     <!-- Your custom styles (optional) -->

    <link href="css/style.css" rel="stylesheet">

    <script type="text/javascript">
    function submitUserRow(){
        alert("clicked ");
    }
    </script>
</head>

<body>


    <?php include 'header.php';?>

    <section class="friend-family">

        <div class="">

            <div class="container">
            <div class="row">
                <div class="col-md-12  m-t-1" style="background:#fff; border-radius:10px;">
                    <div class="card-block text-xs-center">


                    <!--- .................................... Expert List ..................................... -->
                    <div>
                        <div class="top-part">
                            <div class="col-md-8 text-xs-left"><label class="modify-badge-2" style="color:#495775;">My Friends List</label></div>
                            <!--  <div class="col-md-1 clearRequestMailData text-xs-center flBtnEdit" style="padding:0" id="flBtnEdit"><button class="btn btn-width btn-mdb pull-right">Edit</button></div> -->
                            <div class="col-md-1 clearRequestMailData text-xs-left flBtnAdd" style="padding:0" id="flBtnAdd"><button class="btn btn-width btn-mdb pull-right">Add</button></div>
                            <div class="col-md-1 clearRequestMailData flSave" id="flSave" style="padding-left:0;text-align:right !important;"><button class="btn btn-width btn-mdb pull-right">Save</button></div>
                            <div class="col-md-1 clearRequestMailData flDelete" id="flDelete" style="padding-left:0;text-align:right !important;"><button class="btn btn-width btn-mdb pull-right">Delete</button></div>
                            <div class="col-md-1 clearRequestMailData text-xs-center flCancel" id="flCancel" style="padding:0;"><button class="btn btn-width btn-mdb">Cancel</button></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                        <div style="border-top:1px solid #E6E9ED; margin-top:3px;"></div>
                        <p></p>
                        <div class="wrap-table">
                        <table class="head userTableHeadClass" width="101%">
                            <tr>
                                <th style="width:24px;text-align:center;"> <span class="glyphicon glyphicon-edit flBtnEdit" title="Click to Edit" data-toggle="tooltip"></th>
                                <th style="padding:10px 0px;">Name</th>
                                <th style="width: 200px !important;">Email</th>
                                <th>Mobile</th>
                                <th>City</th>
                                <th>Country</th>
                                <th></th>
                            </tr>
                        </table>
                        <div class="inner_table">
                            <table width="101%" class="flTable userTableBodyClass">
                                <?php
                                if(!empty($userData))
                                {
                                foreach($userData as $userDatas) { ?>
                                <tr class="flRow userTableRowClass" id="flRow<?php echo $userDatas['id']; ?>" onclick="submitUserRow()">
                                    <td style="width:24px !important;text-align:center;" >
                                        <input type="hidden" value="<?php echo $userDatas['id']; ?>" name="flID" class="flID">
                                        <input type="hidden" value="<?php echo $userID; ?>" name="loggedID" class="loggedID">
                                        <input type="checkbox" class="flChk" id="<?php echo $userDatas['id']; ?>">
                                    </td>
                                    <td>
                                        <?php if( $userDatas['registerStatus']=='NO'){ ?>
                                        <button class="btn btnUserInactive" title="Inactive"></button>
                                        <?php } else if( $userDatas['loginStatus']=='NO'){ ?>
                                        <button class="btn btnUserOffline" title="Offline"></button>
                                        <?php } else if( $userDatas['loginStatus']=='BUSY'){ ?>
                                        <button class="btn btnUserBusy" title="Busy"></button>
                                        <?php } else{?>
                                        <button class="btn btnUserOnline" title="Online"></button>
                                        <?php }?>
                                        <input style="width: 45%; float:left ; padding-left:10px;" type="text" class="edit_text flFname rmvReadonly<?php echo $userDatas['id']; ?>" readonly="readonly" id="flFname<?php echo $userDatas['id']; ?>" name="flFname"  value="<?php echo $userDatas['fname']; ?>">
                                        <input style="width: 45%; float:right" type="text" class="edit_text flLname rmvReadonly<?php echo $userDatas['id']; ?>" readonly="readonly" id="flLname<?php echo $userDatas['id']; ?>" name="flLname"  value="<?php echo $userDatas['lname']; ?>">
                                    </td>
                                    <td style="width: 200px !important;">
                                        <input style="width: 100%;" type="text" class="edit_text flEmail rmvReadonly<?php echo $userDatas['id']; ?>" readonly="readonly" id="flEmail<?php echo $userDatas['id']; ?>" name="flEmail"  value="<?php echo $userDatas['email']; ?>">
                                    </td>
                                    <td>
                                        <input style="width: 100%;" type="text" class="edit_text flMobile rmvReadonly<?php echo $userDatas['id']; ?>" readonly="readonly" id="flMobile<?php echo $userDatas['id']; ?>" name="flMobile"  value="<?php echo ($userDatas['phone']==0)?'':$userDatas['phone']; ?>">
                                    </td>
                                    <td>
                                        <input style="width: 100%;" type="text" class="edit_text flCity rmvReadonly<?php echo $userDatas['id']; ?>" readonly="readonly" id="flCity<?php echo $userDatas['id']; ?>" name="flCity"  value="<?php echo $userDatas['city']; ?>">
                                    </td>
                                    <td>
                                        <input style="width: 100%;" type="text" class="edit_text flCountry rmvReadonly<?php echo $userDatas['id']; ?>" readonly="readonly" id="flCountry<?php echo $userDatas['id']; ?>" name="flCountry"  value="<?php echo $userDatas['country']; ?>">
                                    </td>

                                    <?php if( $userDatas['registerStatus']=='NO'){ ?>
                                    <td></td>
                                    
                                    <?php } else if( $userDatas['loginStatus']=='NO'){ ?>
                                    <td><button id='tdv' class="btn-online appoint apponment btn" emails="<?php echo $expertDatas['email']; ?>" names="<?php echo $expertDatas['fname']; ?>" seekerEmail="<?php echo $_SESSION['logged_user_email']; ?>" seekerName="<?php echo $_SESSION['logged_user_fname']; ?>">Make Appointment</button></td>
                                    
                                    <?php } else if( $userDatas['loginStatus']=='BUSY'){ ?>
                                    <td><button id='tdv' class="btn-online appoint apponment btn" emails="<?php echo $userDatas['email']; ?>" names="<?php echo $userDatas['fname']; ?>" seekerEmail="<?php echo $_SESSION['logged_user_email']; ?>" seekerName="<?php echo $_SESSION['logged_user_fname']; ?>">Make Appointment</button></td>
                                    
                                    <?php } else{?>
                                    <td><button class="btn-online btn FLconnectMember" for="<?php echo $userDatas['id']; ?>" dir="<?php echo $userDatas['fname']." ".$userDatas['lname']; ?> " memberImage="<?php echo $userDatas['image']; ?>" memberEmail="<?php echo $userDatas['email']; ?>">Connect</button></td>
                                    <?php }?>

                                </tr>
                                <?php }
                                }
                                else
                                {
                                ?>
                                <tr class="flRow">
                                    <td colspan="9"><center>No Friends Found!</center></td>
                                </tr>
                                <?php }?>
                            </table>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <hr class="distance">
                <p></p>

                <!--- .................................... Expert List ..................................... -->
                <div>
                    <div class="top-part">
                        <!--Title-->
                        <div class="col-md-8 text-xs-left"><label class="modify-badge-2" style="color:#495775;">My Experts List</label>
                        <!-- <h4 class="card-title bg-danger" style="padding:15px 0px;border-radius:5px;">Connect with my Friends and Family</h4>--></div>
                        <div class="col-md-1 clearRequestMailData text-xs-left elBtnAdd" style="padding:0" id="elBtnAdd"><button class="btn btn-width btn-mdb pull-right">Add</button></div>
                        <div class="col-md-1 clearRequestMailData elSave" id="elSave" style="padding-left:0;text-align:right !important;"><button class="btn btn-width btn-mdb pull-right">Save</button></div>
                        <div class="col-md-1 clearRequestMailData elDelete" id="elDelete" style="padding-left:0;text-align:right !important;"><button class="btn btn-width btn-mdb pull-right">Delete</button></div>
                        <div class="col-md-1 clearRequestMailData text-xs-center elCancel" id="elCancel" style="padding:0;"><button class="btn btn-width btn-mdb">Cancel</button></div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="clearfix"></div>

                <div style="border-top:1px solid #E6E9ED; margin-top:3px;"></div>

                <div class="wrap-table">

                    <table class="head expetsTableHeadClass" width="101%">
                        <tr>
                            <th style="width:24px;text-align:center;"> <span class="glyphicon glyphicon-edit elBtnEdit" title="Click to Edit" data-toggle="tooltip"></th>
                            <th style="padding:10px 0px;"> Name</th>
                            <th style="width: 200px !important;">Email</th>
                            <th>Expertise</th>
                            <th>City</th>
                            <th>Country</th>
                            <th></th>
                        </tr>
                    </table>

                    <table width="101%" class="elTable expertsTableBodyClass">

                    <?php
                     if(!empty($expertData))
                    {
                        foreach($expertData as $expertDatas) { ?>
                        <tr class="elRow" id="elRow<?php echo $expertDatas['id']; ?>">
                            <td style="width:24px !important;text-align:center;">
                                <input type="hidden" value="<?php echo $expertDatas['id']; ?>" name="elID" class="elID">
                                <input type="hidden" value="<?php echo $userID; ?>" name="loggedID" class="loggedID">
                                <input type="checkbox" class="elChk" id="<?php echo $expertDatas['id']; ?>">
                            </td>
                            <td>
                                <input style="width: 50%;float:left" type="text" class="edit_text elFname rmvReadonly<?php echo $expertDatas['id']; ?>" readonly="readonly" id="elFname<?php echo $expertDatas['id']; ?>" name="elFname"  value="<?php echo $expertDatas['fname']; ?>">
                                <input style="width: 50%;float:right" type="text" class="edit_text elLname rmvReadonly<?php echo $expertDatas['id']; ?>" readonly="readonly" id="elLname<?php echo $expertDatas['id']; ?>" name="elLname"  value="<?php echo $expertDatas['lname']; ?>">
                            </td>
                            <td style="width: 200px !important;">
                                <input style="width: 100%;" type="text" class="edit_text elEmail rmvReadonly<?php echo $expertDatas['id']; ?>" readonly="readonly" id="elEmail<?php echo $expertDatas['id']; ?>" name="elEmail"  value="<?php echo $expertDatas['email']; ?>">
                            </td>
                            <td>
                                <input style="width: 100%;" type="text" class="edit_text elMobile rmvReadonly<?php echo $expertDatas['id']; ?>" readonly="readonly" id="elMobile<?php echo $expertDatas['id']; ?>" name="elMobile"  value="<?php echo ($expertDatas['experties']=='')?'':$expertDatas['experties']; ?>">
                            </td>
                            <td>
                                <input style="width: 100%;" type="text" class="edit_text elCity rmvReadonly<?php echo $expertDatas['id']; ?>" readonly="readonly" id="elCity<?php echo $expertDatas['id']; ?>" name="elCity"  value="<?php echo $expertDatas['city']; ?>">
                            </td>
                            <td>
                                 <input style="width: 100%;" type="text" class="edit_text elCountry rmvReadonly<?php echo $expertDatas['id']; ?>" readonly="readonly" id="elCountry<?php echo $expertDatas['id']; ?>" name="elCountry"  value="<?php echo $expertDatas['country']; ?>">
                            </td>
                            <?php if( $expertDatas['registerStatus']=='NO'){ ?>
                            <td><button class="btn btnUserInactive" title="Inactive"></button></td>
                            
                            <?php } else if( $expertDatas['loginStatus']=='NO'){ ?>
                            <td><button class="btn btnUserOffline" title="Offline"></button></td>
                            <td><button id='tdv' class="btn-online appoint apponment btn" emails="<?php echo $expertDatas['email']; ?>" names="<?php echo $expertDatas['fname']; ?>" seekerEmail="<?php echo $_SESSION['logged_user_email']; ?>" seekerName="<?php echo $_SESSION['logged_user_fname']; ?>">Make Appointment</button></td>
                            
                            <?php } else if( $expertDatas['loginStatus']=='BUSY'){ ?>
                            <td><button class="btn btnUserBusy" title="Busy"></button></td>
                            <td><button id='tdv' class="btn-online appoint apponment btn" emails="<?php echo $expertDatas['email']; ?>" names="<?php echo $expertDatas['fname']; ?>" seekerEmail="<?php echo $_SESSION['logged_user_email']; ?>" seekerName="<?php echo $_SESSION['logged_user_fname']; ?>">Make Appointment</button></td>
                            
                            <?php } else{?>
                            <td><button class="btn btnUserOnline" title="Online"></button></td>
                            <td><button class="btn-online btn ELconnectMember" for="<?php echo $expertDatas['id']; ?>" dir="<?php echo $expertDatas['fname']." ".$expertDatas['lname']; ?> " memberImage="<?php echo $expertDatas['image']; ?>" memberEmail="<?php echo $expertDatas['email']; ?>">Connect</button></td>
                            <?php }?>
                        </tr>
                        <?php }
                    }
                    else
                    {
                        ?>
                        <tr class="flRow">
                        <td colspan="9"><center>No Expert Found!</center></td>
                        </tr>
                   <?php }?>
                    </table>
                </div>

                <div class="clearfix"></div>

                </div>
                
                <hr class="distance">
                <div class="col-md-12">
                    <div style="width:50%;margin:0 auto 30px auto;">
                        <div class="text-xs-center">
                          <button type="submit" class="btn btn-lg btn-papl" style="width:100%;"><a href="ExpertRegistration.php">Expert Registration – Sign Up as An Expert</a></button>
                        </div>
                    </div>
                </div>

            </div>
           </div>
           </div>  

           <div class="clearfix"></div>

            </div>

            <div class="clearfix"></div>
            <div class="alert alert-success connSuccess" style="display:none;margin-top: 10px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Connected ! </strong> successfully Connected to <span></span>.
                Redirecting...
            </div>
        </div>

        </div>

        </section>
    
 
         </div>
    <!--End of First Modal for Make Appointment! -->
   

    </div>

    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
    <script src="js/connectMe.js"></script>
  
    <script type="text/javascript">

$(function(){

    $('[data-toggle="tooltip"]').tooltip();

    //****************************************Friends manipulation*****************************************
    var i = 0;
    var FLeditFlag = 0;
    $('.flBtnEdit').attr('disabled','disabled');
    $('.flSave >button').attr('disabled','disabled');
    $('.flDelete >button').attr('disabled','disabled');

   //friendlist check button click
    $(document).on("change",".flChk",function(){
        flID = $(this).attr("id");
        curOBJ = $(this);
        
        if(this.checked) {
            $('.flDelete >button').removeAttr('disabled');
            $('.flChk').attr('disabled','disabled');
            curOBJ.removeAttr('disabled');
            //$('.flBtnEdit').removeAttr('disabled');
            $('.flBtnAdd >button').attr('disabled','disabled');
        }
        else
        {
            $('.flChk').removeAttr('disabled');
            $(".rmvReadonly"+flID).attr("readonly", "readonly");
            $('.flSave >button').attr('disabled','disabled');
            $('.flBtnAdd >button').removeAttr('disabled');
            $('.flDelete >button').attr('disabled','disabled');
            //$('.flBtnEdit').attr('disabled','disabled');
        }
    });

    //friends add button click
    $(document).on("click",".flBtnAdd",function(){
        $('.flDelete >button').attr('disabled','disabled');
        $('.flBtnAdd >button').attr('disabled','disabled');
        $( ".addNewRow" ).show("slow");
        $( "#fladdFname" ).focus();
        $('.flSave >button').removeAttr('disabled');

        //disable expert panel
        $('.elBtnAdd >button').attr('disabled','disabled');
        //$('.elDelete >button').attr('disabled','disabled');
        //$('.elSave >button').attr('disabled','disabled');
        $('.elCancel >button').attr('disabled','disabled');
    });

    //friends edit button click
    $(document).on("click",".flBtnEdit",function(){
        i=0;
        var flID = '';
        var fname = '';
        var lname = '';
        var email = '';
        var mobile = '';
        var city = '';
        var country = '';

        //disable expert panel
        $('.elBtnAdd >button').attr('disabled','disabled');
        //$('.elDelete >button').attr('disabled','disabled');
        // $('.elSave >button').attr('disabled','disabled');
        $('.elCancel >button').attr('disabled','disabled');

        $('.flChk:checked').each(function (item) {
          var cur = $(this).parent();
          flID = $(this).attr("id");
          /*fname = cur.next().text();
          lname = cur.next().next().text();
          email = cur.next().next().next().text();
          mobile = cur.next().next().next().next().text();
          city = cur.next().next().next().next().next().text();
          country = cur.next().next().next().next().next().next().text();*/
          i++;
        });

        $("#flRow"+flID).css("background-color", "#7851f7");

        if(i== 0){
          if ($(".flChk").length > 0) {
            alert("Please select atleast one checkbox!");
          }else{
            alert("Nothing to edit!");
          }

        }else if (i>1) {
            alert("Please select  one checkbox at a time to edit!");
        }else{
          $( ".flFname" ).focus();
          $(".rmvReadonly"+flID).removeAttr("readonly"); 
          $("#flEmail"+flID).attr("readonly", "readonly"); 
          $('.flSave >button').removeAttr('disabled');
          FLeditFlag = 1;
        }
    });

    //save friend
    $(document).on("click",".flSave",function(){
        $('.flSave >button').attr('disabled','disabled');
        $('.flDelete >button').removeAttr('disabled');
        $('.flBtnAdd >button').removeAttr('disabled');

        //expert panel
        $('.elBtnAdd >button').removeAttr('disabled');
        $('.elDelete >button').removeAttr('disabled');
        $('.elSave >button').removeAttr('disabled');
        $('.elCancel >button').removeAttr('disabled');

        i=0;
        var checkExists = 0;
        var flID = '';
        var fname = '';
        var lname = '';
        var email = '';
        var mobile = '';
        var city = '';
        var country = '';
        var loggedID = $(".loggedID").val();
                
        var tag = '';
      
        if(FLeditFlag == 1) {
            tag = "editFriendss"
            $('.flChk:checked').each(function (item) {
                var cur = $(this).parent();
                var curOBJ = $(this);
                curOBJ.removeAttr('disabled');
                flID = $(this).attr("id");
                fname = $('#flFname'+flID).val();
                lname =  $('#flLname'+flID).val();
                email = $('#flEmail'+flID).val();
                mobile = $('#flMobile'+flID).val();
                city = $('#flCity'+flID).val();
                country = $('#flCountry'+flID).val();
                i++;
            });

        } else if(FLeditFlag == 0) {
            tag = "addFriendss"
            $( ".addNewRow" ).hide("slow");
            fname = $('.fladdFname').val();
            lname =  $('.fladdLname').val();
            email = $('.fladdEmail').val();
            mobile = $('.fladdMobile').val();
            city = $('.fladdCity').val();
            country = $('.fladdCountry').val();
        }

        if(email != ""  && isEmail(email))
        {
              if(parseInt(checkExists) == 0) {
                  checkExists = 0;
                  $.ajax({
                        url:'ajax.php',
                        type: 'POST',
                        dataType: "json",
                        data: {
                            loggedID:loggedID,
                            flID:flID,
                            fname:fname,
                            lname:lname,
                            phone:mobile,
                            email:email,
                            city:city,
                            country:country,
                            userType:"addFriend",
                            tag:tag
                        },
                        success: function(data) {
                            FLeditFlag = 0;
                            console.log(" Adding a frind response " , data);
                            if(data.success == 1) {
                                alert(data.msg);
                                window.location.reload();
                            }
                            else {
                                alert("Failed to Save "+ data.msg);
                            }
                        } ,
                        error: function () {
                            FLeditFlag = 0;
                            alert("Failed to Save!");
                        }
                  });
               }

        }else{
            $('.flSave >button').removeAttr('disabled');
            alert("Valid Email Must be provided!");
        }
    });

    //Friends Delete
    $(document).on("click",".flDelete",function(){
        i=0;
        var fname = '';
        var lname = '';
        var email = '';
        var mobile = '';
        var city = '';
        var country = '';
        var loggedID = $('.loggedID').val();
        //expert panel
        $('.elBtnAdd >button').removeAttr('disabled');
        //$('.elDelete >button').removeAttr('disabled');
        //$('.elSave >button').removeAttr('disabled');
        $('.elCancel >button').removeAttr('disabled');
        //$( "#flFname" ).focus();
        $('.flChk:checked').each(function (item) {
            var cur = $(this).parent();
            flID = $(this).attr("id");
            email = $('#flEmail'+flID).val();
            fname = $('#flFname'+flID).val();
            lname = $('#flLname'+flID).val();
            i++;
        });

        if(i== 0){alert("Please select atleast one checkbox!");}
        else if (i>1) {alert("Please select  one checkbox at a time to edit!");}
        else{
            var r = confirm("Are you Sure - You want to Delete "+fname+" "+lname+"?");
            if (r == true) {
                $.ajax({
                    url:'ajax.php',
                    type: 'POST',
                    dataType: "json",
                    data: {
                        fname:fname,
                        lname:lname,
                        email:email,
                        tag:"deleteFriendss",
                        isExpertss:"NO",
                        loggedID:loggedID
                    },
                    success: function(data)    // A function to be called if request succeeds
                    {
                        console.log(data);
                        if(data.success == 1)
                        {
                          alert(data.msg);
                          window.location.reload();
                        }
                        else
                        {
                        //alert();
                        }
                    } ,
                    error: function () {
                        alert("Failed to Save!");
                    }

                });
            }
            else {
            // txt = "You pressed Cancel!";
            }
        }
    });

    //Friends cancel button click
    $(document).on("click",".flCancel",function(){
        FLeditFlag = 0 ;
        //expert panel
        $('.elBtnAdd >button').removeAttr('disabled');
        //$('.elDelete >button').removeAttr('disabled');
        //$('.elSave >button').removeAttr('disabled');
        $('.elCancel >button').removeAttr('disabled');
        $('.flSave >button').attr('disabled','disabled');
        $('.flChk:checked').each(function (item) {
            var cur = $(this).parent();
            var curOBJ = $(this);
            curOBJ.removeAttr("checked");
            curOBJ.removeAttr('disabled');
        });
        location.reload();
    });


    //****************************************Experts manipulation*****************************************
    var j = 0;
    var ELeditFlag = 0;
    $('.elBtnEdit').attr('disabled','disabled');
    $('.elSave >button').attr('disabled','disabled');
    $('.elDelete >button').attr('disabled','disabled');
     
    //friendlist check button click
    $(document).on("click",".elCancel",function(){
        ELeditFlag = 0 ;
        //expert panel
        $('.elBtnAdd >button').removeAttr('disabled');
        //$('.elDelete >button').removeAttr('disabled');
        //$('.elSave >button').removeAttr('disabled');
        $('.elCancel >button').removeAttr('disabled');
        $('.elSave >button').attr('disabled','disabled');
        $('.elChk:checked').each(function (item) {
            var cur = $(this).parent();
            var curOBJ = $(this);
            curOBJ.removeAttr("checked");
        });
        location.reload();
    });

    //friendlist check button click
    $(document).on("change",".elChk",function(){
        elID = $(this).attr("id");
        curOBJ = $(this);

        if(this.checked) {
            $('.elDelete >button').removeAttr('disabled');
            $('.elChk').attr('disabled','disabled');
            curOBJ.removeAttr('disabled');
            //$('.flBtnEdit').removeAttr('disabled');
            $('.elBtnAdd >button').attr('disabled','disabled');
        }
        else
        {
            $('.elChk').removeAttr('disabled');
            $(".rmvReadonly"+elID).attr("readonly", "readonly");
            $('.elSave >button').attr('disabled','disabled');
            $('.elBtnAdd >button').removeAttr('disabled');
            $('.elDelete >button').attr('disabled','disabled');
            //$('.flBtnEdit').attr('disabled','disabled');
        }
    });

    //Experts add button click
    $(document).on("click",".elBtnAdd",function(){
        $('.elDelete >button').attr('disabled','disabled');
        $('.elBtnAdd >button').attr('disabled','disabled');
        $( ".ELaddNewRow" ).show("slow");
        $( "#eladdFname" ).focus();
        $('.elSave >button').removeAttr('disabled');
        //disable expert panel
        $('.flBtnAdd >button').attr('disabled','disabled');
        //$('.elDelete >button').attr('disabled','disabled');
        //$('.elSave >button').attr('disabled','disabled');
        $('.flCancel >button').attr('disabled','disabled');
    });

    //Experts edit button click
    $(document).on("click",".elBtnEdit",function(){
        i=0;
        var elID = '';
        var fname = '';
        var lname = '';
        var email = '';
        var mobile = '';
        var city = '';
        var country = '';

        //disable expert panel
        $('.flBtnAdd >button').attr('disabled','disabled');
        //$('.elDelete >button').attr('disabled','disabled');
        //$('.elSave >button').attr('disabled','disabled');
        $('.flCancel >button').attr('disabled','disabled');

            $('.elChk:checked').each(function (item) {
                var cur = $(this).parent();
                elID = $(this).attr("id");
                /*fname = cur.next().text();
                lname = cur.next().next().text();
                email = cur.next().next().next().text();
                mobile = cur.next().next().next().next().text();
                city = cur.next().next().next().next().next().text();
                country = cur.next().next().next().next().next().next().text();*/
                i++;
            });
            $("#elRow"+elID).css("background-color", "#7851f7");

            if(i== 0){
                if ($(".flChk").length > 0) {
                    alert("Please select atleast one checkbox!");
                }
                else
                {
                    alert("Nothing to edit!");
                }

            }
            else if (i>1) {alert("Please select  one checkbox at a time to edit!");}
            else{
                $( "#elFname" ).focus();
                $(".rmvReadonly"+elID).removeAttr("readonly"); 
                $("#elEmail"+elID).attr("readonly", "readonly"); 
                $(".elSave >button").removeAttr("disabled");
                ELeditFlag = 1; 
            }
       });

    //Experts friend
    $(document).on("click",".elSave",function(){
        $('.elSave >button').attr('disabled','disabled');
        $('.elDelete >button').removeAttr('disabled');
        $('.elBtnAdd >button').removeAttr('disabled');
        //expert panel
        $('.flBtnAdd >button').removeAttr('disabled');
        //$('.elDelete >button').removeAttr('disabled');
        //$('.elSave >button').removeAttr('disabled');
        $('.flCancel >button').removeAttr('disabled');
        i=0;
        var checkExists = 0;
        var elID = '';
        var fname = '';
        var lname = '';
        var email = '';
        var mobile = '';
        var city = '';
        var country = '';
        var loggedID = $(".loggedID").val();
            
        var tag = '';
        
        if(ELeditFlag == 1)
        {
          tag = "editFriendss"

          $('.elChk:checked').each(function (item) {
            var cur = $(this).parent();
            var curOBJ = $(this);
            elID = $(this).attr("id");
            fname = $('#elFname'+elID).val();
            lname =  $('#elLname'+elID).val();
            email = $('#elEmail'+elID).val();
            mobile = $('#elMobile'+elID).val();
            city = $('#elCity'+elID).val();
            country = $('#elCountry'+elID).val();
            i++;
          });
        }
        else if(FLeditFlag == 0)
        {
           tag = "addFriendss"
           $( ".ELaddNewRow" ).hide("slow");
            fname = $('.eladdFname').val();
            lname =  $('.eladdLname').val();
            email = $('.eladdEmail').val();
            mobile = $('.eladdMobile').val();
            city = $('.eladdCity').val();
            country = $('.eladdCountry').val();
        }

        if(email != "" && isEmail(email))
        {
            if(parseInt(checkExists) == 0)
            {
                    checkExists = 0;
                $.ajax({
                    url:'ajax.php',
                    type: 'POST',
                    dataType: "json",
                    data: {loggedID:loggedID,flID:elID,fname:fname,lname:lname,phone:mobile,email:email,city:city,country:country,userType:"addFriend",tag:tag,isexpert:"yes"},
                    success: function(data)    // A function to be called if request succeeds
                    {
                        FLeditFlag = 0;
                        console.log(data);
                        if(data.success == 1)
                        {
                        alert(data.msg);
                        window.location.reload();
                        }
                        else
                        {
                        //alert();
                        }
                    } ,
                    error: function () {
                        FLeditFlag = 0;
                        alert("Failed to Save!");
                    }
                });
            }

        }
        else {
            $('.elSave >button').removeAttr('disabled');
            alert("Valid Email Must be prvided!");
        }
    });

    //Experts Delete
    $(document).on("click",".elDelete",function(){
        i=0;
        var fname = '';
        var lname = '';
        var email = '';
        var mobile = '';
        var city = '';
        var country = '';
        var loggedID = $('.loggedID').val();
        $('.flBtnAdd >button').removeAttr('disabled');
        //$('.elDelete >button').removeAttr('disabled');
        //$('.elSave >button').removeAttr('disabled');
        $('.flCancel >button').removeAttr('disabled');


        //$( "#flFname" ).focus();
        $('.elChk:checked').each(function (item) {
            var cur = $(this).parent();
            flID = $(this).attr("id");
            email = $('#elEmail'+flID).val();
            fname = $('#elFname'+flID).val();
            lname = $('#elLname'+flID).val();
            i++;
        });

        if(i== 0){    alert("Please select atleast one checkbox!");}
        else if (i>1){    alert("Please select  one checkbox at a time to edit!");}
        else{
            var r = confirm("Are you Sure - You want to Delete "+fname+" "+lname+"?");
            if (r == true) {
                $.ajax({
                    url:'ajax.php',
                    type: 'POST',
                    dataType: "json",
                    data: {
                        fname:fname,
                        lname:lname,
                        email:email,
                        tag:"deleteFriendss",
                        isExpertss:"YES",
                        loggedID:loggedID
                    },
                    success: function(data)    // A function to be called if request succeeds
                    {
                        console.log(data);
                        if(data.success == 1)
                        {
                            alert(data.msg);
                            window.location.reload();
                        }
                        else
                        {
                        //alert();
                        }
                    } ,
                    error: function () {
                        alert("Failed to Save!");
                    }

                });
             } else {
                // txt = "You pressed Cancel!";
            }
        }
    });

    //Connection code
    $(document).on("click",".FLconnectMember",function(){
        var memberName= $(this).attr("dir");
        $(".connSuccess > span").text(memberName);
        $(".connSuccess").css("display","block");
        //$("html, body").animate({ scrollTop: $(".connSuccess").scrollTop() }, 1000);//scroll to top
        var memberId =  $(this).attr("for");
        var imagePath =  $(this).attr("memberImage");
        var memberEmail= $(this).attr("memberEmail");
        $('html,body').animate({ scrollTop: 9999 }, 1000);
        /*
        setTimeout(function(){
            location.href="connect.php?memberId="+memberId+"&search=FaF&imagePath="+imagePath+"&memberName="+memberName+"&memberEmail="+memberEmail;
        }, 4000);*/
        window.open("connect.php?memberId="+memberId+"&search=FaF&imagePath="+imagePath+"&memberName="+memberName+"&memberEmail="+memberEmail);
    });

    $(document).on("click",".ELconnectMember",function(){
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

    //Make APPOINTMENT button click
    $(document).on("click",".appoint",function(){
        var email = $(this).attr("emails");
        var recieverFname = $(this).attr("names");
        var senderEmail = $(this).attr("seekerEmail");
        var senderName = $(this).attr("seekerName");
        //var appointTime =  $(this).val();
        window.location.href = "Make-Appointment.php?email="+email+"&recieverFname="+recieverFname+"&senderEmail="+senderEmail+"&senderName="+senderName;
    });

});

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}


</script>


<?php include 'footer.php';?>

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
