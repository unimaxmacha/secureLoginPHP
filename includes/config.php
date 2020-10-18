<?php

	define("TITLE","SecureLogin");
	define("PROJECT","/2020/secureLoginPHP/");
	define("ADMIN","admin/");
	define("ASSETS","assets/");
	/* Database credentials. Assuming you are running MySQL
	server with default setting (user 'root' with no password) */
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'db_u3services');
	date_default_timezone_set('Asia/Tokyo');
	/* Attempt to connect to MySQL database */
	$dbConn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	$dbConn->set_charset("utf8");
	//$dbConn->exec("SET time_zone = 'Asia/Tokyo'");


	/* Check Connection */
	if($dbConn === false) {
		die("ERROR: Could not connect database. " .$dbConn->connect_error);
	}
?>