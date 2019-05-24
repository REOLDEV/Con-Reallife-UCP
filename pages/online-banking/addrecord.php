<title>Arbeitet</title>
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
$empfaenger = mysqli_escape_string($connection, $_POST["NAME"] );
$betrag     = $_POST["Betrag"];
$zweck      = mysqli_escape_string($connection, $_POST["Verwendungzweck"] );
$UName = $_SESSION['uname'];

$query_userdataCHECK_db = "SELECT * FROM userdata WHERE Name = '$empfaenger'";
$userdataCHECK_db = mysqli_query($connection, $query_userdataCHECK_db) or die(mysqli_error());
$row_userdataCHECK_db = mysqli_fetch_assoc($userdataCHECK_db);
$totalRows_userdataCHECK_db = mysqli_num_rows($userdataCHECK_db);

$query_userdata_db = "SELECT * FROM userdata WHERE Name = '$UName'";
$userdata_db = mysqli_query($connection, $query_userdata_db) or die(mysqli_error());
$row_userdata_db = mysqli_fetch_assoc($userdata_db);
$totalRows_userdata_db = mysqli_num_rows($userdata_db);

$query_UCP_ueberweisung = "SELECT * FROM ucp_ueberweisen";
$UCP_ueberweisung = mysqli_query($connection, $query_UCP_ueberweisung) or die(mysqli_error());
$row_UCP_ueberweisung = mysqli_fetch_assoc($UCP_ueberweisung);
$totalRows_UCP_ueberweisung = mysqli_num_rows($UCP_ueberweisung);
/*
$ueberweisung = "INSERT INTO ucp_ueberweisen (sender, empfaenger, menge, zweck) VALUES ('$UName', '$empfaenger', '$betrag', '$zweck')";

echo $ccp;
echo "<br/>";
echo $ueberweisung;

$db = mysqli_connect("localhost", "root", "", "ucp");
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}

$ueberweisen = mysqli_query($db, $ueberweisung);

$insertGoTo = "index.php";
if (isset($_SERVER['QUERY_STRING'])) {
$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
$insertGoTo .= $_SERVER['QUERY_STRING'];
  }
*/
$deleteGoTo = "index.php";
$gotoNichtGenugGeld = "index.php#ngg";
$gotoNichtSelbst = "index.php#nsu";
$gotoKeinNutzer = "index.php#kn";
$keinenegazahlen = "index.php#nzahl";
$keinwert = "index.php#kwert";

#Check ob Überweiser Empfänger ist


#Check ob der Überweiser genug geld besitzt
if($row_userdata_db['Bankgeld'] < $betrag)
{
	header(sprintf("Location: %s", $gotoNichtGenugGeld));
} else if($UName == $empfaenger) {
	header(sprintf("Location: %s", $gotoNichtSelbst));
} else if($row_userdataCHECK_db['Name'] == null) {
	header(sprintf("Location: %s", $gotoKeinNutzer));
} else if($betrag < 0) {
	header(sprintf("Location: %s", $keinenegazahlen));
} else if($betrag == 0) {
	header(sprintf("Location: %s", $keinwert));
} else {

$betragabzug = 	$row_userdata_db['Bankgeld'] - $betrag;
$betraggewinn = $row_userdata_db['Bankgeld'] + $betrag;
echo $betraggewinn;
$betragabzugend = $betragabzug;
/*
mysql_query("INSERT INTO ucp_ueberweisen (sender, empfaenger, menge, zweck) VALUES ('$UName', '$empfaenger', '$betrag', '$zweck')");
mysql_query("UPDATE ucp_ueberweisen SET Bankgeld = 'betragabzug'");
*/
  $deleteSQL = sprintf("INSERT INTO ucp_ueberweisen (sender, empfaenger, menge, zweck, visible) VALUES ('$UName', '$empfaenger', '$betrag', '$zweck', '1')");

  $Result1 = mysqli_query($connection, $deleteSQL) or die(mysqli_error());

  $deleteGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
$deleteSQL1 = sprintf("UPDATE `userdata` Set `Bankgeld` = '$betragabzugend' WHERE `Name` = '$UName'");

  $Result1 = mysqli_query($connection, $deleteSQL1) or die(mysqli_error());

  $deleteGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  $deleteSQL2 = sprintf("UPDATE `userdata` Set `Bankgeld` = '$betraggewinn' WHERE `Name` = '$empfaenger'");
  $Result1 = mysqli_query($connection, $deleteSQL2) or die(mysqli_error());

  $deleteGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));

}
mysqli_free_result($userdata_db);
mysqli_free_result($UCP_ueberweisung);
?>
