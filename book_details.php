<?php
include_once('database.php'); // include the database connection file

/*//////////////////////*/
/* YOUR CODE GOES HERE */
/*/////////////////////*///

$todolistID = $_GET["todolistID"]; // assigns the gameID from the URL
echo $todolistID;
if($todolistID == 0) {
    $todolist = null;
    $isAddition = 1;
} else {
    $isAddition = 0;
    $query = "SELECT * FROM todolists WHERE Id = :todolist_id "; // SQL statement
    $statement = $db->prepare($query); // encapsulate the sql statement
    $statement->bindValue(':todolist_id', $todolistID);
    $statement->execute(); // run on the db server
    $book = $statement->fetch(); // returns only one record
    $statement->closeCursor(); // close the connection
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Game Details</title>
    <!-- CSS Section -->
    <link rel="stylesheet" href="./Scripts/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Scripts/lib/bootstrap/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="./Scripts/lib/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="./Content/app.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h1>Book Details</h1>
            <form action="update_database.php" method="post">
                <div class="form-group">
                    <label for="IDTextField" hidden>ID</label>
                    <input type="hidden" class="form-control" id="IDTextField" name="IDTextField"
                           placeholder="Game ID" value="<?php echo $todolist['ID']; ?>">
                </div>
                <div class="form-group">
                    <label for="TitleTextField">Todo</label>
                    <input type="text" class="form-control" id="TitleTextField"  name="TitleTextField"
                           placeholder="Title" required  value="<?php echo $todolist['TODO']; ?>">
                </div>
                <div class="form-group">
                    <label for="AuthorTextField">Notes</label>
                    <input type="text" class="form-control" id="AuthorTextField" name="AuthorTextField"
                           placeholder="Author" required  value="<?php echo $todolist['Notes']; ?>">
                </div>
                <div class="form-group">
                    <label for="PriceTextField">ID</label>
                    <input type="text" class="form-control" id="PriceTextField" name="PriceTextField"
                           placeholder="Price" required  value="<?php echo $todolist['Price']; ?>">
                <!--</div>
                <div class="form-group">
                    <label for="GenreTextField">Genre</label>
                    <input type="text" class="form-control" id="GenreTextField" name="GenreTextField"
                           placeholder="Genre" required  value="<?php echo $todolist['Genre']; ?>">-->
                </div>
                    <input type="hidden" name="isAddition" value="<?php echo $isAddition; ?>">
                <button type="submit" id="SubmitButton" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>


<!-- JavaScript Section -->
<script src="./Scripts/lib/jquery/dist/jquery.min.js"></script>
<script src="./Scripts/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./Scripts/app.js"></script>
</body>
</html>

