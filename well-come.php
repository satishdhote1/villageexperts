<?php
session_start();
?>
<?php
if(isset($_GET['redirect']) && $_GET['redirect'] == 'register_dashboard'){
 header("Refresh: 4; url= /#login");
}

if(isset($_GET['redirect']) && $_GET['redirect'] == 'friends-family'){
 header("Refresh: 4; url= /#login");
}

if(isset($_GET['redirect']) && ($_GET['redirect'] == 'index' || $_GET['redirect'] == 'home')){
 header("Refresh: 4; url= /");
}?>

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
<link href="css/style.css" rel="stylesheet">

</head>


<body>
<?php include 'vvheader.php';?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="wellcome-text">
            <?php
             if(isset($_GET['redirect']) && $_GET['redirect'] == 'register_dashboard'){
            ?>
                <div class="wellcome-img"><img src="images/<?php  echo $_GET['passImg']; ?>" width="200" height="200"></div>
                <p><?php  echo  $_GET['passStr']; ?></p>
            <?php
            //echo "http://".$_SERVER['SERVER_NAME']."/villageExperts/".$_GET['redirect'].".php";
            exit;
            }
            ?>

            <?php
             if(isset($_GET['redirect']) && $_GET['redirect'] == 'friends-family'){
            ?>
                <div class="wellcome-img"><img src="images/<?php  echo $_GET['passImg']; ?>" width="200" height="200"></div>
                <p><?php  echo  $_GET['passStr']; ?></p>
            <?php
            //echo "http://".$_SERVER['SERVER_NAME']."/villageExperts/".$_GET['redirect'].".php";
            exit;
            }
            ?>

            <?php
            if(isset($_GET['redirect']) && $_GET['redirect'] == 'index'){
            ?>
                <div class="wellcome-img"><img src="images/<?php  echo $_GET['passImg']; ?>" width="200" height="200"></div>
                <p><?php  echo  $_GET['passStr']; ?></p>
            <?php
            //echo "http://".$_SERVER['SERVER_NAME']."/villageExperts/".$_GET['redirect'].".php";
            exit;
            }
            ?>

            <?php
             if(isset($_GET['redirect']) && $_GET['redirect'] == 'home'){
            ?>
                <div class="wellcome-img"><img src="<?php  echo $_GET['passImg']; ?>" width="200" height="200"></div>
                <p><?php  echo  $_GET['passStr']; ?></p>
            <?php
            //echo "http://".$_SERVER['SERVER_NAME']."/villageExperts/".$_GET['redirect'].".php";
            exit;
            }
            ?>
            </div>
        </div>
    </div>
</div>


<!-- jQuery Version 1.11.1 --> 
<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script src="js/connectMe.js"></script>
<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script>
</body>
</html>
