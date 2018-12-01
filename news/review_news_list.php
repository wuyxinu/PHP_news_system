<?php

include_once("functions/database.php");

$news_id = $_GET["news_id"];

$sql = "select * from where news_id=$news_id and state='已审核' order by review_id desc";

get_connection();

$result_set = mysql_query($sql);

close_connection();

echo "该新闻的评论如下:<br/>";

while($row = mysql_fetch_array($result_set))
{
	echo "评论内容:".$row["content"]."<br/>";
	echo "评论日期:".$row["publish_time"]."<br/>";
	echo "评论IP地址:".$row["ip"]."<hr/>";
}

?>