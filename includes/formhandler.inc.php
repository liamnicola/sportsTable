<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $leagueName = $_POST["league"];
    

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO leagues (name) VALUES (?);";

        $statement = $pdo->prepare($query);

        $statement->execute([$leagueName]);

        $pdo = null;
        $statement = null;

        header("Location: ../leagues.php");
        die();
    } catch (PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }
}
else {
    header("Location: ../index.php");
}