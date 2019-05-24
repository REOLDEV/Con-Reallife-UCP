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

class Player extends AbstractModel {

    private static $sql_findAll = 'SELECT * FROM players';
    private static $sql_findById = 'SELECT * FROM players WHERE id=:id';
    private static $sql_findBySession = 'SELECT * FROM players WHERE Name=:session';   
    private static $sql_findBySerial = 'SELECT * FROM players WHERE Serial=:serial'; 
    private static $sql_findByName = "SELECT * FROM players WHERE Name=:name";
    
    private $Id;
    private $Name;
    private $Serial;
    private $Ip;
    private $Last_login;
    private $Geburtsdatum_Tag;
    private $Geburtsdatum_Monat;
    private $Geburtsdatum_Jahr;
    private $Geschlecht;
    private $Passwort;
    private $RegisterDatum;
    private $Salt;
	

    public function __construct() {
	parent::__construct();
	
    }

    public static function allPlayer() {
        $connection = PDOSingleton::connection();
        
        $statement = $connection->prepare(self::$sql_findAll);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, 'Player');
    }
    
    public static function byId($id){
        $connection = PDOSingleton::connection();
        $statement = $connection->prepare(self::$sql_findById);
        $statement->bindValue(':id',$id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchObject('Player');
    }
  
    public static function bySession($session){
        $connection = PDOSingleton::connection();
        $statement = $connection->prepare(self::$sql_findBySession);
        $statement->bindValue(':session',$session, PDO::PARAM_INT);
        $statement->execute();
        
        return $statement->fetchObject('Player');
    }    
    
    public static function byName($name){
		$connection = PDOSingleton::connection();
        $statement = $connection->prepare(self::$sql_findByName);
        $statement->bindValue(':name',$name, PDO::PARAM_STR);
        $statement->execute();
		
		return $statement->fetchObject('Player');
    }    
    
    public static function allBySerial($serial) {
        $connection = PDOSingleton::connection();   
        $statement = $connection->prepare(self::$sql_findBySerial);
        $statement->bindValue(':serial',$serial, PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, 'Player');
    }
    
    public function getId() {
        return $this->Id;
    }

    public function setId($Id) {
        $this->Id = $Id;
    }

    public function getName() {
        return $this->Name;
    }

    public function setName($Name) {
        $this->Name = $Name;
    }

    public function getSerial() {
        return $this->Serial;
    }

    public function setSerial($Serial) {
        $this->Serial = $Serial;
    }

    public function getIp() {
        return $this->Ip;
    }

    public function setIp($Ip) {
        $this->Ip = $Ip;
    }

    public function getPasswort() {
        return $this->Passwort;
    }

    public function setPasswort($Passwort) {
        $this->Passwort = $Passwort;
    }

    public function getRegisterDatum() {
        return $this->RegisterDatum;
    }

    public function setRegisterDatum($RegisterDatum) {
        $this->RegisterDatum = $RegisterDatum;
    }

    public function getSalt() {
        return $this->Salt;
    }

    public function setSalt($Salt) {
        $this->Salt = $Salt;
    }
    public function getLast_login() {
        return $this->Last_login;
    }

    public function setLast_login($Last_login) {
        $this->Last_login = $Last_login;
    }

    public function getGeburtsdatum_Tag() {
        return $this->Geburtsdatum_Tag;
    }

    public function setGeburtsdatum_Tag($Geburtsdatum_Tag) {
        $this->Geburtsdatum_Tag = $Geburtsdatum_Tag;
    }

    public function getGeburtsdatum_Monat() {
        return $this->Geburtsdatum_Monat;
    }

    public function setGeburtsdatum_Monat($Geburtsdatum_Monat) {
        $this->Geburtsdatum_Monat = $Geburtsdatum_Monat;
    }

    public function getGeburtsdatum_Jahr() {
        return $this->Geburtsdatum_Jahr;
    }

    public function setGeburtsdatum_Jahr($Geburtsdatum_Jahr) {
        $this->Geburtsdatum_Jahr = $Geburtsdatum_Jahr;
    }

    public function getGeschlecht() {
        return $this->Geschlecht;
    }

    public function setGeschlecht($Gesclecht) {
        $this->Geschlecht = $Geschlecht;
    }

}
?>