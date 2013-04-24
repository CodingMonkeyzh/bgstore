<?php
	session_start();
	$_SESSION['current_user']="";
	session_destroy();
	header('Location:index.php');
?>