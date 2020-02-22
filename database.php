<?php
	ob_start();
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "license";
	$connect = new mysqli($host, $user, $password, $database) or die("Error:".mysqli_error());

?>