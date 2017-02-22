<?php
include_once('database.php');
$bookID = $_GET["bookID"]; // assigns the gameID from the URL
if($bookID != false) {
    $query = "DELETE FROM games WHERE Id = :game_id ";
    $statement = $db->prepare($query);
    $statement->bindValue(":game_id", $gameID);
    $success = $statement->execute(); // execute the prepared query
    $statement->closeCursor(); // close off database
}
// redirect to index page
header('Location: index.php');
?>