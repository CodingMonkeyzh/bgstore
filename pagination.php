<?php
class Pagination{
	var $sql;
	var $page_string;
	var $page_size;
	function __construct($sql,$size){
		$this->sql = $sql;
		$this->page_size = $size;
	}
	function search(){
		if(isset($_GET['page']))   				//判断是否存在page参数,获得页面值，否则取1
		{
			$page = intval($_GET['page']);
		}
		else
		{
			$page = 1;
		}

		$result = mysql_query($this->sql);
		$row = mysql_fetch_array($result);
		//计算总页数
		$amount = $row['amount'];
		if($amount)
		{
			if($amount < $this->page_size){$page_count = 1;}
			if($amount % $this->page_size){$page_count = (int)($amount / $this->page_size) + 1; }
			else{$page_count = $amount / $this->page_size;}
		}
		else
		{
			$page_count = 1;
		}
		//翻页链接
		$this->page_string = "";
		if($page == 1)
		{
			$this->page_string .= "首页 | 上一页";
		}
		else
		{
			$this->page_string .= "<a href='?page=1'>首页</a> | <a href='?page=".($page-1)."'>上一页</a>";
		}

		$this->page_string .= "| $page/$page_count |";

		if($page == $page_count)
		{
			$this->page_string .= "下一页 | 尾页";
		}
		else
		{
			$this->page_string .= "<a href='?page=".($page+1)."'>下一页</a> | <a href='?page=$page_count'>尾页</a>";
		}
	}
	function print_pagination(){
		$this->search();
		echo $this->page_string;
	}
}
?>