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
        <label>League Name: </label>
        <input placeholder="Enter the league name" name="league"/>
        <br/>
        
        <button>Submit</button>
    </form>
    <br/>
    </body>
</html>