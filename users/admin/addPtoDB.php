<?php 

require_once('../includes/connection.php');


$Title = $_POST['Title'];
$Price = $_POST['Price'];
$ReleaseDate = $_POST['ReleaseDate'];
$Description = $_POST['Description'];
$Rating = $_POST['Rating'];
$Platform = $_POST['Platform'];

$query = "INSERT INTO `product` (`id`, `Title`, `Price`, `ReleaseDate`, `Description`, `Rating`, `Platform`) VALUES (NULL, '$Title', '$Price', '$ReleaseDate', '$Description', '$Rating', '$Platform')";

if(!mysqli_query($connection, $query)) {
    die("DB error: ". mysqli_error($connection));
}
else {
    header("Location:addproduct.php");
}

?>