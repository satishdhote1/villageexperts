<?php

include("config/connection.php");

require("phpMailer/class.phpmailer.php");

session_start();

$conn=new connections();

$conn=$conn->connect();

if((isset($_REQUEST['memberRegFresh']) && $_REQUEST['memberRegFresh'] == 1)|| (isset($_SESSION['logged_user_id']) && !empty($_SESSION['logged_user_id'])))

{

/*

echo "<br><pre>";

print_r($_FILES);echo "<br>";

print_r($_REQUEST);

echo "</pre><br>";

die();

*/

$tag =isset($_REQUEST['tag'])?$_REQUEST['tag']:'';

 if(isset($_REQUEST['submit'])){

	 
	$memberName = isset($_REQUEST['member-Name'])?$_REQUEST['member-Name']:'';

	$mobileNo = isset($_REQUEST['mobileNo'])?$_REQUEST['mobileNo']:'';

	$Email = isset($_REQUEST['Email'])?$_REQUEST['Email']:'';

	$groupIds =isset($_REQUEST['gmID'])?$_REQUEST['gmID']:0;

	$currentDate = date('Y-m-d');

	$sql="insert into group_member (gm_name,gm_phone,gm_email,group_ids,gm_logged_in) values ('".$memberName."',".$mobileNo.", '".$Email."','".$groupIds."', 'N')" ;//echo $ sql;exit();

		$tableResult = mysqli_query($conn, $sql);

		$MSG = "Registered Sucessfully!";

		$result['success'] = 1;

		$result['error'] = 0;

		$result['MSG'].="<br>".$MSG;

		if($tableResult > 0)

		{

			$member_id = mysqli_insert_id($conn);

						
		   //----------------------------Email Body Texts------------------------


			$body = '

			<div style="width:100%;max-width:660px;margin:0px auto;">

			<div style="text-align:center;"><img src="http://'.$_SERVER['SERVER_NAME'].'/villageExpert/images/logo.png" /></div>';

			$body.='

			<div style="border:solid 1px #EEE;text-align:center; margin-bottom:3px;margin-top:10px;background:#F3F3F3;">

			<p style="font-size:16px;color:#036;margin:3px 0;font-family:Georgia, \'Times New Roman\', Times, serif;padding:10px 15px;line-height:25px;text-align:left;">';

			$body.='Dear '.$memberName.',<br /><br/>

			Your have been added as a Group member to VillageExperts.com site: '.' <br><br>

			</p>';

			$body.='<p>You are requested to complete your Registration By clicking the link below:</p>';

			$body.='<p style="width:200px;margin:20px auto;background:#F00;color:#fff;padding:12px 0px;font-family:Georgia, \'Times New Roman\', Times, serif;font-size:17px;text-align:center;border-radius:10px;font-weight:bold;">

			<a href="http://'.$_SERVER['SERVER_NAME'].'/villageExpert/add-new-member-next.php?member_id='.$member_id.'&memberName='.$memberName.'&email='.$Email.'" style="color:#fff;">Complete Registration</a></p></div></div>';

		

		   //----------------------------//Email Body Texts------------------------

		$emailObject=new connections();

	 	$emailData = $emailObject->geEmailConfig();

		$mail = new PHPMailer();

   		$mail->IsSMTP();

   		$mail->Mailer = "smtp";

   		$mail->Host = $emailData['host'];;

   		$mail->Port = "465"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.

   		$mail->SMTPAuth = true;

   		$mail->SMTPSecure = 'tls';

    	$mail->Username = $emailData['uname'];

		$mail->Password = $emailData['pwd'];

   		$mail->From     = $emailData['from'];

   		$mail->FromName = "Village Expert";

   		$mail->AddAddress($Email, $memberName);

  		// $mail->AddReplyTo("Your Reply-to Address", "Sender's Name");

   		$mail->Subject = "Village-Expert Membership Verification.";

   		$mail->Body    = $body;

   		$mail->WordWrap = 50;  

   		$mail->IsHTML(true);

   		if(!$mail->Send())

	 		echo "Mailer Error: " . $mail->ErrorInfo;

   else

	{

		$passStr = 'Member - '.$memberName.' created.<br><br> Please Check Your email to complete the registration. <br><br>Redirecting....';

		$passImg = 'groupPhotos/img-3.jpg';

		header("location:well-come.php?passStr=$passStr&passImg=$passImg&redirect=add-new-member&success=1&gmID=".$member_id."&tag=NewMember");

		
		/*header("location:well-come.php?passStr=$passStr&passImg=$passImg&redirect=add-new-member&success=1&gmID=".$getGM_id."&groupName=".$getgroupName."&tag=fetchmembers");*/

	   //header("Refresh: 5; url=my-group.php?success=1&gmID=".$getGM_id."&groupName=".$getgroupName."&tag=fetchmembers");

	  // echo '<center><h1 style="color:red">Member - '.$memberName.' created.<br><br> Please Check Your email to complete the registration. <br><br>Redirecting....</h1></center>';

	}

  }

 }

 if(!empty($tag) && $tag == 'existing'){

	 

	$memberId =isset($_REQUEST['memberId'])?$_REQUEST['memberId']:0;

	$groupIds =isset($_REQUEST['gmID'])?$_REQUEST['gmID']:0;

	$groupName = isset($_REQUEST['groupName'])?$_REQUEST['groupName']:'';

	$allGroupIds = '';

	$memberName = '';

	$memberImage = '';

	$Email = '';

	$sql="select group_ids,gm_name,gm_image,gm_email from group_member where gm_id=$memberId" ;//echo $ sql;exit();

					$tableResult = mysqli_query($conn, $sql);

					if (mysqli_num_rows($tableResult) > 0)  

					{

						$row = mysqli_fetch_assoc($tableResult);

						$allGroupIds = $row['group_ids'];

						if($row['group_ids'] !=0 && strpos($row['group_ids'],",")!==FALSE)

						{

							$allGroupIds.=",".$groupIds;

						}

						else if($row['group_ids'] !=0 && strpos($row['group_ids'],",")===FALSE)

						{

							$allGroupIds.=",".$groupIds;

						}

						else if($row['group_ids'] ==0)

						{

							$allGroupIds=$groupIds;

						}

						$memberName = $row['gm_name'];

						$memberImage = "memberPhotos/".$row['gm_image'];

						$Email = $row['gm_email'];

					}

					

					

	 	$sql2="update group_member set group_ids='".$allGroupIds."' where gm_id=$memberId" ;//die();//echo $ sql;exit();

					$tableResult2 = mysqli_query($conn, $sql2);

 		$body = '

				<div style="width:100%;max-width:660px;margin:0px auto;">

				<div style="text-align:center;"><img src="http://'.$_SERVER['SERVER_NAME'].'/villageExpert/images/logo.png" /></div>';

				$body.='

				<div style="border:solid 1px #EEE;text-align:center; margin-bottom:3px;margin-top:10px;background:#F3F3F3;">

				<p style="font-size:16px;color:#036;margin:3px 0;font-family:Georgia, \'Times New Roman\', Times, serif;padding:10px 15px;line-height:25px;text-align:left;">';

				$body.='

				Dear '.$memberName.',<br /><br/>

				Your have been added as a Group member to The Village Experts Site to Group-'.$groupName.' <br><br>By:'.$_SESSION['logged_user_name'].'</p>';

				


			   //----------------------------//Email Body Texts------------------------



	$emailObject=new connections();

	 $emailData = $emailObject->geEmailConfig();

	$mail = new PHPMailer();

   $mail->IsSMTP();

   $mail->Mailer = "smtp";

   $mail->Host = "smtp.gmail.com";

   $mail->Port = "587"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.

   $mail->SMTPAuth = true;

   $mail->SMTPSecure = 'tls';

    $mail->Username = $emailData['uname'];

	$mail->Password = $emailData['pwd'];

   $mail->From     = "dassamtest2@gmail.com";

   $mail->FromName = "Village Expert";

   $mail->AddAddress($Email, $memberName);

  // $mail->AddReplyTo("Your Reply-to Address", "Sender's Name");

   $mail->Subject = "Village-Expert Membership Verification.";

   $mail->Body    = $body;

   $mail->WordWrap = 50;  

   $mail->IsHTML(true);

    if(!$mail->Send())

	 	echo "Mailer Error: " . $mail->ErrorInfo;

    else
	{

		$passStr = "Member $memberName Added to Group - ".$_GET['groupName'].". Redirecting..";

		$passImg = $memberImage;

		$result['MSG'].=$MSG;

		header("location:well-come.php?passStr=$passStr&passImg=$passImg&redirect=my-group&tag=existing&gmID=$groupIds&groupName=$groupName");

	}

 

 

 

 

 }

 

}//session checking

else

{

	$passStr = 'You are not authorized.Redirecting....';

										$passImg = 'memberPhotos/img-3.jpg';

										header("location:well-come.php?passStr=$passStr&passImg=$passImg&redirect=index");

}



?>