<?php

require_once('../includes/connection.php');
require_once('../includes/session.php');

if (!admin()) {
    redirect_to("../index.php");
}

$errors = array('Title' => '', 'Price' => '', 'ReleaseDate' => '', 'Description' => '', 'Rating' => '', 'Platform' => '');
$numerror = 0;

if (isset($_POST['submit'])) {
    $Title = $_POST['Title'];
    $Price = $_POST['Price'];
    $ReleaseDate = $_POST['ReleaseDate'];
    $Description = $_POST['Description'];
    $Rating = $_POST['Rating'];
    $Platform = $_POST['Platform'];

    $query = "INSERT INTO `product` (`id`, `Title`, `Price`, `ReleaseDate`, `Description`, `Rating`, `Platform`) VALUES (NULL, '$Title', '$Price', '$ReleaseDate', '$Description', '$Rating', '$Platform')";

    $regexp1 = "/^[A-z0-9 ]{2,600}$/";
    $regexp2 = "/^[+-]?((\d+(\.\d*)?)|(\.\d+))$/";
    $regexp3 = "/^[0-9-]{10}$/";

    if (
        !preg_match($regexp1, $_POST['Title'])
    ) {
        $errors['Title'] = " Must have a title.";
        $numerror++;
    } if (
        !preg_match($regexp2, $_POST['Price'])
    ) {
        $errors['Price'] = " Must have a price.";
        $numerror++;
    } if (
        !preg_match($regexp3, $_POST['ReleaseDate'])
    ) {
        $errors['ReleaseDate'] = " Must have a release date.";
        $numerror++;
    } if (
        !preg_match($regexp1, $_POST['Description'])
    ) {
        $errors['Description'] = " Must have a description.";
        $numerror++;
    } if (
        !preg_match($regexp2, $_POST['Rating'])
    ) {
        $errors['Rating'] = " Must have a rating.";
        $numerror++;
    } if (
        !preg_match($regexp1, $_POST['Platform'])
    ) {
        $errors['Platform'] = " Must have a platform.";
        $numerror++;
    }
    if ($numerror == 0) {
        if (!mysqli_query($connection, $query)) {
            die("DB error: " . mysqli_error($connection));
        }
        echo "Product added" . "<br> at " . date("h:i:sa");
    }
}
?>


<html>
<?php 
    include("../navigation/adminNav.php");
?>

<div class="addProductContainer">
    <h2>Here you can add a new product.</h2>
    <form method="post" action="addproduct.php">
        Title:<br><input type="text" name="Title">
        <div style="color:red;"><?php echo $errors['Title']; ?></div> <br><br>
        Price:<br><input type="text" name="Price">
        <div style="color:red;"><?php echo $errors['Price']; ?></div> <br><br>
        Release Date: (YYYY-MM-DD)<br><input type="text" name="ReleaseDate">
        <div style="color:red;"><?php echo $errors['ReleaseDate']; ?></div> <br><br>
        Description:<br><textarea type="text" name="Description"></textarea>
        <div style="color:red;"><?php echo $errors['Description']; ?></div> <br><br>
        Rating:<br><input type="text" name="Rating">
        <div style="color:red;"><?php echo $errors['Rating']; ?></div> <br><br>
        Platform:<br><input type="text" name="Platform">
        <div style="color:red;"><?php echo $errors['Platform']; ?></div> <br><br>
        <input type="submit" name="submit"> <br>
    </form>
</div>



</html>