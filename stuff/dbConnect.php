<?php
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $myDB = "planningstool";

    
    header('Content-type: text/html; charset=iso-8859-1');

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }catch(PDOException $e){
        echo "NIET GELUKT " . $e->getMessage();
    }
?>

