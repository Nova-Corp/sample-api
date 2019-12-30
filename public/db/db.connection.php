<?php 
	/**
	 * This class will make connection with SQL Server.
	 */

	include_once 'constant.php';

	class DBConn {
	    // protected $pdo;

	    // function __construct(){}

	    function connect(){
	    // Host name, DB Name User and Password is accessed from Golobal Constants.
	        $dsn = 'mysql:host=' . HOST . ';dbname=' . DB; 		//	This is the SQL Connection with PDO Method.
	        $pdo = new PDO($dsn, USER, PASS);
	        $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 	 //	Setting the Attribute is optional.
	        return $pdo;
	    }
	}   