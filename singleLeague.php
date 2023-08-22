<?php
    try {
        require_once "./includes/dbh.inc.php";
                $id = $_GET['name'];
        if(strlen($id) < 1){
            header("Location: http://localhost/sportstable/index.php");
        }
        else{

        $query = "SELECT * FROM teams WHERE league ='$id'";

        $statement = $pdo->prepare($query);

        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $statement = null;
        }
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
        <h1>Teams</h1>
        <table>
    <?php
       if (empty($results)) {
        echo "<p> no results</p>";
       } 
       else {
        foreach($results as $row){
            echo "<p>" . htmlspecialchars($row["name"]) . "</p>";
            echo "<p>" . htmlspecialchars($row["points"]) . "</p>";
 
        }


        
       }
    ?>
    </table>
    </div>
</body>
</html>