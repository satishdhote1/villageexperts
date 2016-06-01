<?php
	session_start();
require('config.php');
if(isset($_SESSION['SESS_ID'])) {
	$SPID=$_SESSION['SESS_ID'];
	$qryProfile=mysqli_query($bd, "SELECT * FROM service_provider WHERE SPID='$SPID'");
	if($memProfile=mysqli_fetch_assoc($qryProfile)) {
		$fname=$memProfile['First_Name'];
		$lname=$memProfile['Last_Name'];
	}
}
if(isset($_SESSION['SESS_SR_ID'])) {
	$SRID=$_SESSION['SESS_SR_ID'];
	$qryProfile=mysqli_query($bd, "SELECT * FROM service_requester WHERE SRID='$SRID'");
	if($memProfile=mysqli_fetch_assoc($qryProfile)) {
		$sremail=$memProfile['email'];
    $srfname=$memProfile['First_Name'];
    $srlname=$memProfile['Last_Name'];
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Search Result</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/jquery.flipster.css">
    <link rel="stylesheet" href="css/flipsternavtabs.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  <div id="header">
    <div class="container">
      <a href="#"><div id="logo"><img src="images/logo.jpg" alt="logo"></div></a>
      <?php
      if(isset($_SESSION['SESS_ID'])) {
    	?>
        <div class="main_image_box">
          <div class="main_image">
            <img src="profile_images/no-profile-img-male.gif" alt="image">
          </div>
          <span class="main_image_name_text"><a href="service_provider_page.php"><?php echo $fname." ".$lname;?></a> | <a href="logout.php">Log out</a></span>
        </div>
        <?php
      }
      elseif(isset($_SESSION['SESS_SR_ID'])){
    	?>
        <div class="main_image_box">
          <div class="main_image">
            <img src="profile_images/no-profile-img-male.gif" alt="image">
          </div>
          <span class="main_image_name_text"><a href="service_requestor_profile_page.php"><?php echo $srfname." ".$srlname;?></a> | <a href="logout.php">Log out</a></span>
        </div>
      <?php
      }
      else {
      ?>
        
        <div class="right_header">
        <span class="service_text" style="text-align:center; font-size:16px;">Login</span>
        <div class="button_box">
        <a href="service_provider_login.php"><div class="sign_up_button">Service Provider</div></a>
        <a href="service_requestor_login.php"><div class="log_in_button">Service Requestor</div></a>
        </div>
        </div>
        <div class="right_one_header" style="">
        <!--<div onClick="show_login();" onMouseOver="show_login();" onMouseOut="hide_login();"><span class="service_text">Service Provider Login</span>-->
        <!--Demo-->
        <div class="right_header">
        <span class="service_text" style="text-align:center; font-size:16px;">Register</span>
        <div class="button_box">
        <a href="service_provider_page.php"><div class="sign_up_button">Service Provider</div></a>
        <a href="service_requestor_profile_page.php"><div class="log_in_button">Service Requestor</div></a>
        </div>
        </div>
        <!--//Demo-->
        
        <div class="expart_log_in_bg" id="sp_login_form" style="">
        <form action="sp_login.php" method="post">
        <div class="user_box">
        <span class="user_text">Email</span>
        <div class="user_fild_box"><input name="email" class="user_fild_box_main" type="email" required></div>
        </div>
        <div class="user_box">
        <span class="user_text">Password</span>
        <div class="user_fild_box"><input name="pwd" class="user_fild_box_main" type="password" required></div>
        </div>  
        <input type="submit" class="sign_up_button" value="Log In">
        </form>
        <a href="service_provider_page.php"><div class="sign_up_button">Register</div></a>
        </div>
        </div>
        <script>
        function show_login(){
      	 
      		  document.getElementById("sp_login_form").style.display="block";
      	  
        }
        function hide_login(){
      	 
      		  document.getElementById("sp_login_form").style.display="none";
      	  
        }
        </script>
        </div>
        <?php
      }
      ?>
    </div>
    <div class="search_main_main_box">
    <div class="main_body_box_one">
      <span class="service_request_text">Choose Your Expert</span>
      <?php  
		  if (isset($_GET['q'])){
  			$q=$_GET['q'];
  			$expertise=$_GET['expertise'];
		  }
      if(empty($q)){
        $sql="SELECT * FROM service_provider WHERE Profession LIKE '%{$expertise}%'";//Query stub
      }
      else {
        $sql= "SELECT *
        FROM service_provider sp
        LEFT JOIN language l
          on sp.Languages = l.LanguageID
        LEFT JOIN professions p
          on sp.Profession = p.ProfessionID
        LEFT JOIN specialisation s 
          on sp.Specialisation = s.SpecialisationID  
        LEFT JOIN educationlevel dl 
          on sp.DegreeLevel = dl.LevelofEducationID   
        LEFT JOIN degree d 
          on sp.Degree = d.DegreeID   
        LEFT JOIN experience e 
          on sp.YearsOfExperience = e.YearsOfExperienceID 
          WHERE (sp.First_Name LIKE '%{$q}%'
          OR sp.Last_Name LIKE '%{$q}%'
          OR sp.Address LIKE '%{$q}%'
          OR sp.City LIKE '%{$q}%'
          OR sp.State LIKE '%{$q}%'
          OR sp.Zip LIKE '%{$q}%'
          OR sp.Phone1 LIKE '%{$q}%'
          OR sp.Phone2 LIKE '%{$q}%'
          OR sp.email LIKE '%{$q}%'
          OR sp.TimeZone LIKE '%{$q}%'
          OR l.Languages LIKE '%{$q}%'
          OR p.Professions LIKE '%{$q}%'
          OR s.Specialisation LIKE '%{$q}%'
          OR dl.LevelofEducation LIKE '%{$q}%'
          OR d.Degrees LIKE '%{$q}%'
          OR e.YearsOfExperience LIKE '%{$q}%')
          AND  Profession LIKE '%{$expertise}%'
          ";
      }
      if(isset($_GET['spelization'])){
        $sql .=" AND (";
        $clause="";
        foreach($_GET['spelization'] as $c){
          if(!empty($c)){
            $sql .= $clause."Specialisation LIKE '%{$c}%'";
            $clause = " OR ";//Change  to OR after 1st WHERE
          }   
        }
        $sql .=")";
      }

      if(isset($_GET['language'])){
        $sql .=" AND (";
        $clause="";
        foreach($_GET['language'] as $c){
          if(!empty($c)){
            $sql .= $clause."Languages LIKE '%{$c}%'";
            $clause = " OR ";//Change  to OR after 1st WHERE
          }   
        }
        $sql .=")";
      }
	
      if(isset($_GET['experience'])){
        $sql .=" AND (";
        $clause="";
        foreach($_GET['experience'] as $c){
          if(!empty($c)){
            $sql .= $clause."YearsOfExperience LIKE '%{$c}%'";
            $clause = " OR ";//Change  to OR after 1st WHERE
          }   
        }
        $sql .=")";
      }
      //echo $sql;
      $qrySearch=mysqli_query($bd, $sql);  
      echo "<h4 style='text-align: center;color: #1274C0;margin-top: 24px;line-height: 40px;'>";
      $num_rows=0;
      $timenow1=date('ymdhis');
      $timenow1=$timenow1-90;
      $qryStatus1=mysqli_query($bd, "SELECT * FROM status WHERE lastActivity > '$timenow1'");
      if($memStatus1=mysqli_fetch_assoc($qryStatus1)) {
  			$num_rows =$num_rows +1;
      }
      //$num_rows = mysqli_num_rows($qrySearch);
      if($num_rows>0) {
        echo "We Got ".$num_rows." Results.";
      }
      else {
    	  echo "Sorry! No result found.";
    	  if(isset($_SESSION['SESS_SR_ID'])){
    		  $SRID=$_SESSION['SESS_SR_ID'];
    		  
    		   if(isset($_GET['spelization'])){
    			  $spcl="";
    				$clause="";
    					foreach($_GET['spelization'] as $c){
    						if(!empty($c)){
    							$spcl .= $clause.$c;
    							$clause = ",";
    						}   
    					}
    			}
    		  
    		   if(isset($_GET['experience'])){
    			  $exp="";
    				$clause="";
    					foreach($_GET['experience'] as $c){
    						if(!empty($c)){
    							$exp .= $clause.$c;
    							$clause = ",";
    						}   
    					}
    			}
    		  
    		   if(isset($_GET['language'])){
    			  $language="";
    				$clause="";
    					foreach($_GET['language'] as $c){
    						if(!empty($c)){
    							$language .= $clause.$c;
    							$clause = ",";
    						}   
    					}
    			}
    		  
    		  
    	  $qryStatus1=mysqli_query($bd, "INSERT INTO last_query (SRID, Profession, Specialisation, YearsOfExperience, Languages) VALUES('$SRID','$expertise','$spcl','$exp','$language')");
    	  }
      }
      echo "</h4>";
      ?>
      <div class="slider_box">
        <div id="Main-Content">
          <div class="Container">
            <!-- Flipster List -->	
            <div class="flipster">
              <ul>
                <?php
                $i=0;
                while($memSearch=mysqli_fetch_assoc($qrySearch)) {
                  $spID=$memSearch['SPID'];
                  $qryStatus=mysqli_query($bd, "SELECT * FROM status WHERE SPID='$spID'");
                  if($memStatus=mysqli_fetch_assoc($qryStatus)) {
                    if(isset($_SESSION['SESS_SR_ID'])) {
                      $qrySearchNotification=mysqli_query($bd, "INSERT INTO search_notification (spid,time,srid,status,date) VALUES('$spID','".time()."','".$_SESSION['SESS_SR_ID']."','','".date('Y-m-d')."')");
                    }
                    $timenow=date('ymdhis');
                    $timenow=$timenow-90;
                    if ($memStatus['lastActivity']>$timenow) {
                    $i=$i+1;
                    ?>
              		  	<li>
              		  		<div class="Button Block">
              		  			<div class="select_bg">
                            <div class="select_first_box">
                              <div class="select_left_box">
                                <div class="select_image">
                                  <?php
                                  $spID=$memSearch['SPID'];
                                  if(file_exists("profile_images/".$spID.".jpg")) {
                                  ?>
                                  	<img src="profile_images/<?php echo $spID.".jpg"; ?>" alt="image">
                                  <?php 
                                  }
                                  else {
                                	?>  		
                                    <img src="profile_images/no-profile-img-male.gif" alt="image">
                                  <?php
                                  }
                                  if(false) {
                                    $qryImg=mysqli_query($bd, "SELECT * FROM service_provider_upload WHERE SPID='$spID'");
                                    if($memImg=mysqli_fetch_assoc($qryImg)) {
                                      if($memImg['ProfileImage']!="") {
                                      ?>  
                		                    <img src="profile_images/<?php echo $memImg['Specialisation']; ?>" alt="image">
                                      <?php 
                                      }
                                      else { ?>
                                        <img src="profile_images/no-profile-img-male.gif" alt="image">
                                      <?php  
                                      } 
                                    }
                                    else { ?>
                                      <img src="profile_images/no-profile-img-male.gif" alt="image">
                                    <?php 
                                    } 
                                  } 
                                  ?>
                                </div>
                                <span class="select_image_text"><?php echo $memSearch['First_Name']." ".$memSearch['Last_Name']; ?></span>
                              </div>
                              <div class="select_right_box">
                                <div class="select_right_mins_box">
                                  <?php 
              	                    $ratesString=$memSearch['Rates'];
                                    $exploded = explode("::",$ratesString);
                                    $times = $exploded[0];
                                    $rates = $exploded[1];
                                    $sepTimes =explode(",",$times);
                                    $sepRates =explode(",",$rates);
                                    if(!empty($sepTimes[0]) && !empty($sepRates[0])) {
                                    ?>
                                      <div class="select_white_image">
                                        <img src="images/white_cercal_image.png" alt="image">
                                        <div class="white_image_text">$<?php echo $sepRates[0] ; ?></div>
                                      </div>
                                      <div class="select_white_right_image">
                                        <img src="images/white_cercal_image.png" alt="image">
                                        <div class="white_right_text">
                                          <?php echo $sepTimes[0] ; ?> <br />mins
                                        </div>
                                      </div>
                                    <?php 
                                    } 
                                    ?>
                                    <div class="select_white_image">
                                      <img src="images/yo_cercal_icon.png" alt="image">
                                      <div class="yo_white_image_text">
                                        $<?php echo $sepRates[1] ; ?>
                                      </div>
                                    </div>
                                    <div class="select_white_right_image">
                                      <img src="images/yo_cercal_icon.png" alt="image">
                                      <div class="yo_white_right_text">
                                        <?php echo $sepTimes[1] ; ?><br /> mins
                                      </div>
                                    </div>
                                    <div class="select_white_image">
                                      <img src="images/orange_cercal.png" alt="image">
                                      <div class="yo_white_image_text">
                                        $<?php echo $sepRates[2] ; ?>
                                      </div>
                                    </div>
                                    <div class="select_white_right_image">
                                      <img src="images/orange_cercal.png" alt="image">
                                      <div class="yo_white_right_text">
                                        <?php echo $sepTimes[2] ; ?><br /> mins
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="select_bottom_box">
                              <div class="left_attorny_box">
                                <div class="left_attorny_white_box">
                                  <?php
                                  $spclid=$memSearch['Specialisation'];
                                  $qrySpl=mysqli_query($bd, "SELECT * FROM specialisation WHERE SpecialisationID='$spclid'");
                                  $memSpl=mysqli_fetch_assoc($qrySpl)
                                  ?>
                                  <span style="color: #580000;">
                                    <?php echo $memSpl['Specialisation']; ?> <br />
                                  </span>
                                  <?php
                                  $Degree=$memSearch['Degree'];
                                  $qryDegree=mysqli_query($bd, "SELECT * FROM degree WHERE DegreeID='$Degree'");
                                  $memDegree=mysqli_fetch_assoc($qryDegree)
                                  ?>
                                  <span style="">
                                    <?php echo $memDegree['Degrees']; ?> <br />
                                  </span>
                                  <?php
                                    $YearsOfExperience=$memSearch['YearsOfExperience'];
                                    $qryExperience=mysqli_query($bd, "SELECT * FROM experience WHERE YearsOfExperienceID='$YearsOfExperience'");
                                    $memExperience=mysqli_fetch_assoc($qryExperience)
                                  ?>
                                  <span style="    color: #E00;">
                                    <?php echo "Experience : ".$memExperience['YearsOfExperience']; ?> Years<br>
                                  </span>
                                </div>
                                <div class="star_box">&nbsp;</div>
                              </div>
                              <div class="certifite_right_box">
                                <div class="cerficets_image">
                                <?php  
                                if(file_exists("certificates/".$spID.".jpg")) {
                                ?>
                                  <img src="profile_images/<?php echo $spID.".jpg"; ?>" alt="image">
                                <?php 
                                }
                                ?>
                              </div>
                              <?php  
                              $qryStatus=mysqli_query($bd, "SELECT * FROM status WHERE SPID='$spID'");
                              if($memStatus=mysqli_fetch_assoc($qryStatus)) {
                                $timenow=date('ymdhis');
                                $timenow=$timenow-90;
                                if ($memStatus['lastActivity']>$timenow) {
                                ?>
                                  <button type="submit" class="select_expart_button" onClick="show_module('<?php echo $spID; ?>','<?php echo $SRID; ?>');">Select Expert</button>
                                <?php
                                }
                                else {
                                  echo "<h4 style='color:#fff;'>Service Provider is Offline</h4>";
                                }
                              }
                              else {
                                echo "<h4 style='color:#fff;'>Service Provider is Offline</h4>";
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                      </li>
                    <?php
                    }
                  }
                }
                ?>
              </ul>
              <div style="width:80%; margin-left:10%;">
                <div class="sprev">Previous</div>
                <div class="snext">Next</div>
              </div>
            </div>
            <!-- End Flipster List -->
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="js/jquery.flipster.js"></script>
            <?php
            if(isset($_SESSION['SESS_ID'])) {
            ?>
              <script>
                setInterval("checkcommunication('<?php echo $_SESSION['SESS_ID']; ?>')", 10000); // Update every 10 seconds 
                function checkcommunication(spid) { 
                  $.ajax({
                    url : "checkcommunication.php",
                    success : function (data) {
                      if(data==spid) {
                        var audio = new Audio('sounds/final-warn-sound.mp3');
                        audio.play();
                        window.setTimeout(function(){
                          location.href = "communication.php?spid="+spid;
                        }, 3000);
                      }
                    }
                  });
                } 
              </script>
              <script>
                setInterval("checksearch('<?php echo $_SESSION['SESS_ID']; ?>')", 1000); // Update every 1 seconds 
                function checksearch(spid) { 
                  $.ajax({
                    url : "checksearch.php",
                    success : function (data) {
                      if(data==spid) {
                        document.getElementById("notification").style.display="block";
                        var htmlval="<div style='width: 30px; float: right; margin-top: -20px; margin-right: -20px; cursor:pointer;' onclick='hide_notification();'><img src='images/close.png' alt='close'></div><div style='float:left; width:100%;'>You are under active selection process</div>";
                        $('#notification').html(htmlval);
                        var audio = new Audio('sounds/warn-sound.mp3');
                        audio.play();
                      }
                    }
                  });
                } 
                function hide_notification(){
                  $('#notification').html("");
                  document.getElementById("notification").style.display="none";
                }
              </script>
            <?php 
            }         
            if(isset($_SESSION['SESS_SR_ID'])) {
            ?>
              <script>
                function show_module(spid,srid) {
                  $.ajax({
                    url : "communication_start.php?spid="+spid+"&srid="+srid,
                    success : function (data) {
                      location.href = "https://www.villageexperts.com:8084/#/"+spid;
                    }
                  });
                }
              </script>
            <?php
            }
            else {
            ?>
              <script>
                function show_module() {
                  location.href = "service_requestor_profile_page.php";
                }
              </script>
            <?php
            }
            ?>
          </div>
        </div>
      </div>

      <hr />
      <div class="copy_text">Copyrights 2015.  All Rights Reserved</div>
    </div>
  </div>
  <script>
  	$(function(){ $(".flipster").flipster({ style: 'carousel', start: 0 }); });
  </script>
</body>
</html>