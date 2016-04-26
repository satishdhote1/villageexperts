<?php
	session_start();
require('config.php');

  
		  if (isset($_GET['srid'])){
			$srid=$_GET['srid'];
		  }
		  
 $qSearch=mysqli_query($bd, "SELECT * FROM last_query WHERE SRID='$srid' ORDER BY id DESC");
 
 if($mSearch=mysqli_fetch_assoc($qSearch)) {
$Profession=$mSearch['Profession'];
$Specialisation=$mSearch['Specialisation'];
$YearsOfExperience=$mSearch['YearsOfExperience'];
$Languages=$mSearch['Languages'];


$sql="SELECT * FROM service_provider WHERE Profession LIKE '%{$Profession}%'";//Query stub

if($Specialisation!=""){
  $sql .=" AND (";
	$clause="";
	$values = explode(",", $Specialisation);
        foreach($values as $c){
            if(!empty($c)){
                $sql .= $clause."Specialisation LIKE '%{$c}%'";
                $clause = " OR ";//Change  to OR after 1st WHERE
            }   
        }
  $sql .=")";
    }
	
	
	

if($YearsOfExperience!=""){
  $sql .=" AND (";
	$clause="";
	$values = explode(",", $YearsOfExperience);
        foreach($values as $c){
            if(!empty($c)){
                $sql .= $clause."YearsOfExperience LIKE '%{$c}%'";
                $clause = " OR ";//Change  to OR after 1st WHERE
            }   
        }
  $sql .=")";
    }
	
	
	
	

if($Languages!=""){
  $sql .=" AND (";
	$clause="";
	$values = explode(",", $Languages);
        foreach($values as $c){
            if(!empty($c)){
                $sql .= $clause."Languages LIKE '%{$c}%'";
                $clause = " OR ";//Change  to OR after 1st WHERE
            }   
        }
  $sql .=")";
    }
	
	
	
	
	
 $qrySearch=mysqli_query($bd, $sql);

  $i=0;
	while($memSearch=mysqli_fetch_assoc($qrySearch)) {
	  ?>
      
      <?php  	  
  $spID=$memSearch['SPID'];
	$qryStatus=mysqli_query($bd, "SELECT * FROM status WHERE SPID='$spID'");
	if($memStatus=mysqli_fetch_assoc($qryStatus)) {
		$timenow=date('ymdhis');
		$timenow=$timenow-90;
		//echo $timenow." - ".$memStatus['lastActivity'];
		if ($memStatus['lastActivity']>$timenow) {
		$i=$i+1;
		
		  	echo "Service provider matches your last searched criteria is online now.<a href='cnctcom.php?spid=".$spID."' srid='".$srid."'>Connect Now</a>";
         
		}
	}
		?>
            
	<?php
	}
	
	
 }
	?>
		  