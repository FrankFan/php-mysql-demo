<html>
<head>
	<title>insert records</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
	include_once("include/db_connection.php");
?>

<?php 
	//提交表达，插入一条记录到数据库
	
	echo "start commit;";

	mysql_query("set names utf8");

	//$thisCustomer_id = addslashes($_REQUEST["thisCustomer_idField"]);
	$thisFnameField = addslashes($_REQUEST["thisFnameField"]);
	$thisLnameField = addslashes($_REQUEST["thisLnameField"]);
	$thisCompanyField = addslashes($_REQUEST["thisCompanyField"]);
	$thisAddress1Field = addslashes($_REQUEST["thisAddress1Field"]);
	$thisAddress2Field = addslashes($_REQUEST["thisAddress2Field"]);
	$thisCityField = addslashes($_REQUEST["thisCityField"]);
	$thisState_provinceField = addslashes($_REQUEST["thisState_provinceField"]);
	$thisCountryField = addslashes($_REQUEST["thisCountryField"]);
	$thisPostal_codeField = addslashes($_REQUEST["thisPostal_codeField"]);
	$thisPhoneField = addslashes($_REQUEST["thisPhoneField"]);
	$thisFaxField = addslashes($_REQUEST["thisFaxField"]);


	$sqlQuery = "INSERT INTO customers ( fname , lname , company , address1 , address2 ,  city , state_province , country , 
										 postal_code , phone , fax )
								VALUES( '$thisFnameField', '$thisLnameField', '$thisCompanyField', '$thisAddress1Field', 
										'$thisAddress2Field', '$thisCityField', '$thisState_provinceField', '$thisCountryField',
										'$thisPostal_codeField', '$thisPhoneField', '$thisFaxField');";

	//echo $sqlQuery;

	$result = mysql_query($sqlQuery)
		or die("fail : ". mysql_error());
	
	//echo "result = ".$result;
?>
<br>一个新纪录被添加进入数据库.<br>
<br/>

</head>

<body>
<table>
<tr height="30">
	<td align="right"><b>姓 : </b></td>
	<td><?php echo $thisFnameField; ?></td>
</tr>

<tr height="30">
	<td align="right"><b>名 : </b></td>
	<td><?php echo $thisLnameField; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>公司 : </b></td>
	<td><?php echo $thisCompanyField; ?></td>
</tr>

<tr height="30">
	<td align="right"><b>地址1 : </b></td>
	<td><?php echo $thisAddress1Field; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>地址2 : </b></td>
	<td><?php echo $thisAddress2Field; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>城市 : </b></td>
	<td><?php echo $thisCityField; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>省份 : </b></td>
	<td><?php echo $thisState_provinceField; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>国家 : </b></td>
	<td><?php echo $thisCountryField; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>邮编 : </b></td>
	<td><?php echo $thisPostal_codeField; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>电话 : </b></td>
	<td><?php echo $thisPhoneField; ?></td>
</tr>
<tr height="30">
	<td align="right"><b>传真 : </b></td>
	<td><?php echo $thisFaxField; ?></td>
</tr>
</table>
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