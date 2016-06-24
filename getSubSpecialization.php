<?php
include("config/connection.php");
$conn=new connections();
$conn=$conn->connect();

$SpecializationId = isset($_REQUEST['id'])?$_REQUEST['id'] :0;
//echo $SpecializationId;


$sql3="SELECT * FROM sp_sub_specialisation where specialisation_id = ".$SpecializationId." order by 	sub_specialisation";
					$result3 = mysqli_query($conn, $sql3);
	
					if (mysqli_num_rows($result3) > 0)  
					{
						while($row = mysqli_fetch_assoc($result3)) {
							//$launguages = mysqli_fetch_assoc($result);
							$subSpecialisation[] = $row;
						}
						$data['success']=1;
						$data['error']=0;
						 $data['result']=$subSpecialisation;
						 echo json_encode($data);
					}
					else 
					{
						if(!empty($get))
						{
						$data['success']=0;
						$data['error']=1;
						 echo json_encode($data);
						}
					}


?>