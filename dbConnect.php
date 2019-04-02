<?php 
	$serverName = "localhost";
	$username = "root";
	$password = "mysql";
	$dbName = "Planningstool";

	header('Content-type: text/html; charset=iso-8859-1');

	$conn = new mysqli($serverName, $username, $password, $dbName);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	$conn->close();


