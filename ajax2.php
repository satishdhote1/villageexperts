<?php

die("hdhjhjdhd");

include("config/connection.php");
include("imageresize/smart_resize_image.function.php");
//include("imageresize/smart_resize_image.function.php");
//include("imageUpload.php");
include("phpSendMail.php");
session_start();

$conn=new connections();

$conn=$conn->connect();

//$imageUpload = new imageUpload();

//$imageUpload->imageUploads($_FILES,'SR_Photos','3','service_provider','sp_image','sp_id');



 /*print_r($_REQUEST);

 echo "<br>";

 print_r($_FILES);

 die();*/

 

 $tag = isset($_REQUEST['tag'])?$_REQUEST['tag']:'';



  $result['success'] = 0;

   $result['error'] = 1;

/* if(empty($tag) && isset($_FILES) && is_array($_FILES))

 {

	// die("test");

		  $target_dir = "images/uploads/";

		$target_file = $target_dir .time(). basename($_FILES['file']["name"]);

		

		//die($target_file);

		$uploadOk = 1;

		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		// Check if image file is a actual image or fake image

		if(isset($_POST["submit"])) {

			$check = getimagesize($_FILES['file']["tmp_name"]);

			if($check !== false) {

				$result['msg'] = "File is an image - " . $check["mime"] . ".";

				$uploadOk = 1;

			} else {

				$result['msg'] = "File is not an image.";

				$uploadOk = 0;

			}

		}

		// Check if file already exists

		if (file_exists($target_file)) {

			$result['msg'] = "Sorry, file already exists.";

			$uploadOk = 0;

		}

		// Check file size

		if ($_FILES['file']["size"] > 500000) {

			$result['msg'] = "Sorry, your file is too large.";

			$uploadOk = 0;

		}

		// Allow certain file formats

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"

		&& $imageFileType != "gif" ) {

			$result['msg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

			$uploadOk = 0;

		}

		// Check if $uploadOk is set to 0 by an error

		if ($uploadOk == 0) {

			$result['msg'] .= " \n Sorry, your file was not uploaded.";

		// if everything is ok, try to upload file

		} else {

			if (move_uploaded_file($_FILES['file']["tmp_name"], $target_file)) {

				

				$_SESSION['uploaded_file']= time().basename( $_FILES['file']["name"]);

				$result['success'] = 1;

				$result['error'] = 0;

				$result['msg'] = "The file ".time(). basename( $_FILES['file']["name"]). " has been uploaded.";

				$result['imageName'] = $_SESSION['uploaded_file'];

				

			} else {

				$result['msg'] = "Sorry, there was an error uploading your file.";

			}

		}

		  echo json_encode($result);

  		  die();

 }*/

  

  if($tag == "checkEmail")
  {
//die($tag);
	  $userTypess = isset($_REQUEST['userType'])?$_REQUEST['userType']:'';

	  $email = isset($_REQUEST['email'])?$_REQUEST['email']:'';

	 

	  if(!empty($email))
	  {

		 $sql="select * from friendsRegister where  email='".$email."'";

			  

			$tableResult = mysqli_query($conn, $sql);

			//print_r($tableResult);

		

			if (mysqli_num_rows($tableResult) > 0)  

			{

				$result['success'] = 1;

				$result['error'] = 0;

			}

			else

			{

				 $result['success'] = 0;

				$result['error'] = 1;

			}

			

	  }
	  else
	  {
		  $result['success'] = 0;
		  $result['error'] = 1;
	  }

	  

	  echo json_encode($result);

  }
  else if($tag == "makeAppointment")
  {
die("{'tag':$tag}");
	  

	  $email = isset($_REQUEST['email'])?$_REQUEST['email']:'';
	  echo "email=".$email;die("yuguu");
	  $recieverFname = isset($_REQUEST['recieverFname'])?$_REQUEST['recieverFname']:'';
	  $senderEmail = isset($_REQUEST['senderEmail'])?$_REQUEST['senderEmail']:'';
	  $senderName = isset($_REQUEST['senderName'])?$_REQUEST['senderName']:'';
	  $appointTime = isset($_REQUEST['appointTime'])?$_REQUEST['appointTime']:'';
	 
	 //print_r(json_decode($appointTime));
	 

	  if(!empty($email) && !empty($appointTime))
	  {
	  	$appointTime = json_decode($appointTime);
	  	print_r($appointTime);
	  	die($appointTime[0]);
		//Create Email instance for sending mail
				//$emailObject=new phpSendMail();
				
				 //----------------------------Email Body Texts------------------------
//mail("dassamtest2@gmail.com","hi","test");
			$body = '';
			$body = '<div style="width:100%;max-width:660px;margin:0px auto;"><div style="text-align:center;"><img src="http://'.$_SERVER['SERVER_NAME'].'/villageExperts/images/logo.png" /></div>';

			$body.='<div style="border:solid 1px #EEE;text-align:center; margin-bottom:3px;margin-top:10px;background:#F3F3F3;">			<p style="font-size:16px;color:#036;margin:3px 0;font-family:Georgia, \'Times New Roman\', Times, serif;padding:10px 15px;line-height:25px;text-align:left;">';

		$body.='Dear '.$recieverFname.',<br /><br/>I,'.$senderName.'is seeking an Appointment with you at  www.VillageExperts.com.<br><br> His convenient timings are: '.$appointTime[0].'<br>'.$appointTime[1].'<br>'.$appointTime[2].'<br>'.$appointTime[3].'<br>'.$appointTime[4].'<br>'.'Please Click Here to confirm a time for this Appointment.<br><br></p>';


			$body.='<p style="width:200px;margin:20px auto;background:red;color:#fff;padding:12px 0px;font-family:Georgia,\'Times New Roman\', Times, serif;font-size:17px;text-align:center;border-radius:10px;font-weight:bold;"><a href="http://'.$_SERVER['SERVER_NAME'].'/villageExperts/Make-Appointment.php?confirm=yes&senderName='.$senderName.'&appointTime1='.$appointTime[0].'&appointTime2='.$appointTime[1]'&appointTime3='.$appointTime[2].'&appointTime4='.$appointTime[3].'&appointTime5='.$appointTime[4].'&recieverFname='.$recieverFname.'&email='.$email.'&senderEmail='.$senderEmail.'" style="color:#fff;">Please Confirm</a></p></div></div>';
			
			//echo $body;die();

		//echo "bodyyy====\n".$body;

		   //----------------------------//Email Body Texts------------------------
		   /*       
            $headers='';
            $headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// Additional headers
			$headers .= 'From: Village Experts<dassamtest2@gmail.com>' . "\r\n";
            //$mailSent = mail($m_email,"Village-Expert Membership Verification.",$body,$headers);
		*/
		//$mailSent = $emailObject->sendMail($email,$recieverFname,"Village-Expert Request for Appointment.",$body);
		if(mail($email,"Village-Expert Request for Appointment.",$body))
		{


				$result['success'] = 1;

				$result['error'] = 0;

			}

			else

			{

				 $result['success'] = 0;

				$result['error'] = 1;

			}

			

	  }
	  else
	  {
		  $result['success'] = 0;
		  $result['error'] = 1;
	  }

	  

	  echo json_encode($result);

  }
   else if($tag == "requestMail")
  {
//die($tag);
	  

	  $email = isset($_REQUEST['email'])?$_REQUEST['email']:'';
	  
	 

	  if(!empty($email))
	  {

		//Create Email instance for sending mail
				$emailObject=new phpSendMail();
				
				 //----------------------------Email Body Texts------------------------
//mail("dassamtest2@gmail.com","hi","test");
			$body = '';
			$body = '<div style="width:100%;max-width:660px;margin:0px auto;"><div style="text-align:center;"><img src="http://'.$_SERVER['SERVER_NAME'].'/villageExperts/images/logo.png" /></div>';

			$body.='<div style="border:solid 1px #EEE;text-align:center; margin-bottom:3px;margin-top:10px;background:#F3F3F3;">			<p style="font-size:16px;color:#036;margin:3px 0;font-family:Georgia, \'Times New Roman\', Times, serif;padding:10px 15px;line-height:25px;text-align:left;">';

		$body.='<img src="http://'.$_SERVER['SERVER_NAME'].'/villageExperts/images/placeholder/image1.PNG" style="width:600px;" /><br/><br/><img src="http://'.$_SERVER['SERVER_NAME'].'/villageExperts/images/placeholder/image2.PNG" style="width:600px;" /></p>';


			$body.='<p style="width:200px;margin:20px auto;background:red;color:#fff;padding:12px 0px;font-family:Georgia,\'Times New Roman\', Times, serif;font-size:17px;text-align:center;border-radius:10px;font-weight:bold;"><a href="http://'.$_SERVER['SERVER_NAME'].'/villageExperts#register" style="color:#fff;">Visit villageexperts.com</a></p></div></div>';
			
			

		//echo "bodyyy====\n".$body;

		   //----------------------------//Email Body Texts------------------------
		   /*       
            $headers='';
            $headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// Additional headers
			$headers .= 'From: Village Experts<dassamtest2@gmail.com>' . "\r\n";
            //$mailSent = mail($m_email,"Village-Expert Membership Verification.",$body,$headers);
		*/
		$mailSent = $emailObject->sendMail($email,$fname,"Village-Expert Requests for Registration.",$body);
		if($mailSent)
		{


				$result['success'] = 1;

				$result['error'] = 0;

			}

			else

			{

				 $result['success'] = 0;

				$result['error'] = 1;

			}

			

	  }
	  else
	  {
		  $result['success'] = 0;
		  $result['error'] = 1;
	  }

	  

	  echo json_encode($result);

  }
  else if($tag == 'login')
  {

	  $userType = isset($_REQUEST['userType'])?$_REQUEST['userType']:'';

	  $email = isset($_REQUEST['email'])?$_REQUEST['email']:'';

	  $pwd = isset($_REQUEST['pwd'])?$_REQUEST['pwd']:'';

	 

	  if($userType == 'friendsLogin')

	  {

		  $sql="select * from friendsRegister where  email='".$email."' and pwd=md5('".$pwd."')";

		  

					$tableResult = mysqli_query($conn, $sql);

					//print_r($tableResult);

	

					if (mysqli_num_rows($tableResult) > 0)  

					{

						//die("test2");

							$SPLoginData = mysqli_fetch_assoc($tableResult);

						

						$_SESSION['logged_user_id']=$SPLoginData['id'];

						$_SESSION['logged_role_code']='friendsLogin';

						$_SESSION['logged_user_fname']=isset($SPLoginData['fname'])?$SPLoginData['fname']:'';
						$_SESSION['logged_user_lname']=isset($SPLoginData['lname'])?$SPLoginData['lname']:'';

						$_SESSION['logged_user_email']=isset($SPLoginData['email'])?$SPLoginData['email']:'';

						$_SESSION['logged_user_image']=isset($SPLoginData['image'])?$SPLoginData['image']:'';

						

						$sqlUpdate="update friendsRegister set loginStatus='YES' where id=".$SPLoginData['id'];

						$rsUpdate=mysqli_query($conn, $sqlUpdate);

						

						 $result['success'] = 1;

  						 $result['error'] = 0;

						  $result['msg'] = "Welcome ".$SPLoginData['sp_name']." !";

					}

					else

					{

						  $result['msg'] = "Sorry! Invalid Credential Provided.";

					}

					echo json_encode($result);

					

	  }

	  else if($userType == 'SRLoginHidden')
	  {

		  $sql="select * from service_requestor where  sr_email='".$email."' and sr_password=md5('".$pwd."')";

		  $tableResult = mysqli_query($conn, $sql);

	

					if (mysqli_num_rows($tableResult) > 0)  

					{

							$SRLoginData = mysqli_fetch_assoc($tableResult);

						

						$_SESSION['logged_user_id']=$SRLoginData['sr_id'];

						$_SESSION['logged_role_code']='SR';

						$_SESSION['logged_user_name']=isset($SRLoginData['sr_name'])?$SRLoginData['sr_name']:'';

						$_SESSION['logged_user_email']=isset($SRLoginData['sr_email'])?$SRLoginData['sr_email']:'';

						$_SESSION['logged_user_image']=isset($SRLoginData['sr_image'])?$SRLoginData['sr_image']:'';



						$sqlUpdate="update service_requestor set sr_logged_in='Y' where sr_id=".$SRLoginData['sr_id'];

						$rsUpdate=mysqli_query($conn, $sqlUpdate);

						

						 $result['success'] = 1;

  						 $result['error'] = 0;

						  $result['msg'] = "Welcome ".$SRLoginData['sr_name']." !";

					}

					else

					{

						$result['success'] = 0;

  						 $result['error'] = 1;

						  $result['msg'] = "Sorry! Invalid Credential Provided.";

					}

					echo json_encode($result);

	  }

	  else if($userType == 'GMLoginHidden')

	  {

		  $sql="select * from group_member where  gm_email='".$email."' and gm_password=md5('".$pwd."')";

		  

		   $tableResult = mysqli_query($conn, $sql);

	

					if (mysqli_num_rows($tableResult) > 0)  

					{

							$GMLoginData = mysqli_fetch_assoc($tableResult);

						

						$_SESSION['logged_user_id']=$GMLoginData['gm_id'];

						$_SESSION['logged_role_code']='GM';

						$_SESSION['logged_user_name']=isset($GMLoginData['gm_name'])?$GMLoginData['gm_name']:'';

						$_SESSION['logged_user_email']=isset($GMLoginData['gm_email'])?$GMLoginData['gm_email']:'';

						$_SESSION['logged_user_image']=isset($GMLoginData['gm_image'])?$GMLoginData['gm_image']:'';

						$_SESSION['logged_user_groups']=isset($GMLoginData['group_ids'])?$GMLoginData['group_ids']:'';

						$sqlUpdate="update group_member set gm_logged_in='Y' where gm_id=".$GMLoginData['gm_id'];

						$gmUpdate=mysqli_query($conn, $sqlUpdate);

						

						 $result['success'] = 1;

  						 $result['error'] = 0;

						  $result['msg'] = "Welcome ".$GMLoginData['gm_name']." !";

					}

					else

					{

						$result['success'] = 0;

  						 $result['error'] = 1;

						  $result['msg'] = "Sorry! Invalid Credential Provided.";

					}

					echo json_encode($result);

	  }

	  else

	  {

		   $result['msg'] = "UserType Not  Provided";

		   echo json_encode($result);

	  }

	  

   }

   else if($tag == 'register')
   {

	  /*print_r($_REQUEST);

 echo "<br>";

 print_r($_FILES);

 die();*/

	  $userType = isset($_REQUEST['userType'])?$_REQUEST['userType']:'';

	 

	   /* if($userType == 'SPreister')

	  	{

		*/	

		

				$fname=isset($_REQUEST['fname'])?$_REQUEST['fname']:(isset($_REQUEST['fname'])?$_REQUEST['fname']:'');
				
				$lname=isset($_REQUEST['lname'])?$_REQUEST['lname']:(isset($_REQUEST['lname'])?$_REQUEST['lname']:'');

				$m_city=isset($_REQUEST['city'])?$_REQUEST['city']:(isset($_REQUEST['city'])?$_REQUEST['city']:'');

				$m_country=isset($_REQUEST['country'])?$_REQUEST['country']:(isset($_REQUEST['country'])?$_REQUEST['country']:'');

				$m_mobile=isset($_REQUEST['phone'])?$_REQUEST['phone']:(isset($_REQUEST['phone'])?$_REQUEST['phone']:'');

				$m_email=isset($_REQUEST['email'])?$_REQUEST['email']:(isset($_REQUEST['email'])?$_REQUEST['email']:'');
				
				$pwd = isset($_REQUEST['pwds'])?$_REQUEST['pwds']:(isset($_REQUEST['pwds'])?$_REQUEST['pwds']:'');
				
				


			/*

			$_SESSION['file_name3']=$_FILES['photo']['name'];

		

		//echo $tmpfile;exit();

		$temp_file=$photo_upload_temp_path.$_SESSION['file_name3'];

		move_uploaded_file($_FILES['photo']['tmp_name'], $temp_file);

				

		chmod ($new_file1,0777);

		*/

				$valid=1;

				$MSG="";

				

				if($fname==""){

	

				$valid=0;

				$MSG .= "Please enter First Name.";

	

			}
			if($lname==""){

	

				$valid=0;

				$MSG .= "Please enter last Name.";

	

			}
			

			/*if($m_mobile==""){

		

				$valid=0;

				$MSG .= "Please enter Mobile No .";

		

			}*/

			if($m_email==""){

		

				$valid=0;

				$MSG .= "Please enter email .";

		

			}

			$imageName = '';

			//echo $valid."<br>".$MSG;

				//insert record

			if ($valid==1){

	

	

			//first, into main student table

			$tableResult = '';

			if ($userType=="addFriend"){
/*print_r($_FILES);
print_r($_POST);die();*/
	
	$target_fileName = '';
	$target_file = '';
	
					 $sql="insert into friendsRegister (fname,lname,city,country,phone,email,registerStatus,pwd,loginStatus) values ('".$fname."','".$lname."','".$m_city."', '".$m_country."', '".$m_mobile."', '".$m_email."','YES','".md5($pwd)."','NO')" ;//echo $sql;exit();

					//print_r($conn);die();
					$tableResult = mysqli_query($conn, $sql);
					$member_id = mysqli_insert_id($conn);
					//die($member_id."--test");
					$uploaded_file = '';
						 if(isset($_FILES) && is_array($_FILES))
						{
							//print_r($_FILES);
							//die($sql);
							// die("test");
							$target_dir = "images/friendsFamily/";
							$imageFileType = pathinfo($_FILES['pImage']["name"],PATHINFO_EXTENSION);
		
							$target_file = $target_dir.$member_id.'.'.$imageFileType;
							$target_fileName = "friendsFamily/".$member_id.'.'.$imageFileType;
							
							//die($target_file);
							$uploadOk = 1;
							
							//indicate which file to resize (can be any type jpg/png/gif/etc...)
							$file = $_FILES['pImage']["tmp_name"];//'your_path_to_file/file.png';
									
							//indicate the path and name for the new resized file
							$resizedFile = $target_file;//'your_path_to_file/resizedFile.png';
									
							//call the function (when passing path to pic)
							if (smart_resize_image($file , null, "200" , "200" , false , $resizedFile , false , false ,100 )){	
							
									$uploaded_file = $target_file;
									
									$result['msg'] = "The Image ".$member_id. $target_fileName. " has been uploaded.";
									$result['imageName'] = $target_fileName;
									$sqlUpdate="update friendsRegister set image='".$target_file."' where id=".$member_id;
										$rsUpdate=mysqli_query($conn, $sqlUpdate);
									
							} else {
									$passStr="Sorry, there was an error uploading your Image.<br/>";
							}
						}
					

					$MSG = "Registered Sucessfully!";

					 $result['success'] = 1;

   					$result['error'] = 0;

					

					//$imageName = $imageUpload->imageUploads($_FILES,'SR_Photos',$last_id,'service_requestor','sr_image','sr_id');
					
					/*$target_dir = "images/SR_Photos/";
					$target_file = $target_dir .time(). basename($_FILES['file']["name"]);
					
					
					//die($target_file);
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					$target_file = $target_dir .$last_id.'.'.$imageFileType;
					$original_file = $last_id.'.'.$imageFileType;
					
					//indicate which file to resize (can be any type jpg/png/gif/etc...)
								  $file = $_FILES['file']["tmp_name"];//'your_path_to_file/file.png';
							
								  //indicate the path and name for the new resized file
								  $resizedFile = $target_file;//'your_path_to_file/resizedFile.png';
							
								  //call the function (when passing path to pic)
								  if (smart_resize_image($file , null, "200" , "200" , false , $resizedFile , false , false ,100 )){	
								  $imageName = $last_id.'.'.$imageFileType;
								  $sql1 = "update service_requestor set sr_image ='".$original_file."' where sr_id=".$last_id;
								
								$rs1 =mysqli_query($conn, $sql1);
								  }
					
*/
					$MSG.='Registration Successful';

				}

			

					

				/*echo "<script language='javascript'>alert('Registration Successful.');window.location='index.php?msg=register&code=".$_POST['centre_code_prefix'].$_POST['recognition_code_prefix'].$_POST['student_serial']."';</script>";	*/		

			}
			else
			{
				echo $MSG;	
			}

		

				if ($tableResult  == true) {
					
				$result['msg'] = $MSG;

				//echo json_encode($result);

				$passStr = "$fname, You have been Registered successfully to Village Experts Community! Redirecting....";

				$passImg = (empty($target_fileName))?'placeholder/male2.jpg':$target_fileName;//.$imageName;

										header("location:http://".$_SERVER['SERVER_NAME']."/villageExperts/well-come.php?passStr=$passStr&passImg=$passImg&redirect=register_dashboard&email=$m_email");
										
				}
				else if ($tableResult  == false && $userType == "SPregister") 
				{

					//echo json_encode($result);

			//header("Refresh: 3; url=index.php?error=1&type=SP");

		//echo '<center><h1 style="color:red">Registration Unsuccessful ! Redirecting....</h1></center>';

		$passStr = 'Registration not successful ! Redirecting....<br>'.json_encode($result);

		$passImg = 'img-3.jpg';

		header("location:well-come.php?passStr=$passStr&passImg=$passImg&redirect=SPerror");

				}	
					
				//Create Email instance for sending mail
				/*$emailObject=new phpSendMail();
				
				 //----------------------------Email Body Texts------------------------
//mail("dassamtest2@gmail.com","hi","test");
			$body = '';
			$body = '<div style="width:100%;max-width:660px;margin:0px auto;"><div style="text-align:center;"><img src="http://'.$_SERVER['SERVER_NAME'].'/villageExperts/images/logo.png" /></div>';

			$body.='<div style="border:solid 1px #EEE;text-align:center; margin-bottom:3px;margin-top:10px;background:#F3F3F3;">			<p style="font-size:16px;color:#036;margin:3px 0;font-family:Georgia, \'Times New Roman\', Times, serif;padding:10px 15px;line-height:25px;text-align:left;">';

		$body.='Dear '.$fname.',<br /><br/>Your have been added as a Group member to VillageExperts.com site: '.' <br><br></p>';

			$body.='<p>You are requested to complete your Registration By clicking the link below:</p>';

			$body.='<p style="width:200px;margin:20px auto;background:red;color:#fff;padding:12px 0px;font-family:Georgia,\'Times New Roman\', Times, serif;font-size:17px;text-align:center;border-radius:10px;font-weight:bold;"><a href="http://'.$_SERVER['SERVER_NAME'].'/villageExperts/addMemberNext.php?member_id='.$last_id.'&memberName='.$fname.'&email='.$m_email.'"style="color:#fff;">Click here to Complete Registration</a></p></div></div>';
			
			$body.='<p>This Connection will be enabled only if you are using Chrome or Mozilla as your Browser.</p>';
			
			$body.='<p><a href="http://'.$_SERVER['SERVER_NAME'].'/villageExperts/addMemberNext.php?member_id='.$last_id.'&memberName='.$fname.'&email='.$m_email.'">http://'.$_SERVER['SERVER_NAME'].'/villageExperts/addMemberNext.php?member_id='.$last_id.'&memberName='.$fname.'&email='.$m_email.'</a></p>';
			$body.='<p>If you are not using Chrome or Mozilla as your Browser - you are requested to manually open Chrome or Mozilla Browser and copy the above link and paste it in the address bar.</p>';

		//echo "bodyyy====\n".$body;

		   //----------------------------//Email Body Texts------------------------
		   /*       
            $headers='';
            $headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// Additional headers
			$headers .= 'From: Village Experts<dassamtest2@gmail.com>' . "\r\n";
            //$mailSent = mail($m_email,"Village-Expert Membership Verification.",$body,$headers);
		*/
		/*$mailSent = $emailObject->sendMail($m_email,$fname,"Village-Expert Membership Verification.",$body);
		if($mailSent)
		{
				$result['msg'] = $MSG;

				//echo json_encode($result);

				$passStr = "$fname has been added successfully ! Redirecting....";

				$passImg = 'placeholder/male2.jpg';//.$imageName;

										header("location:http://".$_SERVER['SERVER_NAME']."/villageExperts/well-come.php?passStr=$passStr&passImg=$passImg&redirect=friends-family&email=$m_email");
		}
		else
		{
			$passStr = "$fname has not been added successfully ! Redirecting....";

				$passImg = '/images/placeholder/male2.jpg';//.$imageName;

										header("location:http://".$_SERVER['SERVER_NAME']."/villageExperts/well-come.php?passStr=$passStr&passImg=$passImg&redirect=dashboard&email=$m_email");
		}

			//header("Refresh: 3; url=index.php?success=1&type=SP");

		//echo '<center><h1 style="color:red">Registration Successful ! Redirecting....</h1></center>';

				}

				else if ($tableResult  == false && $userType == "SPregister") 

				{

					//echo json_encode($result);

			//header("Refresh: 3; url=index.php?error=1&type=SP");

		//echo '<center><h1 style="color:red">Registration Unsuccessful ! Redirecting....</h1></center>';

		$passStr = 'Registration not successful ! Redirecting....<br>'.json_encode($result);

		$passImg = 'img-3.jpg';

		header("location:well-come.php?passStr=$passStr&passImg=$passImg&redirect=SPerror");

				}

				else if ($tableResult  == true && $userType ==  "SRregister") {

				$result['msg'] = $MSG;

				//echo json_encode($result);

			//header("Refresh: 3; url=index.php?success=1&type=SR");

		//echo '<center><h1 style="color:red">Registration Successful ! Redirecting....</h1></center>';

		$passStr = "$m_name has been added successfully ! Redirecting....";

										$passImg = 'SR_Photos/'.$imageName;

										header("location:well-come.php?passStr=$passStr&passImg=$passImg&redirect=SRsuccess&email=$m_email");

				}

				else if ($tableResult  == false && $userType ==  "SRregister") 

				{

					//echo json_encode($result);

			//header("Refresh: 3; url=index.php?error=1&type=SR");

		//echo '<center><h1 style="color:red">Registration Unsuccessful ! Redirecting....</h1></center>';

		$passStr = 'Registration Unsuccessful ! Redirecting....<br>'.json_encode($result);

		$passImg = 'img-3.jpg';

		header("location:well-come.php?passStr=$passStr&passImg=$passImg&redirect=SRerror");

				}

		*/

	}
	else if($tag == 'addFriendss')
   {

	  /*print_r($_REQUEST);

 echo "<br>";

 print_r($_FILES);

 die();*/

	  $userType = isset($_REQUEST['userType'])?$_REQUEST['userType']:'';

	 		$fname=isset($_REQUEST['fname'])?$_REQUEST['fname']:(isset($_REQUEST['fname'])?$_REQUEST['fname']:'');
				
				$lname=isset($_REQUEST['lname'])?$_REQUEST['lname']:(isset($_REQUEST['lname'])?$_REQUEST['lname']:'');

				$m_city=isset($_REQUEST['city'])?$_REQUEST['city']:(isset($_REQUEST['city'])?$_REQUEST['city']:'');

				$m_country=isset($_REQUEST['country'])?$_REQUEST['country']:(isset($_REQUEST['country'])?$_REQUEST['country']:'');

				$m_mobile=isset($_REQUEST['phone'])?$_REQUEST['phone']:(isset($_REQUEST['phone'])?$_REQUEST['phone']:'');

				$m_email=isset($_REQUEST['email'])?$_REQUEST['email']:(isset($_REQUEST['email'])?$_REQUEST['email']:'');
				
				$pwd = isset($_REQUEST['pwds'])?$_REQUEST['pwds']:(isset($_REQUEST['pwds'])?$_REQUEST['pwds']:'');
				$loggedID = isset($_REQUEST['loggedID'])?$_REQUEST['loggedID']:(isset($_REQUEST['loggedID'])?$_REQUEST['loggedID']:'');
				
				
				$imageName = '';

			
			//first, into main student table

			$tableResult = '';

			if ($userType=="addFriend"){
/*print_r($_FILES);
print_r($_POST);die();*/
	
	$target_fileName = '';
	$target_file = '';
	
					 $sql="insert into friendsRegister (fname,lname,city,country,phone,email,registerStatus,pwd,loginStatus,parentID) values ('".$fname."','".$lname."','".$m_city."', '".$m_country."', '".$m_mobile."', '".$m_email."','YES','".md5($pwd)."','NO',".$loggedID.")" ;
					 //echo $sql;exit();

					//print_r($conn);die();
					$tableResult = mysqli_query($conn, $sql);
					$member_id = mysqli_insert_id($conn);
					//die($member_id."--test");
					$uploaded_file = '';
						/* if(isset($_FILES) && is_array($_FILES))
						{
							//print_r($_FILES);
							//die($sql);
							// die("test");
							$target_dir = "images/friendsFamily/";
							$imageFileType = pathinfo($_FILES['pImage']["name"],PATHINFO_EXTENSION);
		
							$target_file = $target_dir.$member_id.'.'.$imageFileType;
							$target_fileName = "friendsFamily/".$member_id.'.'.$imageFileType;
							
							//die($target_file);
							$uploadOk = 1;
							
							//indicate which file to resize (can be any type jpg/png/gif/etc...)
							$file = $_FILES['pImage']["tmp_name"];//'your_path_to_file/file.png';
									
							//indicate the path and name for the new resized file
							$resizedFile = $target_file;//'your_path_to_file/resizedFile.png';
									
							//call the function (when passing path to pic)
							if (smart_resize_image($file , null, "200" , "200" , false , $resizedFile , false , false ,100 )){	
							
									$uploaded_file = $target_file;
									
									$result['msg'] = "The Image ".$member_id. $target_fileName. " has been uploaded.";
									$result['imageName'] = $target_fileName;
									$sqlUpdate="update friendsRegister set image='".$target_file."' where id=".$member_id;
										$rsUpdate=mysqli_query($conn, $sqlUpdate);
									
							} else {
									$passStr="Sorry, there was an error uploading your Image.<br/>";
							}
						}*/
					

					$result['msg'] = "Friends added Sucessfully!";

					 $result['success'] = 1;

   					$result['error'] = 0;
   					echo json_encode($result);
					

				}


			}

   else

   {

	   $result['msg'] = "Tag Not  Provided";

	   echo json_encode($result);

	   

   }

?>	