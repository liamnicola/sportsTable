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
    <style>
    <?php include './css/table.css' ?>
</style>
</head>
<body>
    <?php include("includes/navbar.inc.php");?>
    <h1>Existing Leagues</h1>
    <div>
        <table>
            <tr>
                <th>League ID</th>
                <th>League Name</th>
            </tr>
    <?php
       if (empty($results)) {
        echo "<p> No Existing Leagues </p>";
       } 
       else {
        foreach($results as $row){
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
            echo "</tr>";
        }
       }
    ?>
    </table>
    </div>
</body>
</html>