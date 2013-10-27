<html>
<head>
	<title>search records</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<?php 
	echo $_SERVER['SCRIPT_NAME']."<BR>";
	include_once("include/db_connection.php");

	
?>
<body>
<h2>搜索记录</h2>
<p><font size="+2">搜索表格中的内容 标明匹配关键字</font></p>

<form name="customersPowerSearchForm" method="POST" action="search.php">
	<table cellspacing="2" cellpadding="2" border="0" width="500">
		<tr>
			<td height="40" align=right><font color=red><b>关键字 :</b></font>   </td>
			<td><input type="text" name="keyword" value=""></td>
		</tr>
	</table>
	<div  style="padding-left:150px;padding-top:10px" >
		<input type="submit" name="submitpowerSearchCustomersForm" value="搜索">
		<input type="reset" name="resetForm" value="重设">
	</div>
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