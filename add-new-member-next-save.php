<?php
include("config/connection.php");
//require("phpMailer/class.phpmailer.php");
include("imageresize/smart_resize_image.function.php");
include("phpSendMail.php");
$emailObject=new phpSendMail();
//print_r($emailObject->geEmailConfig());die("tessst");
session_start();
$conn=new connections();
$conn=$conn->connect();

//Create Email instance for sending mail
$emailObject=new phpSendMail();

//if(isset($_SESSION['logged_user_id']) && !empty($_SESSION['logged_user_id']))
//{

/*echo "<br><pre>";
print_r($_FILES);echo "<br>";
print_r($_REQUEST);
echo "</pre><br>";
die();*/

 if(isset($_POST['submit']))
  {
	
	$mobileNo = isset($_REQUEST['mobileNo'])?$_REQUEST['mobileNo']:'';
	$pwd = isset($_REQUEST['pwd'])?$_REQUEST['pwd']:'';
	$cpwd = isset($_REQUEST['cpwd'])?$_REQUEST['cpwd']:'';
	$member_id = isset($_REQUEST['member_id'])? $_REQUEST['member_id'] : 0;
	$Email = isset($_REQUEST['Email'])? $_REQUEST['Email'] : '';
	$memberName = isset($_REQUEST['memberName'])? $_REQUEST['memberName'] : '';
	$gm_group_id = isset($_REQUEST['gm_group_id'])? $_REQUEST['gm_group_id'] : '0';
	$target_fileName = '';
	if($member_id > 0)
	{
				$currentDate = date('Y-m-d');
				$uploaded_file = '';
				 if(isset($_FILES) && is_array($_FILES))
				{
					// die("test");
					$target_dir = "images/memberPhotos/";
					$imageFileType = pathinfo($_FILES['file']["name"],PATHINFO_EXTENSION);

					$target_file = $target_dir.$member_id.'.'.$imageFileType;
					$target_fileName = $member_id.'.'.$imageFileType;
					
					//die($target_file);
					$uploadOk = 1;
					
					//indicate which file to resize (can be any type jpg/png/gif/etc...)
					$file = $_FILES['file']["tmp_name"];//'your_path_to_file/file.png';
							
					//indicate the path and name for the new resized file
					$resizedFile = $target_file;//'your_path_to_file/resizedFile.png';
							
					//call the function (when passing path to pic)
					if (smart_resize_image($file , null, "200" , "200" , false , $resizedFile , false , false ,100 )){	
					
							$uploaded_file = $target_fileName;
							
							$result['msg'] = "The Image ".$member_id. $target_fileName. " has been uploaded.";
							$result['imageName'] = $target_fileName;
							
					} else {
							$passStr="Sorry, there was an error uploading your Image.<br/>";
					}
					//}
					//die($uploaded_file);
					 //echo json_encode($result);
					  //die();
				 }
				
				$sql="update group_member set gm_password='".md5($pwd)."',gm_phone=".$mobileNo.",gm_image='".$uploaded_file."',status='Y' where gm_id=".$member_id;//echo $sql;exit();
				$tableResult = mysqli_query($conn, $sql);
				$MSG = "Registered Sucessfully!";
				$result['success'] = 1;
				$result['error'] = 0;
				$result['MSG'].="<br>".$MSG;
				if($tableResult > 0)
				{
					$member_id = mysqli_insert_id($conn);
					$sql="SELECT group_name,image FROM groups where  group_id = ".$gm_group_id;
					$resultss = mysqli_query($conn, $sql);
					$groupDetails = array();$groupImage='';$groupName='';
					if (mysqli_num_rows($resultss) > 0)  
					{
						$groupDetails = mysqli_fetch_assoc($resultss);
						
					}
					
					$groupName = (empty($groupName))?$groupDetails['group_name']:$groupName;
					$groupImage = $groupDetails['image'];
					
					//----------------------------Email Body Texts------------------------
				
					$body = '<div style="width:100%;max-width:660px;margin:0px auto;">
					<div style="text-align:center;"><img src="http://'.$_SERVER['SERVER_NAME'].'/images/logo.png" /></div>';
					$body.='<div style="border:solid 1px #EEE;text-align:center; margin-bottom:3px;margin-top:10px;background:#F3F3F3;">
					<p style="font-size:16px;color:#036;margin:3px 0;font-family:Georgia, \'Times New Roman\', Times, serif;padding:10px 15px;line-height:25px;text-align:left;">';
					$body.='Dear '.$memberName.',<br/><br/>	Congratulations ! <br/><br/>';
					$body.='<div style="text-align:center;"><img width="200" height="200" src="http://'.$_SERVER['SERVER_NAME'].'/images/memberPhotos/'.$uploaded_file.'" /></div><br><br>';
					$body.='<div align="left">Your Registration as a Group Member to VillageExperts.com site is successful.</div><br><br>';
					/*$body.='You are now a member of Group:'.$groupName.'.</p>';
					if(!empty($groupImage)){
					$body.='<div style="text-align:center;"><img src="http://'.$_SERVER['SERVER_NAME'].'/images/groupPhotos/'.$groupImage.'" /></div><br><br>';
					}*/
					$body.='<div align="left">Your username is: '.$Email.'</div><br>';
					$body.='<div align="left">Your Password is: '.$pwd.'</div></div></div>';
					$body.='<p style="width:200px;margin:20px auto;background:#F00;color:#fff;padding:12px 0px;font-family:Georgia, \'Times New Roman\', Times, serif;font-size:17px;text-align:center;border-radius:10px;font-weight:bold;"><a href="http://'.$_SERVER['SERVER_NAME'].'/index.php?success=1&type=GM&email='.$Email.'" style="color:#fff;">Click to Login</a></p>';
		

					   //----------------------------//Email Body Texts------------------------

			 	$mailSent = $emailObject->sendMail($Email, $memberName,"Village-Expert Group Member Registration successful!",$body);
				if($mailSent)
				{
					$passStr.= ' Congratulation!<br>Registration successful!<br>Redirecting to your Login page....';
					$passImg = 'memberPhotos/'.$target_fileName;
					header("location:well-come.php?passStr=$passStr&passImg=$passImg&redirect=add-new-member-next&email=$Email");
				}
					
				}//if update succesful
	  			else{
					$passStr.= ' Registration Error!<br>
					may be this member does\'t exist!<br>Redirecting....';
					$passImg = 'memberPhotos/'.$target_fileName;
					header("location:well-come.php?passStr=$passStr&passImg=$passImg&redirect=add-new-member-next");
				  	/* header("Refresh: 5; url=index.php");
							echo '<center><h1 style="color:red">Registration Error!<br>
							may be this member does\'t exist!<br>Redirecting....</h1></center>';*/
				}
	}
 	else{//if wrong memberid recieved{
		   $passStr = 'You are not authorized.Redirecting....';
			$passImg = 'memberPhotos/img-3.jpg';
			header("location:well-come.php?passStr=$passStr&passImg=$passImg&redirect=index");
	}
  }
//}//session checking
/*else
{
	header("Refresh: 3; url=index.php");
		echo '<center><h1 style="color:red">You are not autorized.Redirecting....</h1></center>';
}
*/
?>
