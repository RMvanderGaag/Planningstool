<?php
	include"../Database/dbConnect.php";
	$conn = mysqli_connect($serverName, $username, $password, $dbName);
	$id = $_GET['id'];
	$i = $_GET['max_players'];
	$uitlegger = $_POST['Uitlegger'];
	$players = $_POST['players1'] . ' ' . $_POST['players2'] . ' ' . $_POST['players3'] . ' ' . $_POST['players4'] . ' ' . $_POST['players5'] . ' ' . $_POST['players6'] . ' ' . $_POST['players7'] . ' ' . $_POST['players8'] . ' ' . $_POST['players9'] . ' ' . $_POST['players10'] . ' ' . $_POST['players11'] . ' ' . $_POST['players12'];
	$time = $_POST['time'];
	echo $players;

	$sql = "UPDATE `activeGames`
	 		SET uitlegger = '$uitlegger', players ='$players', begin_time = '$time' WHERE game_id = $id";
    $query = mysqli_query($conn ,$sql);

    
  	header("Location: ../index.php");

   