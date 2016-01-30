<?php
	session_start();
require('config.php');
if($_SESSION['SESS_ID']) {
}
else {
	header('location:index.php?error="loginerror"');
	exit();	
}

if(isset($_GET['cid'])) {
$spid=$_GET['cid'];
echo "0";
$time=time();
	if($_SESSION['SESS_ID']) {
		$qrySP=mysqli_query($bd, "INSERT INTO communication(srid,time,status) VALUES('$spid','$time','open')");
		echo"1";
	}
}
?>

<html>
<head>
<title>Communication - Service Exchange</title>
</head>
<body>
<div class="bottm_box"><a href="index.php"><div class="home_button">Back to Home</div></a>
  </div>
<iframe id="myiframe" height="90%" width="100%"></iframe> 


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <?php
    if(isset($_GET['cid'])) {
		?>
<script>
document.getElementById('myiframe').src="https://www.villageexperts.com:8084/#/<?php echo $spid."".$time; ?>?s=1";
</script>
<?php
	}
	if(isset($_GET['crid'])) {
	?>
<script>
jQuery(document).ready(function() {
    setTimeout(function() {
        document.getElementById('myiframe').src="https://www.villageexperts.com:8084/#/<?php echo $_GET['crid']; ?>?s=1";
    }, 10000);
});

</script>
<?php
	}
	?>
<script>
//setInterval(function(){ alert("Hello"); }, 3000);
 setInterval("comm_update()", 10000); // Update every 10 seconds 

function comm_update() 
{
	//alert("hi");
$.post("comm_update.php"); // Sends request to update.php 
//alert("sd");
} 
</script>

  <?php
if(isset($_SESSION['SESS_ID'])) {
	?>
  <script>
  setInterval("update()", 10000); // Update every 10 seconds 

function update() 
{ 
$.post("updatestatus.php"); // Sends request to update.php 
//alert("sd");
} 
</script>

<?php } ?>
</body>
</html>