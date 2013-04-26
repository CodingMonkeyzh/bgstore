<?php
	include('templates/header.html');
	$conn = mysql_connect("125.221.225.210:3306","root","88888888");
	mysql_select_db("db_BookStore");
	mysql_query("set names utf8");

?>
<title>搜索： - BuGooStore</title>
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
						echo "<li><a href='#'>". $subclass[2] ."</a></li>";
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
		<select>
			<option>全部</option>
			<option>生活</option>
			<option>文学</option>
			<option>教育</option>
			<option>艺术</option>
			<option>科技</option>
		</select>
		<input type="text" value="请输入您要查询的书籍" name="searchInfo" id="searchBooks" maxlength="100" onfocus="value=''"onblur="value=defaultValue" />
		<input class="go" type="submit" value="查询" />
	</form>
	<div id="searchList">
		<!-- this is the list of search books -->
		<div id="listHeader">
			<h1>“搜索信息”</h1>
		</div>
		<!-- end of listHeader -->
		<div class="listItem">
			<!-- 图书信息 -->
			<table>
				<tbody>
					<tr>
						<td rowspan="3" class="imageItem">
							<img src="images/No2.jpg" width="150px" height="150px" />
						</td>
						<td class="nameItem"><a href="#"><h1>书名</h1></a></td>
						<td class="commentSum"><a href="...#comments">(评论:comentSum)</a></td>
					</tr>
					<tr>
						<td class="graySmall">作者</td>
						<td><input type="submit" class="redButton" value="加入购物车" /></td>
					</tr>
					<tr>
						<td class="redLarge">价格</td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div id="pageList">
			<ol>
				<li><a href="#">上一页</a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">下一页</a></li>
			</ol>
		</div>
	</div>
	<!-- end of searchList -->
</div>
<!-- end of contain -->
	<?php
	include('templates/footer.html');
?>

</html>