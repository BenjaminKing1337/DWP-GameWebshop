<?php
require_once("../includes/connection.php");
require_once("../includes/session.php");
if (!admin()) {
    redirect_to("../index.php");
}

$id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM `product` WHERE ID='$id'");

$data = mysqli_fetch_array($query);

if (isset($_POST['update'])) {
    $img = $_POST['img'];
    $title = $_POST['Title'];
    $price = $_POST['Price'];
    $releasedate = $_POST['ReleaseDate'];
    $description = $_POST['Description'];
    $rating = $_POST['Rating'];
    $platform = $_POST['Platform'];
    $trailer = $_POST['Trailer'];
    $screenshots = $_POST['Screenshots'];



    $sql = "UPDATE `product` SET `img`='$img', `Title`='$title', `Price`='$price', `ReleaseDate`='$releasedate', `Description`='$description', `Rating`='$rating', `Platform`='$platform', `Trailer`='$trailer', `Screenshots`='$screenshots' WHERE ID='$id'";
    echo $sql;
    $edit = mysqli_query($connection, $sql);

    if ($edit) {
        mysqli_close($connection);
        header("location:../index.php");
        exit;
    } else {
        echo mysqli_error($connection);
    }
}
?>

<html>
<?php 
    include("../navigation/adminNav.php");
?>

<h3>Update Data</h3>

<form method="POST">
    Image:<br><input type="text" name="img" value="<?php echo $data['img'] ?>" placeholder="Edit Image" Required> <br><br>
    Title:<br><input type="text" name="Title" value="<?php echo $data['Title'] ?>" placeholder="Edit Title" Required> <br><br>
    Price:<br><input type="text" name="Price" value="<?php echo $data['Price'] ?>" placeholder="Edit Price" Required> <br><br>
    Release Date:<br><input type="text" name="ReleaseDate" value="<?php echo $data['ReleaseDate'] ?>" placeholder="Edit Release Date" Required> <br><br>
    Description:<br><input type="text" name="Description" value="<?php echo $data['Description'] ?>" placeholder="Edit Description" Required> <br><br>
    Rating:<br><input type="text" name="Rating" value="<?php echo $data['Rating'] ?>" placeholder="Edit Rating" Required> <br><br>
    Platform:<br><input type="text" name="Platform" value="<?php echo $data['Platform'] ?>" placeholder="Edit Platform" Required> <br><br>
    Trailer:<br><input type="text" name="Trailer" value="<?php echo $data['Trailer'] ?>" placeholder="Edit Trailer" Required> <br><br>
    Screenshot(s):<br><input type="text" name="Screenshots" value="<?php echo $data['Screenshots'] ?>" placeholder="Edit Screenshot(s)" Required> <br><br>
    <input type="submit" name="update" value="Update">
</form>

<?php include("../navigation/footer.php"); ?>
<html>
