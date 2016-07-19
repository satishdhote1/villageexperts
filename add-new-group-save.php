<?php
include("config/connection.php");
include("imageresize/smart_resize_image.function.php");
session_start();
$conn=new connections();
$conn=$conn->connect();
if(isset($_SESSION['logged_user_id']) && !empty($_SESSION['logged_user_id']))
{
/*
echo "<br><pre>";
print_r($_FILES);echo "<br>";
print_r($_REQUEST);
echo "</pre><br>";
*/
if(isset($_REQUEST['submit']))
{
	
	$group_name = isset($_REQUEST['group_name'])?$_REQUEST['group_name']:'';
	$description = isset($_REQUEST['description'])?$_REQUEST['description']:'';
	$currentDate = date('Y-m-d');
	$uploaded_file = '';
	$descriptions = mysqli_real_escape_string($conn,$description);
	$group_names = mysqli_real_escape_string($conn,$group_name);
	 $sql="insert into groups (group_name,description,image,created_by_id,created_by_user_role,created_date) values ('".$group_names."','".$descriptions."', '".$uploaded_file."','".$_SESSION['logged_user_id']."','".$_SESSION['logged_role_code']."', '".$currentDate."')" ;//echo $ssql;exit();
	//die("test3 ");
					$tableResult = mysqli_query($conn, $sql);
					$MSG = "Registered Sucessfully!";
					 $result['success'] = 1;
   					$result['error'] = 0;
					$result['MSG'].="<br>".$MSG;
					if($tableResult > 0)
					{
						
						$group_last_id = mysqli_insert_id($conn);
						
						$uploaded_file = '';
						 if(isset($_FILES) && is_array($_FILES))
						 {
							// die("test");
								  $target_dir = "images/groupPhotos/";
								$target_file = $target_dir .time(). basename($_FILES['file']["name"]);
								
								//die($target_file);
								$uploadOk = 1;
								$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
								$target_file = $target_dir .$group_last_id.'.'.$imageFileType ;
								
								//indicate which file to resize (can be any type jpg/png/gif/etc...)
								  $file = $_FILES['file']["tmp_name"];//'your_path_to_file/file.png';
							
								  //indicate the path and name for the new resized file
								  $resizedFile = $target_file;//'your_path_to_file/resizedFile.png';
							//die("file==".$file."===== ResizedFile--". $resizedFile);
								  //call the function (when passing path to pic)
								  if (smart_resize_image($file , null, "200" , "200" , false , $resizedFile , false , false ,100 )){	
										
										$sqlUpdate="update groups set image='".$group_last_id.'.'.$imageFileType."' where group_id=".$group_last_id;
								$tableResults = mysqli_query($conn, $sqlUpdate);
								if($tableResults > 0)
								{
										
										$uploaded_file= $group_last_id.'.'.$imageFileType;
										
										$result['msg'] = "The file ".$group_last_id.'.'.$imageFileType. " has been uploaded.";
										$result['imageName'] = 'images/groupPhotos/'.$group_last_id.'.'.$imageFileType;
										$passStr = $group_names.'-Group Created.<br>Redirecting....';
										$passImg = 'images/groupPhotos/'.$group_last_id.'.'.$imageFileType;
										header("location:well-come.php?passStr=$passStr&passImg=$passImg&redirect=my-group");
										//header("Refresh: 3; url=my-group.php");
										//echo '<center><h1 style="color:red">'.$group_names.'-Group Created .Redirecting....</h1></center>';
								}
									} else {
										
										$passStr = 'Sorry, there was an error uploading your file.';
										$passImg = 'images/groupPhotos/img-3.jpg';
										header("location:well-come.php?passStr=$passStr&passImg=$passImg&redirect=add-new-group");
										
									}
								}
								 //echo json_encode($result);
								  //die();
						 }
											
						
					}
					//print_r($tableResult);die();
	
	
//}
}//session checking
else
{
	
	$passStr = 'You are not authorized.Redirecting....';
										$passImg = 'groupPhotos/img-3.jpg';
										header("location:well-come.php?passStr=$passStr&passImg=$passImg&redirect=index");
										
										

}

?>
