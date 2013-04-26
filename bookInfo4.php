<?php
	include('templates/header.html');
	$conn = mysql_connect("125.221.225.210:3306","root","88888888");
	mysql_select_db("db_BookStore");
	mysql_query("set names utf8");
	$bookID = $_GET['bookId'];

	$sql = "select * from tb_BookInfo where book_ID=$bookID";
	$arr = mysql_query($sql);
	$bookinfo = mysql_fetch_array($arr);   //书籍基本信息

	$sql = "select * from tb_BookPrice where book_ID=$bookID";
	$arr = mysql_query($sql);
	$bookprice = mysql_fetch_array($arr);  //书籍价格;

	$sql = "select * from tb_BookComment where book_ID=$bookID limit 0,5";
	$comments = mysql_query($sql);   //书籍评论
?>
<?php if(isset($_POST['submit'])){
	if(isset($_SESSION['current_user'])){
		$username = $_SESSION['current_user'];
		date_default_timezone_set("PRC");
		$nowTime = date("Y-m-d H:i:s",time());
		$cmtContent = $_POST['cmtContent'];
		$bookId = $_GET['bookId'];
		$sql = "insert into tb_BookComment values('$bookId','$username','$nowTime','$cmtContent')";
		$arr = mysql_query($sql, $conn);
		if($arr){echo "<scripttype='text/javascript'>document.location.href='bookInfo.php?bookId=$bookId'</script>";}}
		else{echo "<script language='javascript'>alert('您还没有登录，不可以进行评论!');</script>";}
}?>

<div id="bookInfo_contain">
	<div class="bookInfo_content mt5em">
		<div id="bookInfo_part1">
			
			<div class="bookDetail">
				<h2><?php echo $bookinfo[1]; ?></h2>
				<ul>
					<li>作者：<span><?php echo $bookinfo[6]; ?></span></li>
					<li>价格：<span><?php echo $bookprice[1]; ?></span></li>
					<li>出版社：<span><?php echo $bookinfo[2]; ?></span></li>
					<li><a href="#comments">商品评论：<span><?php echo mysql_num_rows($comments); ?></span></a></li>
				</ul>
				<form>
					<input type="submit" value="立即购买" />
				</form>
			</div>
			<div class="bookInfoImage">
				<img src=<?php echo "http://125.221.225.210/BGbird/images/".$bookinfo[5]; ?> >
			</div>
		</div>
	</div>
	<div class="bookInfo_content">
		<div id="bookInfo_part2">
			<h3>图书描述</h3>
			<p><?php echo $bookinfo[3]; ?></p>
			<h3>图书目录</h3>
			<p><?php echo $bookinfo[4]; ?>
			</p>
		</div>
	</div>
	<div class="bookInfo_content">
		<div id="bookInfo_part3">
			<h3>商品评论</h3>
			<a name="comments"> </a>
			<div class="bookComments">
<?php
while($module_comment = mysql_fetch_array($comments))
{
	$content = "<div class='userImage'>
	<img src='images/user_01.gif'>
</div>
<span class='username'>$module_comment[1]</span>
<span class='pubTime'>$module_comment[2]</span>
<div class='test'>
	<span class='bot'></span>
	<span class='top'></span>
	<p>$module_comment[3]</p>
</div>
	";
echo $content;
}
?>
			</div>
			<!-- end of bookComments -->
			<div class="pubComment">
				<h3>发表评论</h3>
				<form method="post" action="">
					<textarea cols="83" rows="5" name="cmtContent"></textarea>
					<input type="submit" name="submit" value="提交" />
				</form>
			</div>
			<!-- end of pub Comment -->
		</div>
	</div>
</div>

<?php
	include('templates/footer.html');
?>