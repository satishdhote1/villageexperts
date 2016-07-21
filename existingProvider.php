<?php
include("config/connection.php");
session_start();
if(isset($_SESSION['logged_user_id']) && !empty($_SESSION['logged_user_id']))
{
$conn=new connections();
$conn=$conn->connect();
$user_id = $_SESSION['logged_user_id'];
$user_name  = $_SESSION['logged_user_name'];
$user_pic = $_SESSION['logged_user_image'];
$user_type = $_SESSION['logged_role_code'];
if($_SESSION['logged_role_code']=='SP')
{
	$imagePath = "SP_Photos/";
}
else if($_SESSION['logged_role_code']=='SR')
{
	$imagePath = "SR_Photos/";
}
else if($_SESSION['logged_role_code']=='GM')
{
	$imagePath = "memberPhotos/";
}
else
$imagePath = "/";

//echo $user_id;

//Get specialization Data
$sql="select specialisation_id,specialisation	 from 	sp_specialisation order by specialisation";
			$tableResult = mysqli_query($conn, $sql);
			//print_r($tableResult);

				$specialData = array();
			if (mysqli_num_rows($tableResult) > 0)  
			{
				while($row = mysqli_fetch_assoc($tableResult)) {
				$specialData[] = $row;
				}
			}

//Get Sub specialization Data
$sql2="select sub_specialisation_id,sub_specialisation from 	sp_sub_specialisation order by sub_specialisation";
			$tableResult2 = mysqli_query($conn, $sql2);
			//print_r($tableResult);

				$subspecialData = array();
			if (mysqli_num_rows($tableResult2) > 0)  
			{
				while($row = mysqli_fetch_assoc($tableResult2)) {
				$subspecialData[] = $row;
				}
			}
			//print_r($subspecialData);die();
			//Get Sub Degree Data
$sql3="select EducationID,Education from 	education ORDER BY EducationID";
			$tableResult3 = mysqli_query($conn, $sql3);
			//print_r($tableResult);

				$education = array();
			if (mysqli_num_rows($tableResult3) > 0)  
			{
				while($row = mysqli_fetch_assoc($tableResult3)) {
				$education[] = $row;
				}
			}

//Get Sub specialization Data
$sql4="select ExperienceID,Experience from 	experience ORDER BY ExperienceID";
			$tableResult4 = mysqli_query($conn, $sql4);
			//print_r($tableResult);

				$experience = array();
			if (mysqli_num_rows($tableResult4) > 0)  
			{
				while($row = mysqli_fetch_assoc($tableResult4)) {
				$experience[] = $row;
				}
			}
			
			//Get Sub Language Data
$sql5="select language_id,languages from 	sp_language ORDER BY languages";
			$tableResult5 = mysqli_query($conn, $sql5);
			//print_r($tableResult);

				$language = array();
			if (mysqli_num_rows($tableResult5) > 0)  
			{
				while($row = mysqli_fetch_assoc($tableResult5)) {
				$language[] = $row;
				}
			}
			
	
$sql="select user.start_date_time,user.end_date_time,user.ammount,sp.sp_id, sp.sp_name,sp.sp_image,sp.sp_specialisation_id,sp.sp_sub_specialisation_id,sp.sp_year_of_experience,sp.sp_rate_type3,sp.degree,sp.sp_language_id from service_provider sp,connect user where exists(select null from  connect where user.sp_id=sp.sp_id)
 and user.sr_id=".$user_id." group by sp.sp_id  order by user.start_date_time desc";
//$sql="select user.start_date_time,user.end_date_time,user.ammount, sp.sp_name,sp.sp_image,sp.sp_specialisation_id,sp.sp_sub_specialisation_id,sp.sp_year_of_experience,sp.sp_rate_type3,sp.degree,sp.sp_language_id from  connect user , service_provider sp where user.sr_id = ".$user_id." and user.sp_id in (select sp_id from service_provider) group by user.connect_id order by user.connect_id desc";
			$tableResult = mysqli_query($conn, $sql);
	
				$connectData = array();
			if (mysqli_num_rows($tableResult) > 0)  
			{
				while($row = mysqli_fetch_assoc($tableResult)) {
				$connectData[] = $row;
				}
			}
			//print_r($connectData);die();
			
	
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
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/mainstyle.css" rel="stylesheet">
</head>
<style>
.over-lap {
	display: block !important
}
</style>
<body class="bodybg">
<div class="loader-exp" style="display:none;">
<p><img src="images/ajax-loader.gif"></p>
</div>
<div class="container-fluid header-part">
  <div class="row">
    <div class="col-md-12 text-center">
      <div class="logo"> <img src="images/logo.png" alt="logo" > </div>
      <div class="over-lap">
        <div class="profile pull-left"> <img src="images/<?php echo $imagePath; ?><?php echo (!empty($user_pic))?$user_pic:"img-3.jpg"; ?>" class="img-responsive"> </div>
        <div class="pull-right">
          <p class="loginname">

           <?php
          if($user_type == 'SP'){
			 echo "Welcome Service Provider <br>".$user_name."!";  
		  }
		  else if($user_type == 'SR'){
			 echo "Welcome Service Requester <br>".$user_name."!";  
		  }
		   else if($user_type == 'GM'){
			 echo "Welcome Group Member <br>".$user_name."!";  
		  }
		  
		  ?>

          </p>
          <button class="btn btn-info bg-blue">Logout</button>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    </div>
    </div>
    



<div class="container search-background margin-top60">
  <div class="row marginTOP">
    <div class="col-md-12 text-center">
      <h1 class="result-text">Existing Providers</h1>
      <div class="background-blue">
      <table class="table table-hover">
  <thead>
    <tr class="hder-modify-table">
      <th width="9.09%"></th>
      <th width="9.09%">NAME</th>
      <th width="9.09%">EXPERTISE</th>
      <th width="9.09%">SUB SPECIALISATION</th>
      <th width="9.09%">EDUCATION</th>
      <th width="9.09%">EXPERIENCE</th>
       <th width="9.09%">RATE/HR</th>
        <th width="9.09%">LANGUAGE</th>
        <th width="9.09%">START TIME</th>
        <th width="9.09%">END TIME</th>
        <th width="9.09%">Ammount</th>
        <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
<?php
	foreach($connectData as $connectDatas)
	{
?>
    <tr>
      <td align="center"><div class="result-profile"><img src="images/SP_Photos/<?php echo $connectDatas['sp_image']; ?>"></div></td>
      <td><?php echo $connectDatas['sp_name']; ?></td>
      <?php
	  
	  foreach($specialData as $specialDatas)
	  {
		 // print_r($specialDatas);
		  //echo $specialDatas['sp_specialisation_id']."--".$connectDatas['sp_specialisation_id']."<br>";
		  if($specialDatas['specialisation_id']==$connectDatas['sp_specialisation_id'])
		  {
			  ?>
              <td><?php echo !empty($specialDatas['specialisation'])?$specialDatas['specialisation']:'-'; ?></td>
              <?php
			  break;
		  }
	  }
	 
	  foreach($subspecialData as $subspecialDatas)
	  {
		  if($subspecialDatas['sub_specialisation_id']==$connectDatas['sp_sub_specialisation_id'])
		  {
			  ?>
              <td><?php echo !empty($subspecialDatas['sub_specialisation'])?$subspecialDatas['sub_specialisation']:'-'; ?></td>
              <?php
			  break;
		  }
	  }
	  
	   foreach($education as $educationDatas)
	  {
		 // print_r($connectDatas);
		 //echo $educationDatas['EducationID']."--".$connectDatas['degree']."<br>";
		  if($educationDatas['EducationID'] == $connectDatas['degree'])
		  {
			  ?>
              <td><?php echo !empty($educationDatas['Education'])?$educationDatas['Education']:'-'; ?></td>
              <?php
			  break;
		  }
	  }


	 foreach($experience as $experienceDatas)
	  {
		 // print_r($connectDatas);
		 //echo $educationDatas['EducationID']."--".$connectDatas['degree']."<br>";
		  if($experienceDatas['ExperienceID'] == $connectDatas['sp_year_of_experience'])
		  {
			  ?>
              <td><?php echo !empty($experienceDatas['Experience'])?$experienceDatas['Experience']:'-'; ?></td>
              <?php
			  break;
		  }
	  }
	  
	  
	  ?>
      <td><?php echo !empty($connectDatas['sp_rate_type3'])?$connectDatas['sp_rate_type3']:'-'; ?></td>
      <?php
	  
	  foreach($language as $languageDatas)
	  {
		 // print_r($connectDatas);
		 //echo $educationDatas['EducationID']."--".$connectDatas['degree']."<br>";
		  if($languageDatas['language_id'] == $connectDatas['sp_language_id'])
		  {
			  ?>
              <td><?php echo !empty($languageDatas['languages'])?$languageDatas['languages']:'-'; ?></td>
              <?php
			  break;
		  }
	  }
	  ?>
       <td><?php echo !empty($connectDatas['start_date_time'])?date('d/m/Y',$connectDatas['start_date_time']):'-'; ?></td>
       <td><?php echo !empty($connectDatas['end_date_time'])?date('d/m/Y',$connectDatas['end_date_time']):'-'; ?></td>
       <td><?php echo !empty($connectDatas['ammount'])?$connectDatas['ammount']:'-'; ?></td>
       <td><p class="connect-btn btn"><a href="connect.php?memberId=<?php echo $connectDatas['sp_id'];?>&search=findsp">Connect</a></p></td>
     
       
    </tr>
  <?php
  
	  }
  ?>  
     </tbody>
</table>
       <!--<div style="margin:20px 0px"><a class="navmenu btn-connect" href="#"><span><i class="fa fa-link"></i></span>Connect</a></div>-->
      </div>
    </div>
    </div>
  
  
  
  
</div>


<!-- jQuery Version 1.11.1 --> 
<script src="js/jquery.js"></script> 
<script src="js/connectMe.js"></script>
<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
 
}
else
{
	$passStr = 'You are not authorized.Redirecting....';
	$passImg = 'groupPhotos/img-3.jpg';
	header("location:well-come.php?passStr=$passStr&passImg=$passImg&redirect=index");
}
?>

