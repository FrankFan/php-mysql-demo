<html>
<head>
	<title>ready to delete record</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php 
	echo $_SERVER['SCRIPT_NAME']."<BR>";
	include_once("include/db_connection.php");

	// declare variables
	$thisCustomer_id = 0;

	if (!empty($_REQUEST['customer_idField'])) {
		$thisCustomer_id = $_REQUEST['customer_idField'];
	}else{
		echo "<h3>传入参数错误!</h3>";
		return;
	}

	$sql = "DELETE from customers where customer_id = '$thisCustomer_id';";

	$result = mysql_query($sql)
		or die("Unable to run sql . error : ".mysql_error());

	if (!$result) {
		echo "<h3>error occurs. </h3>";
		return;
	}

?>

<body>
<br><h3>记录已经被删除.</h3><br>

<p>&nbsp;</p>
<ul>
    <li>
    	<div align="left"><a href="enter_new.php">添加新纪录</a></div>
    </li>
    <li>
        <div align="left"><a href="list.php">所有记录列表</a></div>
    </li>
	<li>
        <div align="left"><a href="search_form.php">搜索记录</a></div>
    </li>
</ul>

</body>

</html>