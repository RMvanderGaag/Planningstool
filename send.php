<?php
	include"dbConnect.php";
	$conn = mysqli_connect($serverName, $username, $password, $dbName);
	$id = $_GET['id'];
	$uitlegger = $_POST['Uitlegger'];
	$players = $_POST['players'];
	$time = $_POST['time'];

	$sql = "INSERT INTO `planning` (id, uitlegger, players, begin_time)
	 		VALUES ('$id', '$uitlegger', '$players', '$time')";
    $query = mysqli_query($conn ,$sql);

    $sql2 = "SELECT uitlegger, begin_time FROM `planning` INNER JOIN `activeGames` ON `planning`.'$id' = `activeGames`.'id'";
    $query2 = mysqli_query($conn, $sql2);


  	header("Location: index.php");

   