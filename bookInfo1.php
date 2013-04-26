<?php
	include('templates/header.html');
?>

<div id="bookInfo_contain">
	<div class="bookInfo_content mt5em">
		<div id="bookInfo_part1">
			
			<div class="bookDetail">
				<h2>突然就走到了西藏(精编图文版)</h2>
				<ul>
					<li>作者：<span>陈坤</span></li>
					<li>价格：<span>42.0</span></li>
					<li>出版社：<span>华东师范大学出版社</span></li>
					<li><a href="#comments">商品评论：<span>1</span></a></li>
				</ul>
				<form>
					<input type="submit" value="加入购物车" />
				</form>
			</div>
			<div class="bookInfoImage">
				<img src="images/bookInfo_image_01.jpg">
			</div>
		</div>
	</div>
	<div class="bookInfo_content">
		<div id="bookInfo_part2">
			<h3>图书描述</h3>
			<p>
《突然就走到了西藏》是带有自传性质的文学随笔集，演艺界实力及偶像派代表人物陈坤的处女作，公益活动“行走的力量”西藏行走的纪实作品。《突然就走到了西藏》共分十章，前九章是作者对其童年时期、大学时代、演艺阶段、行走西藏等不同经历的真实回顾，以“行走”为线索，思考生命的价值与意义。在人生的行走中，读者可以看到陈坤的内心从脆弱到强大的转变过程。第十章节是参与“西藏行走”的学生日记，以大学生的视角来呈现一个真实的陈坤。
			</p>
			<h3>图书目录</h3>
			<p>
第1章　JavaScript简介
第2章　在HTML中使用JavaScript
第3章　基本概念
第4章　变量、作用域和内存问题
第5章　引用类型
第6章　面向对象的程序设计
第7章　函数表达式
第8章　BOM
第9章　客户端检测
第10章　DOM
第11章　DOM扩展
第12章　DOM2和DOM3
第13章　事件
第14章　表单脚本
第15章　使用Canvas绘图
第16章　HTML5脚本编程
第17章　错误处理与调试
第18章　JavaScript与XML
第19章　E4X
第20章　JSON
第21章　Ajax与Comet
第22章　高级技巧
第23章　离线应用与客户端存储
第24章　最佳实践
第25章　新兴的API
附录A　ECMAScript Harmony
附录B　严格模式
附录C　JavaScript库
附录D　JavaScript工具 
			</p>
		</div>
	</div>
	<div class="bookInfo_content">
		<div id="bookInfo_part3">
			<h3>商品评论</h3>
			<a name="comments"> </a>
			<div class="bookComments">
				<div class="userImage">
					<img src="images/user_01.gif">
				</div>
				<span class="username">周权小木匠</span>
				<span class="pubTime">2014年4月21日</span>
				<div class="test">
					<span class="bot"></span>
					<span class="top"></span>
					<p>
用了一天不到的时间，仔细读完了！这本书让我有了好多好多的感触。喜欢里面的很多文字。喜欢陈坤的语调。喜欢读一个人的内心。很真实。
你必须很喜欢和自己作伴。好处是：你不必为了顺从别人或讨好别人而扭曲自己。-------------《费里尼自传》喜欢这句话。人要学会孤独！人要学会自己和自己想出。
人，只有一次机会活着，如果你有决心，如果你愿意，并不需要按照所谓的人应该经历的各个阶段生活。有时候，看着别人生活也是一种享受，安静地消失在热闹中，站在角落观察这个世界，很奇妙。不知什么时候开始，我喜欢安安静静观察人，哪怕是闹腾的酒吧，我都能放空自己，观察眼前的人。也许，并没有收获
					</p>
				</div>
				<div class="userImage">
					<img src="images/user_01.gif">
				</div>
				<span class="username">周权小木匠</span>
				<span class="pubTime">2014年4月21日</span>
				<div class="test">
				<span class="bot"></span>
				<span class="top"></span>
				<p>
书的设计印刷很不错，一如陈坤的文字，给人一种干净舒服的感觉。推荐购买。
				</p>
				</div>
			</div>
			<!-- end of bookComments -->
			<div class="pubComment">
				<h3>发表评论</h3>
				<form>
					<textarea cols="83" rows="5"></textarea>
					<input type="submit" value="提交" onclick="alert('提交成功!');" />
				</form>
			</div>
			<!-- end of pub Comment -->
		</div>
	</div>
</div>

<?php
	include('templates/footer.html');
?>