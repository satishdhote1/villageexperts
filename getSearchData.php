<?php

include("config/connection.php");

session_start();

$conn=new connections();

$conn=$conn->connect();



$getDataOf = isset($_REQUEST['getDataOf'])?$_REQUEST['getDataOf']:'';

	if($getDataOf == 'Special')

	{

		

		$sql="select * from 	sp_specialisation order by specialisation";

  

			$tableResult = mysqli_query($conn, $sql);

			//print_r($tableResult);

				$result['success'] = 0;

				$result['error']=1;

				$specialData = array();

				

			if (mysqli_num_rows($tableResult) > 0)  

			{

				while($row = mysqli_fetch_assoc($tableResult)) {

							

							$specialData[] = $row;

						}

						$result['success'] = 1;

						$result['error']=0;

						$result['datas']=$specialData;

						echo json_encode($result);

			}

			else

			{

				echo json_encode($result);

			}

	}

	else if($getDataOf == 'subSpecial')

	{

		$id = isset($_REQUEST['id'])?$_REQUEST['id']:'';

		

		$sql="select * from 	sp_sub_specialisation where specialisation_id = ".$id." order by sub_specialisation";

  

			$tableResult = mysqli_query($conn, $sql);

			//print_r($tableResult);

				$result['success'] = 0;

				$result['error']=1;

				$subSpecialData = array();

				

			if (mysqli_num_rows($tableResult) > 0)  

			{

				while($row = mysqli_fetch_assoc($tableResult)) {

							

							$subSpecialData[] = $row;

						}

						$result['success'] = 1;

						$result['error']=0;

						$result['datas']=$subSpecialData;

						echo json_encode($result);

			}

			else

			{

				echo json_encode($result);

			}

		

	}

else if($getDataOf == 'experience')

	{

		

		$sql="select * from 	experience ORDER BY ExperienceID";

  

			$tableResult = mysqli_query($conn, $sql);

			//print_r($tableResult);

				$result['success'] = 0;

				$result['error']=1;

				$subSpecialData = array();

				

			if (mysqli_num_rows($tableResult) > 0)  

			{

				while($row = mysqli_fetch_assoc($tableResult)) {

							

							$subSpecialData[] = $row;

						}

						$result['success'] = 1;

						$result['error']=0;

						$result['datas']=$subSpecialData;

						echo json_encode($result);

			}

			else

			{

				echo json_encode($result);

			}

		

	}

	else if($getDataOf == 'degree')

	{

		

		$sql="select * from 	education ORDER BY EducationID";

  

			$tableResult = mysqli_query($conn, $sql);

			//print_r($tableResult);

				$result['success'] = 0;

				$result['error']=1;

				$subSpecialData = array();

				

			if (mysqli_num_rows($tableResult) > 0)  

			{

				while($row = mysqli_fetch_assoc($tableResult)) {

							

							$subSpecialData[] = $row;

						}

						$result['success'] = 1;

						$result['error']=0;

						$result['datas']=$subSpecialData;

						echo json_encode($result);

			}

			else

			{

				echo json_encode($result);

			}

		

	}

	
	else if($getDataOf == 'language')

	{

		

		$sql="select * from 	sp_language ORDER BY languages";

  

			$tableResult = mysqli_query($conn, $sql);

			//print_r($tableResult);

				$result['success'] = 0;

				$result['error']=1;

				$subSpecialData = array();

				

			if (mysqli_num_rows($tableResult) > 0)  

			{

				while($row = mysqli_fetch_assoc($tableResult)) {

							

							$subSpecialData[] = $row;

						}

						$result['success'] = 1;

						$result['error']=0;

						$result['datas']=$subSpecialData;

						echo json_encode($result);

			}

			else

			{

				echo json_encode($result);

			}

		

	}



?>