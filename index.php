<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include("includes/navbar.inc.php");?>
    <h1>Sports Table</h1>

    <form action="includes/formhandler.inc.php" method="post">
        <label>Team one: </label>
        <input placeholder="Enter the league name" name="league"/>
        <br/>
        
        <button>Submit</button>
    </form>
    <br/>
    
    <p>make league teams first and use above form as an update - sql layout = teams table, match tablle </p>
</body>
</html>