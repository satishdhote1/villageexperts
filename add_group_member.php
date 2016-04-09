<?php
	session_start();
require('config.php');
require('AWSSDKforPHP/sdk.class.php');
if($_SESSION['SESS_ID']||$_SESSION['SESS_SR_ID']) {
	$general_user = "";
	if(isset($_SESSION['SESS_ID'])) {
		$SPID=$_SESSION['SESS_ID'];
		$general_user = $SPID;
	}
	
	if(isset($_SESSION['SESS_SR_ID'])) {
		$SRID=$_SESSION['SESS_SR_ID'];
		$general_user = $SRID;
	}
}
else {
	header('location:index.php?error="loginerror"');
	exit();	
}

if(isset($_POST['member_email'])) {
	$member_email = $_POST['member_email'];
	$member_fname = $_POST['member_fname'];
	$member_lname = $_POST['member_lname'];
	$member_date = date('Y-m-d h:i:s');
	$member_status = 'invited';
	$group_id = $_POST['group_id'];
	$group_name = $_POST['group_name'];

	$qryChkSP=mysqli_query($bd, "SELECT * FROM service_provider WHERE email='$member_email'");
	if(mysqli_num_rows($qryChkSP)) {
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$memChkSP=mysqli_fetch_assoc($qryChkSP);
			$member_id=$memMemberId['SPID'];	

			$qryChkEU=mysqli_query($bd, "SELECT * FROM group_members WHERE member_id='$member_id' AND group_id='$group_id'");
			if(mysqli_num_rows($qryChkEU)) {
				header('location:mygroup.php?group='.$group_id.'&error=eu');
				exit();
			}		
			//$member_firstname=$memMemberId['First_Name'];
			//$member_lastname=$memMemberId['Last_Name'];
			//if($member_firstname==$member_fname && $member_lastname==$member_lname){
				// Continue
			//}
			//else {
				//header('location:mygroup.php?group='.$group_id.'&error=spfle');
				//exit();				
			//}			
			$qryAddMember = mysqli_query($bd, "INSERT INTO group_members(group_id, member_id, fname, lname, member_date, member_status) VALUES('$group_id', '$member_id', '$member_fname', '$member_lname', '$member_date', '$member_status')");
			$notification = "You have a invitation to join ".$group_name." group.";
			$notification_to = $member_id;
			$notification_by = $general_user;
			$notification_status = 'unread';
			$dtime = date('Y-m-d h:i:s');
			$qryAddNotification = mysqli_query($bd, "INSERT INTO notification(msg, notification_to, notification_by, dtime, status) VALUES('$notification', '$notification_to', '$notification_by', '$dtime', '$notification_status')");
			header('location:mygroup.php?group='.$group_id.'&invite=spinvited');
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	}
	else {
		// USER NOT SERVICE PROVIDER CHECK SERVICE REQUESTOR
		$qryMemberId=mysqli_query($bd, "SELECT * FROM service_requester WHERE email='$member_email'");
		if(mysqli_num_rows($qryMemberId)) {
			$memMemberId=mysqli_fetch_assoc($qryMemberId);
			$member_id=$memMemberId['SRID'];

			$qryChkEU=mysqli_query($bd, "SELECT * FROM group_members WHERE member_id='$member_id' AND group_id='$group_id'");
			if(mysqli_num_rows($qryChkEU)) {
				header('location:mygroup.php?group='.$group_id.'&error=eu');
				exit();
			}		
			
			$member_firstname=$memMemberId['First_Name'];
			$member_lastname=$memMemberId['Last_Name'];
			//if($member_firstname==$member_fname && $member_lastname==$member_lname){
				// Continue
			//}
			//else {
				//header('location:mygroup.php?group='.$group_id.'&error=srfle');
				//exit();				
			//}			
			$qryAddMember = mysqli_query($bd, "INSERT INTO group_members(group_id, member_id, fname, lname, member_date, member_status) VALUES('$group_id', '$member_id', '$member_fname', '$member_lname', '$member_date', '$member_status')");
			$notification = "You have a invitation to join ".$group_name." group.";
			$notification_to = $member_id;
			$notification_by = $general_user;
			$notification_status = 'unread';
			$dtime = date('Y-m-d h:i:s');
			$qryAddNotification = mysqli_query($bd, "INSERT INTO notification(msg, notification_to, notification_by, dtime, status) VALUES('$notification', '$notification_to', '$notification_by', '$dtime', '$notification_status')");
			header('location:mygroup.php?group='.$group_id.'&invite=srinvited');
		}
		else {
			// Member Not Exist
			
			$dtime = date('Y-m-d h:i:s');
			$ucode = $general_user."".date('Ymdhis');
			$qryAddNotification = mysqli_query($bd, "INSERT INTO nm_invite(first_name, last_name, email, invite_by, invited_group, dtime, status, ucode) VALUES('$member_fname', '$member_lname', '$member_email', '$general_user', '$group_id ', '$dtime', 'invite', '$ucode')");

			$email_subject=$group_name." group invitation - Village Experts";
			$email_message="You are invited to '".$group_name."' group on https://www.villageexperts.com/ . Please click the button below to complete your registration and join the group. <a href='http://www.villageexperts.com/nm_register_page.php?ucode=".$ucode."' style='float:left;width:100%;padding: 10px 0;background:#1274C0;color:#fff;text-align:center;text-decoration: none;font-size: 26px;margin-top: 20px;'>Complete Your Registration</a>";
			//mail($member_email,$email_subject,$email_message);
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				amazonSesEmail('villageexpert.info@gmail.com', $email_subject, $email_message);

			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			header('location:mygroup.php?group='.$group_id.'&invite=nminvited');
			exit();				
		}
	}	
}
else {
	header('location:mygroup.php?group='.$group_id.'&error=noemail');
	exit();	
}



function amazonSesEmail($to, $subject, $message)
{
	$amazonSes = new AmazonSES(array(
		'key' => 'AKIAIMT5T3NIZUY2PKYQ',
		'secret' => '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'
	));
	//$amazonSes->verify_email_address('villageexpert.info@gmail.com');
	 $response = $amazonSes->send_email('villageexpert.info@gmail.com',
		array('ToAddresses' => array($to)),
		array(
			'Subject.Data' => $subject,
			'Body.Html.Data' => $message,
		)
	);
	if (!$response->isOK())
	{
		//echo "BAD";
	}
	 else
	{
		//echo "GOOD";
	}
}
?>