<?php
	include('templates/header.html');
?>
<title>注册 - BuGooStore</title>
</head>
<body>
<div id="register_contain">
	<form method="post" action="reg.php" name="form1">
		<table>
			<tbody>
				<tr>
					<td><h2 class="blackBlue">请填写注册信息:</h2></td>
				</tr>
				<tr>
					<td class="tar">请输入E-main地址：</td>
					<td><input type="text" name="Email" /></td>
				</tr>
				<tr>
					<td class="tar">请输入密码：</td>
					<td><input type="password" name="passwd" /></td>
				</tr>
				<tr>
					<td class="tar">再次输入：</td>
					<td><input type="password" name="com_passwd" /></td>
				</tr>
				<tr>
					<td class="tar">验证码：</td>
					<td class="tal"><img src="imgcode.php" alt="验证码" style="cursor:pointer;" onclick="newcode(this,this.src);" /></td>
				</tr>
				<tr>
					<td class="tar">请输入上方验证码：</td>
					<td><input type="text" name="verificate" /></td>
				</tr>
				<tr>
					<td></td>
					<td class="tal"><input type="submit" value="完成" onclick="verificateForm_onclick()" /></td>
				</tr>
			</tbody>
		</table>
		<p id="error_info" style="color:red;"></p>
	</form>
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
			return ;
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
	function newcode(obj,url)
	{
		obj.src = url + "?nowtime=" + new Date().getTime();
	}
	</script>
</div>
<?php
	include('templates/footer.html');
?>