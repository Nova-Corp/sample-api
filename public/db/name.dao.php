<?php 
	/**
	 * This is the custom actions performed by users like FETCH, DELETE, UPDATE and QUERY. 
	 */
	include_once 'db.connection.php';
	class UsersDetails {
		protected $conn;
	// This constructor will make the connection to SQL Server at the begining of the all other actions.
	    public function __construct(){
	        $db = new DBConn;
        	$this->conn = $db->connect();
	    }

	    function nameList(){
	        $sql = "SELECT name FROM user_details"; 	//	This is the basic SQL Query.
	        $stmt = $this->conn->query($sql);			// 	It will be execute the query on server.
	        $result = $stmt->fetchAll();				// 	It will fetch all the result as array.
	        return $result;
	    }
	}