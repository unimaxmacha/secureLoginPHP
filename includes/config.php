<?php
	/* Database credentials. Assuming you are running MySQL
	server with default setting (user 'root' with no password) */
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'db_dbinfo');

	/* Attempt to connect to MySQL database */
	$dbConn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	/* Check Connection */
	if($dbConn === false) {
		die("ERROR: Could not connect database. " .$dbConn->connect_error);
	}
?>