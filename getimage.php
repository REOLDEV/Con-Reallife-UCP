<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
require_once("lib/database.ucpsys");

$con = mysqli_connect($settings["mysqlhost"],$settings["mysqluser"],$settings["mysqlpassword"],$settings["mysqldatabase"]);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
$q = mysqli_escape_string($con, $_GET['q']);
mysqli_select_db($con,"ajax_demo");
$sql= "SELECT * FROM userdata WHERE Name = '".$q."'";
$result = mysqli_query($con, $sql);

echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Name'] . "</td>";
    echo "<td>" . $row['Skinid'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html> 