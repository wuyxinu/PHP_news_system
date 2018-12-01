<?php
header("content-Type: text/html; charset=Utf-8");
include_once("functions/database.php");
include_once("functions/page.php");
include_once("functions/is_login.php");
if(!session_id()){
	session_start();
}

$sql = "select * from review";

get_connection();

$result_news = mysql_query($sql);

$total_records = mysql_num_rows($result_news);

$page_size = 3;

if(isset($_GET["page_current"])){
	$page_current = $_GET["page_current"];
}else{
	$page_current = 1;
}

$start = ($page_current - 1) * $page_size;

$result_sql = "select * from review order by review_id desc limit $start, $page_size";

$result_set = mysql_query($result_sql);

close_connection();

echo "系统所有评论信息如下:<br/>";

while($row = mysql_fetch_array($result_set)){
	echo "评论内容:".$row["content"]."<br/>";
	echo "日期:".$row["publish_time"]."&nbsp;&nbsp;";
	echo "IP地址:".$row["ip"]."&nbsp;&nbsp;";
	echo "状态:".$row["state"]."<br/>";
	echo "<a href = 'review_delete.php?review_id=".$row["review_id"]."'>删除</a>";
	echo "&nbsp;&nbsp;&nbsp;";
	if($row["state"] == "未审核"){
		echo "<a href = 'review_verify.php?review_id=".$row["review_id"]."'>审核</a>";
	}
	echo "<hr/>";
}

$url = "index.php?url=review_list.php";
page($total_records, $page_size, $page_current, $url, "");

?>