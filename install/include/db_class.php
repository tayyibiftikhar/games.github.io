<?php
class Database {

	//check database connection
	function check_connection($data){

		// Connect to the database
		$mysqli = new mysqli(
			$data['hostname'],
			$data['username'],
			$data['dbpass'],
			$data['dbname']
		);

		if($mysqli->connect_error) {
		   return false;
		}else{
			return true;
		}
		 
	}


	// Install the db
	function db_install($data)
	{
		// Connect to the database
		$mysqli = new mysqli(
			$data['hostname'],
			$data['username'],
			$data['dbpass'],
			$data['dbname']
		);

		// Check for errors
		if(mysqli_connect_errno()){
			return false;
		}


		// Open the default SQL file
		$query = file_get_contents('include/install.sql');
		
		// Execute a multi query
		$mysqli->multi_query($query);
		
		// Close the connection
		$mysqli->close();
		
		return true;
	}
}