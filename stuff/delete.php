<?php 
    include"dbConnect.php";

    $id = $_GET['game_id'];
    $sql = "DELETE FROM `activeGames` WHERE game_id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(":id", $id);
    $query->execute();


    header("location: ../index.php");
?>