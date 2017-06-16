<?php
	session_start();
require('config.php');
if($_SESSION['SESS_ID']||$_SESSION['SESS_SR_ID']) {
}
else {
	header('location:index.php?error="loginerror"');
	exit();	
}
if(isset($_GET['spid'])) {
$spid=$_GET['spid'];
}
else{
	header('location:index.php?error="loginerror"');
	exit();	
}
?>

<html>
<head>
<title>Communication - Service Exchange</title>
</head>
<body>
    <div class="bottm_box"><a href="index.php"><div class="home_button">Home</div></a></div>
    <iframe id="myiframe" height="90%" width="100%"></iframe>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
    alert(" hostname "+ window.location.hostname);
    document.getElementById('myiframe').src="https://54.218.28.216:8084/#/<?php echo $spid; ?>?s=1";
    </script>
<script>
 setInterval("comm_update()", 10000); // Update every 10 seconds 

function comm_update() 
{
	$.post("comm_update.php"); // Sends request to update.php 
} 
</script>

 <?php
if(isset($_SESSION['SESS_ID'])) {
111?>
  <script>
  setInterval("update()", 10000); // Update every 10 seconds 

	function update() 
	{ 
	$.post("updatestatus.php"); // Sends request to update.php 
	} 
</script>

<?php } ?>
</body>
</html>