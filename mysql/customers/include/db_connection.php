<?php
	define('CURSCRIPT', 'forumdisplay');
	$dbHostname = "localhost";
	$dbUsername = "root";
	$dbPassword = "123456";
	$dbName     = "samples";

	$dblink = mysql_connect($dbHostname, $dbUsername, $dbPassword)
		or die("数据库连接失败! ").mysql_error();

	mysql_select_db($dbName)
		or die("Unable to select database ".$dbName);

	//echo "<h1>成功连接数据库。</h1>";
?>