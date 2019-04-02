<?php 
	include"dbConnect.php";
	$id = $_GET[id];
	$conn = mysqli_connect($serverName, $username, $password, $dbName);
	$sql = "DELETE FROM `activeGames` where id = $id";
	$query = mysqli_query($conn ,$sql);

	header("Location: index.php");