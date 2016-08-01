<?php
include("../config/connection.php");
include("../imageresize/smart_resize_image.function.php");
$conn=new connections();
$conn=$conn->connect();


if(isset($_REQUEST['submitCategory']) || isset($_REQUEST['submitSubCategory']))
{
	/*print_r($_REQUEST);
	print_r($_FILES);
	die();*/
	$experties  = isset($_REQUEST['experties'])?$_REQUEST['experties']:'';
	$mainCategory = isset($_REQUEST['mainCategory'])?$_REQUEST['mainCategory']:'';
	$addMainCategory = isset($_REQUEST['addMainCategory'])?$_REQUEST['addMainCategory']:'';
	$addSubCategory = isset($_REQUEST['addSubCategory'])?$_REQUEST['addSubCategory']:'';
	
	$databaseFiled1 ='';
	$databaseFiled2 ='';
	$databaseFiled3 ='';
	$uploaded_file = '';
				 if(isset($_FILES) && is_array($_FILES))
				{
					// die("test");
					if($mainCategory == "sp_specialisation")
					{
					$target_dir = "../images/specialization/";
					$databaseFiled1 ='specialisation';
					$databaseFiled2 ='images';
					$uploaded_file = $addMainCategory;
					}
					else if(!empty($addSubCategory))
					{
					$target_dir = "../images/SubSpecialization/";
					$databaseFiled1 ='sub_specialisation';
					$databaseFiled2 ='SubSpImages';
					$databaseFiled3 ='specialisation_id';
					$uploaded_file = $addSubCategory;
					}
					else if($mainCategory == "education")
					{
					$target_dir = "../images/education/";
					$databaseFiled1 ='Education';
					$databaseFiled2 ='Image';
					$uploaded_file = $addMainCategory;
					}
					else if($mainCategory == "sp_language")
					{
					$target_dir = "../images/Languages/";
					$databaseFiled1 ='languages';
					$databaseFiled2 ='images';
					$uploaded_file = $addMainCategory;
					}
					else
					{
					$error = "Select Main Category";
					header("location:index.php?error=".$error);
					}
					
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
					if (smart_resize_image($file , null, "300" , "300" , false , $resizedFile , false , false ,100 )){	
					
							//$uploaded_file = $target_fileName;
							
							$result['msg'] = "The Image ".$uploaded_file. $target_fileName. " has been uploaded.";
							$result['imageName'] = $target_fileName;
							
							if(empty($addSubCategory))
							{
							$sql="insert into ".$mainCategory." ( ".$databaseFiled1." , ".$databaseFiled2." ) values ('".$addMainCategory."','".$target_fileName."')" ;//echo $sql;exit();
							}
							else if(!empty($addSubCategory) && !empty($experties))
							{
								$sql="insert into sp_sub_specialisation ( ".$databaseFiled1." , ".$databaseFiled2." , ".$databaseFiled3.' ) values ("'.$addSubCategory.'","'.$target_fileName.'" , '.$experties.' )' ;//echo $sql;exit();
							}

		$tableResult = mysqli_query($conn, $sql);
		$error.= "<br>Saved Sucessfully";
					header("location:index.php?error=".$error);
							
					} else {
							$error.="<br>Sorry, there was an error uploading your Image.<br/>";
					}
				}
}
$sql="select * from 	sp_specialisation order by specialisation";
				$tableResult = mysqli_query($conn, $sql);
				$specialData = array();
				if (mysqli_num_rows($tableResult) > 0)  
				{
					while($row = mysqli_fetch_assoc($tableResult)) {
						$specialData[] = $row;
						
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
<h4><a href="edit.php" style="cursor:pointer;margin-left:82%;">Click to Edit Categories</a></h4><br><br><br>
     <div class="row">

<form name="form1" method="post" action="" enctype="multipart/form-data">
<label>Select Main Category :</label>
<select name="mainCategory" class="mainCategory"> 
<option value="">Select</option>
<option value="sp_specialisation">Experties</option>
<!--<option value="sp_sub_specialisation">Sub Specialization</option>-->
<option value="education">Degree</option>
<option value="sp_language">Language</option>
</select>
<br>
<label>Enter Category Values:</label>
<input type="text" name="addMainCategory" class="addMainCategory" value="" />
<br>
<label>Select Category Image</label>
<input type="file" name="file" class="categoryFile" />

<br>
<input type="submit" name="submitCategory" value="Save" />
</form>
</div>
<label>**********************************************************************************************************</label>
 <div class="row">

<form name="form2" method="post" action="" enctype="multipart/form-data">
<label>Select Experties</label>
<select name="experties" class="expert">
<?php
foreach($specialData as $specialDatas)
{
	
	
?>
 
<option value="<?php echo $specialDatas['specialisation_id'];  ?>"><?php echo $specialDatas['specialisation']; ?></option>
<?php }?>
</select>
<br>
<label>Enter Sub Specialization</label>
<input type="text" name="addSubCategory" class="addCategory" value="" />

<br>
<label>Select Sub Subspecialization Image</label>
<input type="file" name="file" class="categoryFile" />
<br>
<input type="submit" name="submitSubCategory" value="Save" />
</form>
</div>
</div>
</section>
<!-- jQuery Version 1.11.1 --> 
<script src="js/jquery.js"></script> 

<script src="js/bootstrap.min.js"></script>

<script src="admin.js"></script>
<!--<script src="js/search.js"></script>-->
</body>
</html>
