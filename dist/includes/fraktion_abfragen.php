<?php
#Con Reallife Control Panel by Nadine Housten aka. Yannik B�ltes

/*
	Fraktions 				Datenbank ID
	SAPD					1
	Camorra					2
	Ballas					3
	Terroristen >> Triaden	4
	Liberty Tree Redaktion	5
	FBI						6
	Seville Families		7
	Army					8
	The Lost MC				9
	Medic					10
*/

#					Funktionen
/*
	Funktion				Mitgabewert		R�ckgabewert
	
	isFraktion				Nutzername		true/false
	getFraktionID			Nutzername		FraktionsID
	getFraktionName			FraktionsID		$FraktionsName
	getFraktionRang			Nutzername		FraktionsRang
	getFraktionKasse		FraktionsID		FraktionsGeld
	getFraktionDrogen		FraktionsID		FraktionsDrogen
	getFraktionMaterials	FraktionsID		FraktionsMaterialien
	getFraktionMemberCount	FraktionsID		FraktionsMitgliederAnzahl
*/

#Ist Benutzer in einer Fraktion
function isFraktion($name, $connection)
{
	$query = mysqli_query($connection, "SELECT * FROM userdata WHERE Fraktion != '0' AND Name = '$name'") or die(mysqli_error());
	$result = mysqli_num_rows($query);
	if($result == 0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

#Auslesen in welcher Fraktion der Benutzer ist
function getFraktionID($name, $connection)
{
	$query = mysqli_query($connection, "SELECT Fraktion FROM userdata WHERE Name = '$name'") or die(mysqli_error());
	while($row = mysqli_fetch_assoc($query))
	{
		$frak = $row["Fraktion"];
	}
	return $frak;
}

#Aus FraktionsID den Fraktionsnamen auslesen
function getFraktionName($id, $connection)
{
	if($id == 1) {$name = 'SAPD';} else if($id == 2) {$name = 'Camorra';} else if($id == 3) {$name = 'Ballas';} else if($id == 4) {$name = 'Triaden';} else if($id == 5) {$name = 'Liberty Tree Redaction';} else if($id == 6) {$name = 'FBI';} else if($id == 7) {$name = 'Seville Families';} else if($id == 8) {$name = 'San Andreas Army';} else if($id == 9) {$name = 'The Lost MC';} else if($id == 10) {$name = 'San Andreas Medical Department';}
	return $name;
}

#Auslesen welchen Rang der Spieler innerhalb der Fraktion hat
function getFraktionRang($name, $connection)
{
	$query = mysqli_query($connection, "SELECT FraktionsRang FROM userdata WHERE Name = '$name'") or die(mysqli_error());
	while($row = mysqli_fetch_assoc($query))
	{
		$frak = $row["FraktionsRang"];
	}
	return $frak;
}

#Auslesen wie viel Geld in der Fraktionskasse ist
function getFraktionKasse($id, $connection)
{
	$query = mysqli_query($connection, "SELECT * FROM fraktionen WHERE ID = '$id' OR Name = '$id'") or die(mysqli_error());
	while($row = mysqli_fetch_assoc($query))
	{
		$geld = $row["DepotGeld"];
	}
	return $geld;
}

#Auslesen wie viele Drogen in der Fraktion verf�gbar sind
function getFraktionDrogen($id, $connection)
{
	$query = mysqli_query($connection, "SELECT * FROM fraktionen WHERE ID = '$id' OR Name = '$id'") or die(mysqli_error());
	while($row = mysqli_fetch_assoc($query))
	{
		$drogen = $row["DepotDrogen"];
	}
	return $drogen;
}

#Auslesen wie viele Materialien in der Fraktion verf�gbar sind
function getFraktionMaterials($id, $connection)
{
	$query = mysqli_query($connection, "SELECT * FROM fraktionen WHERE ID = '$id' OR Name = '$id'") or die(mysqli_error());
	while($row = mysqli_fetch_assoc($query))
	{
		$mats = $row["DepotMaterials"];
	}
	return $mats;
}

#Auslesen wie viele Benutzer die Fraktion hat
function getFraktionMemberCount($id, $connection)
{
	$query = mysqli_query($connection, "SELECT * FROM userdata WHERE Fraktion = '$id'") or die(mysqli_error());
	$result = mysqli_num_rows($query);
	return $result;
}
?>