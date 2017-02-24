<?php
include_once('database.php');
$isAddition = filter_input(INPUT_POST, "isAddition");
$todolistTODO = filter_input(INPUT_POST, "NameTextField"); //$_POST["NameTextField"];
$todolistNotes = filter_input(INPUT_POST, "CostTextField"); //$_POST["CostTextField"];
if($isAddition == "1") {
    $query = "INSERT INTO todolists (TODO, Notes) VALUES (:todolist_todo, :todolist_notes)";
    $statement = $db->prepare($query); // encapsulate the sql statement
}
else {
    $todolistID = filter_input(INPUT_POST, "IDTextField"); // $_POST["IDTextField"];
    $query = "UPDATE todolists SET TODO = :todolist_todo, Notes = :todolist_notes WHERE Id = :todolist_id "; // SQL statement
    $statement = $db->prepare($query); // encapsulate the sql statement
    $statement->bindValue(':todolist_id', $todolistID);
}
$statement->bindValue(':todolist_todo', $todolistTODO);
$statement->bindValue(':todolist_notes', $todolistNotes);
$statement->execute(); // run on the db server
$statement->closeCursor(); // close the connection
// redirect to index page
header('Location: index.php');
?>