<?php 
include("config/connection.php");
session_start();

if(isset($_SESSION['logged_user_id']) && !empty($_SESSION['logged_user_id']))
{
	$user_id = $_SESSION['logged_user_id'];
	$user_name  = $_SESSION['logged_user_name'];
	$user_pic = $_SESSION['logged_user_image'];
	$user_type = $_SESSION['logged_role_code'];
	$email = $_SESSION['logged_user_email'];

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
	else{
		$imagePath = "/";
	}

	$rightPanelShow = isset($_REQUEST['success'])?$_REQUEST['success']:'';
	$conn=new connections();
	$conn=$conn->connect();

	if($user_type == 'GM')
	{ 		
			$groupIDS =0;
			$sqlSelect="SELECT group_ids FROM group_member WHERE gm_id = ".$user_id;
			$resultss = mysqli_query($conn, $sqlSelect);
			if (mysqli_num_rows($resultss) > 0)  
		    {
				$row = mysqli_fetch_assoc($resultss);
				$groupIDS = $row['group_ids'];
			}
		
		 $groups_idss = $_SESSION['logged_user_groups'];
		 $sql="SELECT * FROM groups WHERE created_by_id = ".$user_id." OR group_id IN (".$groupIDS.") ORDER BY groups.group_name";
		$result = mysqli_query($conn, $sql);
		$groupsList = array();
		if (mysqli_num_rows($result) > 0)  
		{
			$GROUPSIDS = '';
			while($row = mysqli_fetch_assoc($result)) {
				//$launguages = mysqli_fetch_assoc($result);
				$groupsList[] = $row;
			}
			
			//print_r($groupsList);die();
		}
	}
	else
	{
		$sql="SELECT * FROM groups where  created_by_id = ".$user_id." AND created_by_user_role = '".$user_type."' order by groups.group_name";
		$result = mysqli_query($conn, $sql);
		$groupsList = array();
		if (mysqli_num_rows($result) > 0)  
		{
			while($row = mysqli_fetch_assoc($result)) {
				//$launguages = mysqli_fetch_assoc($result);
				$groupsList[] = $row;
			}
			 echo "<br><pre>";
			 print_r($groupsList);
			 echo "</pre><br>";
			
		}
	}

	$tag = isset($_REQUEST['tag'])? $_REQUEST['tag'] : '';
	$getGM_id = isset($_REQUEST['gmID'])? $_REQUEST['gmID'] : 0;
	$getgroupName = isset($_REQUEST['groupName'])? $_REQUEST['groupName'] : '';
	$groupMembersdetails = array();
	$onlneMembers = 0;
	$offlineMembers = 0;
	$existingMemberslist = array();
	
	if($tag == 'fetchmembers')
	{
		$gmID = isset($_REQUEST['gmID'])?$_REQUEST['gmID']:0;
		if($gmID >0)
		{
			
			if($user_type == 'GM')
			{
				$sqlFetchMembers="SELECT * FROM group_member where FIND_IN_SET(".$gmID.", `group_ids`) OR gm_group_id = ".$getGM_id." AND status='Y' order by group_member.gm_name";
				$resultData = mysqli_query($conn, $sqlFetchMembers);
				$onlyGroupMemberIds = array();
				if (mysqli_num_rows($resultData) > 0)  
				{
					while($row = mysqli_fetch_assoc($resultData)) {
						//$launguages = mysqli_fetch_assoc($result);
						if($row['gm_logged_in'] == 'Y' && $user_id!=$row['gm_id'])
						$onlneMembers = 1;
						else if($row['gm_logged_in'] == 'N')
						$offlineMembers = 1;
						$groupMembersdetails[] = $row;
						$onlyGroupMemberIds[] = $row['gm_id'];
					}
					//print_r($onlyGroupMemberIds);
					//die();
					//$MembersDetais = $groupMembersdetails;
				}
				//echo "<pre>";print_r($groupMembersdetails);echo "</pre>";die();
		  		$onlyGroupMemberIdsString = implode(",",$onlyGroupMemberIds);
		 
		 		// $onlyGroupMemberIdsString = empty($onlyGroupMemberIdsString)?"":$onlyGroupMemberIdsString;
				//************Listing of existing Members except this group**********************************
				if(empty($onlyGroupMemberIdsString))
				{
					$sqlFetchMembers2="SELECT * FROM group_member where gm_id NOT IN ( '".$onlyGroupMemberIdsString."' )  AND status='Y' order by group_member.gm_name";
				}
				else{
					$sqlFetchMembers2="SELECT * FROM group_member where gm_id NOT IN ( ".$onlyGroupMemberIdsString.")  AND status='Y' order by group_member.gm_name";
			 	}
				$resultData2 = mysqli_query($conn, $sqlFetchMembers2);
						
				if (mysqli_num_rows($resultData2) > 0)  
				{
					while($row = mysqli_fetch_assoc($resultData2)) {
						$existingMemberslist[] = $row;
					}
					/*print_r($existingMemberslist);
					die("test");*/
					//$MembersDetais = $groupMembersdetails;
				}
			
			}
			else
			{
				$sqlFetchMembers="SELECT * FROM group_member where gm_group_id =".$gmID." AND status='Y' order by group_member.gm_name";
				$resultData = mysqli_query($conn, $sqlFetchMembers);
					
				if (mysqli_num_rows($resultData) > 0)  
				{
					while($row = mysqli_fetch_assoc($resultData)) {
						//$launguages = mysqli_fetch_assoc($result);
						if($row['gm_logged_in'] == 'Y' && $user_id!=$row['gm_id'])
						{
						$onlneMembers = 1;
						//echo $user_id."---".$row['gm_id'];die();
						}
						else if($row['gm_logged_in'] == 'N')
						$offlineMembers = 1;
						$groupMembersdetails[] = $row;
						
					}
					//print_r($groupMembersdetails);
					//die();
					//$MembersDetais = $groupMembersdetails;
				}
			//echo "<pre>";print_r($groupMembersdetails);echo "</pre>";die();
			
		   }
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
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/mainstyle.css" rel="stylesheet">
</head>
<style>
.over-lap {
	display: block !important
}
</style>
<body class="bodybg">
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
          <div class=""><a href="logout.php" class="btn btn-info bg-blue logout">Logout</a></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<div class="container">

<div class="row">
   <div class="col-md-4">
  
   <div class="newGroupButton"><a class="navmenu btn-add-group" href="add-new-group.php"><span><i class="fa fa-plus"></i></span>Add New Group </a></div>
   
    </div>
   
   <div class="col-md-4">
   <?php 
   if($getGM_id > 0){ ?>
    <div class="newGMbutton btn-modify-member pull-left" id=""><a class="navmenu btn-add-group member-btn-color" href="add-new-member.php?gmID=<?php echo $getGM_id;  ?>&groupName=<?php echo $getgroupName;  ?>"><span><i class="fa fa-plus"></i>
    </span>New Member</a></div>
    
   
    
    <div class="dropdown pull-right">
    <button class="btn-add-drop-down dropdown-toggle" type="button" data-toggle="dropdown" href="">
    Existing Member <span class="caret"></span></button>
  <ul class="dropdown-menu dropdown-menu-modify">
  <?php foreach($existingMemberslist as $eml){ ?>
    <li><a href="add-new-member-save.php?gmID=<?php echo $getGM_id;?>&tag=existing&memberId=<?php echo $eml['gm_id']; ?>&groupName=<?php  echo $getgroupName?>"><?php  echo $eml['gm_name']; ?></a></li>
    <?php  } ?>
  </ul>
  </div>
      <?php   } ?>

   <div class="clearfix"></div>
   
   </div>
   <div class="col-md-4">
   <div class="connectMember" dir="" style="display:none"><a class="navmenu btn-connect" href="javascript:void(0);"><span><i class="fa fa-link"></i></span>Connect</a></div>
    </div>
   </div>
  <div class="row">
    <div class="col-md-4 text-center">
      <div class="grop-part membersPanel">
<h2 class="my-group">
<?php
if($user_type == 'GM'){
  echo "My Groups";
}
else
{
echo "Friends & Family";	
}

?>
</h2>
 <ul class="list-group list-group-modify">
 <?php
 		if(count($groupsList)==0)
		{
			?>
            <br><br><center><li class="list-group-item mygroupsList " id="" dir="" style="font-size:18px; font-weight:bold">No Groups exist for <?php echo $user_name;  ?>.</li></center>
            
            <?php	
		}
		else
		{
 		foreach($groupsList as $groupsLists)
		{
 			$groupName = $groupsLists['group_name'];
			$img = !empty($groupsLists['image'])?$groupsLists['image']:"img-3.jpg";
			$gm_id = $groupsLists['group_id'];
			$gm_desc = $groupsLists['description'];
			$created_by_id = $groupsLists['created_by_id'];
			$created_by_user_role = $groupsLists['created_by_user_role'];
 ?>
        <li class="list-group-item mygroupsList <?php echo ($gm_id == $getGM_id)?'active':'';?>" id="<?php  echo $gm_id; ?>" dir="<?php echo $groupName; ?>"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?gmID=<?php echo $gm_id;  ?>&groupName=<?php echo $groupName;  ?>&tag=fetchmembers&created_by_id=<?php echo $created_by_id;  ?>&created_by_user_role=<?php echo $created_by_user_role;  ?>" title="<?php echo $gm_desc;  ?>"><span class="profile-img"><img src="images/groupPhotos/<?php echo $img; ?>"></span><?php echo $groupName;  ?></a></li>
       
        <?php
		      }
		}
			  
		?>
  </ul>

</div>
   </div>   
   <?php //if($user_type != 'GM'){ ?>
   <!-- ONLINE GROUP MEMBERS LISTS-->
  
    <div class="col-md-4 text-center">
    
      <div class="grop-part rightGMpanelOnline">
       <?php
   		if($onlneMembers == 1)
		{
			$groupName = isset($_REQUEST['groupName'])? $_REQUEST['groupName'] : '';
		?>
        <h2 class="my-group-members membersPanelTitle"><?php echo $groupName; ?> Members</h2>
        <div class="padding-right0">
		<?php   
			if(!empty($rightPanelShow) && $rightPanelShow == 1)
			{
			?>
			<input type="hidden" class="rightPanelShow" name="rightPanelShow" value="1" id = <?php  echo $_REQUEST['id'] ;?>>
			<?php }  
			?>
          <p class="on-line-member">Online <span class="active-id"><i class="fa fa-circle  red-circel" aria-hidden="true"></i> </span></p>
          <ul class="list-group member-group-modify onlineMembers">
          <?php
		  			foreach($groupMembersdetails as $groupsLists)
					{
						$gm_id = $groupsLists['gm_id'];
						if($groupsLists['gm_logged_in'] == 'Y' && $user_id != $gm_id)
						{
						$groupName = $groupsLists['gm_name'];
						$img = !empty($groupsLists['gm_image'])?$groupsLists['gm_image']:"img-3.jpg";
						
		  				
		  ?>
            <li class="list-group-item onlineMembersLI" id="<?php echo $gm_id;  ?>" dir="<?php  echo $groupName; ?>"><a href="javascript:void(0);"><span class="profile-img-mmbr"><img src="images/memberPhotos/<?php echo $img; ?>"></span><?php  echo $groupName; ?></a></li>
            <?php
						}
					}
			?>
          </ul>
        </div>
        <?php
		}
		?>
      </div>
      
     </div>
     
    
   	
    <!-- //ONLINE GROUP MEMBERS LISTS-->
    
     
    <div class="col-md-4 text-center">
    <!-- OFFLINE GROUP MEMBERS LISTS-->
    
      <div class="grop-part rightGMpanelOffline" >
       <?php
	   
   		if($offlineMembers == 1)
		{
			$groupName = isset($_REQUEST['groupName'])? $_REQUEST['groupName'] : '';
		?>
        <h2 class="my-group-members"><?php echo $groupName; ?> Members</h2>
        <div class="padding-left0 opacity-half">
          <p class="on-line-member">Offline <span class="active-id"><i class="fa fa-circle" aria-hidden="true"></i> </span></p>
          <ul class="list-group member-group-modify offlineMembers">
          
           <?php
		   			
		  			foreach($groupMembersdetails as $groupsLists)
					{
						if($groupsLists['gm_logged_in'] == 'N')
						{
						$groupName = $groupsLists['gm_name'];
						$img = !empty($groupsLists['gm_image'])?$groupsLists['gm_image']:"img-3.jpg";
						$gm_id = $groupsLists['gm_id'];
		  
		  ?>
            <li class="list-group-item offlineMembersLI" id="<?php echo $gm_id;  ?>"><a href="javascript:void(0);"><span class="profile-img-mmbr"><img src="images/memberPhotos/<?php echo $img; ?>"></span><?php  echo $groupName; ?></a></li>
           <?php
					    }
				     }
			?>
          </ul>
        </div>
         <?php
		  }
		 ?>
      </div>
     
      
      <!-- //OFFLINE GROUP MEMBERS LISTS-->
    </div>
   <?php //}
   /*else
   {
   if(isset($_GET['created_by_id']) && !empty($_GET['created_by_id'])){
	   
	   if(isset($_GET['created_by_user_role']) && !empty($_GET['created_by_user_role']))
	   {
	   $tableName = ($_GET['created_by_user_role'] == 'SP')?'service_provider':'service_requestor';
	   $idField = ($_GET['created_by_user_role'] == 'SP')?'sp_id':'sr_id';
	   $imageField = ($_GET['created_by_user_role'] == 'SP')?'sp_image':'sr_image';
	   $nameField = ($_GET['created_by_user_role'] == 'SP')?'sp_name':'sr_name';
	   $sqlFetchPrimaryMembers="SELECT * FROM $tableName where $idField =".$_GET['created_by_id'];
	    $resultData = mysqli_query($conn, $sqlFetchPrimaryMembers);
									
									if (mysqli_num_rows($resultData) > 0)  
									{
										$row = mysqli_fetch_assoc($resultData) ;
									
											$imgSuper = $row[$imageField];
											$NameSuper = $row[$nameField];
										
										//print_r($groupMembersdetails);
										//die();
										//$MembersDetais = $groupMembersdetails;
									}
	   
	   
    ?>
    
    <div class="col-md-4 text-center">
      <div class="grop-part membersPanel">
		<h2 class="my-primaryGroup">Offline Members</h2>
		 <ul class="list-group list-group-modify">
           <li class="list-group-item mygroupsList active"><a href="javascript:void(0);" title=""><span class="profile-img">			            <img src="images/<?php echo $_GET['created_by_user_role']."_Photos" ?>/<?php echo $imgSuper; ?>"></span><?php echo $NameSuper;  ?></a></li>
          </ul>
        </div>
        </div>
	<?php } 
   		}
   	  }*/
	?>
   </div><!--end of Row-->
  
   
   
   </div>
  
   <div class="alert alert-success connSuccess" style="display:none">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Connected ! </strong><?php echo $user_name; ?> successfully Connected to <span></span>.
  Redirecting...
</div>


</div><!--end of container-->
</div>
<!-- jQuery Version 1.11.1 --> 
<script src="js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script>
<script src="js/myGroups.js"></script>
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
