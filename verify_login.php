<?php
function verify_login(){
	session_start();
	$username = $_POST['username'];
	$passwd = $_POST['password'];
	$validation = $_POST['validationcode'];
//	$checkcode = $_POST['checkcode'];

	// echo $username." ".$passwd." ".$validation."sdfasd".$_SESSION['validationcode'];

	if($validation != $_SESSION['validationcode'])
	{
		return "验证码错误!";
	}

	$conn = mysql_connect("125.221.225.210:3306","root","88888888");
	mysql_select_db("db_BookStore");
	mysql_query("set names utf8");

	$sql = "select * from tb_User where user_Email='$username'";
	$arr = mysql_query($sql, $conn);
	if(mysql_num_rows($arr) != 0)
	{
		$value = mysql_fetch_array($arr);
	}
	else
	{
		return "用户名不存在!";
	}
	if($value[1] != md5($passwd))
	{
		return "密码错误";
	}
	else
	{
		$_SESSION['current_user'] = $username;
		header("Location:http://125.221.225.209/bgstore/index.php");
	}
}
//0:验证通过
//1:验证码错误
//2:用户名不存在
//3:密码错误
?>