<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
/*$mysql_password = "Movingpixel@2014";*/
$mysql_password = "mysqlroot";
$mysql_database = "vexpartdb";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) or die("Could not connect database");
mysqli_select_db($bd, $mysql_database) or die("Could not select database");

?>