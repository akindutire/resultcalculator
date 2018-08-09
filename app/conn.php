<?php

/**
*	Name : Conn.php
*	An Abstraction class (Database) implemented using PDO(PHP Data Object)
*	A Child class cliqs.....  inherited the Database
*	Author:	Ayo
*	Date: 09 - JULY-	2017
*
*	@params driver,host-localhost
*
*/


class Database{

	private $driver,$host,$username,$database,$password;
	private $persistent=TRUE;
	private $STATUS;
	


	public function __construct(){

		
	}

	private function databaseDriverDigest($DatabaseType){

		try{

			$supportedDriversArray	=	PDO::getAvailableDrivers();
			
			if (in_array($DatabaseType, $supportedDriversArray)) {
			
				$this->driver 	=	$DatabaseType;
			
			}else{

				throw new Exception("Database Driver for {$DatabaseType} is not Enabled on this Server, Suggest try Installing it", 1);
				
			}

		}catch(Exception $e){

			$this->STATUS 	= 	$e->getMessage();

		}
	}

	private function Connection($DatabaseType,$Host,$DatabseName,$DatabaseUsername,$DatabasePassword){
		
		$this->databaseDriverDigest($DatabaseType);

		$this->host 	=	$Host;
		$this->username =	$DatabaseUsername;
		$this->password =	$DatabasePassword;
		$this->database =	$DatabseName;

		$this->STATUS 	= 	"<pre>Database Connection Parameters Established</pre>";


		try {
			
			$connect_handle = new PDO("$this->driver:host=$this->host;dbname=$this->database", "$this->username", "$this->password");

			if ($connect_handle != null) {
				
				$connect_handle->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$connect_handle->setAttribute(PDO::ATTR_PERSISTENT,TRUE);
			
				return $connect_handle;

			}else{

				throw new PDOException("Couldn't Establish a Database Connection", 1);
				
			}
		} catch (PDOException $e) {
			
			$this->STATUS 	= 	$e->getMessage();
		}
	}

	public final function addConnection($DatabaseType,$Host,$DatabseName,$DatabaseUsername,$DatabasePassword){

		$conn = new self();
		$link = $conn->Connection($DatabaseType,$Host,$DatabseName,$DatabaseUsername,$DatabasePassword);
		
		$this->STATUS 	=	"<pre>Connection Established</pre>";

		return $link;

	}


	public final function getStatus(){

		return $this->STATUS;
	}
}




class cliqsDatabaseManager extends Database{

	
}


/**
*	Connection Begins
*
*/

$Mysql_Connect_handle 	= 	new cliqsDatabaseManager();
$link 	=	$Mysql_Connect_handle->addConnection('mysql','127.0.0.1','autoresultcalc','root','');


?>