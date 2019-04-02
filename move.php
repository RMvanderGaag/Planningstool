<?php  
	include "dbConnect.php";
	$id = $_GET[id];
	$conn = mysqli_connect($serverName, $username, $password, $dbName);
  	$sql = "INSERT INTO `activeGames` SELECT * FROM `games` WHERE id = $id";
    $query = mysqli_query($conn ,$sql);

   	header("Location: index.php");