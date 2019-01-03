<?php

	
$databasehost = "localhost";
$databasename = "binaondr";
$databaseusername ="binaondr";
$databasepassword = "thoi3ver";

$con = mysql_connect($databasehost,$databaseusername,$databasepassword) or die(mysql_error());
mysql_select_db($databasename) or die(mysql_error());
mysql_query("SET CHARACTER SET utf8");
$sql = "SET NAMES 'UTF8'";
mysql_query($sql);
$sql = "SET time_zone = 'Europe/Paris'";
mysql_query($sql);
	
	
?>

