<?php
	$db = mysqli_connect("mysql-mariadb-5-101.zap-hosting.com", "zap347923-1", "t1KyVS8u2U0GcPHz", "zap347923-1");
SESSION_START();
if(!$_SESSION['eingeloggt'] == 1) {header("Location: ../../../index.php");}
$UName = $_SESSION['uname'];

if(!getFraktionID($UName, $connection) == 1) { 
	$goto = "index.php";
	header(sprintf("Location: %s", $goto));
}
#Funktionen
function getFraktionRang($name, $connection)
{
	$db = mysqli_connect("mysql-mariadb-5-101.zap-hosting.com", "zap347923-1", "t1KyVS8u2U0GcPHz", "zap347923-1");
	$query = mysqli_query($db, "SELECT FraktionsRang FROM userdata WHERE Name = '$name'") or die(mysqli_error());
	while($row = mysqli_fetch_assoc($query))
	{
		$frakrang = $row["FraktionsRang"];
	}
	return $frakrang;
}
if(!getFraktionRang($UName, $connection) == 5) {
	$kickname = $_POST['name'];
	$query_fraktion = "UPDATE userdata Set Fraktion = '0' WHERE Name = '$kickname'";
	$query = mysqli_query($db, $query_fraktion);

	$query_rang = "UPDATE userdata Set FraktionsRang = '0' WHERE Name = '$kickname'";
	$query_sende = mysqli_query($db, $query_rang);

	header("Location: index.php#sergw");
} else {
	$goto = "index.php";
	header(sprintf("Location: %s", $goto));
}
function getFraktionID($name, $connection)
{
	$db = mysqli_connect("mysql-mariadb-5-101.zap-hosting.com", "zap347923-1", "t1KyVS8u2U0GcPHz", "zap347923-1");
	$query = mysqli_query($db, "SELECT Fraktion FROM userdata WHERE Name = '$name'") or die(mysqli_error());
	while($row = mysqli_fetch_assoc($query))
	{
		$frakid = $row["Fraktion"];
	}
	return $frakid;
}
echo $db;
/**/


?>