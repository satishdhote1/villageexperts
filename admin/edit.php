<?php
include("../config/connection.php");
include("../imageresize/smart_resize_image.function.php");
$conn=new connections();
$conn=$conn->connect();


if(isset($_REQUEST['submitCategory']))
{
	/*print_r($_REQUEST);
	print_r($_FILES);
	die();
	*/
	$mainCategory = isset($_REQUEST['mainCategory'])?$_REQUEST['mainCategory']:'';
	$editMainCategory = isset($_REQUEST['editMainCategory'])?$_REQUEST['editMainCategory']:'';
	$editMainCategoryID = isset($_REQUEST['editMainCategoryID'])?$_REQUEST['editMainCategoryID']:'';
	
	
	$databaseFiled1 ='';
	$databaseFiled2 ='';
	$databaseFiled3 ='';
	$uploaded_file = '';
					if($mainCategory == "sp_specialisation")
					{
					$target_dir = "../images/specialization/";
					$databaseFiled1 ='specialisation';
					$databaseFiled2 ='images';
					$databaseFiled3 ='specialisation_id';
					$uploaded_file = $editMainCategory;
					}
					else if($mainCategory == "sp_sub_specialisation")
					{
					$target_dir = "../images/SubSpecialization/";
					$databaseFiled1 ='sub_specialisation';
					$databaseFiled2 ='SubSpImages';
					$databaseFiled3 ='sub_specialisation_id';
					$uploaded_file = $editMainCategory;
					}
					else if($mainCategory == "education")
					{
					$target_dir = "../images/education/";
					$databaseFiled1 ='Education';
					$databaseFiled3 ='EducationID';
					$databaseFiled2 ='Image';
					$uploaded_file = $editMainCategory;
					}
					else if($mainCategory == "sp_language")
					{
					$target_dir = "../images/Languages/";
					$databaseFiled1 ='languages';
					$databaseFiled3 ='language_id';
					$databaseFiled2 ='images';
					$uploaded_file = $editMainCategory;
					}
					else
					{
					$error = "Select Main Category";
					header("location:index.php?error=".$error);
					}
				 if(isset($_FILES) && is_array($_FILES) && $_FILES['file']["error"] == 0)
				{
					// die("test");
					
					
					$imageFileType = pathinfo($_FILES['file']["name"],PATHINFO_EXTENSION);

					$target_file = $target_dir.$uploaded_file.'.'.$imageFileType;
					$target_fileName = $uploaded_file.'.'.$imageFileType;
					
					//die($target_file);
					$uploadOk = 1;
					
					//indicate which file to resize (can be any type jpg/png/gif/etc...)
					$file = $_FILES['file']["tmp_name"];//'your_path_to_file/file.png';
							
					//indicate the path and name for the new resized file
					$resizedFile = $target_file;//'your_path_to_file/resizedFile.png';
							
					//call the function (when passing path to pic)
					if (smart_resize_image($file , null, "125" , "125" , false , $resizedFile , false , false ,100 )){	
					
							//$uploaded_file = $target_fileName;
							
							$result['msg'] = "The Image ".$uploaded_file. $target_fileName. " has been uploaded.";
							$result['imageName'] = $target_fileName;
							
							
							$sql="UPDATE ".$mainCategory." SET ".$databaseFiled1." = '".
								$editMainCategory."' , ".$databaseFiled2." = '".$target_fileName."' WHERE ".$databaseFiled3." = ".$editMainCategoryID;//echo $sql;exit();
							

		$tableResult = mysqli_query($conn, $sql);
		$error.= "<br>Saved Sucessfully";
					header("location:edit.php?error=".$error);
							
					} else {
							$error.="<br>Sorry, there was an error uploading your Image.<br/>";
					}
				}
				else
				{
					$sql="UPDATE ".$mainCategory." SET ".$databaseFiled1." = '".
								$editMainCategory."' WHERE ".$databaseFiled3." = ".$editMainCategoryID;//echo $sql;exit();
					$tableResult = mysqli_query($conn, $sql);
					$error.= "<br>Saved Sucessfully";
					header("location:edit.php?error=".$error);
				}
				
				
				
}






?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>village expart</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/mainstyle.css" rel="stylesheet">
<style>
body{
color:#F93	
}
.over-lap {
	display: block !important
}
label{
	color:#FFF;
}
</style>
</head>
<body class="bodybg">
<div class="loader-exp" style="display:none;">
<p><img src="images/ajax-loader.gif"></p>
</div>

<div class="container-fluid header-part">
  <div class="row">
    <div class="col-md-12 text-center">
      <div class="logo"> <img src="../images/logo.png" alt="logo" > </div>
      <div class="over-lap">
        <div class="profile pull-left"> <img src="../images/img-3.jpg" class="img-responsive"> </div>
        <div class="pull-right">
          <p class="loginname">

         Welcome Admin !

          </p>
          <!--<button class="btn btn-info bg-blue">Logout</button>-->
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    </div>
    </div>

 <section class="block-bg">
<div class="container">
<center><label class="error"><?php echo  isset($_REQUEST['error'])?$_REQUEST['error']:'' ?></label></center><br>
     <div class="row">

<form name="form1" method="post" action="" enctype="multipart/form-data">
<label>Select Main Category :</label>
<select name="mainCategory" class="mainCategory"> 
<option value="">Select</option>
<option value="sp_specialisation">Experties</option>
<option value="sp_sub_specialisation">Sub Specialization</option>
<option value="education">Degree</option>
<option value="sp_language">Language</option>
</select>
<br>
<label>Select Sub Category :</label>
<select name="subCategory" class="subCategory"> 



</select>
<br>

<label>Enter Category Values:</label>
<input type="text" name="editMainCategory" class="editMainCategory" value="" />
<input type="hidden" name="editMainCategoryID" value="" class="editMainCategoryID">
<br>
<label>Select Category Image</label>
<input type="file" name="file" class="categoryFile" />

<br>
<input type="submit" name="submitCategory" value="Save" />
</form>
</div>

</div>
</section>
<!-- jQuery Version 1.11.1 --> 
<script src="../js/jquery.js"></script> 

<script src="../js/bootstrap.min.js"></script>

<script src="editAdmin.js"></script>
<!--<script src="js/search.js"></script>-->
</body>
</html>