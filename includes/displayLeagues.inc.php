<?php 


    

    try {
        require_once "dbh.inc.php";

        $query = "SELECT * FROM leagues;";

        $statement = $pdo->prepare($query);

        $statement->execute();
        $resutls = $statement->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $statement = null;


        die();
    } catch (PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }