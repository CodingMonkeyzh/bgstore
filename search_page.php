<?php
	$conn = mysql_connect("125.221.225.210:3306","root","88888888");
	mysql_select_db("db_BookStore");
	mysql_query("set names utf8", $conn);
	include("func_search.php");

	$key = $_GET['searchBooks'];
	$class = $_GET['class'];

	if($class != 0)
	{
		$sql = "select * from tb_BookInfo 
		where book_Class in (select subClass_ID from tb_SubClass where mainClass_ID=$class) and book_Name like '%{$key}%'";
	}
	else
	{
		$sql = "select * from tb_BookInfo where book_Name like '%{$key}%'";
	}
	$result = @mysql_query($sql);
	if(!mysql_num_rows($result))
	{
		die("没有该类书籍");
	}
?>
<html>
<head>
	<title>布谷书城</title>
</head>
<body>
<table>
	<tr>
		<td>书籍封面</td>
		<td>书籍名称</td>
		<td>书籍作者</td>
		<td>书籍价格</td>
	</tr>
	<?php
		$content = "";
		while($bookinfo = @mysql_fetch_array($result))
		{
			$sql = "select * from tb_BookPrice where book_ID=$bookinfo[0]";
			$arr = mysql_query($sql, $conn);
			$price = mysql_fetch_array($arr);
			$content .= "<tr>
				<td><a href='bookInfo.php?bookId=$bookinfo[0]'><img src='http://125.221.225.210/BGbird/images/small-{$bookinfo[5]}' ></a></td>
				<td><a href='bookInfo.php?bookId=$bookinfo[0]'>$bookinfo[1]</a></td>
				<td>$bookinfo[6]</td>
				<td>￥$price[1]</td>
				</tr>
			"; 
		}
		$content .= "</table>";
		echo $content;

		if($class != 0)
		{
			$sql = "SELECT count(*) as amount FROM tb_BookInfo 
			where book_Class in (select subClass_ID from tb_SubClass where mainClass_ID=$class) and book_Name like '%{$key}%'";
		}
		else
		{
			$sql = "SELECT count(*) as amount FROM tb_BookInfo where book_Name like '%{$key}%'";
		}
		$pagination = new Pagination($sql);
		$pagination->print_pagination();
	?>
</body>
</html>