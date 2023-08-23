<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $team1 = $_POST["team1"];
    $team2 = $_POST["team2"];
    $goals1 = $_POST["goals1"];
    $goals2 = $_POST["goals2"];

    try {
        require_once "dbh.inc.php";
//complete results form
        $temp = 0;
        if($goals1 > $goals2){

        }

        $query = "UPDATE teams (name, points, wins, draws, losses, league) VALUES (?, 0, 0, 0, 0, ?);";

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