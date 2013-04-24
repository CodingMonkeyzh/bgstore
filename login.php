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
	<div id="login_contain">
		
		<div id="login_leftPart">
			
		</div>
		<div id="login_rightPart">
			<form action="" method="post">
				<table>
					<tbody>
						<tr>
							<td class="fr w3em">Email:</td>
							<td  class="w10em"><input type="text" name="username" /></td>
						</tr>
						<tr>
							<td class="fr w3em">密码:</td>
							<td class="w10em"><input type="password" name="password"  /></td>
						</tr>
						<tr>
							<td class="fr w3em">验证码:</td>
							<td><input class="fl w4em h20px" type="text" name="validationcode" maxlength="4" /><img class="fl" src="imgcode.php" alt="验证码" style="cursor:pointer;" onclick="newcode(this,this.src);"/></td>
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
