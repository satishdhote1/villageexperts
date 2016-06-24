<?php
include("config/connection.php");
session_start();
$conn=new connections();
$conn=$conn->connect();

/* print_r($_REQUEST);
 echo "<br>";
 print_r($_FILES);
 die();
 */
$tag = isset($_REQUEST['tag'])?$_REQUEST['tag']:'';
 $result['success'] = 0;
   $result['error'] = 1;
	if($tag == 'fetchmembers')
	{
		
		$gmID = isset($_REQUEST['gmID'])?$_REQUEST['gmID']:0;
		//die();
		if($gmID >0)
		{
			//$result['dataL'] = array();
		   $sqlL="SELECT * FROM group_member where gm_group_id =".$gmID." AND gm_logged_in ='Y' order by group_member.gm_name";
		  // die($sqlL);
					$results = mysqli_query($conn, $sqlL);
					$groupMembersdetails = array();
					if (mysqli_num_rows($results) > 0)  
					{
						while($row = mysqli_fetch_assoc($results)) {
							//$launguages = mysqli_fetch_assoc($result);
							$groupMembersdetails[] = $row;
							
						}
						//print_r($groupMembersdetails);
						//die();
						$result['dataL'] = $groupMembersdetails;
	   					//echo json_encode($result);
						$result['success'] = 1;
  					$result['error'] = 0;
					}
					
			 $sqlNL="SELECT * FROM group_member where gm_group_id =".$gmID." AND gm_logged_in ='N' order by group_member.gm_name";
					$resultNL = mysqli_query($conn, $sqlNL);
					$groupMembersNLdetails = array();
					if (mysqli_num_rows($resultNL) > 0)  
					{
						while($row = mysqli_fetch_assoc($resultNL)) {
							//$launguages = mysqli_fetch_assoc($result);
							$groupMembersNLdetails[] = $row;
						}
						$result['success'] = 1;
  					$result['error'] = 0;
						$result['dataNL'] = $groupMembersNLdetails;
	   					
					}
					
					echo json_encode($result);
					
		}
		else
		{
			$result['msg'] = "Provide Valid Group Member Id.";
	   		echo json_encode($result);
			
		}
	}
	 else
   {
	   $result['msg'] = "Tag Not  Provided";
	   echo json_encode($result);
	   
   }

?>