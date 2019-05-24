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

require_once 'class/pdosingleton.php';

abstract class AbstractModel {
    
    protected $connection;

    public function __construct() {
        $this->connection = PDOSingleton::connection();
    }
}
?>