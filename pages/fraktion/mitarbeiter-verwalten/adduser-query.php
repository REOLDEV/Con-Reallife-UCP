<?php
require_once('../../../lib/database.ucpsys');
if(!$_SESSION['eingeloggt'] == 1) {header("Location: ../../../index.php");}

$UName = $_SESSION['uname'];
$addname = $_POST['addname'];
$FraktionID = $_POST['fid'];
$text		= $_POST['text'];
/*
if(getFraktionRang($UName) < 1) { 
	$goto = "../";
	header(sprintf("Location: %s", $goto));
}
if(getFraktionID($UName) == 0) { 
	$goto = "../";
	header(sprintf("Location: %s", $goto));
}
*/


$query_userdata_db = "SELECT * FROM userdata WHERE Name = '$addname'";
$userdata_db = mysqli_query($connection, $query_userdata_db) or die(mysqli_error());
$row_userdata_db = mysqli_fetch_assoc($userdata_db);
$totalRows_userdata_db = mysqli_num_rows($userdata_db);

if($UName == $addname) {
	header("Location: index.php#dkdnse");
} else {

if($userdata_db['Fraktion'] == 0) {
	mysqli_query($connection, "INSERT INTO UCP_fraktion_einladung (fid, sender, empfaenger, text) VALUES ('$FraktionID', '$UName', '$addname', '$text')");
	header("Location: index.php#erfolg");
	
} else {
	header("Location: index.php#bif");
}}
function getFraktionRang($name, $connection){
		$query = mysqli_query($connection, "SELECT FraktionsRang FROM userdata WHERE Name = '$name'") or die(mysqli_error());
		while($row = mysqli_fetch_assoc($query)){
			$frak = $row["FraktionsRang"];
		}
		return $frak;
	}
	
function getFraktionID($name, $connection){
		$query = mysqli_query($connection, "SELECT Fraktion FROM userdata WHERE Name = '$name'") or die(mysqli_error());
		while($row = mysqli_fetch_assoc($query)){
			$frak = $row["Fraktion"];
		}
		return $frak;
	}
?>