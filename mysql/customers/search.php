<html>
<head>
	<title>search results</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<?php 
	echo $_SERVER['SCRIPT_NAME']."<BR>";
	include_once("include/db_connection.php");
    mysql_query("set names utf8");

    function highlightSearchTerms($fullText, $searchTerm, $bgcolor="#FFFF99"){
        if (empty($searchTerm)) {
            return $fullText;
        }else{
            $startTag = "<span style='background-color:$bgcolor'>";
            $endTag = "</span>";
            $highlighted_results = $startTag . $searchTerm . $endTag;
            
            //return eregi_replace($searchTerm, $highlighted_results, $fullText);
            //Deprecated: Function eregi_replace() is deprecated

            //preg_replace(pattern, replacement, subject)
            //eregi_replace(pattern, replacement, string)
            //preg_match(pattern, subject)
            
            //这里要注意，因为PHP5.3以后，不支持eregi_replace方法，用preg_replace代替，
            //第一个参数要用//括起来。
            $searchTerm = '/'.$searchTerm."/";
            return preg_replace($searchTerm, $highlighted_results, $fullText);
            
        }
    }

    $thisKeyword = "";
    $newSortOrder = "";
    $startLimit = "";
    $limitPerPage = 5;

    if (!empty($_REQUEST['startLimit'])) {
        $startLimit = $_REQUEST['startLimit'];
    }

    if (!empty($_REQUEST['keyword'])) {
        $thisKeyword = $_REQUEST['keyword'];
    }
    if (!empty($_REQUEST['sortBy'])) {
        $newSortOrder = $_REQUEST['sortBy'];
    }
    if ($newSortOrder == "") {
        $newSortOrder = "customer_id";
    }

    $sqlQuery = "SELECT * from customers WHERE customer_id like '%$thisKeyword%' or fname like '%$thisKeyword%' 
    or lname like '%$thisKeyword%' or company like '%$thisKeyword%' or address1 like '%$thisKeyword%' 
    or address2 like '%$thisKeyword%' or city like '%$thisKeyword%' or state_province like '%$thisKeyword%'
    or country like '%$thisKeyword' or postal_code like '%$thisKeyword' or phone like '%$thisKeyword'
    or fax like '%$thisKeyword'
    order by $newSortOrder;";

    echo "sql is : " . $sqlQuery;

    $result = mysql_query($sqlQuery)
        or die("Unable to run sql, error: " . mysql_error());

    $numberOfRows = mysql_num_rows($result);

    if ($numberOfRows == 0) {
        echo "<h3>没有找到记录.</h3>";
        return;
    }else if($numberOfRows > 0){
        $i = 0;

    }

    echo "numberOfRows ====== ".$numberOfRows;


	
?>
<body>

<table CELLSPACING="0" CELLPADDING="3" BORDER="0" WIDTH="100%">
    <tr>
        <td>
            <a href="<?php echo $_SERVER['PHP_SELF'];?>?sortBy=customer_id&sortOrder=<?php echo $newSortOrder;?>
                &startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>"><b>Customer_id</b></a>
        </td>
        <td>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=fname&sortOrder=<?php echo $newSortOrder; ?>
                &startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <b>Fname</b></a>
        </td>
        <td>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=mname&sortOrder=<?php echo $newSortOrder; ?>
                &startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <b>Mname</b></a>
        </td>
        <td>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=lname&sortOrder=<?php echo $newSortOrder; ?>
                &startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <b>Lname</b>            </a>
        </td>
        <td>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=company&sortOrder=<?php echo $newSortOrder; ?>
                &startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <b>Company</b>          </a>
        </td>
        <td>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=address1&sortOrder=<?php echo $newSortOrder; ?>
                &startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <b>Address1</b>         </a>
        </td>
        <td>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=address2&sortOrder=<?php echo $newSortOrder; ?>
                &startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <b>Address2</b>         </a>
        </td>
        <td>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=address3&sortOrder=<?php echo $newSortOrder; ?>
                &startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <b>Address3</b>         </a>
        </td>
        <td>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=city&sortOrder=<?php echo $newSortOrder; ?>
                &startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <b>City</b>         </a>
        </td>
        <td>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=state_province&sortOrder=<?php echo $newSortOrder; ?>
                &startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <b>State_province</b>           </a>
        </td>
        <td>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=country&sortOrder=<?php echo $newSortOrder; ?>
                &startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <b>Country</b>          </a>
        </td>
        <td>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=postal_code&sortOrder=<?php echo $newSortOrder; ?>
                &startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <b>Postal_code</b>          </a>
        </td>
        <td>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=phone&sortOrder=<?php echo $newSortOrder; ?>
                &startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <b>Phone</b>            </a>
        </td>
        <td>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?sortBy=fax&sortOrder=<?php echo $newSortOrder; ?>
                &startLimit=<?php echo $startLimit; ?>&rows=<?php echo $limitPerPage; ?>">
                <b>Fax</b>          </a>
        </td>

    </tr>


<?php 
    $highlightColor = "#FFFF99";

    while ($i < $numberOfRows) {

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


        //高亮显示
        $thisCustomer_id = highlightSearchTerms($thisCustomer_id, $thisKeyword, $highlightColor); 
        $thisFname = highlightSearchTerms($thisFname, $thisKeyword, $highlightColor); 
        $thisLname = highlightSearchTerms($thisLname, $thisKeyword, $highlightColor); 
        $thisCompany = highlightSearchTerms($thisCompany, $thisKeyword, $highlightColor); 
        $thisAddress1 = highlightSearchTerms($thisAddress1, $thisKeyword, $highlightColor); 
        $thisAddress2 = highlightSearchTerms($thisAddress2, $thisKeyword, $highlightColor); 
        $thisCity = highlightSearchTerms($thisCity, $thisKeyword, $highlightColor); 
        $thisState_province = highlightSearchTerms($thisState_province, $thisKeyword, $highlightColor); 
        $thisCountry = highlightSearchTerms($thisCountry, $thisKeyword, $highlightColor); 
        $thisPostal_code = highlightSearchTerms($thisPostal_code, $thisKeyword, $highlightColor); 
        $thisPhone = highlightSearchTerms($thisPhone, $thisKeyword, $highlightColor); 
        $thisFax = highlightSearchTerms($thisFax, $thisKeyword, $highlightColor); 


        //$i++;


    

?>
    
   <TR BGCOLOR="<?php echo $bgColor; ?>">
        <TD nowrap><?php echo $thisCustomer_id; ?></TD>
        <TD nowrap><?php echo $thisFname; ?></TD>
        <TD nowrap><?php echo $thisLname; ?></TD>
        <TD nowrap><?php echo $thisCompany; ?></TD>
        <TD nowrap><?php echo $thisAddress2; ?></TD>
        <TD nowrap><?php echo $thisCity; ?></TD>
        <TD nowrap><?php echo $thisState_province; ?></TD>
        <TD nowrap><?php echo $thisCountry; ?></TD>
        <TD nowrap><?php echo $thisPostal_code; ?></TD>
        <TD nowrap><?php echo $thisPhone; ?></TD>
        <TD nowrap><?php echo $thisFax; ?></TD>
        <TD nowrap><a href="edit.php?customer_idField=<?php echo $thisCustomer_id; ?>">修改</a></TD>
        <TD nowrap><a href="confirm_delete.php?customer_idField=<?php echo $thisCustomer_id; ?>">删除</a></TD>
    </TR>

<?php
    $i++;
}
    
?>
</TABLE>


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