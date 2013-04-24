<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>注册</title>
	<script type="text/javascript">
	function verificateForm_onclick()
	{
		var passwdRegExp = /[^\w ]+/;
		var emailRegExp = /^[\w]+@([\w]+\.)+[\w]+$/;
		var Email = document.form1.Email.value;
		var passwd = document.form1.passwd.value;
		var com_passwd = document.form1.com_passwd.value;
		var verificate = document.form1.verificate.value;
		var passwd_test = passwdRegExp.test(passwd);
		var email_test = emailRegExp.test(Email);
		if(!email_test)
		{
			document.getElementById("error_info").innerHTML = "邮箱格式不正确!";
			document.form1.Email.focus();
			document.form1.Email.select();
			return;
		}
		if(passwd_test)
		{
			document.getElementById("error_info").innerHTML = "密码包含非法字符!";
			document.form1.passwd.focus();
			document.form1.passwd.select();
			return ;
		}
		if(passwd != com_passwd)
		{
			document.getElementById("error_info").innerHTML = "密码输入不一致!";
			document.form1.com_passwd.focus();
			document.form1.com_passwd.select();
			return ;
		}
		if(verificate != "<? session_start();echo $_SESSION['code'] ?>")
		{
			document.getElementById("error_info").innerHTML = "验证码输入错误!";
			document.form1.verificate.focus();
			document.form1.verificate.select();
			return ;
		}
		document.form1.submit();
	}
	</script>
</head>
<body>
	<form name="form1" action="reg.php" method="post">
		<label for="Email">Email:</label>
		<input type="text" name="Email" value=""/>
		<br />
		<label for="passwd">密码:</label>
		<input type="password" name="passwd" value=""/>
		<br />
		<label for="com_passwd">重复密码:</label>
		<input type="password" name="com_passwd" value=""/>
		<br />
		<label for="verificate">验证码:</label>
		<input type="text" name="verificate" maxlength="4"/>
		<a href=""><img src="code.php" alt="验证码" value=""/></a>
		<br />
		<input type="button" value="注册" onclick="verificateForm_onclick()"/>
	</form>
	<p id="error_info" style="color:red;"></p>
</body>
</html>
