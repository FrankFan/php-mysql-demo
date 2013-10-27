<html>
<head>
	<title>edit records</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>


<?php 
	include_once("include/db_connection.php");
	echo $_SERVER['SCRIPT_NAME'] . "<br/>";

	$thisCustomer_id = $_REQUEST['customer_idField'];

	$sql = "select * from customers where customer_id = '$thisCustomer_id'";
	mysql_query("set names utf8");
	$result = mysql_query($sql)
		or die ('Unable to run query:'.mysql_error());


	$numberOfRows = mysql_num_rows($result);
	if ($numberOfRows == 0) {
		echo "<br/> 没有找到记录. <br/>";
	}else if($numberOfRows > 0){
		$i = 0;
		$thisCustomer_id = mysql_result($result, $i, "customer_id");
		$thisFname = mysql_result($result, $i, "fname");
		$thisLname = mysql_result($result, $i, "lname");
		$thisCompany = mysql_result($result, $i, "company");
		$thisTitle = mysql_result($result, $i, "title");
		$thisAddress1 = mysql_result($result, $i, "address1");
		$thisAddress2 = mysql_result($result, $i, "address2");
		$thisCity = mysql_result($result, $i, "city");
		$thisState_province = mysql_result($result, $i, "state_province");
		$thisCountry = mysql_result($result, $i, "country");
		$thisPostal_code = mysql_result($result, $i, "postal_code");
		$thisPhone = mysql_result($result, $i, "phone");
		$thisFax = mysql_result($result, $i, "fax");


 	}

?><br/>
<body>


</body>
<h2>更新记录</h2>
<form name="customersUpdateForm" method="POST" action="update.php">
	<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign="top" height="20">
		<td align="right"> <b> ID :  </b> </td>
		<td> <input type="text" name="thisCustomer_idField" size="20" value="<?php echo $thisCustomer_id; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> 姓 :  </b> </td>
	  <td> <input type="text" name="thisFnameField" size="20" value="<?php echo $thisFname; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> 名 :  </b> </td>
	  <td> <input type="text" name="thisLnameField" size="20" value="<?php echo $thisLname; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> 公司 :  </b> </td>
		<td> <input type="text" name="thisCompanyField" size="20" value="<?php echo $thisCompany; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> 地址1 :  </b> </td>
		<td> <input type="text" name="thisAddress1Field" size="20" value="<?php echo $thisAddress1; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> 地址2 :  </b> </td>
		<td> <input type="text" name="thisAddress2Field" size="20" value="<?php echo $thisAddress2; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> 城市 :  </b> </td>
		<td> <input type="text" name="thisCityField" size="20" value="<?php echo $thisCity; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> 省份 :  </b> </td>
		<td> <input type="text" name="thisState_provinceField" size="20" value="<?php echo $thisState_province; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> 国家 :  </b> </td>
		<td> <input type="text" name="thisCountryField" size="20" value="<?php echo $thisCountry; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> 邮编 :  </b> </td>
		<td> <input type="text" name="thisPostal_codeField" size="20" value="<?php echo $thisPostal_code; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> 电话 :  </b> </td>
		<td> <input type="text" name="thisPhoneField" size="20" value="<?php echo $thisPhone; ?>">  </td> 
	</tr>
	<tr valign="top" height="20">
		<td align="right"> <b> 传真 :  </b> </td>
		<td> <input type="text" name="thisFaxField" size="20" value="<?php echo $thisFax; ?>">  </td> 
	</tr>
</table>

<p>
  <input type="submit" name="submitUpdateCustomersForm" value="更新记录">
  <input type="reset" name="resetForm" value="重填表单">
</p>
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

</html>





