<?php
include_once('database.php');
$todolistID = $_GET["todolistID"]; // assigns the gameID from the URL
if($todolistID != false) {
    $query = "DELETE FROM todolists WHERE Id = :todolist_id ";
    $statement = $db->prepare($query);
    $statement->bindValue(":todolist_id", $todolistID);
    $success = $statement->execute(); // execute the prepared query
    $statement->closeCursor(); // close off database
}
// redirect to index page
header('Location: index.php');
?>