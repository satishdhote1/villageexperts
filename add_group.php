<?php
	session_start();
require('config.php');
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

if(isset($_POST['group_name'])){
	
	$group_name=$_POST['group_name'];
	$group_description= $_POST['group_description'];
	$group_thumbnail= $_POST['group_thumbnail'];
	$group_date=date('Y-m-d h:i:s');
	$group_admin=$general_user;
	$group_status='active';	
	
	$info = new SplFileInfo($_FILES['group_thumbnail']['name']);
	$ext = $info->getExtension();	
	
	$file=$_FILES['group_thumbnail']['tmp_name'];
	$imgname=date('ymdhis');
		if (!isset($file)) {
			echo "no";
		}
		else{
			if(!$file) {
				$group_thumbnail="";
			}
			else {
				$image = addslashes(file_get_contents($file));
				$image_name = addslashes($_FILES['group_thumbnail']['name']);
				$image_size = getimagesize($file);
				if ($image_size==FALSE) {
					echo "That's not an image!";
				}
				else{
					move_uploaded_file($file,"uploads/" . $_FILES["group_thumbnail"]["name"]);
					$name=$imgname.".".$ext;
					rename("uploads/".$_FILES["group_thumbnail"]["name"]."", "uploads/".$name."");			
					$group_thumbnail="uploads/".$name;
				}
			}
		}
		
	$sql="INSERT INTO groups (group_name, group_description, group_thumbnail, group_date, group_admin, group_status) VALUES('$group_name', '$group_description', '$group_thumbnail', '$group_date', '$group_admin', '$group_status')";
	$qryAddsp=mysqli_query($bd, $sql);
	
	
		
		$qryProfile=mysqli_query($bd, "SELECT MAX(id) FROM groups");
		if($memProfile=mysqli_fetch_array($qryProfile)) {
			//print_r($memProfile);
			$group_id=$memProfile[0];
			
		$qryAddMember = mysqli_query($bd, "INSERT INTO group_members(group_id, member_id, member_date, member_status) VALUES('$group_id', '$group_admin', '$group_date', 'admin')");
		}
		
		header('location:groups.php');
}
else {
	echo "Error";
}
?>