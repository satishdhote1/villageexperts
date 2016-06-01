<?php
	session_start();
require('config.php');

	$SPID=$_SESSION['SESS_ID'];
$file=$_FILES['file']['tmp_name'];
$imgname=$SPID;
	if (!isset($file)) {
		echo "no";
	}else{
	if(!$file) {
		$ad_cover="";
	}
	else {
	$image= addslashes(file_get_contents($file));
	$image_name= addslashes($_FILES['file']['name']);
	$image_size= getimagesize($file);
	if ($image_size==FALSE) {
		echo "That's not an image!";
	}else{

	list($width,$height)=getimagesize($file);
	//echo $width.",".$height;
	if($width>500) {
		$newwidth=500;
		$newheight=($height/$width)*$newwidth;
		$src = imagecreatefromjpeg($file);
		$file=imagecreatetruecolor($newwidth,$newheight);
		imagecopyresampled($file,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
		$filename = "profile_images/". $_FILES['file']['name'];
		imagejpeg($file,$filename,100);
		$name=$imgname.".jpg";
		rename("profile_images/".$_FILES["file"]["name"]."", "profile_images/".$name."");
	}
	else {
		move_uploaded_file($file,"profile_images/" . $_FILES["file"]["name"]);
		$name=$imgname.".jpg";
		rename("profile_images/".$_FILES["file"]["name"]."", "profile_images/".$name."");
	}
	$ad_cover=$name;

	}
	}
	}
	
?>