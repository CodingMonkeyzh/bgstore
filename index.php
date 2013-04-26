<?php
	include('templates/header.html');
	$conn = mysql_connect("125.221.225.210:3306","root","88888888");
	mysql_select_db("db_BookStore");
	mysql_query("set names utf8");

?>
	<title>BugooStore - 508旗下科技有限公司</title>
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
						echo "<li><a href='class_list.php?class=$subclass[0]'>". $subclass[2] ."</a></li>";
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


	<form id="searchForm" action="search.php" method="get">
		<select name="class">
			<option value="0">全部</option>
			<option value="1">生活</option>
			<option value="2">文学</option>
			<option value="3">教育</option>
			<option value="4">艺术</option>
			<option value="5">科技</option>
			<option value="6">社会</option>
			<option value="7">娱乐</option>
		</select>
		<input type="text" value="" name="searchInfo" id="searchBooks" maxlength="100" onfocus="value=''"onblur="请输入要查询的书籍" />
		<input class="go" type="submit" value="查询" />
	</form>
	
	
	<div id="main">
		<div id="main_content">
			<div id="my-folio-of-works" class="svwp">
				<ul>
					<li><img alt="教主的金龙鱼花生油降价啦！"  src="images/message_1.jpg" /></li>
					<li><img alt="BuGoo书屋开业大酬宾！"  src="images/message_2.jpg" /></li>
					<li><img alt="感谢同学们共同打造布谷书屋！"  src="images/message_3.jpg" /></li>
					<li><img alt="布谷书屋，值得信赖！"  src="images/message_4.jpg" /></li>
				</ul>
			</div>
		<?php 
////////////////////////////////////////
/////////////书籍展示列表/////////////////
////////////////////////////////////////	
			for($i=1 ; $i<=7 ; $i++)
			{
				$sql = "select * from tb_SubClass where mainClass_ID={$i}";
				$subclass_list = mysql_query($sql, $conn) or die();		
				//列表导航栏start
				$header = "<div id='moving_tab'>							
								<div class='tabs'>
								<div class='lava'></div>";
				while($subclass = mysql_fetch_array($subclass_list))
				{
					$header .= "<span class='item'>$subclass[2]</span>";
				}
				$header .= "</div>";
				echo $header;            
				//列表导航栏end

				//子类书籍列表start
				$content = "<div class='content'>
								<div class='panel'>";
				$sql = "select * from tb_SubClass where mainClass_ID={$i}";
				$sub = mysql_query($sql, $conn);
				while($subclass = mysql_fetch_array($sub))
				{
					$sql = "select * from tb_BookInfo where book_Class={$subclass[0]}";
					$book_list = mysql_query($sql, $conn) or die();
					$content .= "<ul>";
					while($book = mysql_fetch_array($book_list))
					{
						$sql = "select * from tb_BookPrice where book_ID={$book[0]} limit 0,6";
						$pr = mysql_query($sql, $conn) or die();
						$price = mysql_fetch_array($pr);
						$content .= "
						<li>
							<div class='bookInfo'>
								<div class='bookImage'>
									<a href='bookInfo.php?bookId={$book[0]}' title='$book[1]'><img src='http://125.221.225.210/BGbird/images/small-{$book[5]}' /></a>
								</div>
								
								<a href='bookInfo.php?bookId={$book[0]}' title='$book[1]'>$book[1]</a>
								<span class='bookValue'>￥{$price[1]}</span>
								<span class='bookAuthor'>$book[6]</span>
							</div>
						</li>
						";
					}
					$content .= "</ul>";
				}
				$content .= " 
							</div>
						<!-- end of panel -->
					</div>
					<!-- end of content -->
				</div>
				<!-- end of moving_tab -->
				";
				//子类书籍列表end
				echo $content;
			}
		?>
		
		</div><!--end of main_content-->

	</div><!-- end of main -->
	<br style="clear: both" />
</div><!-- end of contain -->


<?php
	include('templates/footer.html');
?>

<script type="text/javascript">
    $(window).bind("load", function() {
    $("div#my-folio-of-works").slideViewerPro({
    thumbs: 6,
    autoslide: true,
    asTimer: 3000,
    typo: true,
    galBorderWidth: 0,
    thumbsBorderOpacity: 0,
    buttonsTextColor: "#ccc",
    buttonsWidth: 20,
    thumbsActiveBorderOpacity: 0.8,
    thumbsActiveBorderColor: "#464646",
    shuffle: true
    });
    $('.lava').css({left:$('span.item:first').position()['left']});
	$('.item').mouseover(function () {
		lava = $(this).siblings('.lava');
		panel = $(this).parent('.tabs').next('.content').children('.panel');
		lava.stop().animate({left:$(this).position()['left']}, {duration:200});	
		panel.stop().animate({left:$(this).position()['left'] * (-10)}, {duration:200});
	});
    }); 
    jQuery(function(){
    jQuery("div.svwp").prepend("<img src='images/svwloader.gif' class='ldrgif' alt='loading...'/ >");
    }); 
</script>
</html>