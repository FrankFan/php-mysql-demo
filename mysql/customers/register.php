<html>
<head>
	<title>注册</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo $_SERVER['SCRIPT_NAME']."<br/>";?>

<?php 
	$debug = true;

	//开启session，设置utf8编码
	session_start();

	if(!isset($_SESSION["SESSION"]))  require_once("include/session_init.php");

	$arVal = array();
	require_once("include/session_funcs1.php");

	reset($_POST);
	while (list ($key, $val) = each($_POST)) {
		if($val == "") $val = "NULL";
		$arVals[$key] = (get_magic_quotes_gpc()) ? $val : addslashes($val);
		if ($val == "NULL") {
			$_SESSION[$key] = NULL;
		}else{
			$_SESSION[$key] = $val;
		}
		if($key != "access_period" && $key != "passwd")
			$arVals[$key] = "'".$arVals[$key]."'";
		if ($debug) echo $key . " : " . $arVals[$key] . "<br>";
	}

	if ((!isset($_SESSION["fname"])) || (!isset($_SESSION["lname"])) || (!isset($_SESSION["email"])) ||  
		(!isset($_SESSION["phone"])) || (!isset($_SESSION["city"])) || (!isset($_SESSION["state"])) || 
		(!isset($_SESSION["pcode"]))) {
		 resendToForm("?flg=red");
	}

	if ($_SESSION['fname'] == "" || $_SESSION['lname'] == "" || $_SESSION['email'] == "" || 
		$_SESSION['phone'] == "" || $_SESSION['addr1'] == "" || $_SESSION['city'] == "" || 
		$_SESSION['state'] == "" || $_SESSION['pcode'] == "") {
		resendToForm("?flg=red");
	}

	if (strlen($_SESSION['fname']) > 35  || strlen($_SESSION['lname']) > 35
		|| strlen($_SESSION['email']) > 35 || strlen($_SESSION['phone']) > 35 
		|| strlen($_SESSION['addr1']) > 35 || strlen($_SESSION['city']) > 35 
		|| strlen($_SESSION['pcode']) > 35 || strlen($_SESSION['phone']) > 30 || strlen($_SESSION['passwd']) > 30) {
		resendToForm("?flg=white");
	}

	if (strlen($_SESSION['q1']) > 60) $_SESSION['q1'] = substr($_SESSION['q1'],0,60);
	if (strlen($_SESSION['q2']) > 60) $_SESSION['q2'] = substr($_SESSION['q2'],0,60);
	if (strlen($_SESSION['q3']) > 60) $_SESSION['q3'] = substr($_SESSION['q3'],0,60);

	//mysql_query("set names utf8");
	$query = "SELECT COUNT(sEmail) FROM tbl_users where sEmail = '".$_SESSION['email']."'";
	if ($debug) echo "<br>SQL STATEMENT:<br>".$query."<br><br>";

	echo "11111" . $_SESSION['MYSQL_SERVER1'];
	echo "22222" . $_SESSION['MYSQL_LOGIN1'];
	echo "33333" . $_SESSION['MYSQL_PASS1'];

	//mysql_connect($_SESSION['MYSQL_SERVER1'],$_SESSION['MYSQL_LOGIN1'],$_SESSION['MYSQL_PASS1'])
    //               or die("Unable to connect to my sql server");
    
	mysql_connect("localhost","root","123456")
                   or die("Unable to connect to my sql server");
    mysql_select_db($_SESSION['MYSQL_DB1']) or die("Unable to select database");

    $result = mysql_query($query) or die("Invalid query (login): " . mysql_error());
    $row = mysql_fetch_row($result);

    if ($row[0] > 0) { 
		resendToForm("?flg=yellow");
	}

	$password = $arVals['passwd'];
	$arVals['passwd'] = "'".md5($arVals['passwd'])."'";

	$query = "INSERT INTO tbl_users (sFName, sLName, sAddr1, sCity, sState, sPCode, "
		."cCountryCode, sPhone, sEmail, sPassword, sQ1, sQ2, sQ3, sAccessPeriod) "
		."VALUES (".$arVals['fname'].", ".$arVals['lname'].", ".$arVals['addr1'].", ".$arVals['city'].", "
		.$arVals['state'].", ".$arVals['pcode'].", 'US'"
		.", ".$arVals['phone'].", ".$arVals['email'].", ".$arVals['passwd'].", ".$arVals['q1'].", ".$arVals['q2']
		.", ".$arVals['q3'].", ".$arVals['access_period'].")";

	echo $query;
	mysql_query("set names utf8");
	$result = mysql_query($query) or die("Invalid query: " . mysql_error() . "<br><br>". $query);
	$insertid = mysql_insert_id();



	function resendToForm($flags){
		reset($_POST);

		while (list ($key, $val) = each($_POST)) {
			$_SESSION[$key] = $val;
		}

		//echo flags
		header("Location: /mysql/customers/user_registration.php");
		exit;
	}

?>
</head>
<body>
	<br/><br/>
	<h2数据成功写入.</h2><br>
	<br><br><br>
</body>
</html>
<?php
	reset ($arVals);
	while (list ($key, $val) = each ($arVals)) {
		echo $key . " : " . $arVals[$key] . "<br>";
	}
	
	echo "<br><br>SQL语句:<br>";
	echo $query."<br><br><br><br>";
?>