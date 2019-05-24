<?php
$db = mysqli_connect("localhost", "root", "", "ucp");
SESSION_START();
$UName = $_SESSION['uname'];
$FraktionID = $_POST['hehe'];

$sql = "UPDATE userdata SET Fraktion = '$FraktionID' WHERE Name = '$UName'";
$query = mysqli_query($db, $sql);

$sql_de = "DELETE FROM ucp_fraktion_einladung WHERE empfaenger = '$UName'";
$query_de = mysqli_query($db, $sql_de);

header("Location: ../../../main.php");
?>