<?php
include_once('database.php');

$isAddition = filter_input(INPUT_POST, "isAddition");
$bookTitle = filter_input(INPUT_POST, "TitleTextField");
$bookAuthor = filter_input(INPUT_POST, "AuthorTextField");
$bookPrice = filter_input(INPUT_POST, "PriceTextField");
$bookGenre = filter_input(INPUT_POST, "GenreTextField");

// check if user is Adding a New Book
if($isAddition == "1") {
    $query = "INSERT INTO books (Title, Author, Price, Genre) VALUES (:book_Title, :book_Author, :book_Price, :book_Genre)";
}else
{
    $bookID = filter_input(INPUT_POST, "IDTextField"); // $_POST["IDTextField"];
/*//////////////////////*/
/* FIX THIS MYSQL QUERY */
/*//////////////////////*/

/*/$query = "";
$statement = $db->prepare($query); // encapsulate the sql statement/*/
    $query = "UPDATE books SET Title = :book_Title, Author = :book_Author, Price = :book_Price, Genre = :book_Genre WHERE Id = :book_id "; // SQL statement
    $statement = $db->prepare($query); // encapsulate the sql statement
    $statement->bindValue(':book_id', $bookID);

}

$statement->bindValue(':book_title', $bookTitle);
$statement->bindValue(':book_author', $bookAuthor);
$statement->bindValue(':book_price', $bookPrice);
$statement->bindValue(':book_genre', $bookGenre);
$statement->execute(); // run on the db server
$statement->closeCursor(); // close the connection

// redirect to index page
header('Location: index.php');
?>
