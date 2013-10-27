<html>
<head>
	<title>list records</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php  echo $_SERVER['SCRIPT_NAME']."<BR>"; ?>
<?php
	include_once("include/db_connection.php");

    // 声明变量
    $initStartLimit = 0;
    $limitPerPage = 5;
    $nunmberOfRows = "";
    $startLimit = "";
    $sortOrder = "";
    $orderByQuery = "";
    $sortBy = "";

    // 从POST中取值，取值之前要判空
    if (!empty($_REQUEST['startLimit'])) {
        $startLimit = $_REQUEST['startLimit'];
    }
    if (!empty($_REQUEST['sortBy'])) {
        $sortBy = $_REQUEST['sortBy'];
    }
    if (!empty($_REQUEST['sortOrder'])) {
        $sortOrder = $_REQUEST['sortOrder'];
    }
    if (!empty($_REQUEST['rows'])) {
        $nunmberOfRows = $_REQUEST['rows'];
    }


    if ($startLimit == "") {
        $startLimit = $initStartLimit;
    }
    if ($startLimit < 0) {
            $startLimit = 0;
        }
    if ($nunmberOfRows == "") {
        $nunmberOfRows = $limitPerPage;
    }
    if ($sortOrder == "") {
        $sortOrder = "DESC";
    }
    if ($sortOrder == "DESC") {
        $newSortOrder = "ASC";
    }else{
        $newSortOrder = "DESC";
    }

    $limitQuery = " limit ".$startLimit.",".$nunmberOfRows;
    $nextStartLimit = $startLimit + $limitPerPage;
    $previousStartLimit = $startLimit - $limitPerPage;

    echo "startLimit == ".$startLimit."<br/>";
    echo "previousStartLimit == ".$previousStartLimit."<br/>";
    echo "nextStartLimit = ".$nextStartLimit."<br/>";

    if ($sortBy !="") {
        $orderByQuery = " order by ".$sortBy." ".$sortOrder;
    }

    $sql = "select * from customers".$orderByQuery.$limitQuery;
    echo $sql."<br/>";

    mysql_query("set names utf8");

    $result = mysql_query($sql)
        or die("Unable to run mysql_query() " . mysql_error());

    $nunmberOfRows = mysql_num_rows($result);

    echo "nunmberOfRows ======= ".$nunmberOfRows;

    if ($nunmberOfRows==0) {
       echo "<br/ 没有找到记录.>";
    }else if($nunmberOfRows > 0){
        $i = 0;
    }



?>
</head>

<body>

<TABLE CELLSPACING="0" CELLPADDING="3" BORDER="0" WIDTH="100%">
    <TR>
        <TD>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=customer_id&sortOrder=<?php echo $newSortOrder; ?>&startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <B>Customer_id</B>          </a></TD>
        <TD>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=fname&sortOrder=<?php echo $newSortOrder; ?>&startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <B>Fname</B>            </a></TD>
        <TD>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=lname&sortOrder=<?php echo $newSortOrder; ?>&startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <B>Lname</B>            </a></TD>
        <TD>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=company&sortOrder=<?php echo $newSortOrder; ?>&startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <B>Company</B>          </a></TD>
        <TD>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=title&sortOrder=<?php echo $newSortOrder; ?>&startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <B>Title</B>            </a></TD>
        <TD>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=address1&sortOrder=<?php echo $newSortOrder; ?>&startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <B>Address1</B>         </a></TD>
        <TD>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=address2&sortOrder=<?php echo $newSortOrder; ?>&startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <B>Address2</B>         </a></TD>
        <TD>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=city&sortOrder=<?php echo $newSortOrder; ?>&startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <B>City</B>         </a></TD>
        <TD>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=state_province&sortOrder=<?php echo $newSortOrder; ?>&startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <B>State_province</B>           </a></TD>
        <TD>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=country&sortOrder=<?php echo $newSortOrder; ?>&startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <B>Country</B>          </a></TD>
        <TD>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=postal_code&sortOrder=<?php echo $newSortOrder; ?>&startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <B>Postal_code</B>          </a></TD>
        <TD>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=phone&sortOrder=<?php echo $newSortOrder; ?>&startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <B>Phone</B>            </a></TD>
        <TD>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=fax&sortOrder=<?php echo $newSortOrder; ?>&startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <B>Fax</B>          </a></TD>
    </TR>
