<?php



//print_r($_POST);//die();



include("config/connection.php");



session_start();

/*if(isset($_SESSION['logged_user_id']) && !empty($_SESSION['logged_user_id']))
{*/

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

$conn=new connections();
$conn=$conn->connect();

$where = '';

if(isset($_REQUEST['SpecialisationIDS']) && !empty($_REQUEST['SpecialisationIDS']))
{

	$where.="sp_specialisation_id=".$_REQUEST['SpecialisationIDS'];

}

if(isset($_REQUEST['SubSpecialIDS']) && !empty($_REQUEST['SubSpecialIDS']))

{

	if(!empty($where))

	{

		$where.=" AND sp_sub_specialisation_id=".$_REQUEST['SubSpecialIDS'];

	}

	else

	$where.="sp_sub_specialisation_id=".$_REQUEST['SubSpecialIDS'];

}

if(isset($_REQUEST['DegreeIDS']) && !empty($_REQUEST['DegreeIDS']))

{

	if(!empty($where))

	{

		$where.=" AND degree >= ".$_REQUEST['DegreeIDS'];

	}

	else

	$where.="degree >= ".$_REQUEST['DegreeIDS'];

}

if(isset($_REQUEST['ExperienceIDS']) && !empty($_REQUEST['ExperienceIDS']))

{

	if(!empty($where))

	{

		$where.=" AND sp_year_of_experience >= ".$_REQUEST['ExperienceIDS'];

	}

	else

	$where.="sp_year_of_experience >= ".$_REQUEST['ExperienceIDS'];

}

if(isset($_REQUEST['rate']) && !empty($_REQUEST['rate']))

{

	

	if(!empty($where))

	{

		$where.=" AND sp_rate_type1 <= ".$_REQUEST['rate'];

	}

	else

	$where.="sp_rate_type1 <= ".$_REQUEST['rate'];

	

}

if(isset($_REQUEST['LanguageIDS']) && !empty($_REQUEST['LanguageIDS']))

{



	$temp = '';

	$LanguageIDS = explode(",",$_REQUEST['LanguageIDS']);$i=0;

	foreach($LanguageIDS as $key=>$val)

	{

		if($i==0)

		$temp = 'sp_language_id='.$val;

		else

		$temp.=' OR sp_language_id='.$val;



		$i++;

	}

	if(!empty($where))

	{

		$where.=" AND (".$temp.")";

	}

	else

	$where.=$temp;

}

else if(isset($_REQUEST['LanguageIDS']) && empty($_REQUEST['LanguageIDS']))

{

	if(!empty($where))

	{

		$where.=" AND sp_language_id in(".$_REQUEST['LanguageIDS'].")";

	}

	else

	$where.="sp_language_id in(".$_REQUEST['LanguageIDS'].")";

}

  $sql="select * from 	service_provider where ".$where;
  die($sql);
$tableResult = mysqli_query($conn, $sql);



			//print_r($tableResult);



				$result['success'] = 0;



				$result['error']=1;



				$specialData = array();



				



			if (mysqli_num_rows($tableResult) > 0)  



			{

				$result['success']=1;

				$result['error']=0;

				while($row = mysqli_fetch_assoc($tableResult)) {



							



							$specialData[] = $row;



						}

			}

			//print_r($specialData);die();



?>



<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="">

<meta name="author" content="">

<title>Village Expert</title>



<!-- Bootstrap Core CSS -->

<link rel="stylesheet" href="css/font-awesome.min.css">

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/mainstyle.css" rel="stylesheet">

 <link rel="stylesheet" href="css/demo.css">

    <link rel="stylesheet" href="css/jquery.flipster.css">

    <link rel="stylesheet" href="css/flipsternavtabs.css">

    <link href="css/custom.css?version=<?php echo(rand(10,100)); ?>" rel="stylesheet">

</head>

<style>

.over-lap {
	display: block;
/*	display: none !important */

}
.main_body_box_one{
    background: url(img/normal/Experts-1.jpg);
    background-size: cover;
    background-attachment: fixed;
}

</style>

<body class="bodybg">


<div class="loader-exp" style="display:none;"> 

<p><img src="images/ajax-loader.gif"></p>

</div>

<div class="container-fluid header-part" style="background-color: #ccccfe;">

  <div class="row">

    <div class="col-md-12 text-center">

      <div class="logo"> <img src="images/logo.png" alt="logo" > </div>

      <div class="over-lap">

        <div class="profile pull-left"> <img src="<?php echo (!empty($user_pic))?$user_pic:"img/img-3.jpg"; ?>" class="img-responsive"> </div>

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

          <div class=""><a href="logout.php" class="btn btn-info bg-blue logout">Logout</a></div>

        </div>

        <div class="clearfix"></div>

      </div>

    </div>

  </div>

</div>









<div class="main_body_box_one">

 <!-- <span class="service_request_text">SELECT EXPERT</span>-->

  <div class="slider_box">

  

  <div id="Main-Content">

	<div class="Container">

<!-- Flipster List -->	

		<div class="flipster">

		  <ul>

