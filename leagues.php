<?php 
    try {
        require_once "./includes/dbh.inc.php";

        $query = "SELECT * FROM leagues;";

        $statement = $pdo->prepare($query);

        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $statement = null;
    } catch (PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include("includes/navbar.inc.php");?>
    <h1>Existing Leagues</h1>

    <?php
       if (empty($results)) {
        echo "<p> No Existing Leagues </p>";
       } 
       else {
        foreach($results as $row){
            echo "<div>";
            echo "<table>";
            echo "<tr>";
            echo "<th> League ID </th>";
            echo "<th> League Name </th>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
            echo "</tr>";
            echo "</table>";
            echo "</div>";
        }
       }
    ?>
    
</body>
</html>