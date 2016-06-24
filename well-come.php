<?php

session_start();
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
	display: none !important
}
</style>
<body class="bodybg">
<div class="container-fluid header-part">
  <div class="row">
    <div class="col-md-12 text-center">
      <div class="logo"> <img src="images/logo.png" alt="logo" > </div>
      <div class="over-lap">
        <div class="profile pull-left"> <img src="images/img-3.jpg" class="img-responsive"> </div>
        <div class="pull-right">
          <p class="loginname"></p>
          <button class="btn btn-info bg-blue">Login</button>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>



<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="wellcome-text">
<?php if(isset($_GET['redirect']) && $_GET['redirect'] == 'my-group'){?>
<div class="wellcome-img"><img src="images/<?php  echo $_GET['passImg']; ?>" width="200" height="200"></div>
<p><?php  echo  $_GET['passStr']; ?></p>
<?php
if($_GET['tag'] == "existing")
{
	header("Refresh: 4; url=".$_GET['redirect'].".php?tag=fetchmembers&gmID=".$_GET['gmID']."&groupName=".$_GET['groupName']."&created_by_id=".$_SESSION['logged_user_id']."&created_by_user_role=".$_SESSION['logged_role_code']);
}
else
header("Refresh: 4; url=".$_GET['redirect'].".php");
}
else if(isset($_GET['redirect']) && $_GET['redirect'] == 'index'){?>
<div class="wellcome-img"><img src="images/<?php  echo $_GET['passImg']; ?>" width="200" height="200"></div>
<p><?php  echo  $_GET['passStr']; ?></p>
<?php
header("Refresh: 4; url=".$_GET['redirect'].".php");
}
else if(isset($_GET['redirect']) && $_GET['redirect'] == 'SPsuccess'){?>
<div class="wellcome-img"><img src="images/<?php  echo $_GET['passImg']; ?>" width="200" height="200"></div>
<p><?php  echo  $_GET['passStr']; ?></p>
<?php
header("Refresh: 3; url="."index.php?success=1&type=SP&email=".$_GET['email']);
}
else if(isset($_GET['redirect']) && $_GET['redirect'] == 'SPerror'){?>
<div class="wellcome-img"><img src="images/<?php  echo $_GET['passImg']; ?>" width="200" height="200"></div>
<p><?php  echo  $_GET['passStr']; ?></p>
<?php
header("Refresh: 3; url="."index.php?error=1&type=SP");
}
else if(isset($_GET['redirect']) && $_GET['redirect'] == 'SRsuccess'){?>
<div class="wellcome-img"><img src="images/<?php  echo $_GET['passImg']; ?>" width="200" height="200"></div>
<p><?php  echo  $_GET['passStr']; ?></p>
<?php
header("Refresh: 3; url="."index.php?success=1&type=SR&email=".$_GET['email']);
}
else if(isset($_GET['redirect']) && $_GET['redirect'] == 'SRerror'){?>
<div class="wellcome-img"><img src="images/<?php  echo $_GET['passImg']; ?>" width="200" height="200"></div>
<p><?php  echo  $_GET['passStr']; ?></p>
<?php
header("Refresh: 3; url="."index.php?error=1&type=SR");
}
else if(isset($_GET['redirect']) && $_GET['redirect'] == 'add-new-member'){?>
<div class="wellcome-img"><img src="images/<?php  echo $_GET['passImg']; ?>" width="200" height="200"></div>
<p><?php  echo  $_GET['passStr']; ?></p>
<?php
header("Refresh: 3; url="."index.php?success=1&gmID=".$_GET['gmID']."&tag=".$_GET['tag']);
/*header("Refresh: 3; url="."my-group.php?success=1&gmID=".$_GET['gmID']."&groupName=".$_GET['groupName']."&tag=".$_GET['tag']);*/
}
else if(isset($_GET['redirect']) && $_GET['redirect'] == 'add-new-member-next'){?>
<div class="wellcome-img"><img src="images/<?php  echo $_GET['passImg']; ?>" width="200" height="200"></div>
<p><?php  echo  $_GET['passStr']; ?></p>
<?php
header("Refresh: 3; url="."index.php?success=1&type=GM&email=".$_GET['email']);
}
else if(isset($_GET['redirect']) && $_GET['redirect'] == 'connect'){?>
<div class="wellcome-img"><img src="images/<?php  echo $_GET['passImg']; ?>" width="200" height="200"></div>
<p><?php  echo  $_GET['passStr']; ?></p>
<?php
header("Refresh: 3; url="."index.php");
}
?>
</div>
</div>
</div>
</div>


<!-- jQuery Version 1.11.1 --> 
<script src="js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script>
</body>
</html>