<?php
if(!empty($specialData))
{
foreach($specialData as $specialDatas)

{

?>

		  	<li>

		  		<a href="javascript:void(0);" class="Button Block">

		  			<div class="select_bg">

  <div class="select_first_box">

  <div class="select_left_box">

  <div class="select_image"><img src="<?php  echo $specialDatas['sp_image'] ?>" alt="image"></div>

  <span class="select_image_text"><?php  echo $specialDatas['sp_name'] ?></span>

  </div>

  <div class="select_right_box">

  <div class="select_right_mins_box">

  <div class="select_white_image"><img src="images/white_cercal_image.png" alt="image">

  <div class="white_image_text">$<?php  echo $specialDatas['sp_rate_type1'] ?></div>

  </div>

  

  <div class="select_white_right_image"><img src="images/white_cercal_image.png" alt="image">

  <div class="white_right_text">15 <br />

mins</div>

  </div>

  

  <div class="select_white_image"><img src="images/yo_cercal_icon.png" alt="image">

  <div class="yo_white_image_text">$<?php  echo $specialDatas['sp_rate_type2'] ?></div>

  </div>

  

  <div class="select_white_right_image"><img src="images/yo_cercal_icon.png" alt="image">

  <div class="yo_white_right_text">30 <br />

mins</div>

  </div>

  

  <div class="select_white_image"><img src="images/orange_cercal.png" alt="image">

  <div class="yo_white_image_text">$<?php  echo $specialDatas['sp_rate_type3'] ?></div>

  </div>

  

  <div class="select_white_right_image"><img src="images/orange_cercal.png" alt="image">

  <div class="yo_white_right_text">60 <br />

mins</div>

  </div>

  </div>

  </div>

  </div>

  

  <div class="select_bottom_box">

  <div class="left_attorny_box" >

  <div class="left_attorny_white_box_result">
  <table width="100%" border="1" bordercolordark="#666666" style="border-collapse: separate !important;;border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;">
  <tr>
  <td class="headingData">Specialization: </td>
  <td class="ContentData">
  <?php  echo getData($conn,"sp_specialisation",$specialDatas['sp_specialisation_id'],"specialisation","specialisation_id");?>
  </td>
  </tr>
   <tr>
    <td class="headingData">Sub Specialisation: </td>
  <td class="ContentData">
  <?php  echo getData($conn,"sp_sub_specialisation",$specialDatas['sp_sub_specialisation_id'],"sub_specialisation","sub_specialisation_id");?>
 </td>
  </tr>
   <tr>
   <td class="headingData">Institution: </td>
  <td class="ContentData">
  <?php  echo $specialDatas['SPyop']."-".$specialDatas['SPinstitute']; ?>
  </td>
  </tr>
   <tr>
    <td class="headingData">Language: </td>
  <td class="ContentData">
  <?php  echo getData($conn,"sp_language",$specialDatas['sp_language_id'],"languages","language_id"); ?>
  </td>
  </tr>
   <tr>
    <td class="headingData">Experience: </td>
  <td class="ContentData">
  <?php  echo getData($conn,"experience",$specialDatas['sp_year_of_experience'],"Experience","ExperienceID"); ?>
  </td>
  </tr>
   </table>
  </div>

  <!--<div class="star_box">&nbsp;</div>-->
 
  </div>
<div class="star_box"><button class="select_expart_button" for="<?php echo $specialDatas['sp_id'];  ?>" dir="<?php echo $specialDatas['sp_email'];  ?>">Connect</button></div>

  <!--<div class="certifite_right_box">

  <div class="cerficets_image"><img src="images/certificets.jpg" alt="image"></div>

 

  </div>-->

  </div>

  </div>

		  		</a>

		  	</li>

	  		<?php



}
}
else{
	$source = isset($_REQUEST['source']) && ($_REQUEST['source']=="newProvider" || $_REQUEST['source'] == "searchProvider")?$_REQUEST['source'].".php":"index.php";
	echo "<center><h3 style='color:red'>Sorry - No Experts matching your following Criteria were found in our Database.</h3></center>";
	header("Refresh:2; url=".$source);
}

?>

		  </ul>

		</div>

<!-- End Flipster List -->



	</div>

</div>

 <div class="alert alert-success connSuccess" style="display:none">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Connected ! </strongleft_attorny_white_box><?php echo $user_name; ?> successfully Connected to <span><?php echo $specialDatas['sp_name']; ?></span>.
  Redirecting...
</div> 

  

  

  

  

  

  </div>

  

  <hr />

<!--  <div class="copy_text">Copyrights 2015.  All Rights Reserved</div>
-->
  </div>





<!-- jQuery Version 1.11.1 --> 

<script src="js/jquery.js"></script> 



<!-- Bootstrap Core JavaScript --> 

<script src="js/bootstrap.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/connectMe.js"></script>
  <script src="js/jquery.flipster.js"></script>

<script>





	$(function(){ $(".flipster").flipster({ style: 'carousel', start: 0 }); });
	
	$(document).on("click",".select_expart_button",function(){
			
			$(".connSuccess").css("display","block");
			//$("html, body").animate({ scrollTop: $(".connSuccess").scrollTop() }, 1000);//scroll to top
			var memberId =  $(this).attr("for"); 
			var email =  $(this).attr("dir"); 
			$('html,body').animate({ scrollTop: 9999 }, 1000);
			 setTimeout(function(){
			 location.href="connect.php?memberId="+memberId+"&search=findsp";
			}, 1000);

		});




</script>

</body>

</html>

<?php
/*}
else
{
	$passStr = 'You are not authorized.Redirecting....';
	$passImg = 'groupPhotos/img-3.jpg';
	header("location:well-come.php?passStr=$passStr&passImg=$passImg&redirect=index");
}
*/
function getData($conn,$tableName,$id,$selectField,$whereField)
{
	 $sql="SELECT $selectField FROM $tableName where $whereField = $id";

					$result = mysqli_query($conn, $sql);

	

					if (mysqli_num_rows($result) > 0)  

					{

						$row = mysqli_fetch_assoc($result); 
							//$launguages = mysqli_fetch_assoc($result);
							
							$data = $row[$selectField];

					}
					
					return $data;
}







?>
