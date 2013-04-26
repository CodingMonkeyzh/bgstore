<?php
	include('templates/header.html');
	$conn = mysql_connect("125.221.225.210:3306","root","88888888");
	mysql_select_db("db_BookStore");
	mysql_query("set names utf8");

?>
<title>搜索结果 - BuGooStore</title>
</head>
<body>
<div id="contain">
	<div id="navSideBar">
	<div id="navSideBar_Kinds">
		<h3>书籍种类</h3>
		<ul>
			<?php 								/////////////////书籍种类/////////////////
				for($i=1 ; $i<=7 ; $i++)
				{
					$sql = "select * from tb_MainClass where mainClass_ID={$i}";
					$arr = mysql_query($sql, $conn) or die();
					$mainclass = mysql_fetch_array($arr);
					echo  "<li class='title'>$mainclass[1]</li>";

					$sql = "select * from tb_SubClass where mainClass_ID={$i}";
					$arr = mysql_query($sql, $conn) or die();
					while($subclass = mysql_fetch_array($arr))
					{
						echo "<li><a href='?class=$subclass[0]'>". $subclass[2] ."</a></li>";
					}
				}
			?>
		</ul>
		<br style="clear: both" />
	</div>
	<img src="images/nav_bg_220_40.png" />


	<div id="navSideBar_Sale">
		<h3>新书上架</h3>
		<ul>
			<?php 												/////////////促销榜///////////////////
				$sql = "select * from tb_BookInfo limit 0,10";
				$arr = mysql_query($sql, $conn);
				while($bookinfo = mysql_fetch_array($arr))
				{
					$sql = "select * from tb_BookPrice where book_ID=$bookinfo[0]";
					$res = mysql_query($sql, $conn);
					$price = mysql_fetch_array($res);
					echo "<li>

					<div class='NavBookInfo'>
								<div class='bookImage'>
									<a href='bookInfo.php?bookId={$bookinfo[0]}' title='$bookinfo[1]'><img src='http://125.221.225.210/BGbird/images/small-{$bookinfo[5]}' /></a>
								</div>
								
								<a href='bookInfo.php?bookId={$bookinfo[0]}' title='$bookinfo[1]'>$bookinfo[1]</a>
								<span class='bookValue'>￥{$price[1]}</span>
								<span class='bookAuthor'>$bookinfo[6]</span>
							</div>
					</li>";
				}
			?>
		</ul>
	</div>
	<img src="images/nav_bg_220_40_2.png" />
	</div><!-- end of navSideBar -->

	
	<form id="searchForm" name="form1">
		<select name="class">
			<option value="0">全部</option>
			<option value="0">生活</option>
			<option value="0">文学</option>
			<option value="0">教育</option>
			<option value="0">艺术</option>
			<option value="0">科技</option>
			<option value="6">社会</option>
			<option value="7">娱乐</option>
		</select>
		<input type="text" name="searchInfo" id="searchBooks" maxlength="100" />
		<input class="go" type="submit" value="查询" />
		<input type="hidden" name="page" value="1">
	</form>
	<div id="searchList">
		<!-- this is the list of search books -->
		<div id="listHeader">
			<h1>分类列表</h1>
		</div>
		<!-- end of listHeader -->

		<?php
		include("pagination.php");

		$class = $_GET['class'];

		$sql = "select * from tb_BookInfo where book_Class=$class";
		$result = @mysql_query($sql);
		if(!mysql_num_rows($result))
		{
			die("没有该类书籍");
		}
		$content = "";
		while($bookinfo = @mysql_fetch_array($result))
		{
			$sql = "select * from tb_BookPrice where book_ID=$bookinfo[0]";
			$arr = mysql_query($sql, $conn);
			$price = mysql_fetch_array($arr);
			$sql = "select count(*) from tb_BookComment where book_ID=$bookinfo[0]";
			$arr = mysql_query($sql, $conn);
			$cmtCount = mysql_fetch_array($arr);
			$content .= "<div class='listItem'>
					<!-- 图书信息 -->
					<table>
						<tbody>
							<tr>
								<td rowspan='3' class='imageItem'>
									<a href='bookInfo.php?bookId=$bookinfo[0]'><img src='http://125.221.225.210/BGbird/images/$bookinfo[5]' width='150px' height='150px' /></a>
								</td>
								<td class='nameItem'><a href='bookInfo.php?bookId=$bookinfo[0]'><h1>$bookinfo[1]</h1></a></td>
								<td class='commentSum'><a href='bookInfo.php?bookId=$bookinfo[0]#comments'>评论($cmtCount[0])</a></td>
							</tr>
							<tr>
								<td class='graySmall'>$bookinfo[6]</td>
								<td><input type='submit' class='redButton' value='加入购物车' /></td>
							</tr>
							<tr>
								<td class='redLarge'>$price[1]</td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
			"; 
		}
		
		echo $content;

		$sql = "SELECT count(*) as amount FROM tb_BookInfo where book_Class=$class";
		$pagination = new Pagination($sql,10);
		// $pagination->print_pagination();
		?>
		
		<div id="pageList">
			<?php
				$pagination->print_pagination();
			?>
		</div>
	</div>
	<!-- end of searchList -->
</div>
<!-- end of contain -->
<?php
	footer:
	include('templates/footer.html');
?>

</html>