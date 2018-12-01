<!DOCTYPE html>
<html>
<head>
	<title>欢迎访问新闻发布系统！</title>
	<link rel="stylesheet" type="text/css" href="css/news.css">
</head>
<body>
	<div id = "container">
		<div id = "header">
			<div id = "menu">
				<ul>
					<li><a href="index.php?url=news_list.php">首页</a></li>
					<li class="menudiv"></li>
					<li><a href="index.php?url=review_list.php">评论浏览</a></li>
					<li class="menudiv"></li>
					<li><a href="index.php?url=category_list.php">分类浏览</a></li>
					<li class="menudiv"></li>
					<li><a href="index.php?url=news_add.php">新闻发布</a></li>
					<li class="menudiv"></li>
					<li><a href="index.php?url=category_add.php">添加分类</a></li>
					<li class="menudiv"></li>
					<li><a href="">设为首页</a></li>
				</ul>
			</div>
			<div id = "banner">
			</div>
		</div>
		<div id = "pagebody">
			<div id = "sidebar">
				<div id = "login">
					<br>
					<?php
					include_once("login.php");
					?>
				</div>
			</div>
			<div id = "mainbody">
				<div id = "mainfunction">
					<br>
					<?php
						if(isset($_GET["url"])){
							$url = $_GET["url"];
						}else{
							$url = "news_list.php";
						}
						include_once($url);
					?>
				</div>
				<div style="clear: both;"></div>
			</div>
		</div>
		<div id = "footer">
			<a href="">系统简介</a>
			<a href="">联系方法</a>
			<a href="">相关法律</a>
			<a href="">举报违法信息</a>
		</div>
	</div>
</body>
</html>

<script>
	var sidebarHeight = document.getElementById("sidebar").clientHeight;
	var mainbodyHeighy = document.getElementById("mainbody").clientHeight;
	if(sidebarHeight < 500 & mainbodyHeighy < 500){
		document.getElementById("sidebar").style.height = "500px";
		document.getElementById("mainbody").style.height = "500px";
	}else{
		if(sidebarHeight < mainbodyHeighy){
			document.getElementById("sidebar").style.height=mainbodyHeighy + "px";
		}else{
			document.getElementById("mainbody").style.height=sidebarHeight + "px";
		}
	}
</script>