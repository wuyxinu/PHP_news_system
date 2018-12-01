<?php

include_once("functions/is_login.php");
if(!session_id()){
	session_start();
}
if(!is_login()){
	echo "请您登录系统后,再访问该页面!";
	return;
}

?>

<head>
    <title>Sample CKEditor Site</title>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
    window.onload = function()
    {
        CKEDITOR.replace( 'content' );     //content是textarea的名称
        CKEDITOR.WIDTH = 550;
    };
</script>
</head>
<body>
<form method="post" enctype="multipart/form-data" action="news_save.php" charset="Utf-8">
	<p>
		标题:
		<input type="text" name="title" size = "60">
	</p>
	<p>
		内容:
		<textarea name = "content">
		</textarea>
	</p>
	<p>
		<select name="category_id" size="1">
			<?php
			include_once("functions/database.php");
			get_connection();
			$result_set = mysql_query("select * from category");
			close_connection();
			while($row = mysql_fetch_array($result_set)){
				?>
				<option value="<?php echo $row['category_id'];?>"><?php echo $row['name'];?>
				</option>
			<?php
			}
			?>
		</select>
	</p>
	<p>
		附件:
		<input type="file" name = "news_file" size = "50">
		<input type="hidden" name="MAX_FILE_SIZE" value="10485760">
	</p>
	<p>
		<input type="submit" name="提交">
		<input type="reset" name="重置">
	</p>
</form>
</body>
