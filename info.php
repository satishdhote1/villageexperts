<?php
echo "this is latest change";
echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
echo "<br>".dirname(__FILE__);
echo phpinfo();
?>
