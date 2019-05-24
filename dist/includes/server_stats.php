<?php
#Con Reallife Control Panel by Nadine Housten aka. Yannik B�ltes

#					Funktionen
/*
	Funktion			R�ckgabewert
	
	getMoney			GeldGesamt
	getVehicles			FahrzeugeAnzahl
	getMembers			AnzahlAllerMitlgieder
	getTeamMembers		AnzahlAllerTeammitglieder
	getChangelog		Changelog
	getLastPlayers		5NeuesteMitglieder
*/

/*
	Rang							ID
	Supporter						1
	Moderator						2
	Super Moderator					3
	Administrator					4
	Stellvertretender Projektleiter	5
	Projektleiter					6
	Webentwickler					7
*/

#Gibt das gesamte Geld des Servers aus
function getMoney($connection)
{
	$query = mysqli_query($connection, "SELECT Geld,Bankgeld FROM userdata") or die(mysql_error());
	$money = 0;
	while($row = mysqli_fetch_assoc($query))
	{
		$geld = $row["Geld"];
		$bank = $row["Bankgeld"];
		$money = $money + $geld + $bank;
	}
	return $money;
}

#Gibt die anzahl aller Fahrzeuge des Servers aus
function getVehicles($connection)
{
	$query = mysqli_query($connection, "SELECT * FROM vehicles") or die(mysql_error());
	$result = mysqli_num_rows($query);
	return $result;
}

#Gibt die anzahl aller registrierten Benutzer aus
function getMembers($connection)
{
	$query = mysqli_query($connection, "SELECT * FROM userdata") or die(mysql_error());
	$result = mysqli_num_rows($query);
	return $result;
}

#Gibt die anzahl aller Teammitglieder aus
function getTeamMembers($connection)
{
	$query = mysqli_query($connection, "SELECT * FROM userdata WHERE Adminlevel != '0'") or die(mysqli_error());
	$result = mysqli_num_rows($query);
	return $result;
}

#Zeigt die Changelog an
function getChangelog($connection)
{
	$query = mysqli_query($connection, "SELECT * FROM changelog ORDER BY ID DESC LIMIT 10") or die(mysqli_error());
	$result = mysqli_num_rows($query);
	if($result != 0)
	{
		while($row = mysqli_fetch_assoc($query))
		{
			$id = $row["ID"];
			$date = $row["Date"];
			$msg = $row["msg"];
			echo "	<li>
						<span style='border-radius: 25%;' class='badge bg-yellow'><i class='fa fa-envelope'></i></span>
							<div class='timeline-item'>
								<span class='time'><i class='far fa-clock'></i> {$date}</span>
								<h3 class='timeline-header'><a href='#'>Entwicklungs Team</a> Changelog {$id}</h3>
								<div class='timeline-body'>
									{$msg}
								</div>
							</div>
						</li>";
		}
			echo "	<li>
						<span style='border-radius: 25%;' class='badge bg-gray'><i class='far fa-clock bg-gray'></i></span>
					</li>";
		}
		else
		{
		echo '	<li>
				<span style="border-radius: 25%;" class="badge bg-yellow"><i class="fa fa-envelope"></i></span>
					<div class="timeline-item">
						<span class="time"><i class="far fa-clock"></i> XX.XX</span>
						<h3 class="timeline-header"><a href="#">Entwicklungs Team</a> Changelog XX</h3>
						<div class="timeline-body">
							Es wurde noch kein Eintrag erstellt.
						</div>
					</div>
                </li>
				<li>
					<span style="border-radius: 25%;" class="badge bg-gray"><i class="far fa-clock"></i></span>
				</li>';
		}
}

#Zeigt die neuesten Mitglieder an
function getLastPlayers($connection)
{
	$query = mysqli_query($connection, "SELECT * FROM players ORDER BY ID DESC LIMIT 4") or die(mysqli_error());
	while($row = mysqli_fetch_assoc($query))
	{
		$name = $row["Name"];
		$date = $row["RegisterDatum"];
		$gender = $row["Geschlecht"];
		if($gender == 0)
		{
			$gender = "male";
		}
		else
		{
			$gender = "female";
		}
		echo "	<tr>
					<td><a href='pages/mein-profil/show/index.php?id={$name}'>{$name}</a></td>
					<td>{$date}</td>
					<td><i class='fa fa-{$gender}'></i></td>
				</tr>";
	}
}

#Auslesen von Adminr�ngen und definierung der Rangnamen
$Teamquery = mysqli_query($connection, "SELECT * FROM userdata WHERE Adminlevel != '0'") or die(mysqli_error());
while($row = mysqli_fetch_assoc($Teamquery))
{
	$name = $row["Name"];
	$rang = $row["Adminlevel"];
	$bez = "";
	if($rang == 1){
	$bez = "Supporter";
	$labelcol = "supporter";
	}else if($rang == 2){
	$bez = "Moderator";
	$labelcol = "moderator";
	}else if($rang == 3){
	$bez = "Super Moderator";
	$labelcol = "super-moderator";
	}else if($rang == 4){
	$bez = "Administrator";
	$labelcol = "administrator";
	}else if($rang == 5){
	$bez = "Stellvertretender Projektleiter";
	$labelcol = "stv-projektleiter";
	}else if($rang == 6){
	$bez = "Projektleiter";
	$labelcol = "projektleiter";
	}else if($rang == 7){
	$bez = "Entwickler";
	$labelcol = "entwicklung";
	}
}
?>
