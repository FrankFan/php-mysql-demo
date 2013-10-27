<html>
<head>
	<title>Hello World! PHP学习记录</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>


<body>
	<?php echo "Hello World."; ?> <br/>
	<!-- comments -->
	<?
		// 这是单行注释
		/*
		*  这是多行注释
		*/
	>
	<br/>
	
	<h2>一、Numbers 整数运算</h2>
	<?php
			$var1 = 3;
			$var2 = 4;
		?>
		
		Basic Math: <?php echo ((1 + 2 + $var1)*$var2)/2-5; ?><br />
		<br />

	<?php //You can perfom math operators directly on values ?>
	+=: <?php $var2 += 4; echo $var2; ?> <br/>
	-=: <?php $var2 -= 5; echo $var2; ?> <br/>
	*=: <?php $var2 *= 3; echo $var2; ?> <br/>
	/=: <?php $var2 /= 2; echo $var2; ?> <br/>
	<p>
	Increment: <?php $var2++; echo $var2; ?>  <br/> 
	Decrement: <?php $var2--; echo $var2; ?>  <br/> 

	<h2>二、Floats 浮点数</h2>
	<?php
		$var1 = 3.14;
		echo $var1;
	?> <br/>
	Floating Point:<?php echo $myFloat = 3.14; ?> <br />
	Round：<?php echo round($myFloat, 1); //保留小数点后1位 ?><br/>
	Ceiling: <?php echo ceil($myFloat); ?><br />
	Floor: <?php echo floor($myFloat); ?><br />
	abs. power. sqr... 省略。。。 <br/>

	<h2>三、Boolean 布尔类型</h2>
	<?php 
		$bool1 = true;
		$bool2 = false;
	?> 
	$bool1: <?php echo $bool1; ?> <br/>
	$bool2: <?php echo $bool2; ?> <br/> <br/>

	<?php
		// isset tests weather a variable has been set
		$var1 = 4;
		$var2 = "cat";
	?>
	$var1 is set:<?php echo isset($var1); ?> <br/>
	$var2 is set:<?php echo isset($var2); ?> <br/>
	$var3 is set:<?php echo isset($var3); ?> <br/>

	<h2>四、Typecasting 类型转换</h2>
	<?php 
		$var1 = "2 ";
		$var2 = $var1 + 3;
		echo $var2;
	?><br/>
	<?php 
		//gettype will retrive an item's type
		echo gettype($var1); echo "<br/>";
		echo gettype($var2); echo "<br/>";
	?><br/>
	<?php 
		//settype will convert an item to a specific type
		settype($var2, "string");
		echo gettype($var2); echo "<br/>";

		//or you can specify the new type in parentheses in front of the item.
		$var3 = (int)$var1;
		echo gettype($var3); echo "<br/>";
	?>

	<h2>五、Constant 常量</h2>
	<?php 
		//定义一般变量的方法
		$max_width = 980;

		//定义常量的方法
		define("MAX_WIDTH", 980);

		echo MAX_WIDTH; echo "<br/>";
		//MAX_WIDTH += 1; 
		//会报错 Parse error: syntax error, unexpected T_PLUS_EQUAL in
		//因为常量的值不可修改
		//echo MAX_WIDTH;
	?><br/>

	<h2>六、IF语句 if statements</h2>
	<?php 
		$a = 3;
		$b = 3;

		if ($a < $b) {
			echo "a is smaller than b.";
		}
		elseif ($a == $b) {
			//推荐使用elseif， 因为 else if 会有编译错误
			echo "a equals b.";
		}else{
			echo "a is lager than b.";
		}
	?><br/>
	<?php 
		echo "<h5>Logicops 逻辑应用</h5>";

		$a = 5;
		$b = 4;
		$c = 1;
		$d = 20;

		if(($a > $b) && ($c > $d)) {
			echo "a is larger than b AND ";
			echo "c is lager than d.";
		}
		elseif (($a > $b) || ($c > $d)) {
			echo "a is larger than b OR ";
			echo "c is lager than d.";
		}else{
			echo "neither a is larger than b nor c is larger than d.";
		}
	?><br/>

	<h2>七、Switch语句 switch statements</h2>
	<?php 
		$a = 2;
		switch ($a) {
			case 0:
				echo "a equals 0.";
				break;
			case 1:
				echo "a equals 1.";
				break;
				case 2:
				echo "a equals 2.";
				break;
			default:
				echo "a is not 0,1, or 2.";
				break;
		}
	?><br/>

	<h2>八、WHILE 循环 while loop statements</h2>
	<?php 
		$count = 0;
		while ( $count<= 10) {
			echo $count.",";
			$count++;
		}
		echo "<br />循环结束时count的值: ";
		echo "Count={$count}";
	?><br/>

	<h5>while loop 和 if statements</h5>
	<?php 
		// Loops can be binded with if-statements.

		$count = 0;
		while ($count<=10) {
			if ($count == 5) {
				echo "FIVE, ";
			}else{
				echo $count.", ";
			}
			$count++;
		}
		echo "<br />循环结束时count的值: ";
		echo "Count={$count}";

	?><br/>

	<h2>九、FOR 循环 for loop statements</h2>
	for(initial;test;each)
	<br/>statement;<br/>
	<?php 
		
		for ($count=0; $count <= 10; $count++) { 
			if ($count == 5) {
				//continue;
				//continue作用：跳过本次循环，继续执行下面的循环。
				//break;
				//break作用:直接跳出循环，不执行下面的循环了。
			}
			echo $count;
			if ($count == 10) {
				break;
			}
			echo ", ";
		}
	?><br/>

	<h2>十、String 字符串</h2>
	<h4>STRLEN()</h4>
	<?php 
		$str1 = "Hello World!";
		$str2 = "世界你好！";
		$str3 = "Nothing in the world is impossible if you put your hear into it.";

		echo "\$str1 (strlen is ",strlen($str1)."):<br/>",$str1,"<br/><br/>";
		echo "\$str2 (strlen is ",strlen(utf8_decode($str2))."):<br/>",$str2,"<br/><br/>";
		echo "\$str3 (strlen is ",strlen($str3)."):<br/>",$str3,"<br/><br/>";
	?><br/>

	<h4>CONCATENATE</h4>
	<?php 
		$str1 = "concatenate";
		$str2 = "your";
		$str3 = "strings";
		$str4 = $str1 + $str2 + $str3;

		echo $str4; //output 0

		$str5 = $str1.$str2.$str3; //.点号才是字符串相加
		echo "<br/>".$str5;

		$str6 = $str1." ".$str2." ".$str3; //适当的使用空格
		echo "<br/>".$str6;
	?><br/>

	<h4>子字符串 Substrings</h4>
	$str = "cao peng video tutorials."; <br/>
	<?php 
		$str = "cao peng video tutorials.";

		$part = substr($str,1);
		echo $part, "<br/>";

		$part = substr($str,1,5);
		echo $part, "<br/>";

		$part = substr($str,0,7);
		echo $part, "<br/>";

		echo "\$str{4} = ", $str{4}, "<br/>";
		echo "\$str{10} = ", $str{10}, "<br/>";
	?><br/>


	<h4>大小写转换 String Case Functions</h4>
	strtoupper() or strtolower() : 全部变成大写或小写 <br/>
	ucfirst(): 只有首字母大写 <br/>
	ucwords(): 每个单词首字母大写 <br/>

	<?php 
		$str = "cao peng video tutorials.";

		echo strtoupper($str), "<br/>";
		echo strtolower($str), "<br/>";

		echo ucfirst($str), "<br/>";
		echo ucwords($str), "<br/>";
	?><br/>

	<h4>查找替换 str_replace()</h4>
	<?php 
		$str = "There are approcimately 3 other subjects to release.";
		$nums = array("1","2","3","4","5","6","7","8","9","0");
		$newstr = str_replace($nums, "X", $str);
		echo $str, "<br/>";
		echo $newstr, "<br/>";
	?><br/>

	<h4>清理字符串 Clean up strings</h4>
	ltrim() or rtrim() <br/>
	chop() or trim() <br/>
	<?php 
		$str = "   cao peng video tutorials.     ";
		echo ltrim($str), "<br/>";
		$str = "   cao peng video tutorials.     ";
		echo rtrim($str), "<br/>";

		$str = "   cao peng video tutorials.     ";
		echo chop($str), "<br/>"; //

		$str = "   cao peng video tutorials.     ";
		echo trim($str), "<br/>";

		$str ="          cao peng video tutorials          " ;// 用html entity &nbsp;替换空个	
		echo "ltrim: '", str_replace(" ", "&nbsp;", ltrim($str)), "'<br>";
		echo "rtrim: '", str_replace(" ", "&nbsp;", rtrim($str)), "'<br>";
		echo "chop: '", str_replace(" ", "&nbsp;", chop($str)), "'<br>";
		echo "trim: '", str_replace(" ", "&nbsp;", trim($str)), "'<br>";
	?><br/>

	<h2>十一、数组 array</h2>
	数组就像值的列表，每个值可以是数字或字符串，甚至是另一个数组。 <br/>
	基本的数组结构：<br/>
	$MY_ARRAY[0]= "var1"<br/>
	$MY_ARRAY[1]= "var2"<br/>
	$MY_ARRAY[2]= "var3"<br/>
	etc. <br/> <br/>

	其它数组结构： <br/>
	$SONE_GUY["birthday"] = "1989-01-01";<br/>
	$SONE_GUY["age"] = "30";<br/>
	$SONE_GUY["height"] = "171";<br/>
	ect. <br/>

	<?php 
		$sum = 0;
		for ($i=1; $i <= 100 ; $i++) { 
			$sum += $i;
			$sum_array[$i] = $sum;
		}
		print "<pre>";
		print_r($sum_array); //r for readable 供人类阅读的array
		print "</pre>";	

		//显示第50个索引的值
		print "<br/>".$sum_array[50];
	?><br/>

	<h4>多维数组 Multidimensional array</h4>
	多维数组： array中含有array。 <br/>
	<pre style="text-align:left;margin: 10px 10px 10px 10px;"><span class="hei" style="font-size: 14px;">
	//SINGLE DIMENSIONAL ARRAY 单维数组

	$user1=Array("name"=>"Mike","address"=>"Oakville, Ontario, Canada","age"=>"30");
	$user2=Array("name"=>"John","address"=>"Worrytown, Oklahoma, USA","age"=>"43");
	$user3=Array("name"=>"Billy","address"=>"Moscow, Russia","age"=>"14");

	//COMPARABLE MULTIDIMENSIONAL ARRAY 多维数组

	$users=Array(
	Array("name"=>"Mike","address"=>"Oakville, Ontario, Canada","age"=>"30"),
	Array("name"=>"John","address"=>"Worrytown, Oklahoma, USA","age"=>"43"),
	Array("name"=>"Billy","address"=>"Moscow, Russia","age"=>"14")
	);
		

	$users [0][$name]

		<?php 

			$user1=Array("name"=>"Mike","address"=>"Oakville, Ontario, Canada","age"=>"30");
			$user2=Array("name"=>"John","address"=>"Worrytown, Oklahoma, USA","age"=>"43");
			$user3=Array("name"=>"Billy","address"=>"Moscow, Russia","age"=>"14");

			$users=Array(
			Array("name"=>"Mike","address"=>"Oakville, Ontario, Canada","age"=>"30"),
			Array("name"=>"John","address"=>"Worrytown, Oklahoma, USA","age"=>"43"),
			Array("name"=>"Billy","address"=>"Moscow, Russia","age"=>"14")
			);

			print "<pre>";print_r($users);print "</pre>";

		?><br/>
	</span></pre>

	<h4>遍历数组 foreach loops</h4>
	<b>foreach($arrray as $value)</b> <br/>
	<b>&nbsp;&nbsp; statement;</b> <br/><br/>
	<?php 
		$ages  = array(4, 8, 15, 16, 23, 42);

		foreach ($ages as $age) {
			echo $age.", ";
		}
		echo "<br/><br/>";

		foreach ($ages as $position => $age) {
			echo $position . ": " . $age . "<br/>";
		}

		echo "<br/><br/>";

		$prices = array("Brand New Computer"=>1000, 
						"Brand New PSP"=>200, 
						"Learning PHP+MYSQL" => "priceless");

		foreach ($prices as $key => $value) {
			if (is_int($value)) {
				echo $key . ": $" . $value . "<br/>";
			} else {
				echo $key . ": " . $value . "<br/>";
			}
		}
	
	?><br/>

	<h4>数组函数 array functions</h4>
	<?php 
		$array1 = array(4,8,15,16,23,42);

		echo "Count:" . count($array1) . "<br/>";
		echo "Max value:" . max($array1) . "<br/>";
		echo "Min value:" . min($array1) . "<br/>";

		echo "Sort array:"  . "<br/>";
		sort($array1);
		print_r($array1);

		echo "<br/ >Reverst sort :"  . "<br/>";
		rsort($array1); //reverse sort
		print_r($array1);
	?><br/>

	Implode: <?php echo $string1 = implode(" * ", $array1); //把数组显示成字符串阵列 ?><br />
	Explode: <?php print_r(explode(" * ", $string1)); //与inplode相反 ?><br />

	In array: <?php echo in_array(15, $array1);  ?><br />

	<h4>内置函数 built-in PHP Arrays</h4>
    There are many built-in arrays that you can work with. <br/>
    <b><span>  ($_SERVER, $_ENV, $GLOBALS, $_POST, $_GET, $_COOKIE, $_SESSION, $_REQUEST)</span></b><br>
    <?php
    	echo "_SERVER <br/>";
    	foreach ($_SERVER as $key => $value) {
    		echo "<b>".$key."</b> : ". $value . "<br/>";
    	}

    	echo "<br/><br/>";

    	echo "_ENV <br/>";
    	foreach ($_ENV as $key => $value) {
    		echo "<b>".$key."</b> : ". $value . "<br/>";
    	}

    	echo "<br/><br/>";

    	echo "_GLOBALS <br/>";
    	foreach ($GLOBALS as $key => $value) {
    		echo "<b>".$key."</b> : ". $value . "<br/>";
    	}

    	echo "<br/><br/>";

    	echo "_POST <br/>";
    	foreach ($_POST as $key => $value) {
    		echo "<b>".$key."</b> : ". $value . "<br/>";
    	}

    	echo "<br/><br/>";

    	echo "_GET <br/>";
    	foreach ($_GET as $key => $value) {
    		echo "<b>".$key."</b> : ". $value . "<br/>";
    	}

    	echo "<br/><br/>";

    	echo "_COOKIE <br/>";
    	foreach ($_COOKIE as $key => $value) {
    		echo "<b>".$key."</b> : ". $value . "<br/>";
    	}

    	echo "<br/><br/>";

    	echo "_SESSION <br/>";
    	//session_start();
    	//foreach ($_SESSION as $key => $value) {
    	//	echo "<b>".$key."</b> : ". $value . "<br/>";
    	//}

    	echo "<br/><br/>";

    	echo "_REQUEST <br/>";
    	foreach ($_REQUEST as $key => $value) {
    		echo "<b>".$key."</b> : ". $value . "<br/>";
    	}
    ?><br/>

    <h2>十二、函数 functions</h2>
    <pre>
    		&lt;?php
		function say_hello() {
		 echo "Hello World!";
		}

		say_hello();
		?&gt;
	</pre><br/>

	<?php 
		function say_hello(){
			echo "Hello World.";
		}

		say_hello();

		echo "<br/>";

		function say_hello2($word){
			echo "hello {$word}.<br/>";
		}

		say_hello2("you");
		say_hello2("everyone");
	?><br/>

	<h4>使用函数 using functions</h4>
	<?php 
		$name = "Frank Fan";
		function say_hello3($greeting, $target, $punct){
			echo $greeting . ", " . $target . $punct . "<br />";
		}

		say_hello3("Hi", $name, "!")
	?><br/>

	<h4>返回值 return value</h4>
	<?php 
		function additional($val1, $val2){
			$sum = $val1 + $val2;
			return $sum;
		}

		additional(3,4);

		$new_val = additional(3, 4);
		echo $new_val;
		echo "<br/>";

		if (additional(5, 6) == 11) {
			echo "yes.";
		}
	?><br/>

	<h4>全局的 global</h4>
	<b>global 全局  local 本地</b><br/>
	<?php 
		$bar = "outside";
		function foo(){
			global $bar;
			$bar = "inside";
		}

		foo();

		echo $bar;
	?><br/>

	<h4>默认值 default value</h4>
	<?php
		function paint($color = "red"){
			echo "The color of the room is {$color}.<br/>";
		}

		paint("white");
		paint();
	?><br/>

</body>
</html>