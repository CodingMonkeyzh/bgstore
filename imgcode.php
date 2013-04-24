<?php
	session_start();
	require_once("validationCode.php");
	$image = new ValidationCode(60,20,4);
	$image->showImage();
	$_SESSION['validationcode'] = $image->getCheckCode();
?>