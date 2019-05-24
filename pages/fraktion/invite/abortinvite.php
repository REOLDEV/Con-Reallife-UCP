<?php
$db = mysqli_connect("localhost", "root", "", "ucp");
SESSION_START();
$UName = $_SESSION['uname'];

$sql = "DELETE FROM ucp_fraktion_einladung WHERE empfaenger = '$UName'";
$query = mysqli_query($db, $sql);

header("Location: ../../../main.php");
?>