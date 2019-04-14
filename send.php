<?php  
include"dbConnect.php";
$id = $_GET["id"];
$uitlegger = $_POST["Uitlegger"];
$players = implode(" ", $_POST["players"]);
$time = $_POST["time"];

 
$sql = "UPDATE `activeGames`
	 		SET uitlegger = '$uitlegger', players ='$players', begin_time = '$time' WHERE game_id = :id";
$query = $conn->prepare($sql);
$query->bindParam(":id", $id);
$query->execute();


header("location: index.php");