<?php 

/*
 * Objektorientiertes, Model View Controll Framework
 * OOP, MVC, PDO Framework
 * Written by Danny T (ReWrite)
 * All rights reserved!
 * 
 * 
 * Please do not remove this Copyrights. The endusers will not see them.
 * Thank you !
 */

include_once 'model/abstractmodel.php';

final class Userdata extends AbstractModel {

    private static $sql_findAll = 'SELECT * FROM userdata';
    private static $sql_findById = 'SELECT * FROM userdata WHERE name=:name';
    private static $sql_findTopMoney = 'SELECT * FROM `userdata` ORDER BY `Bankgeld` DESC LIMIT 0 , 10';
    private static $sql_findTopPlayed = 'SELECT * FROM `userdata` ORDER BY `Spielzeit` DESC LIMIT 0 , 10';
    private static $sql_findTopPoints = 'SELECT * FROM `userdata` ORDER BY `Bonuspunkte` DESC LIMIT 0 , 10';    
    
    private $Name;
    private $Geld;
    private $Bonuspunkte;
    private $Fraktion;
    private $FraktionsRang;
    private $Adminlevel;
    private $Spielzeit;
    private $Tode;
    private $Kills;
    private $Knastzeit;
    private $Hausschluessel;
    private $Bizschluessel;
    private $Bankgeld;
    private $Drogen;
    private $Skinid;
    private $Wanteds;
    private $Stvopunkte;
    private $Telefonnr;
    private $Warns;
    private $Job;
    private $SocialState;
			

    public function __construct() {
        parent::__construct();
    }

    public static function allUserdata() {
        $connection = PDOSingleton::connection();
        
        $statement = $connection->prepare(self::$sql_findAll);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, 'Userdata');
    }
    
    public static function byName($name){
        $connection = PDOSingleton::connection();
        $statement = $connection->prepare(self::$sql_findById);
        $statement->bindValue(':name',$name, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchObject('Userdata');
    }
	
	public static function byName2($name){
        $connection = PDOSingleton::connection();
        $statement = $connection->prepare(self::$sql_findById);
        $statement->bindValue(':name',$name, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function topMoney() {
        $connection = PDOSingleton::connection();
        $statement = $connection->prepare(self::$sql_findTopMoney);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, 'Userdata');
    }    
    
    public static function topPlayed() {
        $connection = PDOSingleton::connection();
        
        $statement = $connection->prepare(self::$sql_findTopPlayed);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, 'Userdata');
    }    
    
    public static function topPoints() {
        $connection = PDOSingleton::connection();
        
        $statement = $connection->prepare(self::$sql_findTopPoints);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, 'Userdata');
    }        
    
    public function getName() {
        return $this->Name;
    }

    public function setName($Name) {
        $this->Name = $Name;
    }

    public function getGeld() {
        return $this->Geld;
    }

    public function setGeld($Geld) {
        $this->Geld = $Geld;
    }

    public function getPunkte() {
        return $this->Bonuspunkte;
    }

    public function setPunkte($Punkte) {
        $this->Bonuspunkte = $Punkte;
    }

    public function getFraktion() {
        return $this->Fraktion;
    }

    public function setFraktion($Fraktion) {
        $this->Fraktion = $Fraktion;
    }

    public function getFraktionsRang() {
        return $this->FraktionsRang;
    }

    public function setFraktionsRang($FraktionsRang) {
        $this->FraktionsRang = $FraktionsRang;
    }

    public function getAdminlevel() {
        return $this->Adminlevel;
    }

    public function setAdminlevel($Adminlevel) {
        $this->Adminlevel = $Adminlevel;
    }

    public function getSpielzeit() {
        return $this->Spielzeit;
    }

    public function setSpielzeit($Spielzeit) {
        $this->Spielzeit = $Spielzeit;
    }

    public function getTode() {
        return $this->Tode;
    }

    public function setTode($Tode) {
        $this->Tode = $Tode;
    }

    public function getKills() {
        return $this->Kills;
    }

    public function setKills($Kills) {
        $this->Kills = $Kills;
    }

    public function getKnastzeit() {
        return $this->Knastzeit;
    }

    public function setKnastzeit($Knastzeit) {
        $this->Knastzeit = $Knastzeit;
    }

    public function getHausschluessel() {
        return $this->Hausschluessel;
    }

    public function setHausschluessel($Hausschluessel) {
        $this->Hausschluessel = $Hausschluessel;
    }

    public function getBizschluessel() {
        return $this->Bizschluessel;
    }
	
    public function setBizschluessel($Bizschluessel) {
        $this->Bizschluessel = $Bizschluessel;
    }

    public function getBankgeld() {
        return $this->Bankgeld;
    }

    public function setBankgeld($Bankgeld) {
        $this->Bankgeld = $Bankgeld;
    }

    public function getDrogen() {
        return $this->Drogen;
    }

    public function setDrogen($Drogen) {
        $this->Drogen = $Drogen;
    }

    public function getSkinid() {
        return $this->Skinid;
    }

    public function setSkinid($Skinid) {
        $this->Skinid = $Skinid;
    }

    public function getWanteds() {
        return $this->Wanteds;
    }

    public function setWanteds($Wanteds) {
        $this->Wanteds = $Wanteds;
    }

    public function getStvopunkte() {
        return $this->Stvopunkte;
    }

    public function setStvopunkte($Stvopunkte) {
        $this->Stvopunkte = $Stvopunkte;
    }

    public function getTelefonnr() {
        return $this->Telefonnr;
    }

    public function setTelefonnr($Telefonnr) {
        $this->Telefonnr = $Telefonnr;
    }

    public function getWarns() {
        return $this->Warns;
    }

    public function setWarns($Warns) {
        $this->Warns = $Warns;
    }

    public function getJob() {
        return $this->Job;
    }

    public function setJob($Job) {
        $this->Job = $Job;
    }

    public function getSocialState() {
        return $this->SocialState;
    }

    public function setSocialState($SocialState) {
        $this->SocialState = $SocialState;
    }

}

?>