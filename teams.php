<?php 
    try {
        require_once "./includes/dbh.inc.php";

        $query = "SELECT name FROM leagues;";

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
</style>
</head>
<body>
    <?php include("includes/navbar.inc.php");?>
    <h1>Existing Leagues</h1>
    <div>
         <form action="includes/createTeam.inc.php" method="post">
        <label>Team Name</label>
        <input placeholder="Enter the team name" name="team"/>
        <br/>
        <label>League</label>
        <?php
       if (empty($results)) {
        echo "<p> No Existing Leagues - Please create one</p>";
       } 
       else {
        echo '<select name="league" id="league">';
        foreach($results as $row){
            echo '<option value="'.$row['name'].'">' . $row['name'] . '</option>'; 
        }
        echo "</select>";

       }
    ?>
        <br/>
        <button>Submit</button>
    </form>
    </div>
</body>
</html>