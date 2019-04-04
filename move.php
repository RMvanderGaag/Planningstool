<?php  
	include "dbConnect.php";
	$name = $_GET[name];
	$conn = mysqli_connect($serverName, $username, $password, $dbName);

   	$sql = "SELECT name, play_minutes, explain_minutes FROM `games` WHERE name = '$name'";
   	$query = mysqli_query($conn, $sql);
   	while ($row = mysqli_fetch_object($query)) {
	   	$name =	$row->name;
	   	$play_minutes = $row->play_minutes;
	   	$explain_minutes = $row->explain_minutes;
   	}

   	$sql2 = "INSERT INTO `activeGames` (name, play_minutes, explain_minutes) VALUES ('$name', '$play_minutes', '$explain_minutes')";
   	$query2 = mysqli_query($conn, $sql2);




   	header("Location: edit.php?name=$name");