<?php

session_start();
include_once("functions/is_login.php");

if(isset($_GET["login_message"])){
	if($_GET["login_message"] == "checknum_error"){
		echo "验证码错误，重新登录!<br/>";
	}
	else if($_GET["login_message"] == "password_error"){
		echo "密码错误，重新登录!<br/>";
	}else if($_GET["login_message"] == "password_right"){
		echo "登录成功!<br/>";
	}
}

if(is_login()){
	echo "欢迎".$_SESSION['name']."访问系统!<br/>";
	echo "<a href='logout.php'>注释</a><br/>";
	return;
}

$name = "";
if(isset($_COOKIE["name"])){
	$name = $_COOKIE["name"];
}

$password = "";

if(isset($_COOKIE["password"])){
	$password = $_COOKIE["password"];
}

?>

<form action = "login_process.php" method="post">
	用户名:
	<input type="text" name="name" size="11" value="<?php echo $name?>"/><br/>
	密码:
	<input type="password" name="password" size="11" value="<?php echo $password?>"/><br/>
	验证码:
	<input type="text" name="checknum" size="6"/>
	<?php
	$checknum = "";
	$checknum .= mt_rand(0, 9);
	$checknum .= mt_rand(0, 9);
	$checknum .= mt_rand(0, 9);
	$checknum .= mt_rand(0, 9);
	$_SESSION['checknum'] = $checknum;
	echo $checknum;
	?>
	<input type="checkbox" name="expire" value="3600" checked/>Cookie保存一个小时<br/>
	<input type="submit" value="登录"/>
</form>  