<?php
    try {
        require_once "./includes/dbh.inc.php";
                $id = $_GET['id'];

        $query = "SELECT * FROM leagues WHERE id ='$id'";

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
    <div>
        <table>
    <?php
       if (empty($results)) {
        echo "<p> no results</p>";
       } 
       else {
        foreach($results as $row){
            echo "<h1>" . htmlspecialchars($row["name"]) . "</h1>";
        }

        echo "<h2>Teams</h2>";
       }
    ?>
    </table>
    </div>
</body>
</html>