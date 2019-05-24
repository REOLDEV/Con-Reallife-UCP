<?php require_once('../../lib/database.ucpsys'); ?>
<?php

if(!$_SESSION['eingeloggt'] == 1) {header("Location: ../../index.php");}
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}


	$id = mysqli_real_escape_string( $_GET["id"] );
	$UName = $_SESSION['uname'];
  $deleteSQL = sprintf("UPDATE ucp_ueberweisen SET visible = 0 WHERE id = '$id'");

  $Result1 = mysqli_query($connection, $deleteSQL) or die(mysqli_error());

  $deleteGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
/*
mysql_select_db($database_db_toogle_master, $db_toogle_master);
$query_master_db = "SELECT * FROM pages";
$master_db = mysql_query($query_master_db, $db_toogle_master) or die(mysql_error());
$row_master_db = mysql_fetch_assoc($master_db);
$totalRows_master_db = mysql_num_rows($master_db);*/
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Arbeitet...</title>
</head>

<body>
</body>
</html>
<?php
mysqli_free_result($master_db);
?>
