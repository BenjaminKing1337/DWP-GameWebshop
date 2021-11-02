<?php

require_once('../includes/connection.php');

if (isset($_POST['submit'])) {
    $Title = $_POST['Title'];
    $Price = $_POST['Price'];
    $ReleaseDate = $_POST['ReleaseDate'];
    $Description = $_POST['Description'];
    $Rating = $_POST['Rating'];
    $Platform = $_POST['Platform'];

    $query = "INSERT INTO `product` (`id`, `Title`, `Price`, `ReleaseDate`, `Description`, `Rating`, `Platform`) VALUES (NULL, '$Title', '$Price', '$ReleaseDate', '$Description', '$Rating', '$Platform')";

    if (!mysqli_query($connection, $query)) {
        die("DB error: " . mysqli_error($connection));
    } else {
        header("Location:addproduct.php");
        echo "Product Added";
    }
}
?>


<html>
<?php include('../../../DWP-GameWebshop/navigation/header.php'); ?>

<div class="addProductContainer">
    <h2>Here you can add a new product.</h2>
    <form method="post" action="addproduct.php">
        Title:<br><input type="text" name="Title"> <br><br>
        Price:<br><input type="text" name="Price"> <br><br>
        Release Date:<br><input type="text" name="ReleaseDate"> <br><br>
        Description:<br><textarea type="text" name="Description"></textarea> <br><br>
        Rating:<br><input type="text" name="Rating"> <br><br>
        Platform:<br><input type="text" name="Platform"> <br><br>
        <input type="submit" name="submit"> <br>
    </form>
</div>

<?php include('../../../DWP-GameWebshop/navigation/footer.php'); ?>

</html>