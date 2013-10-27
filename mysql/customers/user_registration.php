<html>
<head>
	<title>用户注册表单</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="include/main.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
		function SubmitForm(){
			var form = document.forms[0];
			var bRequired = true;

			if ((form.access_period.selectedIndex < 1) || 
				(form.fname.value.length < 1) ||
				(form.lname.value.length < 1) ||
				(form.email.value.length < 1) ||
				(form.phone.value.length < 1) ||
				(form.addr1.value.length < 1) ||
				(form.city.value.length < 1)  ||
				(form.pcode.value.length < 1) ||
				(form.passwd.value.length < 1)||
				(form.passwd2.value.length <1)||
				(form.state.selectedIndex < 1) ||
				(form.q1.selectedIndex < 1) ||
				(form.q2.selectedIndex < 1) ||
				(form.q3.selectedIndex < 1)) {
				alert("填写所有必填项");
				bRequired = false;
			};

			if(!bRequired) return false;

			form.q1_sel.value = form.q1.selectedIndex;
			form.q2_sel.value = form.q2.selectedIndex;
			form.q3_sel.value = form.q3.selectedIndex;
			form.access_period_sel.value = form.access_period.selectedIndex;
			form.state_sel.value = form.state.selectedIndex;

			form.submit();

		}

		//自动填充表格
		function FormFill(){
			var form = document.forms[0];

			form.fname.value = "Frank";
			form.lname.value = "Fan";
			form.email.value = "fanyong@gmail.com";
			form.phone.value = "86-021-12121212";
			form.addr1.value = "浦东大道";
			form.city.value = "上海";
			form.pcode.value = "518000";
			form.passwd.value = "123456";
			form.passwd2.value = "123456";
			form.state.selectedIndex = 3;
			form.access_period.selectedIndex = 2;
			form.q1.selectedIndex = 1;
			form.q2.selectedIndex = 2;
			form.q3.selectedIndex = 2;
		}

	</script>

