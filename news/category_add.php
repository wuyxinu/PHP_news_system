<?php
header("content-Type: text/html; charset=Utf-8");
include_once("functions/is_login.php");

if(!session_id()){
	session_start();
}
if(!is_login())
{
	echo "请您登陆后,在访问该页面";
	return;
}

?>

<form method="post" enctype="multipart/form-data" action="category_save.php" >
分类:	<input type="text" maxlength="10" name="category"><br/>
<input type="submit" name="" value="提交">
<input type="reset"  value="重置" name="">
</form>
