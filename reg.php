<?php
	$email = $_POST['Email'];
	$passwd = md5($_POST['passwd']);
	
	$conn = mysql_connect("125.221.225.210:3306","root","88888888");
	mysql_select_db("db_BookStore",$conn);
	mysql_query("set names utf-8");
	if($conn)
	{
		$sql = "select * from tb_User where user_Email='$email'";
		$arr = mysql_query($sql,$conn);
		if(mysql_num_rows($arr) != 0)
		{
			echo "<script language='javascript'>
				window.location.href='register.html';
				alert('用户邮箱已注册！');
		//		window.parent.document.write('用户邮箱已注册！');
		//		window.parent.document.getElementById('error_info').innerHTML='注册失败！';
				</script>";
		}
		date_default_timezone_set('PRC');
		$datetime = date('Y-m-d H:i:s', time());
		$sql = "insert into tb_User(user_Email,user_Passwd,regdate,lastvisit) values('$email','$passwd','$datetime','$datetime')";
		$insert = mysql_query($sql, $conn);
		if(!$insert)
		{
			echo "<script language='javascript'>
				window.location.href='register.html';
				alert('注册失败');
			//	window.parent.document.getElementById('error_info').innerHTML='注册失败！';
				</script>";
		}
		else{
			session_start();
			$_SESSION['current_user']=$email;
			header("Location:index.php");
		}
	}
	else
	{
		echo "<script>alert('数据库连接失败!');window.location.href='index.php';</script>";
	}
	
?>