<?php
    while ($i<$nunmberOfRows)
    {

        if (($i%2)==0) { $bgColor = "#FFFFFF"; } else { $bgColor = "#C0C0C0"; }

    $thisCustomer_id = MYSQL_RESULT($result,$i,"customer_id");
    $thisFname = MYSQL_RESULT($result,$i,"fname");
    $thisLname = MYSQL_RESULT($result,$i,"lname");
    $thisCompany = MYSQL_RESULT($result,$i,"company");
    $thisAddress1 = MYSQL_RESULT($result,$i,"address1");
    $thisAddress2 = MYSQL_RESULT($result,$i,"address2");
    $thisCity = MYSQL_RESULT($result,$i,"city");
    $thisState_province = MYSQL_RESULT($result,$i,"state_province");
    $thisCountry = MYSQL_RESULT($result,$i,"country");
    $thisPostal_code = MYSQL_RESULT($result,$i,"postal_code");
    $thisPhone = MYSQL_RESULT($result,$i,"phone");
    $thisFax = MYSQL_RESULT($result,$i,"fax");

?>
    <TR BGCOLOR="<?php echo $bgColor; ?>">
        <TD nowrap><?php echo $thisCustomer_id; ?></TD>
        <TD nowrap><?php echo $thisFname; ?></TD>
        <TD nowrap><?php echo $thisLname; ?></TD>
        <TD nowrap><?php echo $thisCompany; ?></TD>
        <TD nowrap><?php echo $thisAddress1; ?></TD>
        <TD nowrap><?php echo $thisAddress2; ?></TD>
        <TD nowrap><?php echo $thisCity; ?></TD>
        <TD nowrap><?php echo $thisState_province; ?></TD>
        <TD nowrap><?php echo $thisCountry; ?></TD>
        <TD nowrap><?php echo $thisPostal_code; ?></TD>
        <TD nowrap><?php echo $thisPhone; ?></TD>
        <TD nowrap><?php echo $thisFax; ?></TD>
    <TD><a href="edit.php?customer_idField=<?php echo $thisCustomer_id; ?>">Edit</a></TD>
    <TD><a href="confirm_delete.php?customer_idField=<?php echo $thisCustomer_id; ?>">Delete</a></TD>
    </TR>
<?php
        $i++;

    }
?>
</TABLE>


<p>&nbsp;</p>
<table width="550" border="0" cellpadding="2" cellspacing="2" bgcolor="#000000">
  <tr>
    <td><table width="550"  border="0" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF">
      <?php
    $i = 0;
    while ($i<$nunmberOfRows)
    {

        if (($i%2)==0) { $bgColor = "#FFFFFF"; } else { $bgColor = "#CCCCCC"; }

    $thisCustomer_id = MYSQL_RESULT($result,$i,"customer_id");
    $thisFname = MYSQL_RESULT($result,$i,"fname");
    $thisLname = MYSQL_RESULT($result,$i,"lname");
    $thisCompany = MYSQL_RESULT($result,$i,"company");
    $thisAddress1 = MYSQL_RESULT($result,$i,"address1");
    $thisAddress2 = MYSQL_RESULT($result,$i,"address2");
    $thisCity = MYSQL_RESULT($result,$i,"city");
    $thisState_province = MYSQL_RESULT($result,$i,"state_province");
    $thisCountry = MYSQL_RESULT($result,$i,"country");
    $thisPostal_code = MYSQL_RESULT($result,$i,"postal_code");
    $thisPhone = MYSQL_RESULT($result,$i,"phone");
    $thisFax = MYSQL_RESULT($result,$i,"fax");

?>
      <tr>
        <td width="12" bgcolor="<?php echo $bgColor ?>">&nbsp;</td>
        <td width="399" bgcolor="<?php echo $bgColor ?>"><span style="font-weight: bold; font-size: 15px;"><?php echo $thisCustomer_id; ?> -</span> <span style="color: #000099; font-weight: bold;"><?php echo $thisFname." ".$thisLname; ?> <br>
              <span style="color: #000099; font-weight: bold;"><?php echo $thisCompany; ?></span></span><br>
              <?php echo $thisAddress1; ?> <?php echo $thisAddress2; ?>  <br>
              <?php echo $thisCity; ?>, <?php echo $thisState_province; ?><br>
              <?php echo $thisCountry; ?> <?php echo $thisPostal_code; ?><br>
      Phone: <?php echo $thisPhone; ?> Fax: <?php echo $thisFax; ?><br></td>
        <td width="111" valign="top" bgcolor="<?php echo $bgColor ?>"><a href="edit.php?customer_idField=<?php echo $thisCustomer_id; ?>"><br>
          修改</a><br>
            <a href="confirm_delete.php?customer_idField=<?php echo $thisCustomer_id; ?>">删除</a></td>
      </tr>
      <?php
        $i++;

    } 
?>
    </table></td>
  </tr>
</table>
<p>  <?php

if ($startLimit != "")
{
?>

  <a href="<?php echo  $_SERVER['PHP_SELF']; ?>?startLimit=<?php echo $previousStartLimit; ?>&limitPerPage=<?php echo $limitPerPage; ?>
    &sortBy=<?php echo $sortBy; ?>&sortOrder=<?php echo $sortOrder; ?>">
    &lt;&lt;&lt; Previous <?php echo $limitPerPage; ?> Results</a>....
  <?php } ?>
  <?php
if ($nunmberOfRows == $limitPerPage)
{
?>
  <a href="<?php echo $_SERVER['PHP_SELF']; ?>?startLimit=<?php echo $nextStartLimit; ?>&limitPerPage=<?php echo $limitPerPage; ?>
    &sortBy=<?php echo $sortBy; ?>&sortOrder=<?php echo $sortOrder; ?>">
    Next <?php echo $limitPerPage; ?> Results &gt;&gt;&gt;</a>
  <?php } ?>

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
</body>


</html>