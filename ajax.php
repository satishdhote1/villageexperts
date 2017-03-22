<?php
//print_r($_REQUEST);die("greg");


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

   if($tag == "SPregister")
  {
//die($tag);
		    $m_password=isset($_REQUEST['pwds'])?$_REQUEST['pwds']:(isset($_REQUEST['SRpassword'])?$_REQUEST['SRpassword']:'');

			$m_confirm_password=isset($_REQUEST['SPcpassword'])?$_REQUEST['SPcpassword']:(isset($_REQUEST['SRcpassword'])?$_REQUEST['SRcpassword']:'');

			$m_name=isset($_REQUEST['SPfname'])?$_REQUEST['SPfname']:(isset($_REQUEST['SRname'])?$_REQUEST['SRname']:'');

			$l_name=isset($_REQUEST['SPlname'])?$_REQUEST['SPlname']:(isset($_REQUEST['SRlname'])?$_REQUEST['SRlname']:'');

			$m_address=isset($_REQUEST['SPaddress'])?$_REQUEST['SPaddress']:(isset($_REQUEST['SRaddress'])?$_REQUEST['SRaddress']:'');

			$m_city=isset($_REQUEST['SPcity'])?$_REQUEST['SPcity']:(isset($_REQUEST['SRcity'])?$_REQUEST['SRcity']:'');

			$m_country=isset($_REQUEST['SPcountry'])?$_REQUEST['SPcountry']:(isset($_REQUEST['SRcountry'])?$_REQUEST['SRcountry']:'');

			$m_pin=isset($_REQUEST['SPpin'])?$_REQUEST['SPpin']:(isset($_REQUEST['SRpin'])?$_REQUEST['SRpin']:'');

			$m_mobile=isset($_REQUEST['SPmobile'])?$_REQUEST['SPmobile']:(isset($_REQUEST['SRmobile'])?$_REQUEST['SRmobile']:'');

			$m_email=isset($_REQUEST['SPemail'])?$_REQUEST['SPemail']:(isset($_REQUEST['SRemail'])?$_REQUEST['SRemail']:'');

			$m_sex=isset($_REQUEST['sex'])?$_REQUEST['sex']:(isset($_REQUEST['sex'])?$_REQUEST['sex']:'');

			$m_specialisation_id=isset($_REQUEST['SPexpertise'])?$_REQUEST['SPexpertise']:(isset($_REQUEST['SRspecialisation_id'])?$_REQUEST['SRspecialisation_id']:'');

			$m_sub_specialisation_id=isset($_REQUEST['SP_Sub_Expertise'])?$_REQUEST['SP_Sub_Expertise']:(isset($_REQUEST['SRsubSpecialisation_id'])?$_REQUEST['SRsubSpecialisation_id']:'');

			$m_year_of_experience=isset($_REQUEST['SPExperience'])?$_REQUEST['SPExperience']:(isset($_REQUEST['SRexperience'])?$_REQUEST['SRexperience']:'');

			$m_rate_type1=isset($_REQUEST['SPrateType1'])?$_REQUEST['SPrateType1']:(isset($_REQUEST['SRrateType1'])?$_REQUEST['SRrateType1']:'');

			$m_rate_type2=isset($_REQUEST['SPrateType2'])?$_REQUEST['SPrateType2']:(isset($_REQUEST['SRrateType2'])?$_REQUEST['SRrateType2']:'');

			$m_rate_type3=isset($_REQUEST['SPrateType3'])?$_REQUEST['SPrateType3']:(isset($_REQUEST['SRrateType3'])?$_REQUEST['SRrateType3']:'');

			$m_degree=isset($_REQUEST['SPEducation'])?$_REQUEST['SPEducation']:(isset($_REQUEST['SRdegree'])?$_REQUEST['SRdegree']:'');
			$m_institute=isset($_REQUEST['SPinstitute'])?$_REQUEST['SPinstitute']:(isset($_REQUEST['SRinstitute'])?$_REQUEST['SRinstitute']:'');
			$m_yop=isset($_REQUEST['SPyop'])?$_REQUEST['SPyop']:(isset($_REQUEST['SRyop'])?$_REQUEST['SRyop']:'');

			$m_language_id=isset($_REQUEST['SPlanguage'])?$_REQUEST['SPlanguage']:(isset($_REQUEST['SRlaunguages'])?$_REQUEST['SRlaunguages']:'');
			$m_ammount=isset($_REQUEST['ammount'])?$_REQUEST['ammount']:(isset($_REQUEST['ammount'])?$_REQUEST['ammount']:'');
			$m_accNo=isset($_REQUEST['accNo'])?$_REQUEST['accNo']:(isset($_REQUEST['accNo'])?$_REQUEST['accNo']:'');
			$m_bankRoutingNo=isset($_REQUEST['bankRoutingNo'])?$_REQUEST['bankRoutingNo']:(isset($_REQUEST['bankRoutingNo'])?$_REQUEST['bankRoutingNo']:'');




			$valid=1;
			/*$MSG="";
			if($m_name==""){
			$valid=0;
			$MSG .= "Please enter Name.";
			}
			if($m_address==""){
			$valid=0;
			$MSG .= "Please enter address .";
			}
			if($m_mobile==""){
			$valid=0;
			$MSG .= "Please enter Mobile No .";
			}
			if($m_email==""){
			$valid=0;
			$MSG .= "Please enter email .";
			}
			if($m_sex==""){
			$valid=0;
			$MSG .= "Please enter sex .";
			}
			if($m_password==""){
			$valid=0;
			$MSG .= "Please enter password .";
			}
			if(trim($m_password)!=trim($m_confirm_password)){
			$valid=0;
			$MSG .= "Password and confirm Password Does not match .";
			}
			*/
			//print_r($_FILES);die("\n --test--\n");
			$target_fileName = '';
			$target_file = '';
			if ($valid==1){
				$sql="insert into service_provider (sp_name,sp_sex,sp_address,sp_city,sp_pincode,sp_country,sp_phone,sp_email,sp_password,sp_specialisation_id,sp_sub_specialisation_id,sp_year_of_experience,sp_rate_type1,sp_rate_type2,sp_rate_type3,degree,SPinstitute,SPyop,sp_language_id,ammount, accNo, bankRoutingNo) values ('".$m_name." ".$l_name."','".$m_sex."', '".$m_address."','".$m_city."','".$m_pin."', '".$m_country."', '".$m_mobile."', '".$m_email."', '".md5($m_password)."', '".$m_specialisation_id."', '".$m_sub_specialisation_id."', '".$m_year_of_experience."', '".$m_rate_type1."', '".$m_rate_type2."', '".$m_rate_type3."', '".$m_degree."' , '".$m_institute."' , '".$m_yop."', '".$m_language_id."','".$m_ammount."','".$m_accNo."','".$m_bankRoutingNo."')" ;

					//echo $sql;exit();

					$tableResult = mysqli_query($conn, $sql);

					$MSG = "Registered Sucessfully!";

					$result['success'] = 1;

   					$result['error'] = 0;

					$MSG.='Registration Successful';

					 $last_id = mysqli_insert_id($conn);

					
					//$member_id = 0;
					$sql="";
				    $uploaded_file = '';
						 if(isset($_FILES) && is_array($_FILES))
						{
							//print_r($_FILES);
							//die($sql);
							// die("test");
							$target_dir = "images/SP_Photos/";
							$imageFileType = pathinfo($_FILES['pImage']["name"],PATHINFO_EXTENSION);
		
							$target_file = $target_dir.$last_id.'.'.$imageFileType;
							$target_fileName = $last_id.'.'.$imageFileType;
							


							//die($target_file);
							$uploadOk = 1;
							
							//indicate which file to resize (can be any type jpg/png/gif/etc...)
							$file = $_FILES['pImage']["tmp_name"];//'your_path_to_file/file.png';
									
							//indicate the path and name for the new resized file
							$resizedFile = $target_file;//'your_path_to_file/resizedFile.png';
									
							//call the function (when passing path to pic)
							if (smart_resize_image($file , null, "200" , "200" , false , $resizedFile , false , false ,100 )){	
							
									$uploaded_file = $target_file;
									
									$result['msg'] = "The Image ". $target_fileName. " has been uploaded.";
									$result['imageName'] = $target_fileName;
									$sqlUpdate="update service_provider set sp_image='".$target_file."' where sp_id=".$last_id;
										$rsUpdate=mysqli_query($conn, $sqlUpdate);
									
							} else {
									$passStr="Sorry, there was an error uploading your Image.<br/>";
							}
						}
					

					$MSG = "Registered Sucessfully!";

					 $result['success'] = 1;

   					$result['error'] = 0;
			}
			 $passStr = "$m_name, You have been Registered successfully to Village Experts Community! Redirecting....";

				$passImg = (empty($target_fileName))?'placeholder/male2.jpg':"SP_Photos/".$target_fileName;//.$imageName;

										header("location:http://".$_SERVER['SERVER_NAME']."/well-come.php?passStr=$passStr&passImg=$passImg&redirect=register_dashboard&email=$m_email");

	  

  }

  else if($tag == "checkEmail")
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
//die($tag);
	  

	  
	  $email = isset($_REQUEST['email'])?$_REQUEST['email']:'';
	  $recieverFname = isset($_REQUEST['recieverFname'])?$_REQUEST['recieverFname']:'';
	  $senderEmail = isset($_REQUEST['senderEmail'])?$_REQUEST['senderEmail']:'';
	  $senderName = isset($_REQUEST['senderName'])?$_REQUEST['senderName']:'';
	  $appointTimes = isset($_REQUEST['appointTime'])?$_REQUEST['appointTime']:'';
	 //print_r(json_decode($appointTimes));

	  if(!empty($email) && !empty($appointTimes))
	  {
	  	$appointTime = json_decode($appointTimes);
	  	/*echo strtotime($appointTime[0]);
	  	die();*/
	  	//print_r($appointTime);
	  	$sql="insert into appointment (aptmakeremail,aptconfirmemail,aptmakername,aptconfirmname,aptdate1,aptdate2,aptdate3,aptdate4,aptdate5,aptconfirmdate) values ('".$email."','".$senderEmail."','".$recieverFname."', '".$senderName."','".$appointTime[0]."','".$appointTime[1]."','".$appointTime[2]."','".$appointTime[3]."','".$appointTime[4]."','')" ;//echo $sql;exit();

					//print_r($conn);die();
					$tableResult = mysqli_query($conn, $sql);
					$member_id = mysqli_insert_id($conn);
		//Create Email instance for sending mail
				$emailObject=new phpSendMail();
				
				 //----------------------------Email Body Texts------------------------
//mail("dassamtest2@gmail.com","hi","test");
			$body = '';
			$body = '<div style="width:100%;max-width:660px;margin:0px auto;"><div style="text-align:center;"><img src="http://'.$_SERVER['SERVER_NAME'].'/images/logo.png" /></div>';

			$body.='<div style="border:solid 1px #EEE;text-align:center; margin-bottom:3px;margin-top:10px;background:#F3F3F3;">			<p style="font-size:16px;color:#036;margin:3px 0;font-family:Georgia, \'Times New Roman\', Times, serif;padding:10px 15px;line-height:25px;text-align:left;">';

		$body.='Dear '.$recieverFname.',<br /><br/>'.$senderName.' is seeking an Appointment with you at  '.$_SERVER['SERVER_NAME'].'.<br><br> His convenient timings are: <br><br>'.$appointTime[0].'<br>'.$appointTime[1].'<br>'.$appointTime[2].'<br>'.$appointTime[3].'<br>'.$appointTime[4].'<br><br>'.'Please Click below to confirm a time for this Appointment.<br><br></p>';

// $body.='Dear '.$recieverFname.',<br /><br/>'.$senderName.' is seeking an Appointment with you at  www.VillageExperts.com.<br><br> His convenient timings are: <br><br>'.date('l', strtotime($appointTime[0]))." at ".$appointTime[0].'<br>'.date('l', strtotime($appointTime[1]))." at ".$appointTime[1].'<br>'.date('l', strtotime($appointTime[2]))." at ".$appointTime[2].'<br>'.date('l', strtotime($appointTime[3]))." at ".$appointTime[3].'<br>'.date('l', strtotime($appointTime[4]))." at ".$appointTime[4].'<br><br>'.'Please Click below to confirm a time for this Appointment.<br><br></p>';


			$body.='<p style="width:200px;margin:20px auto;background:red;color:#fff;padding:12px 0px;font-family:Georgia,\'Times New Roman\', Times, serif;font-size:17px;text-align:center;border-radius:10px;font-weight:bold;"><a href="http://'.$_SERVER["SERVER_NAME"].'/Confirm-Appointment.php?confirm=yes&senderName='.$senderName.'&appointTime1='.$appointTime[0].'&appointTime2='.$appointTime[1].'&appointTime3='.$appointTime[2].'&appointTime4='.$appointTime[3].'&appointTime5='.$appointTime[4].'&recieverFname='.$recieverFname.'&email='.$email.'&senderEmail='.$senderEmail.'" style="color:#fff;">Please Confirm</a></p></div></div>';

			//echo $body;die("dgd==");
			

		//echo "bodyyy====\n".$body;

		   //----------------------------//Email Body Texts------------------------
		  
		$mailSent = $emailObject->sendMail($email,$recieverFname,"Village-Expert Request for Appointment.",$body);
		//if(mail($email,"Village-Expert Request for Appointment.",$body))
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
	  exit(0);

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
			$body = '<div style="width:100%;max-width:660px;margin:0px auto;"><div style="text-align:center;"><img src="http://'.$_SERVER['SERVER_NAME'].'/images/logo.png" /></div>';

			$body.='<div style="border:solid 1px #EEE;text-align:center; margin-bottom:3px;margin-top:10px;background:#F3F3F3;">			<p style="font-size:16px;color:#036;margin:3px 0;font-family:Georgia, \'Times New Roman\', Times, serif;padding:10px 15px;line-height:25px;text-align:left;">';

		$body.='<img src="http://'.$_SERVER['SERVER_NAME'].'/images/placeholder/image1.PNG" style="width:600px;" /><br/><br/><img src="http://'.$_SERVER['SERVER_NAME'].'/images/placeholder/image2.PNG" style="width:600px;" /></p>';


			$body.='<p style="width:200px;margin:20px auto;background:red;color:#fff;padding:12px 0px;font-family:Georgia,\'Times New Roman\', Times, serif;font-size:17px;text-align:center;border-radius:10px;font-weight:bold;"><a href="http://'.$_SERVER['SERVER_NAME'].'#register" style="color:#fff;">Visit '.$_SERVER['SERVER_NAME'].'</a></p></div></div>';
			
			

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
  else if($tag == "ConfirmAppointment")
  {
//die($tag);
	  

	  
	  $email = isset($_REQUEST['email'])?$_REQUEST['email']:'';
	  $recieverFname = isset($_REQUEST['recieverFname'])?$_REQUEST['recieverFname']:'';
	  $senderEmail = isset($_REQUEST['senderEmail'])?$_REQUEST['senderEmail']:'';
	  $senderName = isset($_REQUEST['senderName'])?$_REQUEST['senderName']:'';
	  $appointTimes = isset($_REQUEST['appointTime'])?$_REQUEST['appointTime']:'';
	 //print_r(json_decode($appointTimes));

	  if(!empty($email) && !empty($appointTimes))
	  {
	  	//$appointTime = json_decode($appointTimes);

	  	//print_r($appointTime);
	  	
	  	$sql="update appointment set apptstatus=1,aptconfirmdate='".$appointTimes."' where apptstatus=0 and aptconfirmemail='".$senderEmail."' and aptmakeremail='".$email."'" ;//echo $sql;exit();
		//die($sql);
		$tableResult = mysqli_query($conn, $sql);
		//Create Email instance for sending mail
				$emailObject=new phpSendMail();
				
				 //----------------------------Email Body Texts------------------------
//mail("dassamtest2@gmail.com","hi","test");
			$body = '';
			$body = '<div style="width:100%;max-width:660px;margin:0px auto;"><div style="text-align:center;"><img src="http://'.$_SERVER['SERVER_NAME'].'/images/logo.png" /></div>';

			$body.='<div style="border:solid 1px #EEE;text-align:center; margin-bottom:3px;margin-top:10px;background:#F3F3F3;">			<p style="font-size:16px;color:#036;margin:3px 0;font-family:Georgia, \'Times New Roman\', Times, serif;padding:10px 15px;line-height:25px;text-align:left;">';

		$body.='Dear '.$senderName.',<br /><br/>'.$recieverFname.' has confirmed your Appointment Request at  '.$_SERVER['SERVER_NAME'].'<br><br> The confirmed timing is: <br>'.$appointTimes.'<br>'.'Please mark your Calendar for this appointment..<br><br></p>';


		//second email..
		$body2 = '';
			$body2 = '<div style="width:100%;max-width:660px;margin:0px auto;"><div style="text-align:center;"><img src="http://'.$_SERVER['SERVER_NAME'].'/images/logo.png" /></div>';

			$body2.='<div style="border:solid 1px #EEE;text-align:center; margin-bottom:3px;margin-top:10px;background:#F3F3F3;">			<p style="font-size:16px;color:#036;margin:3px 0;font-family:Georgia, \'Times New Roman\', Times, serif;padding:10px 15px;line-height:25px;text-align:left;">';

		$body2.='Dear '.$recieverFname.',<br /><br/> You  have  confirmed an Appointment  with '.$senderName.'at  '.$_SERVER['SERVER_NAME'].'<br><br> The confirmed timings are: <br>'.$appointTimes.'<br>'.'<br><br></p>';


			/*$body.='<p style="width:200px;margin:20px auto;background:red;color:#fff;padding:12px 0px;font-family:Georgia,\'Times New Roman\', Times, serif;font-size:17px;text-align:center;border-radius:10px;font-weight:bold;"><a href="http://'.$_SERVER["SERVER_NAME"].'/villageExperts/Confirm-Appointment.php?confirm=yes&senderName='.$senderName.'&appointTime1='.$appointTime[0].'&appointTime2='.$appointTime[1].'&appointTime3='.$appointTime[2].'&appointTime4='.$appointTime[3].'&appointTime5='.$appointTime[4].'&recieverFname='.$recieverFname.'&email='.$email.'&senderEmail='.$senderEmail.'" style="color:#fff;">Please Confirm</a></p></div></div>';*/

			//echo $body;die("dgd==");
			

		//echo "bodyyy====\n".$body;

		   //----------------------------//Email Body Texts------------------------
		  
		$mailSent = $emailObject->sendMail($senderEmail,$senderName,"Village-Expert Confirmation for Appointment.",$body);

		//if(mail($email,"Village-Expert Request for Appointment.",$body))
		if($mailSent)
		{

				$mailSent2 = $emailObject->sendMail($_SESSION['logged_user_email'],$recieverFname,"Village-Expert Confirmation for Appointment.",$body2);
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
	  exit(0);

  }
  else if($tag == "notConfirmAppointment")//If not suitable dates found
  {
//die($tag);
	  

	  
	  $email = isset($_REQUEST['email'])?$_REQUEST['email']:'';
	  $recieverFname = isset($_REQUEST['recieverFname'])?$_REQUEST['recieverFname']:'';
	  $senderEmail = isset($_REQUEST['senderEmail'])?$_REQUEST['senderEmail']:'';
	  $senderName = isset($_REQUEST['senderName'])?$_REQUEST['senderName']:'';
	  
	  $apptData = '';
                $sql="select * from appointment where  aptmakeremail='".$email."' and aptconfirmemail='".$senderEmail."' and apptstatus=0 order by id desc limit 1";
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

            $decliendFname = '';
            $declinedLname = '';
            $sql2="select fname,lname from friendsRegister where  email='".$email."' order by id desc limit 1";
                //die($sql);
                $tableResult2 = mysqli_query($conn, $sql2);
                //print_r($tableResult);
                if (mysqli_num_rows($tableResult2) > 0)  
                {//$apptData['fname']
                //die("test2");
                $apptData2 = mysqli_fetch_assoc($tableResult2);
                $decliendFname = $apptData2['fname'];
                $declinedLname = $apptData2['lname'];                }

	 //print_r(json_decode($appointTimes));

	  if(!empty($senderEmail))
	  {
	  	//$appointTime = json_decode($appointTimes);

	  	//print_r($appointTime);
	  	
	  	$sql="update appointment set apptstatus=1 where apptstatus=0 and aptconfirmemail='".$senderEmail."' and aptmakeremail='".$email."'" ;//echo $sql;exit();
		//die($sql);
		$tableResult = mysqli_query($conn, $sql);
		//Create Email instance for sending mail
				$emailObject=new phpSendMail();
				
				 //----------------------------Email Body Texts------------------------
//mail("dassamtest2@gmail.com","hi","test");
			$body = '';
			$body = '<div style="width:100%;max-width:660px;margin:0px auto;"><div style="text-align:center;"><img src="http://'.$_SERVER['SERVER_NAME'].'/images/logo.png" /></div>';

			$body.='<div style="border:solid 1px #EEE;text-align:center; margin-bottom:3px;margin-top:10px;background:#F3F3F3;">			<p style="font-size:16px;color:#036;margin:3px 0;font-family:Georgia, \'Times New Roman\', Times, serif;padding:10px 15px;line-height:25px;text-align:left;">';

		$body.='Dear '.$senderName.',<br /><br/>'.$decliendFname.' '.$declinedLname.' has declined your Appointment Dates at Village Experts for the following proposed dates.: <br><br>'.$appt1.'<br>'.$appt2.'<br>'.$appt3.'<br>'.$appt4.'<br>'.$appt5.'<br><br>'.'You are requested to initiate a New Appoitment Request with '.$decliendFname.' '.$declinedLname;


			/*$body.='<p style="width:200px;margin:20px auto;background:red;color:#fff;padding:12px 0px;font-family:Georgia,\'Times New Roman\', Times, serif;font-size:17px;text-align:center;border-radius:10px;font-weight:bold;"><a href="http://'.$_SERVER["SERVER_NAME"].'/villageExperts/Confirm-Appointment.php?confirm=yes&senderName='.$senderName.'&appointTime1='.$appointTime[0].'&appointTime2='.$appointTime[1].'&appointTime3='.$appointTime[2].'&appointTime4='.$appointTime[3].'&appointTime5='.$appointTime[4].'&recieverFname='.$recieverFname.'&email='.$email.'&senderEmail='.$senderEmail.'" style="color:#fff;">Please Confirm</a></p></div></div>';*/

			//echo $body;die("dgd==");
			

		//echo "bodyyy====\n".$body;

		   //----------------------------//Email Body Texts------------------------
		  
		$mailSent = $emailObject->sendMail($senderEmail,$senderName,"Village-Expert Confirmation for Appointment.",$body);

		//if(mail($email,"Village-Expert Request for Appointment.",$body))
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
	  exit(0);

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

		
	  			$isexpertreg=isset($_REQUEST['isexpertreg'])?$_REQUEST['isexpertreg']:(isset($_REQUEST['isexpertreg'])?$_REQUEST['isexpertreg']:'');
	  			$isFriendreg=isset($_REQUEST['isFriendreg'])?$_REQUEST['isFriendreg']:(isset($_REQUEST['isFriendreg'])?$_REQUEST['isFriendreg']:'');
	  			$expertID=isset($_REQUEST['expertID'])?$_REQUEST['expertID']:(isset($_REQUEST['expertID'])?$_REQUEST['expertID']:'');

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
	$member_id = 0;
	$sql="";
					if(!empty($isexpertreg) && $isexpertreg == "yes")
                     {

                     	$sql="update friendsRegister set fname = '".ucwords($fname)."',lname = '".ucwords($lname)."', city = '$m_city',country = '$m_country',experties = '$m_mobile',email = '$m_email',registerStatus= 'YES',loginStatus = 'NO',pwd = '".md5($pwd)."' where id = $expertID";

                     	$tableResult = mysqli_query($conn, $sql);
                     	$member_id = $expertID;
                     }
                     else if(!empty($isFriendreg) && $isFriendreg == "yes")
                     {

                     	$sql="update friendsRegister set fname = '".ucwords($fname)."',lname = '".ucwords($lname)."', city = '$m_city',country = '$m_country',phone = '$m_mobile',email = '$m_email',registerStatus= 'YES',loginStatus = 'NO',pwd = '".md5($pwd)."' where id = $expertID";

                     	$tableResult = mysqli_query($conn, $sql);
                     	$member_id = $expertID;
                     }
                     else
                     {
					 $sql="insert into friendsRegister (fname,lname,city,country,phone,email,registerStatus,pwd,loginStatus) values ('".ucwords($fname)."','".ucwords($lname)."','".$m_city."', '".$m_country."', '".$m_mobile."', '".$m_email."','YES','".md5($pwd)."','NO')" ;//echo $sql;exit();

					 $tableResult = mysqli_query($conn, $sql);
					 $member_id = mysqli_insert_id($conn);

					 $sql2="insert into friendsExpertInfo (fname,lname,userid,email,parentID,isexpert) values ('".ucwords($fname)."','".ucwords($lname)."','".$member_id."','".$m_email."' , 0 ,0)" ;

					 $tableResult2 = mysqli_query($conn, $sql2);
					}
					//echo $sql;exit();
					//print_r($conn);die();
					
					
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

										header("location:http://".$_SERVER['SERVER_NAME']."/well-come.php?passStr=$passStr&passImg=$passImg&redirect=register_dashboard&email=$m_email");
										
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

				$loggedINuser = $_SESSION['logged_user_fname']." ".$_SESSION['logged_user_lname'];
				$userType = isset($_REQUEST['userType'])?$_REQUEST['userType']:'';

				$isexpert = isset($_REQUEST['isexpert'])?$_REQUEST['isexpert']:'';

				$fname=isset($_REQUEST['fname'])?$_REQUEST['fname']:(isset($_REQUEST['fname'])?$_REQUEST['fname']:'');

				$lname=isset($_REQUEST['lname'])?$_REQUEST['lname']:(isset($_REQUEST['lname'])?$_REQUEST['lname']:'');

				$m_city=isset($_REQUEST['city'])?$_REQUEST['city']:(isset($_REQUEST['city'])?$_REQUEST['city']:'');

				$m_country=isset($_REQUEST['country'])?$_REQUEST['country']:(isset($_REQUEST['country'])?$_REQUEST['country']:'');

				$m_mobile=isset($_REQUEST['phone'])?$_REQUEST['phone']:(isset($_REQUEST['phone'])?$_REQUEST['phone']:'');

				$m_email=isset($_REQUEST['email'])?$_REQUEST['email']:(isset($_REQUEST['email'])?$_REQUEST['email']:'');

				$pwd = isset($_REQUEST['pwds'])?$_REQUEST['pwds']:(isset($_REQUEST['pwds'])?$_REQUEST['pwds']:'');
				$loggedID = isset($_REQUEST['loggedID'])?$_REQUEST['loggedID']:(isset($_REQUEST['loggedID'])?$_REQUEST['loggedID']:'');
				$IsemailExists = 0;

				$imageName = '';
				$member_id = '';

				//first, into main student table

				$tableResult = '';

				if ($userType=="addFriend"){
				/*print_r($_FILES);
				print_r($_POST);die();*/
				$alreadyFrnd = 0;
				$sqlChk="select id,parentID,isexpert from friendsExpertInfo where  email ='".$m_email."'";
				$sqlChk2="select id from friendsRegister where  email ='".$m_email."'";
				
				$tableResult = mysqli_query($conn, $sqlChk);
				$tableResult2 = mysqli_query($conn, $sqlChk2);
				if (mysqli_num_rows($tableResult2) > 0)  
				{
				  $GMLoginData = mysqli_fetch_assoc($tableResult2);
				 //print_r($GMLoginData);
				  
				  $userID =$GMLoginData['id'];
				  $parentID =$GMLoginData['parentID'];
				 $isexpertDB =$GMLoginData['isexpert'];
				 
				  $sql = '';
				$expertAdd = '';
				  	if(!empty($isexpert) && $isexpert == "yes")
					{
						$expertAdd= 1;
						$sql="insert into friendsExpertInfo (fname,lname,userid,email,parentID,isexpert) values ('".ucwords($fname)."','".ucwords($lname)."',".$userID.",'".$m_email."' , ".$loggedID.",1)" ;
					}
					else
					{
						$expertAdd = 0;
						$sql="insert into friendsExpertInfo (fname,lname,userid,email,parentID,isexpert) values ('".ucwords($fname)."','".ucwords($lname)."',".$userID.",'".$m_email."' , ".$loggedID.",0)" ;
					}


					  
					if($parentID != $loggedID && $isexpertDB != $expertAdd)
					{
					  $tableResult = mysqli_query($conn, $sql);
					  $member_id = $userID;
					}
					else
					{
						$alreadyFrnd = 1;
					}


				  
				  			
				}
				else
				{
					
					$target_fileName = '';
					$target_file = '';
					if(!empty($isexpert) && $isexpert == "yes")
					{
					  $sql="insert into friendsRegister (fname,lname,city,country,experties,email,registerStatus,pwd,loginStatus) values ('".ucwords($fname)."','".ucwords($lname)."','".$m_city."', '".$m_country."', '".$m_mobile."', '".$m_email."','YES','".md5($pwd)."','NO')" ;

					  $tableResult = mysqli_query($conn, $sql);
					$member_id = mysqli_insert_id($conn);

					  $sql="insert into friendsExpertInfo (fname,lname,userid,email,parentID,isexpert) values ('".ucwords($fname)."','".ucwords($lname)."',".$member_id.",'".$m_email."' , ".$loggedID.",1)" ;
					}
					else
					{
						$sql="insert into friendsRegister (fname,lname,city,country,phone,email,registerStatus,pwd,loginStatus) values ('".ucwords($fname)."','".ucwords($lname)."','".$m_city."', '".$m_country."', '".$m_mobile."', '".$m_email."','YES','".md5($pwd)."','NO')" ;

					  $tableResult = mysqli_query($conn, $sql);
					$member_id = mysqli_insert_id($conn);

					  $sql="insert into friendsExpertInfo (fname,lname,userid,email,parentID,isexpert) values ('".ucwords($fname)."','".ucwords($lname)."',".$member_id.",'".$m_email."' , ".$loggedID.",0)" ;
					}
					//echo $sql;exit();
	
					//print_r($conn);die();
					$tableResult = mysqli_query($conn, $sql);
					//$member_id = mysqli_insert_id($conn);
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
				}
				//Create Email instance for sending mail
				$emailObject=new phpSendMail();

				//----------------------------Email Body Texts------------------------
				//mail("dassamtest2@gmail.com","hi","test");
				$body = '';
				$body = '
					<div style="width:100%;max-width:660px;margin:0px auto">
     <div style="text-align:center"><img src="http://'.$_SERVER['SERVER_NAME'].'/images/logo.png">
     </div>
     <div style="border:solid 1px #eee;text-align:center;margin-bottom:3px;margin-top:10px;background:#f3f3f3">      <p style="font-size:16px;color:#036;margin:3px 0;font-family:Georgia,\'Times New Roman\',Times,serif;padding:10px 15px;line-height:15px;text-align:left">Dear '.ucwords($fname).',<br><br>'.ucwords($loggedINuser).' has invited you to join his/her Friends and Family Group at Village Experts Site. </p>
<p style="font-size:16px;color:#036;margin:3px 0;font-family:Georgia,\'Times New Roman\',Times,serif;padding:10px 15px;line-height:15px;text-align:left">Village Experts is a knowledge exchange platform that enables you to:</p>
<ul style="padding:0px 60px;">
     <li style="font-size:16px;color:#036;margin:5px;font-family:Georgia,\'Times New Roman\',Times,serif;padding:1px 5px;line-height:15px;text-align:left">Connect to Friends and Family,</li>
     <li style="font-size:16px;color:#036;margin:5px;font-family:Georgia,\'Times New Roman\',Times,serif;padding:1px 5px;line-height:15px;text-align:left">Search for and connect to an expert in various fields,</li> 
     <li style="font-size:16px;color:#036;margin:5px;font-family:Georgia,\'Times New Roman\',Times,serif;padding:1px 5px;line-height:15px;text-align:left">Connect to a previously connected expert, and/or </li>
     <li style="font-size:16px;color:#036;margin:5px;font-family:Georgia,\'Times New Roman\',Times,serif;padding:1px 5px;line-height:15px;text-align:left">Sign up as an expert and monetize your expertise. </li>
   </ul> 
   <p style="font-size:16px;color:#036;margin:3px 0;font-family:Georgia,\'Times New Roman\',Times,serif;padding:10px 15px;line-height:15px;text-align:left">The connection is enabled through a virtual office, conference room like exchange, powered by our proprietary communication platform that enables you to:</p>
   <ul style="padding:0px 60px;">
    <li style="font-size:16px;color:#036;margin:5px;font-family:Georgia,\'Times New Roman\',Times,serif;padding:1px 5px;line-height:15px;text-align:left">SEE AND TALK TO EACH OTHER</li>
    <li style="font-size:16px;color:#036;margin:5px;font-family:Georgia,\'Times New Roman\',Times,serif;padding:1px 5px;line-height:15px;text-align:left">CHAT</li>
    <li style="font-size:16px;color:#036;margin:5px;font-family:Georgia,\'Times New Roman\',Times,serif;padding:1px 5px;line-height:15px;text-align:left">SHARE PDF DOCUMENTS, PICTURES, MOVIES IN OUR FILE VIEWER</li>
    <li style="font-size:16px;color:#036;margin:5px;font-family:Georgia,\'Times New Roman\',Times,serif;padding:1px 5px;line-height:15px;text-align:left">SHARE ANY OTHER DOCUMENTS THROUGH OUR SCREEN SHARE FEATURE</li>
    <li style="font-size:16px;color:#036;margin:5px;font-family:Georgia,\'Times New Roman\',Times,serif;padding:1px 5px;line-height:15px;text-align:left">RECORD INDIVIDUAL VOICE, VIDEO CLIPS</li>
    <li style="font-size:16px;color:#036;margin:5px;font-family:Georgia,\'Times New Roman\',Times,serif;padding:1px 5px;line-height:15px;text-align:left">RECORD ENTIRE SESSIONS INCLUDING VOICE, VIDEO, ALL SHARED DOCUMENTS</li>
    <li style="font-size:16px;color:#036;margin:5px;font-family:Georgia,\'Times New Roman\',Times,serif;padding:1px 5px;line-height:15px;text-align:left">INVITE A THIRD PARTY ‘LISTEN IN’ TO VIEW ENTIRE SESSION</li>
   <ul>
    <br>';

    if($IsemailExists == 0)
    {
		    if(!empty($isexpert) && $isexpert == "yes")
						{
							$body.='<p style="width:200px;margin:20px auto;background:red;color:#fff;padding:12px 0px;font-family:Georgia,\'Times New Roman\', Times, serif;font-size:17px;text-align:center;border-radius:10px;font-weight:bold;"><a href="http://'.$_SERVER['SERVER_NAME'].'?email='.$m_email.'&isexpert=yes#register" style="color:#fff;">Visit '.$_SERVER['SERVER_NAME'].' to set new password</a></p></div></div>';
						}
						else
						{
							$body.='<p style="width:200px;margin:20px auto;background:red;color:#fff;padding:12px 0px;font-family:Georgia,\'Times New Roman\', Times, serif;font-size:17px;text-align:center;border-radius:10px;font-weight:bold;"><a href="http://'.$_SERVER['SERVER_NAME'].'?email='.$m_email.'&isFriendreg=yes#register" style="color:#fff;">Visit '.$_SERVER['SERVER_NAME'].' to set new password</a></p></div></div>';
						}
    }
    else
    {
    	$body.='<p style="width:200px;margin:20px auto;background:red;color:#fff;padding:12px 0px;font-family:Georgia,\'Times New Roman\', Times, serif;font-size:17px;text-align:center;border-radius:10px;font-weight:bold;"><a href="http://'.$_SERVER['SERVER_NAME'].'" style="color:#fff;">Visit '.$_SERVER['SERVER_NAME'].' to interact with new friends</a></p></div></div>';
    }

    $body.='</div></div></div>';


				



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
				if($alreadyFrnd == 1)//if already friend
				{
				  	if(!empty($isexpert) && $isexpert == "yes")
					{
						$result['msg'] = "Sorry! $fname $lname has been already Added as an Expert.";
					}
					else
					{
					 $result['msg'] = "Sorry! $fname $lname has been already Added as a Friend.";
					}
				}
				else
				{
					$mailSent = $emailObject->sendMail($m_email,$fname,"Village-Expert New User Registration!",$body);
					// if($mailSent)
					// {
	
					// }
					if(!empty($isexpert) && $isexpert == "yes")
					{
						$result['msg'] = "$fname $lname has been Added as an Expert Successfully!";
					}
					else
					{
					 $result['msg'] = "$fname $lname has been Added as a Friend Successfully!";
					}
				}

				$result['success'] = 1;

				$result['error'] = 0;
				echo json_encode($result);
				}
			}
			else if($tag == 'editFriendss')
			{
				$userType = isset($_REQUEST['userType'])?$_REQUEST['userType']:'';

				$fname=isset($_REQUEST['fname'])?$_REQUEST['fname']:(isset($_REQUEST['fname'])?$_REQUEST['fname']:'');

				$lname=isset($_REQUEST['lname'])?$_REQUEST['lname']:(isset($_REQUEST['lname'])?$_REQUEST['lname']:'');

				$m_city=isset($_REQUEST['city'])?$_REQUEST['city']:(isset($_REQUEST['city'])?$_REQUEST['city']:'');

				$m_country=isset($_REQUEST['country'])?$_REQUEST['country']:(isset($_REQUEST['country'])?$_REQUEST['country']:'');

				$m_mobile=isset($_REQUEST['phone'])?$_REQUEST['phone']:(isset($_REQUEST['phone'])?$_REQUEST['phone']:'');

				$m_email=isset($_REQUEST['email'])?$_REQUEST['email']:(isset($_REQUEST['email'])?$_REQUEST['email']:'');

				$flID = isset($_REQUEST['flID'])?$_REQUEST['flID']:(isset($_REQUEST['flID'])?$_REQUEST['flID']:'');

				$pwd = isset($_REQUEST['pwds'])?$_REQUEST['pwds']:(isset($_REQUEST['pwds'])?$_REQUEST['pwds']:'');
				$loggedID = isset($_REQUEST['loggedID'])?$_REQUEST['loggedID']:(isset($_REQUEST['loggedID'])?$_REQUEST['loggedID']:'');

				$sql="update  friendsRegister set fname = '".ucwords($fname)."',lname = '".ucwords($lname)."',city = '".$m_city."',country = '".$m_country."',experties = '".$m_mobile."' ,email = '".$m_email."' where id = ".$flID ;
				//echo $sql;exit();

				//print_r($conn);die();
				$tableResult = mysqli_query($conn, $sql);
				$result['msg'] = "Editing Successful!";

				$result['success'] = 1;

				$result['error'] = 0;
				echo json_encode($result);
			}    
			else if($tag == 'deleteFriendss')
			{
				$m_email=isset($_REQUEST['email'])?$_REQUEST['email']:'';
				$fname=isset($_REQUEST['fname'])?$_REQUEST['fname']:'';
				$lname=isset($_REQUEST['lname'])?$_REQUEST['lname']:'';
				$isExpertss=isset($_REQUEST['isExpertss'])?$_REQUEST['isExpertss']:'';
				$loggedID=isset($_REQUEST['loggedID'])?$_REQUEST['loggedID']:'';
				//print_r($_REQUEST);die();

				$sqlChk="select userid,parentID,isexpert from friendsExpertInfo where  email ='".$m_email."'";
				//$sqlChk2="select id from friendsRegister where  email ='".$m_email."'";
				
				$tableResult = mysqli_query($conn, $sqlChk);
				//$tableResult2 = mysqli_query($conn, $sqlChk2);
				if (mysqli_num_rows($tableResult) > 1)  
				{
				  $GMLoginData = mysqli_fetch_assoc($tableResult2);

				  //print_r($GMLoginData);
				  
				  $parentID =$GMLoginData['parentID'];
				  $isexpertDB =$GMLoginData['isexpert'];
				  if($isExpertss == "YES")
				  {
				  	 
				  	$sqlUPDT="delete from friendsExpertInfo where email='".$m_email."' AND isexpert = 1 AND parentID = ".$loggedID ;
					$tableResults = mysqli_query($conn, $sqlUPDT);
					$result['success'] = 1;
   					$result['error'] = 0;
   					$result['msg'] = "$fname $lname has been deleted successfully.";
				  }
				  else
				  {
				  	 
				  	$sqlUPDT="delete from friendsExpertInfo where email='".$m_email."' AND isexpert = 0 AND parentID = ".$loggedID ;
					$tableResults = mysqli_query($conn, $sqlUPDT);
					$result['success'] = 1;
   					$result['error'] = 0;
   					$result['msg'] = "$fname $lname has been deleted successfully.";
				  }
				}
				else if (mysqli_num_rows($tableResult) == 1)  
				 {
				  	$sqlUPDT="delete from friendsExpertInfo where email='".$m_email."' AND  parentID = ".$loggedID ;
					$tableResults = mysqli_query($conn, $sqlUPDT);

				  	$sqlUPDT2="delete from friendsRegister where email='".$m_email."'";
					$tableResults2 = mysqli_query($conn, $sqlUPDT2);
					$result['success'] = 1;
   					$result['error'] = 0;
   					$result['msg'] = "$fname $lname has been deleted successfully.";
				 }
				else
				  {
				  	$result['success'] = 0;
   					$result['error'] = 1;
   					$result['msg'] = "Error occured during deleting!";
				  }




				
					
   					echo json_encode($result);

			}
			else
			{

			$result['msg'] = "Tag Not  Provided";

			echo json_encode($result);



			}

?>	