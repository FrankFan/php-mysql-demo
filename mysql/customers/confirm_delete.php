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

	//$sql = "DELETE from customers where customer_id = '$thisCustomer_id';";
	$sql = "SELECT * from customers where customer_id = '$thisCustomer_id';";

	echo "SELECT sql is : ".$sql;

	mysql_query("set names utf8");
	$result = mysql_query($sql)
		or die("Unable to run sql. error: ".mysql_error());

	$numberOfRows = mysql_num_rows($result);
	if ($numberOfRows == 0) {
		echo "<h3>没有找到对应的记录.</h3>";
		return;
	}else if($numberOfRows > 0){
		$i = 0;

		$thisCustomer_id = mysql_result($result, $i, "customer_id");
		$thisFname = mysql_result($result, $i, "fname");
		$thisLname = mysql_result($result, $i, "lname");
		$thisCompany = mysql_result($result, $i, "company");
		$thisAddress1 = mysql_result($result, $i, "address1");
		$thisAddress2 = mysql_result($result, $i, "address2");
		$thisCity = mysql_result($result, $i, "city");
		$thisState_province = mysql_result($result, $i, "state_province");
		$thisCountry = mysql_result($result, $i, "country");
		$thisPostal_code = mysql_result($result, $i, "postal_code");
		$thisPhone = mysql_result($result, $i, "phone");
		$thisFax = mysql_result($result, $i, "fax");

	}
?>

<body>
<h2>确认删除</h2>
<table>
	<tr height="30">
		<td align="right"><b>ID: </b></td>
		<td><?php echo $thisCustomer_id ;?></td>
	</tr>
	<tr height="30">
		<td align="right"><b>姓: </b></td>
		<td><?php echo $thisFname ;?></td>
	</tr>
	<tr height="30">
		<td align="right"><b>名: </b></td>
		<td><?php echo $thisLname ;?></td>
	</tr>
	<tr height="30">
		<td align="right"><b>公司: </b></td>
		<td><?php echo $thisCompany ;?></td>
	</tr>
	<tr height="30">
		<td align="right"><b>地址1: </b></td>
		<td><?php echo $thisAddress1 ;?></td>
	</tr>
	<tr height="30">
		<td align="right"><b>地址2: </b></td>
		<td><?php echo $thisAddress2 ;?></td>
	</tr>
	<tr height="30">
		<td align="right"><b>城市: </b></td>
		<td><?php echo $thisCity ;?></td>
	</tr>
	<tr height="30">
		<td align="right"><b>省份: </b></td>
		<td><?php echo $thisState_province ;?></td>
	</tr>
	<tr height="30">
		<td align="right"><b>国家: </b></td>
		<td><?php echo $thisCountry ;?></td>
	</tr>
	<tr height="30">
		<td align="right"><b>邮编: </b></td>
		<td><?php echo $thisPostal_code ;?></td>
	</tr>
	<tr height="30">
		<td align="right"><b>电话: </b></td>
		<td><?php echo $thisPhone ;?></td>
	</tr>
	<tr height="30">
		<td align="right"><b>传真: </b></td>
		<td><?php echo $thisFax ;?></td>
	</tr>
</table>

<h3>如果你确定删除，点击删除按钮.</h3>
<br><br>
<form name="customerDeleteForm" method="POST" action="delete.php">
	<input type="hidden" name="customer_idField" value="<?php echo $thisCustomer_id;?>" />
	<input type="submit" name="submitConfirmForm" value="删除" />
	<input type="button" name="cancle" value="返回" onClick="javascript:history.back();"  />

</form>



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