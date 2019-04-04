<?php  
	include "../Database/dbConnect.php";
	$id = $_GET[id];
	session_start();
	$_SESSION[id] = $id;
	$conn = mysqli_connect($serverName, $username, $password, $dbName);
  	$sql = "SELECT * FROM `games` WHERE id = $id";
    $query = mysqli_query($conn ,$sql);

    while($row = mysqli_fetch_object($query)){
    	$id = $row->id;
    	$name = $row->name;
    	$explain_minutes = $row->explain_minutes;
    	$play_minutes = $row->play_minutes;
    }

    $sql2 = "INSERT INTO `activeGames` (id, name, play_minutes, explain_minutes) 
    		VALUES('$id', '$name', '$play_minutes', '$explain_minutes')";
    $query2 = mysqli_query($conn, $sql2);

    $game_id = $conn->insert_id;

   	header("Location: ../edit.php?game_id=$game_id");