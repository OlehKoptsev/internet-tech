<?php

	$db_driver="mysql"; $host = "127.0.0.1"; $database = "itech";
	$dsn = "$db_driver:host=$host; dbname=$database";
	$username = "root"; $password = "";
	$options = array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
	
	try {
		$dbh = new PDO ($dsn, $username, $password, $options);
		echo "Connected to database<br>";
	}
	catch (PDOException $e) {
		echo "Error!: " . $e->getMessage() . "<br/>"; die();
	}
	
?>