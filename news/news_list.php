<?php
header("content-Type: text/html; charset=Utf-8");
include_once("functions/database.php");
include_once("functions/page.php");
include_once("functions/is_login.php");

if(!session_id()){
	session_start();
}

if(isset($_GET["message"])){
	echo $_GET["message"]."<br/>";
}

$search_sql = "select * from news order by news_id desc";

$keyword = "";

if(isset($_GET["keyword"])){
	$keyword = trim($_GET["keyword"]);
	$search_sql = "select * from news where title like '%$keyword%' or content like '%$keyword%' order by news_id desc";
}

?>

<form action = "index.php?url=news_list.php" method="get">
	请输入关键字:
	<input type="text" name="keyword" value="<?php echo $keyword?>">
	<input type="submit" name="搜索">
</form>
<br/>
<table>
<?php

get_connection();

$result_news = mysql_query($search_sql);

$total_records = mysql_num_rows($result_news);

$page_size = 3;

if(isset($_GET["page_current"])){
	$page_current = $_GET["page_current"];
}else{
	$page_current = 1;
}

$start = ($page_current - 1) * $page_size;

$search_sql = "select * from news order by news_id desc limit $start, $page_size";

if(isset($_GET["keyword"])){
	$keyword = $_GET["keyword"];
	$search_sql = "select * from news where title like '%$keyword%' or content like '%$keyword%' order by news_id desc limit $start,$page_size";
}

$result_set = mysql_query($search_sql);

close_connection();

if(mysql_num_rows($result_set) == 0){
	exit("暂无记录!");
}

while($row = mysql_fetch_array($result_set)){
?>

<tr>
	<td>
		<a href = "index.php?url=news_detail.php&keyword=<?php echo $keyword?>&news_id=<?php echo mb_strcut($row['news_id'], 0, 40, "utf8")?>"><?php echo mb_strcut($row['title'], 0, 40, "utf8")?></a>
	</td>
	<?php
		if(is_login()){
	?>
	<td>
		<a href = "index.php?url=news_edit.php&news_id=<?php echo $row['news_id']?>">编辑</a>
	</td>
	<td>
		<a href = "index.php?url=news_delete.php&news_id=<?php echo $row['news_id']?>" onclick = "return confirm('确定删除吗?');">删除</a> 
	</td>
	<?php
	}
	?>
</tr>
<?php
}

?>
</table>
<?php
$url = $_SERVER["PHP_SELF"];
page($total_records, $page_size, $page_current, $url, $keyword);
?>