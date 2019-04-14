<?php 
    include "dbConnect.php";
    $max_players= $_GET[max_players];
    $id= $_GET[id];
    session_start();
    $_SESSION[id] = $id;
    
    $sql= "SELECT * FROM games WHERE id= :id";
    $query = $conn->prepare($sql);
    $query->bindParam(":id" , $id);
    $query->execute();
    $result = $query->fetch();


    $sql= "INSERT INTO activeGames(id, name, play_minutes, explain_minutes, min_players, max_players) 
        VALUES(:id, :name, :play_minutes, :explain_minutes, :min_players, :max_players)";
    $query= $conn->prepare($sql);
    $query->bindParam(":id" , $result['id']);
    $query->bindParam(":name" , $result['name']);
    $query->bindParam(":play_minutes" , $result['play_minutes']);
    $query->bindParam(":explain_minutes" , $result['explain_minutes']);
    $query->bindParam(":min_players" , $result['min_players']);
    $query->bindParam(":max_players" , $result['max_players']);
    $query->execute();

    $game_id = $conn->lastInsertId();
    echo $game_id;
    header("location: edit.php?game_id=$game_id&max_players=$max_players");
?>