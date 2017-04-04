<?php
//include("config/connection.php");
class imageUpload
{
	 public function imageUploads($files,$uploadDirectory,$lastId,$tableName,$fieldName1,$fieldName2){
	    $_FILES = $files;
	    $conn=new connections();
	    $conn=$conn->connect();

        $target_dir = "images/".$uploadDirectory."/";
		$target_file = $target_dir .time(). basename($_FILES['file']["name"]);

		//die($target_file);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$target_file = $target_dir .$lastId.'.'.$imageFileType;
		$original_file = $lastId.'.'.$imageFileType;
		
		
		//echo $uploadDirectory."--".$lastId."--".$tableName."--".$fieldName1."--".$fieldName2."<br>";//die();
	    //echo  $sql1 = "update ".$tableName." set ".$fieldName1." ='".$original_file."' where ".$fieldName2."=".$lastId;
	    //die();
		// Check if image file is a actual image or fake image
		/*
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
		*/
		// Check if file already exists
		if (file_exists($target_file)) {
			$result['msg'] = "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES['file']["size"] > 5000000) {
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
			echo json_encode($result);
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES['file']["tmp_name"], $target_file)) {
				//$_SESSION['uploaded_file']= time().basename( $_FILES['file']["name"]);
				$sql1 = "update ".$tableName." set ".$fieldName1." ='".$original_file."' where ".$fieldName2."=".$lastId;
				$rs1 =mysqli_query($conn, $sql1);
				//echo $sql1;die("test");
			} else {
				$result['msg'] = "Sorry, there was an error uploading your file.";
			}
		}
		  //echo json_encode($result);
  		  //die();
		 return $original_file;
	}
}
?>