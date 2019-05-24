<?php
#Con Reallife Control Panel by Nadine Housten aka. Yannik Böltes

#					Funktionen
/*
	Funktion		Mitgabewert		Rückgabewert
	
*/

#Lizenzen
//Lizensen Abfrage tabelle 'userdata_db'
#Autoführerschein
$CarLic    = $row_userdata_db['Autofuehrerschein'];
#Motorradführerschein
$MotorLic  = $row_userdata_db['Motorradtfuehrerschein'];
#LKWführerschein
$LKWLic    = $row_userdata_db['LKWfuehrerschein'];
#Helikopterführerschein
$HeliLic   = $row_userdata_db['Helikopterfuehrerschein'];
#Flugschein
$FlugLicA  = $row_userdata_db['FlugscheinKlasseA'];
$FlugLicB  = $row_userdata_db['FlugscheinKlasseB'];
#Motorbootschein
$MBootLic  = $row_userdata_db['Motorbootschein'];
#Segelschein
$SBootLic  = $row_userdata_db['Segelschein'];
#Angelschein
$AngelLic  = $row_userdata_db['Angelschein'];
#Waffenschein
$WeaponLic = $row_userdata_db['Waffenschein'];
#Personalasuweis
$Perso     = $row_userdata_db['Perso'];

//Bonuskram aus Tabelle 'bonustable_db'
#Lungenvolumen
$Lungenvolumen = $row_bonustable_db['Lungenvolumen'];
#Muskeln
$Muskeln       = $row_bonustable_db['Muskeln'];
#Kondition
$Kondition     = $row_bonustable_db['Kondition'];
#Boxen
$Boxen         = $row_bonustable_db['Boxen'];
#Kung Fu
$KungFu        = $row_bonustable_db['KungFu'];
#Streetfighter
$Streetfighter = $row_bonustable_db['Streetfighting'];
#Pistolen Skill
$PistolSkill   = $row_bonustable_db['PistolenSkill'];
#Deagle Skill
$DeagleSkill   = $row_bonustable_db['DeagleSkill'];
#Shotgun Skill
$ShotgunSkill  = $row_bonustable_db['ShotgunSkill'];
#Assaultskill
$AssaultSkill  = $row_bonustable_db['AssaultSkill'];
#MP5 Skills
$MP5Skill      = $row_bonustable_db['MP5Skills'];
#Vortex
$Vortex        = $row_bonustable_db['Vortex'];
?>