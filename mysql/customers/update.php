<htlm>
<head>
	<title>update records</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<?php 
	echo $_SERVER['SCRIPT_NAME']."<BR>";
	include_once("include/db_connection.php");
	mysql_query("set names utf8");


	$thisCustomer_id = addslashes($_REQUEST['thisCustomer_idField']);
	$thisFname = addslashes($_REQUEST['thisFnameField']);
	$thisLname = addslashes($_REQUEST['thisLnameField']);
	$thisCompany = addslashes($_REQUEST['thisCompanyField']);
	$thisAddress1 = addslashes($_REQUEST['thisAddress1Field']);
	$thisAddress2 = addslashes($_REQUEST['thisAddress2Field']);
	$thisCity = addslashes($_REQUEST['thisCityField']);
	$thisState_province = addslashes($_REQUEST['thisState_provinceField']);
	$thisCountry = addslashes($_REQUEST['thisCountryField']);
	$thisPostal_code = addslashes($_REQUEST['thisPostal_codeField']);
	$thisPhone = addslashes($_REQUEST['thisPhoneField']);
	$thisFax = addslashes($_REQUEST['thisFaxField']);


	//echo "tttttttttttttttttttttt".$thisFname;

	echo "<br/>";

	$sql = "UPDATE customers set customer_id = '$thisCustomer_id', fname = '$thisFname', lname = '$thisLname', 
	company = '$thisCompany', address1 = 'thisAddress1', address2 = 'thisAddress2', city = '$thisCity',
	state_province = '$thisState_province', country = '$thisCountry', postal_code = '$thisPostal_code',
	phone = '$thisPhone', fax = '$thisFax'
	where customer_id = '$thisCustomer_id'";
	echo $sql;


	$result = mysql_query($sql)
		or die("Unable to run mysql_query()" . mysql_error());


?>

<body>
<br>记录已经更新 <br><br>

<table>
<tr height="30">
	<td align="right"><b>ID : </b></td>
	<td><?php echo $thisCustomer_id; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>姓 : </b></td>
	<td><?php echo $thisFname; ?></td>
</tr>

<tr height="30">
	<td align="right"><b>名 : </b></td>
	<td><?php echo $thisLname; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>公司 : </b></td>
	<td><?php echo $thisCompany; ?></td>
</tr>

<tr height="30">
	<td align="right"><b>地址1 : </b></td>
	<td><?php echo $thisAddress1; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>地址2 : </b></td>
	<td><?php echo $thisAddress2; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>城市 : </b></td>
	<td><?php echo $thisCity; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>省份 : </b></td>
	<td><?php echo $thisState_province; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>国家 : </b></td>
	<td><?php echo $thisCountry; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>邮编 : </b></td>
	<td><?php echo $thisPostal_code; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>电话 : </b></td>
	<td><?php echo $thisPhone; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>传真 : </b></td>
	<td><?php echo $thisFax; ?></td>
</tr>
</table>
<p><a href="list.php">返回记录列表</a></p>

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
<html>