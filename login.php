<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	include('templates/header.html');
	include("verify_login.php");
	$result="";
	if(isset($_POST['submit']))
	{
		$result = verify_login();
	}
?>
<title>登录 - BuGooStore</title>
</head>
<body>
	<div id="login_contain">
		
		<div id="login_leftPart">
			
		</div>
		<div id="login_rightPart">
			<form action="" method="post">
				<table>
					<tbody>
						<tr>
							<td class="fr w3em"><label for="username">Email:</label></td>
							<td  class="w10em"><input type="text" name="username" id="username" /></td>
						</tr>
						<tr>
							<td class="fr w3em"><label for="password">密码:</label></td>
							<td class="w10em"><input type="password" name="password" id="password" /></td>
						</tr>
						<tr>
							<td class="fr w3em"><label for="validationcode"> 验证码:</label></td>
							<td><input class="fl w4em h20px" type="text" name="validationcode" id="validationcode" maxlength="4" /><img class="fl" src="imgcode.php" alt="验证码" style="cursor:pointer;" onclick="newcode(this,this.src);"/></td>
						</tr>
						<tr>
							<td></td>
							<td><input class="" type="submit" value="登录" name="submit"/><a class="fl" href="register.php">注册</a></td>
						</tr>
					</tbody>
				</table>
				<p id="error_info" style="color:red;"><?php echo $result; ?></p>
			</form>
			
		</div>
	</div>
	<script type="text/javascript">
	function newcode(obj,url)
	{
		obj.src = url + "?nowtime=" + new Date().getTime();
	}
/*	var res = <? echo $result ?>;
	if(res)
	{
		document.getElementById("error_info").innerHTML = ;
		switch(<? echo $result ?>)
		{
			case "1":
				document.getElementById("error_info").innerHTML = "验证码错误!";
				break;
			case "2":
				document.getElementById("error_info").innerHTML = "用户名不存在!";
				break;
			case "3":
				document.getElementById("error_info").innerHTML = "密码错误!";
				break;
			default:
				document.location.href="http://125.221.225.209/bgstore/";
				break;
		}
	}*/
</script>

<?php
	include('templates/footer.html');
?>
