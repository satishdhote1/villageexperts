<?php

include("config/connection.php");
session_start();
$conn=new connections();
$conn=$conn->connect();
$user_id  = isset($_SESSION['logged_user_id'])?$_SESSION['logged_user_id']:'';
$tableResult = array();
$result = array();
$sql="select connect_id,sr_id,max(start_date_time) as start_time from connect where sp_id = 36 and end_date_time='' and busy != 1 and start_date_time IS NOT NULL" ;
//echo '{"sql":'.$sql.'}';exit();
		$tableResult = mysqli_query($conn, $sql);
		$row=array();
		$result['success']=0;
		$result['error']=1;
					//echo json_encode($result);exit();

		if (mysqli_num_rows($tableResult) > 0)  
		{
			$row = mysqli_fetch_assoc($tableResult);
			if($row !=NULL)
			{
				$result['total_hour_spend'] = round((strtotime("now") - $row['start_time'])/3600, 1);
				if(round((strtotime("now") - $row['start_time'])/3600, 1) < 2)
				{
				$result['success']=1;
				$result['error']=0;
				$result['data']=$row;	
				}else
				{
				   $result['msg']="Time Expired";
				   $result['success']=0;
				   $result['error']=1;	
				}
			}
			echo json_encode($result);
		}
		else
		{
			$result['msg'] = "Nobody to connect!";	
			echo json_encode($result);
		}

?>
<?php
/*
for( $i=0;$i<10;$i++)
{
	echo strtotime("now")."<br>";
	usleep(1000000);

}
*/
?>
