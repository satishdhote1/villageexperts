<?php
include("config/connection.php");

$conn=new connections();
$conn=$conn->connect();
$dbname = "b7_15994620_crm";

$sql="SHOW TABLES FROM $dbname";
				$tableResult = mysqli_query($conn, $sql);
				$specialData = array();
				if (mysqli_num_rows($tableResult) > 0)  
				{
					while($row = mysqli_fetch_assoc($tableResult)) {
						$specialData[] = $row;
						
					}
				}
//print_r($specialData);die();




if(isset($_REQUEST['DeleteTables']))
{
	$selectTable = isset($_REQUEST['selectTable'])?$_REQUEST['selectTable']:'';
	//$sql="TRUNCATE TABLE ".$selectTable;
	$sql="delete from friendsRegister where id not in(99,101,102) ";
	//echo $sql;die();
	$tableResult = mysqli_query($conn, $sql);
	$sqlFriendsExpertInfo="delete from friendsExpertInfo where userid not in(99,101,102) ";
	$tableResult2 = mysqli_query($conn, $sqlFriendsExpertInfo);

	$specialData = array();
	if (mysqli_num_rows($tableResult) > 0)  
	{
		echo "<br>Sorry, there was an error during Truncating table data.<br/>";
		//header("location:delete.php?error=".$error);
	}
	else 
	{
		echo  "<br>Truncated Sucessfully";
		//header("location:delete.php?error=".$error);
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
<title>Village Expert</title>

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
<label>Select Table Name :</label>
<select name="selectTable" class="selectTable"> 
<option value="">Select</option>
<?php
foreach($specialData as $specialDatas)
{
?>
<option value="<?php echo $specialDatas['Tables_in_b7_15994620_crm']  ?>"><?php echo $specialDatas['Tables_in_b7_15994620_crm']  ?></option>
<?php
}
?>
</select>
<br>

<input type="submit" name="DeleteTables" value="Delete" />
</form>
</div>

</div>
</section>
<!-- jQuery Version 1.11.1 --> 
<script src="../js/jquery.js"></script> 

<script src="../js/bootstrap.min.js"></script>


<!--<script src="js/search.js"></script>-->
</body>
</html>