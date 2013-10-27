<html>
<head>
<?php
	echo $_SERVER['SCRIPT_NAME'].'<BR/>';
?>

<?php
include_once("include/db_connection.php");
mysql_query("set names GBK");

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">
	function FormFill(){

		customersEnterForm.thisFnameField.value = "曹";
		customersEnterForm.thisLnameField.value = "鹏";
		customersEnterForm.thisCompanyField.value = "编程之邦";
		customersEnterForm.thisAddress1Field.value = "深南大道";
		customersEnterForm.thisAddress2Field.value = "凤凰大厦";
		customersEnterForm.thisCityField.value = "深圳";
		customersEnterForm.thisState_provinceField.value = "广东";
		customersEnterForm.thisCountryField.value = "中国";
		customersEnterForm.thisPostal_codeField.value = "518000";
		customersEnterForm.thisPhoneField.value = "075500000000";
		customersEnterForm.thisFaxField.value ="075500000000";

	}
</script>
</head>

<body>
<h2>写入记录</h2>

<form name="customersEnterForm" id="myform" method="POST" action="insert_new.php">
	<table cellspacing="2" cellpadding="2" border="0" width="100%">
		
		<tr valign="top" height="20">
			<td align="right"> <b> 姓 :  </b> </td>
			<td> <input type="text" name="thisFnameField" size="20" value="">  </td> 
		</tr>
		
		<tr valign="top" height="20">
			<td align="right"> <b> 名 :  </b> </td>
			<td> <input type="text" name="thisLnameField" size="20" value="">  </td> 
		</tr>
		<tr valign="top" height="20">
			<td align="right"> <b> 公司 :  </b> </td>
			<td> <input type="text" name="thisCompanyField" size="20" value="">  </td> 
		</tr>
		<tr valign="top" height="20">
			<td align="right"> <b> 地址1 :  </b> </td>
			<td> <input type="text" name="thisAddress1Field" size="20" value="">  </td> 
		</tr>
		<tr valign="top" height="20">
			<td align="right"> <b> 地址2 :  </b> </td>
		  <td> <input type="text" name="thisAddress2Field" size="20" value="">  </td> 
		</tr>
		
		<tr valign="top" height="20">
			<td align="right"> <b> 城市 :  </b> </td>
			<td> <input type="text" name="thisCityField" size="20" value="">  </td> 
		</tr>
		<tr valign="top" height="20">
			<td align="right"> <b> 省份 :  </b> </td>
			<td> <input type="text" name="thisState_provinceField" size="20" value="">  </td> 
		</tr>
		<tr valign="top" height="20">
			<td align="right"> <b> 国家 :  </b> </td>
			<td> <input type="text" name="thisCountryField" size="20" value="">  </td> 
		</tr>
		<tr valign="top" height="20">
			<td align="right"> <b> 邮编 :  </b> </td>
			<td> <input type="text" name="thisPostal_codeField" size="20" value="">  </td> 
		</tr>
		<tr valign="top" height="20">
			<td align="right"> <b> 电话 :  </b> </td>
			<td> <input type="text" name="thisPhoneField" size="20" value="">  </td> 
		</tr>
		<tr valign="top" height="20">
			<td align="right"> <b> 传真 :  </b> </td>
			<td> <input type="text" name="thisFaxField" size="20" value="">  </td> 
		</tr>
	</table>

	<p>
	  <input type="submit" name="submitEnterCustomersForm" value="提交表单">
	  <input type="reset" name="resetForm" value="重设表单">
	  <input type="button" name="Submit3" value="填写例子" onclick="FormFill();  return false;" >
	</p>


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

</form>


</body>

</html>