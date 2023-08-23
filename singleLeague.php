<?php
    try {
        require_once "./includes/dbh.inc.php";
                $id = $_GET['name'];
        if(strlen($id) < 1){
            header("Location: http://localhost/sportstable/index.php");
        }
        else{

        $query = "SELECT * FROM teams WHERE league ='$id' ORDER BY points";

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
    <style>
    <?php include './css/table.css' ?>
</style>
</head>
<body>
    <?php include("includes/navbar.inc.php");?>
    <div>
        <h1>Teams</h1>
        <table>
            <tr>
                <th>Team Name</th>
                <th>Wins</th>
                <th>Draws</th>
                <th>Losses</th>
                <th>Points</th>
            </tr>
            
    <?php
       if (empty($results)) {
        echo "<p> no results</p>";
       } 
       else {
        foreach($results as $row){
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["wins"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["draws"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["losses"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["points"]) . "</td>";
            echo "</tr>";
        }


        
       }
    ?>
    </table>

    <form action="includes/results.inc.php" method="post">
        <label>Team One</label>
        <?php
        echo '<select name="team1" id="team1">';
        foreach($results as $row){
            echo '<option value="'.$row['name'].'">' . $row['name'] . '</option>'; 
        }
        echo "</select>";

        ?>
                <input placeholder="Goals Scored" id="goals2"/>

    <br/>
        <label>Team Two</label>
        <?php
        echo '<select name="team2" id="team2">';
        foreach($results as $row){
            echo '<option value="'.$row['name'].'">' . $row['name'] . '</option>'; 
        }
        echo "</select>";

        ?>
        <input placeholder="Goals Scored" id="goals1"/>
       <br/>
        
        <button>Submit</button>
    </form>
    </div>
</body>
</html>