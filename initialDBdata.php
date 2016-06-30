<?php

include("config/connection.php");
$get = isset($_REQUEST['test'])?$_REQUEST['test']:'';
//$con=new connections();
$conn=new connections();
$conn=$conn->connect();
die("testts2");
$launguages = array();
$specialisation = array();
$subSpecialisation = array();
$experience = array();

$sql="SELECT * FROM sp_language order by languages";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)  
{
	while($row = mysqli_fetch_assoc($result)) {
		//$launguages = mysqli_fetch_assoc($result);
		$launguages[] = $row;
	}
	if(!empty($get))
	{
	 echo "<br><pre>";
	 print_r($launguages);
	 echo "</pre><br>";
	}
}
else 
{
	if(!empty($get))
	{
	 echo "No launguages result";
	}
}	



$sql2="SELECT * FROM sp_specialisation order by specialisation";
$result2 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result2) > 0)  
{
	while($row = mysqli_fetch_assoc($result2)) {
		//$launguages = mysqli_fetch_assoc($result);
		$specialisation[] = $row;
	}
	if(!empty($get))
	{
	echo "<br><pre>";
	print_r($specialisation);
	echo "</pre><br>";
	}
}
else 
{
	if(!empty($get))
	{
	echo "No specialisation result";
	}
}

/*$sql3="SELECT * FROM sp_sub_specialisation";
$result3 = mysqli_query($conn, $sql3);

if (mysqli_num_rows($result3) > 0)  
{
	while($row = mysqli_fetch_assoc($result3)) {
		//$launguages = mysqli_fetch_assoc($result);
		$subSpecialisation[] = $row;
	}
	if(!empty($get))
	{
	echo "<br><pre>";
	print_r($subSpecialisation);
	echo "</pre><br>";
	}
}
else 
{
	if(!empty($get))
	{
	echo "No subSpecialisation result";
	}
}	*/

$sqlExperience="SELECT * FROM experience order by ExperienceID";
$resultExperience = mysqli_query($conn, $sqlExperience);

if (mysqli_num_rows($resultExperience) > 0)  
{
	while($row = mysqli_fetch_assoc($resultExperience)) {
		//$launguages = mysqli_fetch_assoc($result);
		$experience[] = $row;
	}
	if(!empty($get))
	{
	 echo "<br><pre>";
	 print_r($experience);
	 echo "</pre><br>";
	}
}
else 
{
	if(!empty($get))
	{
	 echo "No launguages result";
	}
}	

$sqlEducation="SELECT * FROM education order by EducationID";
$resultEducation = mysqli_query($conn, $sqlEducation);
                $education = array();
if (mysqli_num_rows($resultEducation) > 0)  
{
	while($row = mysqli_fetch_assoc($resultEducation)) {
		
		$education[] = $row;
	}
	if(!empty($get))
	{
	 echo "<br><pre>";
	 print_r($education);
	 echo "</pre><br>";
	}
}
else 
{
	if(!empty($get))
	{
	 echo "No launguages result";
	}
}	
				
?>	
