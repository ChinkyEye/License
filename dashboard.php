<?php
  include_once('database.php');
  session_start();
?>
<?php
// echo $_SESSION['citizenno']; die();
	if($_SESSION['citizenno'] != ""){
		echo "Welcome: ". $_SESSION['citizenno'];
	}
	else{
		header("location:index.php");
	}
?>
<a href="renew.php">Renew</a>