<?php echo $_SERVER['SCRIPT_NAME']."<br/>";?>
<?php
	//添加http请求头
	header("Expires: Thu, 17 May 2001 10:17:17 GMT");
	header("Last-Modified: ".gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-cache");

	//启动session
	session_start();

	//如果未设置session，就初始化session
	if (!isset($_SESSION['SESSION'])) {
		require("include/session_init.php");
	}

	//引用session_funcs1.php
	$arVals = array();
	require_once("include/session_funcs1.php");
	reset($arVals);
	//遍历数组，判断$_SESSION[$key]是否被赋值或者是否为null
	while (list($key, $val) = each($arVals)) {
		if (!isset($_SESSION[$key])) {
			$_SESSION[$key] = "";
		}
		if ($_SESSION[$key] == "NULL") {
			$_SESSION[$key] = "";
		}
	}

	//判断session是否为空
	if ($_SESSION["access_period_sel"] == "") $_SESSION["access_period_sel"] = 0; 
	if ($_SESSION["state_sel"] == "") $_SESSION["state_sel"] = 0; 
	if ($_SESSION["q1_sel"] == "") $_SESSION["q1_sel"] = 0; 
	if ($_SESSION["q2_sel"] == "") $_SESSION["q2_sel"] = 0; 
	if ($_SESSION["q3_sel"] == "") $_SESSION["q3_sel"] = 0;

	//
	$flg = "";
	$error = "";
	if(isset($_GET["flg"]))  $flg = $_GET["flg"];

	switch ($flg) {
		case "yellow":
			$error = "<br><font class=\"txt12_red\">邮箱已存在.<br>选择其他邮箱.<BR></font>";
			break;
		case "red":
			$error = "<br><font class=\"txt12_red\">填写所有必填项.<br>重试.<BR></font>";
			break;
		case "blue":
			$error = "<br><font class=\"txt12_red\">登录超时.<br>重新登陆.</font><BR>";
			break;
		case "pink":
			$error = "<br><font class=\"txt12_red\"><BR>无效特殊字符.<br>重填或留空.</font><BR>";
			break;
		case "white":
			$error = "<br><font class=\"txt12_red\"><BR>输入字符太多.<br>重新填写表单.</font><BR>";
			break;
		default:
			$error = "";
	}


?>



</head>
<body>
	<table width="100%"  border="0" cellspacing="6" cellpadding="6">
	  <tr>
	    <td>
	    	<div align="right" class="txt24bb_white">User Registration</div>
	    </td>
	  </tr>
	</table>

	<div align="center">
		<form name="form1" method="post" action="/mysql/customers/register.php">
			<!--4个隐藏域 -->
			<input type="hidden" name="access_period_sel" id="access_period_sel" value="<?php echo $_SESSION['access_period_sel']; ?>">
			<input type="hidden" name="state_sel" value="<?php echo $_SESSION['state_sel']; ?>">
			<input type="hidden" name="q1_sel" value="<?php echo $_SESSION['q1_sel']; ?>">
			<input type="hidden" name="q2_sel" value="<?php echo $_SESSION['q2_sel']; ?>">
			<input type="hidden" name="q3_sel" value="<?php echo $_SESSION['q3_sel']; ?>">


			<div align="center">
		      <p>
		          <span class="txt24b_black">用户注册 </span><br>
		      </p>
		    </div>

		    <div align="center">
		    	<table width="500" border="0" cellpadding="0" cellspacing="0" class="tbl_gray_wborder">
		    		<tr>
		    			<td class="txt14b_red">
		    				<table width="426" border="0" align="center" cellpadding="0" cellspacing="0" class="txt12b_black">
		    					<tr>
		    						<td width="15"></td>
				                    <td width="142"></td>
				                    <td width="220"></td>
				                    <td width="47"></td>
		    					</tr>
		    					<tr>
				                   <td colspan="4" >&nbsp;</td>
				                </tr>
				                <tr>
				                    <td colspan="4" align="center"><?php echo $error; ?>
				                      <div align="left"></div>
				                    </td>
			                    </tr>
			                     <tr height="7">
			                     	<td height="7"><img src="images/bar_bg.gif" width="1" height="1" /></td>
				                    <td height="7"><img src="images/bar_bg.gif" width="1" height="1" /></td>
				                    <td height="7"><img src="images/bar_bg.gif" width="1" height="1" /></td>
				                    <td height="7"><img src="images/bar_bg.gif" width="1" height="1" /></td>
			                     <tr>
			                     <tr height="20">
			                     	<td height="40">&nbsp;</td>
				                    <td height="40" class="txt12_black"><div align="left">类型:</div></td>
				                    <td height="40" align="right" class="txt_main12">
				                      <select name="access_period" class="form-list-white-nar-sm" id="access_period">
				                      <option value="">选择类型</option>
				                      <option value="7">每周</option> 
				                      <option value="15">每月</option>
				                      <option value="20">每季</option>
				                      </select>
				                    </td>
				                    <td height="40"><font class="text-required-orng">&nbsp;
				                    	<img src="images/tip-icon.png" width="8" height="9" hspace="0" vspace="0" border="0" 
				                    	align="top" /></font>
				                    </td>
			                     </tr>
			                     <tr height="20">
			                     	<td height="26">&nbsp;</td>
				                    <td height="26" class="txt12_black"><div align="left">姓:</div></td>
				                    <td height="26" align="right" class="txt_main12">
				                      <input name="fname" type="text" class="form-field-white-nar-sm" value="<?php echo $_SESSION['fname']  ?>" size="30" maxlength="50" />
				                    </td>
				                    <td height="26">
				                    	<font class="text-required-orng">&nbsp;
				                    		<img src="images/tip-icon.png" width="8" height="9" hspace="0" vspace="0" border="0" 
				                    		align="top" />
				                    	</font>
				                    </td>
			                     </tr>

			                    <tr>
				                    <td>&nbsp;</td>
				                    <td height="26" class="txt12_black"><div align="left">名:</div></td>
				                    <td align="right" class="txt_main12"><input name="lname" type="text" class="form-field-white-nar-sm" id="lname4" value="<?php echo $_SESSION['lname']  ?>"  size="30" maxlength="50" />
				                    </td>
				                    <td>
				                    	<font class="text-required-orng">&nbsp;
				                    		<img src="images/tip-icon.png" width="8" height="9" hspace="0" vspace="0" border="0" align="top" />
				                    	</font>
				                    </td>
			                    </tr>

			                    <tr>
				                    <td>&nbsp;</td>
				                    <td height="26" class="txt12_black"><div align="left">Email :</div></td>
				                    <td align="right"><input name="email" type="text" class="form-field-white-nar-sm" id="email4" value="<?php echo $_SESSION['email']  ?>" size="30" maxlength="80" /></td>
				                    <td><font class="text-required-orng">&nbsp;
				                    	<img src="images/tip-icon.png" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
			                    </tr>

			                    <tr>
				                    <td>&nbsp;</td>
				                    <td height="26" class="txt12_black"><div align="left">电话:</div></td>
				                    <td align="right"><input name="phone" type="text" class="form-field-white-nar-sm" id="phone5" value="<?php echo $_SESSION['phone']  ?>" size="30" maxlength="30" />
				                    </td>
				                    <td>
				                    	<font class="text-required-orng">&nbsp;
				                    		<img src="images/tip-icon.png" width="8" height="9" hspace="0" vspace="0" border="0" align="top" />
				                    	</font>
				                	</td>
			                    </tr>

			                    <tr>
				                    <td>&nbsp;</td>
				                    <td height="26" class="txt12_black"><div align="left">地址:</div></td>
				                    <td align="right"><input name="addr1" type="text" class="form-field-white-nar-sm" id="address24" value="<?php echo $_SESSION['addr2']  ?>" size="30" maxlength="70" />
				                    </td>
				                    <td>&nbsp;</td>
			                    </tr>
			                    <tr>
				                    <td>&nbsp;</td>
				                    <td height="26" class="txt12_black"><div align="left">城市:</div></td>
				                    <td align="right"><input name="city" type="text" class="form-field-white-nar-sm" id="city" value="<?php echo $_SESSION['city']  ?>" size="30" maxlength="50"/></td>
				                    <td><font class="text-required-orng">&nbsp;<img src="images/tip-icon.png" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
			                    </tr>
			                    <tr>
				                    <td>&nbsp;</td>
				                    <td height="30" class="txt12_black"><div align="left">省份:</div></td>
				                    <td align="right">
				                    	<select name="state" class="form-list-white-nar-sm">
					                      <option value="">请选择</option>
					                      <option value="河北省">河北省</option>
					                      <option value="山西省">山西省</option>
					                      <option value="吉林省">吉林省</option>
					                      <option value="黑龙江省">黑龙江省</option>
					                      <option value="广东省">广东省</option>
					                      <option value="河南省">河南省</option>
					                      <option value="四川省">四川省</option>
					                    </select>
				                    </td>
				                    <td><font class="text-required-orng">&nbsp;<img src="images/tip-icon.png" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
			                    </tr>
			                    <tr>
				                    <td>&nbsp;</td>
				                    <td height="30" class="txt12_black"><div align="left">邮编:</div></td>
				                    <td align="right"><input name="pcode" type="text" class="form-field-white-nar-sm" id="pcode4" value="<?php echo $_SESSION['pcode'] ?>" size="30" maxlength="40" />
				                    </td>
				                    <td><font class="text-required-orng">&nbsp;<img src="images/tip-icon.png" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
			                    </tr>

			                    <tr height="10">
				                    <td height="10"><img src="images/bar_bg.gif" width="1" height="1" /></td>
				                    <td height="10" colspan="2" align="right"><img src="images/bar_bg.gif" width="1" height="1" /></td>
				                    <td height="10"><img src="images/bar_bg.gif" width="1" height="1" /></td>
			                    </tr>
			                    <tr>
				                    <td>&nbsp;</td>
				                    <td height="28" colspan="2" valign="middle" class="txt12_black"><div align="left">选择来源</div></td>
			                    </tr>
			                    <tr>
				                    <td>&nbsp;</td>
				                    <td height="26" colspan="2" align="right" valign="middle">
				                    	<select name="q1" class="form-field-white-nar-lg" id="q1">
					                      <option selected>请选择</option>
					                      <option value="在校学生">在校学生</option>
					                      <option value="外校学生">外校学生</option>
					                      <option value="自学">自学</option>
					                    </select>
				                    </td>
				                    <td><font class="text-required-orng">&nbsp;
				                    	<img src="images/tip-icon.png" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
			                    </tr>

			                    <tr>
				                    <td>&nbsp;</td>
				                    <td height="38" colspan="2" valign="middle" class="txt12_black"><div align="left">如果是本校生请选择?</div></td>
				                    <td>&nbsp;</td>
			                    </tr>
			                    <tr>
			                    <td>&nbsp;</td>
			                    <td height="26" colspan="2" align="right" valign="top" class="txt12_black">
			                    	<select name="q2" class="form-field-white-nar-lg" id="q2">
				                      <option>请选择</option>
				                      <option value="大一">大一</option>
				                      <option value="大二">大二</option>
				                      <option value="大三">大三</option>
				                      <option value="大四;">大四</option>
				                    </select>
			                    </td>
			                    <td><font class="text-required-orng">&nbsp;
			                    	<img src="images/tip-icon.png" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
			                    </tr>
			                    <tr>
				                    <td>&nbsp;</td>
				                    <td height="28" colspan="2" valign="middle" class="txt12_black"><div align="left">爱好:</div></td>
				                    <td>&nbsp;</td>
			                    </tr>
			                    <tr>
				                    <td>&nbsp;</td>
				                    <td height="26" colspan="2" align="right" valign="top" class="txt12_black">
				                    	<select name="q3" class="form-field-white-nar-lg" id="q3">
					                      <option>请选择</option>
					                      <option value="篮球">篮球</option>
					                      <option value="足球">足球</option>
					                      <option value="排球">排球</option>
					                      <option value="乒乓球">乒乓球</option>
					                    </select>
				                    </td>
			                    <td><font class="text-required-orng">&nbsp;
			                    	<img src="images/tip-icon.png" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
			                    </tr>

			                    <tr>
				                    <td>&nbsp;</td>
				                    <td height="28" colspan="2" valign="middle" class="txt12_black"><div align="left">密码:</div></td>
				                    <td>&nbsp;</td>
			                    </tr>
			                    <tr>
				                    <td>&nbsp;</td>
				                    <td height="26" colspan="2" align="right" valign="top" class="txt12_black">
				                    	<input name="passwd" type="password" class="form-field-white-nar-sm" id="passwd" size="20" maxlength="40" />
				                    </td>
				                    <td><font class="text-required-orng">&nbsp;
				                    	<img src="images/tip-icon.png" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
			                    </tr>
			                    <tr>
				                    <td>&nbsp;</td>
				                    <td height="28" colspan="2" valign="middle" class="txt12_black"><div align="left">密码:</div></td>
				                    <td>&nbsp;</td>
			                    </tr>
			                    <tr>
				                    <td>&nbsp;</td>
				                    <td height="26" colspan="2" align="right" valign="top"><input name="passwd2" type="password" class="form-field-white-nar-sm" id="passwd2" size="20" maxlength="40" />
				                    </td>
				                    <td><font class="text-required-orng">&nbsp;
				                    	<img src="images/tip-icon.png" width="8" height="9" hspace="0" vspace="0" border="0" align="top" /></font></td>
			                    </tr>

			                    <tr height="35">
				                    <td height="35">&nbsp;</td>
				                    <td height="35" colspan="2" align="right" valign="bottom" class="txt_main_str12">
				                      <input type="reset" name="Submit2" value="重置">                      
				                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				                      <input type="button" name="Submit" value="提交" onclick="SubmitForm();  return false;" ></td>
				                    <td height="35">&nbsp;</td>
			                    </tr>

			                    <tr height="15">
				                    <td height="25">&nbsp;</td>
				                    <td height="25" colspan="2" align="right">&nbsp;</td>
				                    <td height="25">&nbsp;</td>
			                    </tr>
			                    <tr height="15">
				                    <td height="25">&nbsp;</td>
				                    <td height="25" colspan="2" align="right"><span class="txt_main_str12">
				                      <input type="button" name="Submit3" value="样例" onclick="FormFill();  return false;" >
				                    </span></td>
				                    <td height="25">&nbsp;</td>
			                    </tr>
			                    <tr height="15">
				                    <td height="25"><img src="images/bar_bg.gif" width="1" height="1" /></td>
				                    <td height="25" colspan="2" align="right"><img src="images/bar_bg.gif" width="1" height="1" /></td>
				                    <td height="25"><img src="images/bar_bg.gif" width="1" height="1" /></td>
			                    </tr>


		    				</table>
		    			</td>
		    		</tr>
		    	</table>
		    </div>
		</form>
	</div>

	<script type="text/javascript">
		// set the selection box values...

		var form = document.forms[0];
		form.access_period.selectedIndex = parseInt("<?php echo $_SESSION['access_period_sel'] ?>");
		form.state.selectedIndex = parseInt("<?php echo $_SESSION['state_sel'] ?>");
		form.q1.selectedIndex = parseInt("<?php echo $_SESSION['q1_sel'] ?>");
		form.q2.selectedIndex = parseInt("<?php echo $_SESSION['q2_sel'] ?>");
		form.q3.selectedIndex = parseInt("<?php echo $_SESSION['q3_sel'] ?>");

	</script>
</body>
</html>