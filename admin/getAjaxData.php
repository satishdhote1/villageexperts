<?php
include("../config/connection.php");
include("../imageresize/smart_resize_image.function.php");
$conn=new connections();
$conn=$conn->connect();

$mainCategory = isset($_REQUEST['mainCategory'])?$_REQUEST['mainCategory']:'';
$tag = isset($_REQUEST['tag'])?$_REQUEST['tag']:'';
$result['success'] = 0;
$result['error']=1;
if($tag == "getSub")
{
	$sql="select * from 	".$mainCategory;	
	$tableResult = mysqli_query($conn, $sql);
	$specialData = array();
	
	if (mysqli_num_rows($tableResult) > 0)  
	{
		$i=0;
		while($row = mysqli_fetch_row($tableResult)) {
			$specialData[$i]["id"] = $row[0];
			$specialData[$i++]["val"] = $row[1];
			//echo $row[0];
		}
		$result['success'] = 1;
		$result['error']=0;
		$result['datas']=$specialData;
		
		echo json_encode($result);
	}
}


?>