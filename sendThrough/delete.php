<?php 
	include"../Database/dbConnect.php";
	$id = $_GET[game_id];
	$conn = mysqli_connect($serverName, $username, $password, $dbName);
	$sql = "DELETE FROM `activeGames` where game_id = $id";
	$query = mysqli_query($conn ,$sql);

	header("Location: ../index.php");