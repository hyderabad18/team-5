<?php


error_reporting(0);
include("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Books search</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<style>
BODY, TD {
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}
</style>
</head>


<body>

<form id="form1" name="form1" method="post" action="search.php">
<label for="from">TITLE</label>
<input name="AUTHOR" type="text" id="AUTHOR" size="10" value="<?php echo $_REQUEST["AUTHOR"]; ?>" />

 <label>TITLE</label>
<input type="text" name="string" id="TITLE" value="<?php echo stripcslashes($_REQUEST["TITLE"]); ?>" />

<?php
	$sql = "SELECT * FROM ".$SETTINGS["data_table"]." GROUP BY city ORDER BY city";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	while ($row = mysql_fetch_assoc($sql_result)) {
		echo "<option value='".$row["city"]."'".($row["city"]==$_REQUEST["city"] ? " selected" : "").">".$row["city"]."</option>";
	}
?>
</select>
<input type="submit" name="button" id="button" value="Filter" />
  </label>
  <a href="search.php"> 
  reset</a>
</form>
<br /><br />
<table width="700" border="1" cellspacing="0" cellpadding="4">
  <tr>
    <td width="90" bgcolor="#CCCCCC"><strong>Title</strong></td>
    <td width="95" bgcolor="#CCCCCC"><strong>Author</strong></td>
    <td width="159" bgcolor="#CCCCCC"><strong>Listen</strong></td>
    <td width="191" bgcolor="#CCCCCC"><strong>Download</strong></td>
   
  </tr>
<?php
if ($_REQUEST["string"]<>'') {
	$search_string = " AND (full_name LIKE '%".mysql_real_escape_string($_REQUEST["string"])."%' OR email LIKE '%".mysql_real_escape_string($_REQUEST["string"])."%')";	
}
if ($_REQUEST["city"]<>'') {
	$search_city = " AND city='".mysql_real_escape_string($_REQUEST["city"])."'";	
}

if ($_REQUEST["from"]<>'' and $_REQUEST["to"]<>'') {
	$sql = "SELECT * FROM ".$SETTINGS["data_table"]." WHERE from_date >= '".mysql_real_escape_string($_REQUEST["from"])."' AND to_date <= '".mysql_real_escape_string($_REQUEST["to"])."'".$search_string.$search_city;
} else if ($_REQUEST["from"]<>'') {
	$sql = "SELECT * FROM ".$SETTINGS["data_table"]." WHERE from_date >= '".mysql_real_escape_string($_REQUEST["from"])."'".$search_string.$search_city;
} else if ($_REQUEST["to"]<>'') {
	$sql = "SELECT * FROM ".$SETTINGS["data_table"]." WHERE to_date <= '".mysql_real_escape_string($_REQUEST["to"])."'".$search_string.$search_city;
} else {
	$sql = "SELECT * FROM ".$SETTINGS["data_table"]." WHERE id>0".$search_string.$search_city;
}

$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
if (mysql_num_rows($sql_result)>0) {
	while ($row = mysql_fetch_assoc($sql_result)) {
?>
  <tr>
    <td><?php echo $row["TITLE"]; ?></td>
    <td><?php echo $row["AUTHOR"]; ?></td>
    <td><?php echo $row[""]; ?></td>
    <td><?php echo $row[""]; ?></td>
    
  </tr>
<?php
	}
} else {
?>
<tr><td colspan="5">No results found.</td>
<?php	
}
?>
</table>


<script>
	
	
	</script>

</body>
</html>