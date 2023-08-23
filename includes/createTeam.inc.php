<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $teamName = $_POST["team"];
    $league = $_POST["league"];

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO teams (name, points, wins, draws, losses, league) VALUES (?, 0, 0, 0, 0, ?);";

        $statement = $pdo->prepare($query);

        $statement->execute([$teamName, $league]);

        $pdo = null;
        $statement = null;

        header("Location: ../singleLeague.php");
        die();
    } catch (PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }
}
else {
    header("Location: ../index.php");
}