<?php



include("config/connection.php");



include("imageUpload.php");
include("imageresize/smart_resize_image.function.php");


session_start();

$conn=new connections();

$conn=$conn->connect();

$imageUpload = new imageUpload();

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

	  $userTypess = isset($_REQUEST['userType'])?$_REQUEST['userType']:'';

	  $email = isset($_REQUEST['email'])?$_REQUEST['email']:'';

	  if($userTypess == "provider")
	  {
		  $userTypess = "service_".$userTypess;
		$fieldName = "sp";  
	  }
	  if($userTypess == "requestor"){
		  $userTypess = "service_".$userTypess;
	    $fieldName = "sr";
	  }
	  if($userTypess == "group_member"){
		  $userTypess = $userTypess;
	    $fieldName = "gm";
	  }
	  if(!empty($email))
	  {

		 $sql="select * from ".$userTypess." where  ".$fieldName."_email='".$email."'";
echo $sql;die();
			  

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

  else if($tag == 'login')

  {

	  $userType = isset($_REQUEST['userType'])?$_REQUEST['userType']:'';

	  $email = isset($_REQUEST['email'])?$_REQUEST['email']:'';

	  $pwd = isset($_REQUEST['pwd'])?$_REQUEST['pwd']:'';

	 

	  if($userType == 'SPLoginHidden')

	  {

		  $sql="select * from service_provider where  sp_email='".$email."' and sp_password=md5('".$pwd."')";

		  

					$tableResult = mysqli_query($conn, $sql);

					//print_r($tableResult);

	

					if (mysqli_num_rows($tableResult) > 0)  

					{

						//die("test2");

							$SPLoginData = mysqli_fetch_assoc($tableResult);

						

						$_SESSION['logged_user_id']=$SPLoginData['sp_id'];

						$_SESSION['logged_role_code']='SP';

						$_SESSION['logged_user_name']=isset($SPLoginData['sp_name'])?$SPLoginData['sp_name']:'';

						$_SESSION['logged_user_email']=isset($SPLoginData['sp_email'])?$SPLoginData['sp_email']:'';

						$_SESSION['logged_user_image']=isset($SPLoginData['sp_image'])?$SPLoginData['sp_image']:'';



						$sqlUpdate="update service_provider set sp_logged_in='Y' where sp_id=".$SPLoginData['sp_id'];

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

		

                                 





					 $m_password=isset($_REQUEST['SPpassword'])?$_REQUEST['SPpassword']:(isset($_REQUEST['SRpassword'])?$_REQUEST['SRpassword']:'');

				 $m_confirm_password=isset($_REQUEST['SPcpassword'])?$_REQUEST['SPcpassword']:(isset($_REQUEST['SRcpassword'])?$_REQUEST['SRcpassword']:'');

				$m_name=isset($_REQUEST['SPname'])?$_REQUEST['SPname']:(isset($_REQUEST['SRname'])?$_REQUEST['SRname']:'');

				$m_address=isset($_REQUEST['SPaddress'])?$_REQUEST['SPaddress']:(isset($_REQUEST['SRaddress'])?$_REQUEST['SRaddress']:'');

				$m_city=isset($_REQUEST['SPcity'])?$_REQUEST['SPcity']:(isset($_REQUEST['SRcity'])?$_REQUEST['SRcity']:'');

				$m_country=isset($_REQUEST['SPcountry'])?$_REQUEST['SPcountry']:(isset($_REQUEST['SRcountry'])?$_REQUEST['SRcountry']:'');

				$m_pin=isset($_REQUEST['SPpin'])?$_REQUEST['SPpin']:(isset($_REQUEST['SRpin'])?$_REQUEST['SRpin']:'');

				$m_mobile=isset($_REQUEST['SPmobile'])?$_REQUEST['SPmobile']:(isset($_REQUEST['SRmobile'])?$_REQUEST['SRmobile']:'');

				$m_email=isset($_REQUEST['SPemail'])?$_REQUEST['SPemail']:(isset($_REQUEST['SRemail'])?$_REQUEST['SRemail']:'');

				$m_sex=isset($_REQUEST['sex'])?$_REQUEST['sex']:(isset($_REQUEST['sex'])?$_REQUEST['sex']:'');

				$m_specialisation_id=isset($_REQUEST['SPspecialisation_id'])?$_REQUEST['SPspecialisation_id']:(isset($_REQUEST['SRspecialisation_id'])?$_REQUEST['SRspecialisation_id']:'');

				$m_sub_specialisation_id=isset($_REQUEST['SPsubSpecialisation_id'])?$_REQUEST['SPsubSpecialisation_id']:(isset($_REQUEST['SRsubSpecialisation_id'])?$_REQUEST['SRsubSpecialisation_id']:'');

				$m_year_of_experience=isset($_REQUEST['SPexperience'])?$_REQUEST['SPexperience']:(isset($_REQUEST['SRexperience'])?$_REQUEST['SRexperience']:'');

				$m_rate_type1=isset($_REQUEST['SPrateType1'])?$_REQUEST['SPrateType1']:(isset($_REQUEST['SRrateType1'])?$_REQUEST['SRrateType1']:'');

				$m_rate_type2=isset($_REQUEST['SPrateType2'])?$_REQUEST['SPrateType2']:(isset($_REQUEST['SRrateType2'])?$_REQUEST['SRrateType2']:'');

				$m_rate_type3=isset($_REQUEST['SPrateType3'])?$_REQUEST['SPrateType3']:(isset($_REQUEST['SRrateType3'])?$_REQUEST['SRrateType3']:'');

				$m_degree=isset($_REQUEST['SPdegree'])?$_REQUEST['SPdegree']:(isset($_REQUEST['SRdegree'])?$_REQUEST['SRdegree']:'');
				$m_institute=isset($_REQUEST['SPinstitute'])?$_REQUEST['SPinstitute']:(isset($_REQUEST['SRinstitute'])?$_REQUEST['SRinstitute']:'');
				$m_yop=isset($_REQUEST['SPyop'])?$_REQUEST['SPyop']:(isset($_REQUEST['SRyop'])?$_REQUEST['SRyop']:'');

				$m_language_id=isset($_REQUEST['SPlaunguages'])?$_REQUEST['SPlaunguages']:(isset($_REQUEST['SRlaunguages'])?$_REQUEST['SRlaunguages']:'');



			/*

			$_SESSION['file_name3']=$_FILES['photo']['name'];

		

		//echo $tmpfile;exit();

		$temp_file=$photo_upload_temp_path.$_SESSION['file_name3'];

		move_uploaded_file($_FILES['photo']['tmp_name'], $temp_file);

				

		chmod ($new_file1,0777);

		*/

				$valid=1;

				$MSG="";

				

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

	

			if($userType =='SPregister'){

				

				if($m_specialisation_id=="-1"){

		

				$valid=0;

				$MSG .= "Please select specialisation.";

		

				}

				if($m_sub_specialisation_id=="-1"){

		

				$valid=0;

				$MSG .= "Please select sub specialisation.";

		

				}

				if($m_year_of_experience==""){

		

				$valid=0;

				$MSG .= "Please enter year of experience.";

		

				}

				if($m_rate_type1==""){

		

				$valid=0;

				$MSG .= "Please enter rate_per_10Min.";

		

				}

				

				if($m_rate_type2==""){

		

				$valid=0;

				$MSG .= "Please enter rate_per_30Min.";

		

				}

	

				if($m_rate_type3==""){

		

				$valid=0;

				$MSG .= "Please enter rate_per_60Min.";

		

				}

				if($m_institute==""){

		

				$valid=0;

				$MSG .= "Please enter your Institute .";

		

			}
				
					if($m_yop==""){

		

				$valid=0;

				$MSG .= "Please select your Year of Passing .";

		

			}
	

				if($m_language_id=="-1"){

		

				$valid=0;

				$MSG .= "Please select language.";

		

				}

	

			}

			$imageName = '';

			//echo $valid."<br>".$MSG;

				//insert record

			if ($valid==1){

	

	

			//first, into main student table

			$tableResult = '';

			if ($userType=="SRregister"){

	

					 $sql="insert into service_requestor (sr_name,sr_sex,sr_address,sr_city,sr_pincode,sr_country,sr_phone,sr_email,sr_password) values ('".$m_name."','".$m_sex."', '".$m_address."','".$m_city."','".$m_pin."', '".$m_country."', '".$m_mobile."', '".$m_email."', '".md5($m_password)."')" ;//echo $sql;exit();

					//die();

					$tableResult = mysqli_query($conn, $sql);

					$MSG = "Registered Sucessfully!";

					 $result['success'] = 1;

   					$result['error'] = 0;

					$last_id = mysqli_insert_id($conn);

					//$imageName = $imageUpload->imageUploads($_FILES,'SR_Photos',$last_id,'service_requestor','sr_image','sr_id');
					
					$target_dir = "images/SR_Photos/";
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
					

					$MSG.='Registration Successful';

				}

				else{

	

					$sql="insert into service_provider (sp_name,sp_sex,sp_address,sp_city,sp_pincode,sp_country,sp_phone,sp_email,sp_password,sp_specialisation_id,sp_sub_specialisation_id,sp_year_of_experience,sp_rate_type1,sp_rate_type2,sp_rate_type3,degree,SPinstitute,SPyop,sp_language_id) values ('".$m_name."','".$m_sex."', '".$m_address."','".$m_city."','".$m_pin."', '".$m_country."', '".$m_mobile."', '".$m_email."', '".md5($m_password)."', '".$m_specialisation_id."', '".$m_sub_specialisation_id."', '".$m_year_of_experience."', '".$m_rate_type1."', '".$m_rate_type2."', '".$m_rate_type3."', '".$m_degree."' , '".$m_institute."' , '".$m_yop."', '".$m_language_id."')" ;

					//echo $ssql;exit();

					$tableResult = mysqli_query($conn, $sql);

					$MSG = "Registered Sucessfully!";

					$result['success'] = 1;

   					$result['error'] = 0;

					$MSG.='Registration Successful';

					$last_id = mysqli_insert_id($conn);

					//$imageName = $imageUpload->imageUploads($_FILES,'SP_Photos',$last_id,'service_provider','sp_image','sp_id');
					
					$target_dir = "images/SP_Photos/";
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
							
							//die($file."----".$resizedFile);
							
								  //call the function (when passing path to pic)
								  if (smart_resize_image($file , null, "200" , "200" , false , $resizedFile , false , false ,100 )){	
								  $imageName = $last_id.'.'.$imageFileType;
								  //$_SESSION['uploaded_file']= time().basename( $_FILES['file']["name"]);
				
								$sql1 = "update service_provider set sp_image ='".$original_file."' where sp_id=".$last_id;
								
								$rs1 =mysqli_query($conn, $sql1);
				//echo $sql1;die("test");
								  
								  }


				}

			

					

				/*echo "<script language='javascript'>alert('Registration Successful.');window.location='index.php?msg=register&code=".$_POST['centre_code_prefix'].$_POST['recognition_code_prefix'].$_POST['student_serial']."';</script>";	*/		

			}

			else

			{

				echo $MSG;	

			}

		

				if ($tableResult  == true && $userType == "SPregister") {

				$result['msg'] = $MSG;

				//echo json_encode($result);

				$passStr = "$m_name - Your Registration is Successful ! Redirecting....";

				$passImg = 'SP_Photos/'.$imageName;

										header("location:well-come.php?passStr=$passStr&passImg=$passImg&redirect=SPsuccess&email=$m_email");

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

		$passStr = "$m_name - Your Registration is Successful ! Redirecting....";

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

		

	   

	   

	   

	   

	   

	   

	   

	   

	   

	   

   }

   else

   {

	   $result['msg'] = "Tag Not  Provided";

	   echo json_encode($result);

	   

   }

?>	
