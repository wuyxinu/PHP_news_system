<?php

$database_connection = null;

function get_connection(){
	$hostname = "127.0.0.1";
	$database = "news";
	$username = "root";
	$password = "root";
	global $database_connection;
	$database_connection = @mysql_connect($hostname, $username, $password) or die(mysql_error());
	mysql_query("set names 'utf8'");
	mysql_select_db($database, $database_connection) or die(mysql_error());

	
	}
	function close_connection(){
		global $database_connection;
		if($database_connection){
			mysql_close($database_connection) or die(mysql_error());
		}
}

?>