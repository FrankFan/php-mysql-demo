<html>
<head>
	<title>mysql database</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<h2>1. connect to db</h2>
<?php 
	//连接数据库测试代码

	$user = "root";
	$passwd = "123456";

	$connect = mysql_connect('localhost', $user, $passwd)
		or die('数据库连接失败.'. mysql_error());
		mysql_query("SET NAMES utf8", $connect);
	echo "<br /> <b>第一步：</b>成功建立连接. <br />";

	$db = 'samples';
	mysql_select_db($db)
		or die('Could not select database ('.$db.') beacuse of '.mysql_error());
	echo "<br/> <b>第二步：</b>成功连接到 ".$db." <br/>";

	//mysql_close();
?><br/>

<h2>2. retrieving data</h2>
<?php 
	$query = "select * from customers";
	mysql_query("set names utf8"); //一定要设置编码，否则就乱了
	$result = mysql_query($query)
		or die("Query Failed: ". mysql_error());
		

    //print_r(mysql_fetch_array($result, MYSQL_ASSOC));	
		
	echo "<br><br><b>获取数据...</b><br>";
	echo "<table  cellspacing='0' cellpadding='3' border='1' width='1500'>\n";

	$count = 0;
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
		echo "\t<tr>\n";
		foreach ($line as $col_value) {
			echo "\t\t<td>$col_value</td>\n";
		}

		$count++;
		echo "\t</tr>\n";
	}
	echo "</table>\n";

	if ($count < 1) {
		echo "<br><br>表格中未发现记录.<br><br>";
	}else{
		echo "<br><br>表格中有".$count."行记录.<br><br>";
	}

?><br/>


</body>