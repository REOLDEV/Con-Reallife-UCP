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

class PDOSingleton {

    private static $connection = null;
	private static $host = "mysql-mariadb-5-101.zap-hosting.com";
	private static $dbname = "zap347923-1";
	private static $user = "zap347923-1";
	private static $pass = "t1KyVS8u2U0GcPHz";

    public static function connection() {
        if (self::$connection == null) {
            self::$connection = new PDO('mysql:dbname='.self::$dbname.';host='.self::$host, self::$user, self::$pass);
        }
        return self::$connection;
    }

}

?>