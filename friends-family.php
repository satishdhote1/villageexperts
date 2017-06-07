<?php
error_reporting(E_ALL);
include("config/connection.php");
session_start();
echo $_SESSION['logged_user_id'];
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

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

</head>

<body>

	<?php include 'vvheader.php';?>

   <section class="friend-family">

        <div class="">

            <div class="container">

				<div class="row">
            
					<div class="col-md-12  m-t-1" style="background:#fff; border-radius:10px;">

						<div class="card-block text-xs-center">            
							<div>
							<div class="top-part">
								<div class="col-md-4 text-xs-left"><label class="modify-badge-2" style="color:#495775;">My Friends List</label></div>
								<!--  <div class="col-md-1 clearRequestMailData text-xs-center flBtnEdit" style="padding:0" id="flBtnEdit"><button class="btn btn-width btn-mdb pull-right">Edit</button></div> -->
								<div class="col-md-2 clearRequestMailData text-xs-left flBtnConferenece" style="padding:0" id="flBtnConferenece"><button class="btn btn-width btn-mdb pull-right">Conference</button></div>
								<div class="col-md-1 clearRequestMailData text-xs-left flBtnAdd" style="padding:0" id="flBtnAdd"><button class="btn btn-width btn-mdb pull-right">Add</button></div>
								<div class="col-md-1 clearRequestMailData flSave" id="flSave" style="padding-left:0;text-align:right !important;"><button class="btn btn-width btn-mdb pull-right">Save</button></div>
								<div class="col-md-1 clearRequestMailData flDelete" id="flDelete" style="padding-left:0;text-align:right !important;"><button class="btn btn-width btn-mdb pull-right">Delete</button></div>
								<div class="col-md-1 clearRequestMailData text-xs-center flCancel" id="flCancel" style="padding:0;"><button class="btn btn-width btn-mdb">Cancel</button></div>
							</div>
							
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
								
									<!-- this is to add an empty row at the top -->
									<tr class="flRow addNewRow" style="display: none;">
										<td width="24px" style="width: 24px !important;">
											 <input type="hidden" value="<?php echo $userID; ?>" name="loggedID" class="loggedID">
										</td>
										<td>
											<input style="width: 100%;" type="text" class="edit_text fladdFname " placeholder="First Name" id="fladdFname" name="fladdFname"  value="">
										</td>
										<td>
											<input style="width: 100%;" type="text" class="edit_text fladdLname" placeholder="Last Name" id="fladdLname<?php echo $userDatas['id']; ?>" name="fladdLname"  value="">
										</td>
										<td style="width: 200px !important;">
											<input style="width: 100%;" type="text" class="edit_text fladdEmail" id="fladdEmail<?php echo $userDatas['id']; ?>" placeholder="Email" name="fladdEmail"  value="">
										</td>
										<td>
											<input style="width: 100%;" type="text" class="edit_text fladdMobile" id="fladdMobile<?php echo $userDatas['id']; ?>" name="fladdMobile"  value="" placeholder="Mobile No.">
										</td>
										<td>
											<input style="width: 100%;" type="text" class="edit_text fladdCity "  id="fladdCity<?php echo $userDatas['id']; ?>" name="fladdCity"  value="" placeholder="City">
										</td>
										<td>
											 <input style="width: 100%;" type="text" class="edit_text fladdCountry "  id="fladdCountry<?php echo $userDatas['id']; ?>" name="fladdCountry"  value="" placeholder="Country">
										</td>

									</tr>
									<!-- end of //this is to add an empty row at the top -->

										<?php
										if(!empty($userData))
										{
										foreach($userData as $userDatas) { ?>
										<tr class="flRow userTableRowClass" id="flRow<?php echo $userDatas['id']; ?>" onclick="submitUserRow()"  for="<?php echo $userDatas['id']; ?>" dir="<?php echo $userDatas['fname']." ".$userDatas['lname']; ?> " memberImage="<?php echo $userDatas['image']; ?>" memberEmail="<?php echo $userDatas['email']; ?>">
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

							</div>
							</div>

							<hr class="distance">

							<div>

							<div class="top-part">
								<div class="col-md-8 text-xs-left"><label class="modify-badge-2" style="color:#495775;">My Experts List</label>
								<div class="col-md-1 clearRequestMailData text-xs-left elBtnAdd" style="padding:0" id="elBtnAdd"><button class="btn btn-width btn-mdb pull-right">Add</button></div>
								<div class="col-md-1 clearRequestMailData elSave" id="elSave" style="padding-left:0;text-align:right !important;"><button class="btn btn-width btn-mdb pull-right">Save</button></div>
								<div class="col-md-1 clearRequestMailData elDelete" id="elDelete" style="padding-left:0;text-align:right !important;"><button class="btn btn-width btn-mdb pull-right">Delete</button></div>
								<div class="col-md-1 clearRequestMailData text-xs-center elCancel" id="elCancel" style="padding:0;"><button class="btn btn-width btn-mdb">Cancel</button></div>
							</div>

							</div>

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

										<!-- this is to add an empty row at the top -->

										<tr class="elRow ELaddNewRow" style="display: none;">
        
											<td width="24px" style="width: 24px !important;">
											<input type="hidden" value="<?php echo $userID; ?>" name="loggedID" class="loggedID">
											</td>
											<td>
												<input style="width: 100%;" type="text" class="edit_text eladdFname " placeholder="First Name" id="eladdFname" name="eladdFname"  value="">
											</td>
											<td>
												<input style="width: 100%;" type="text" class="edit_text eladdLname" placeholder="Last Name" id="eladdLname" name="eladdLname"  value="">
											</td>
											<td style="width: 200px !important;">
												<input style="width: 100%;" type="text" class="edit_text eladdEmail" id="eladdEmail" placeholder="Email" name="eladdEmail"  value="">
											</td>
											<td>
												<input style="width: 100%;" type="text" class="edit_text eladdMobile" id="eladdMobile" name="eladdMobile"  value="" placeholder="Expertise">
											</td>
											<td>
												<input style="width: 100%;" type="text" class="edit_text eladdCity "  id="eladdCity" name="eladdCity"  value="" placeholder="City">
											</td>
											<td>
												<input style="width: 100%;" type="text" class="edit_text eladdCountry "  id="eladdCountry" name="eladdCountry"  value="" placeholder="Country">
											</td>
                
										</tr>
										<!-- end of //this is to add an empty row at the top -->

									<?php
									if(!empty($userData))
									{
									foreach($expertData as $expertDatas) { ?>
									<tr class="flRow userTableRowClass" id="flRow<?php echo $userDatas['id']; ?>" onclick="submitUserRow()">
										<td style="width:24px !important;text-align:center;" >
											<input type="hidden" value="<?php echo $expertDatas['id']; ?>" name="elID" class="elID">
											<input type="hidden" value="<?php echo $userID; ?>" name="loggedID" class="loggedID">
											<input type="checkbox" class="elChk" id="<?php echo $expertDatas['id']; ?>">
										</td>
										<td>
											<?php if( $expertDatas['registerStatus']=='NO'){ ?>
											<button class="btn btnUserInactive" title="Inactive"></button>
											<?php } else if( $expertDatas['loginStatus']=='NO'){ ?>
											<button class="btn btnUserOffline" title="Offline"></button>
											<?php } else if( $expertDatas['loginStatus']=='BUSY'){ ?>
											<button class="btn btnUserBusy" title="Busy"></button>
											<?php } else{?>
											<button class="btn btnUserOnline" title="Online"></button>
											<?php }?>
											<input style="width: 45%; float:left ; padding-left:10px;" type="text" class="edit_text flFname rmvReadonly<?php echo $userDatas['id']; ?>" readonly="readonly" id="flFname<?php echo $userDatas['id']; ?>" name="flFname"  value="<?php echo $userDatas['fname']; ?>">
											<input style="width: 45%; float:right" type="text" class="edit_text flLname rmvReadonly<?php echo $expertDatas['id']; ?>" readonly="readonly" id="flLname<?php echo $userDatas['id']; ?>" name="flLname"  value="<?php echo $userDatas['lname']; ?>">
										</td>
										<td style="width: 200px !important;">
											<input style="width: 100%;" type="text" class="edit_text flEmail rmvReadonly<?php echo $expertDatas['id']; ?>" readonly="readonly" id="flEmail<?php echo $userDatas['id']; ?>" name="flEmail"  value="<?php echo $userDatas['email']; ?>">
										</td>
										<td>
											<input style="width: 100%;" type="text" class="edit_text flMobile rmvReadonly<?php echo $expertDatas['id']; ?>" readonly="readonly" id="flMobile<?php echo $userDatas['id']; ?>" name="flMobile"  value="<?php echo ($userDatas['phone']==0)?'':$userDatas['phone']; ?>">
										</td>
										<td>
											<input style="width: 100%;" type="text" class="edit_text flCity rmvReadonly<?php echo $expertDatas['id']; ?>" readonly="readonly" id="flCity<?php echo $userDatas['id']; ?>" name="flCity"  value="<?php echo $userDatas['city']; ?>">
										</td>
										<td>
											<input style="width: 100%;" type="text" class="edit_text flCountry rmvReadonly<?php echo $expertDatas['id']; ?>" readonly="readonly" id="flCountry<?php echo $userDatas['id']; ?>" name="flCountry"  value="<?php echo $userDatas['country']; ?>">
										</td>

										<?php if( $expertDatas['registerStatus']=='NO'){ ?>
										<td></td>
                                    
										<?php } else if( $expertDatas['loginStatus']=='NO'){ ?>
										<td><button id='tdv' class="btn-online appoint apponment btn" emails="<?php echo $expertDatas['email']; ?>" names="<?php echo $expertDatas['fname']; ?>" seekerEmail="<?php echo $_SESSION['logged_user_email']; ?>" seekerName="<?php echo $_SESSION['logged_user_fname']; ?>">Make Appointment</button></td>
                                    
										<?php } else if( $expertDatas['loginStatus']=='BUSY'){ ?>
										<td><button id='tdv' class="btn-online appoint apponment btn" emails="<?php echo $expertDatas['email']; ?>" names="<?php echo $userDatas['fname']; ?>" seekerEmail="<?php echo $_SESSION['logged_user_email']; ?>" seekerName="<?php echo $_SESSION['logged_user_fname']; ?>">Make Appointment</button></td>
                                    
										<?php } else{?>
										<td><button class="btn-online btn FLconnectMember" for="<?php echo $expertDatas['id']; ?>" dir="<?php echo $expertDatas['fname']." ".$userDatas['lname']; ?> " memberImage="<?php echo $userDatas['image']; ?>" memberEmail="<?php echo $userDatas['email']; ?>">Connect</button></td>
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

                            <div class="clearfix"></div>
                            
						</div>

                        <hr class="distance"><div class="col-md-12">
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

   
    </div>
    

<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script src="js/connectMe.js"></script>
<script src="friendsandfamily/friendsandfamilyscript.js"></script>  


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
