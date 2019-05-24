<?php

class config{
	
	//////////////////////
	// variable			//
	//////////////////////
	
	private $host = "";
	private $user = "";
	private $password = "";
	private $database = "";
	
	//////////////////////
	// functions		//
	//////////////////////
	
	function getMysqlHost(){
		return $this->host;
	}
	
	function getMysqlUser(){
		return $this->user;
	}
	
	function getMysqlPassword(){
		return $this->password;
	}
	
	function getMysqlDatabase(){
		return $this->database;
	}

}

?>