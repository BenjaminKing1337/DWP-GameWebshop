<?php

require('../includes/connection.php');
require('../includes/session.php');

if (!admin()) {
    redirect_to("../index.php");
}

$errors = array('Title' => '', 'Price' => '', 'ReleaseDate' => '', 'Description' => '', 'Rating' => '', 'Platform' => '', 'media' => '');
$numerror = 0;

if (isset($_POST['submit'])) {
    $Title = $_POST['Title'];
    $img = $_POST['img'];
    $Price = $_POST['Price'];
    $ReleaseDate = $_POST['ReleaseDate'];
    $Description = $_POST['Description'];
    $Rating = $_POST['Rating'];
    $Platform = $_POST['Platform'];
    $Trailer = $_POST['Trailer'];
    $Screenshots = $_POST['Screenshots'];

    $query = "INSERT INTO `product` (`id`, `Title`, `img`, `Price`, `ReleaseDate`, `Description`, `Rating`, `Platform`, `Trailer`, `Screenshots`) VALUES (NULL, '$Title','$img', '$Price', '$ReleaseDate', '$Description', '$Rating', '$Platform', '$Trailer', '$Screenshots')";

    $regexp1 = "/^[A-z0-9 ]{2,600}$/";
    $regexp2 = "/^[+-]?((\d+(\.\d*)?)|(\.\d+))$/";
    $regexp3 = "/^[0-9-]{10}$/";

    if (
        !preg_match($regexp1, $_POST['Title'])
    ) {
        $errors['Title'] = " Must have a title.";
        $numerror++;
    }
    if (
        !preg_match($regexp2, $_POST['Price'])
    ) {
        $errors['Price'] = " Must have a price.";
        $numerror++;
    }
    if (
        !preg_match($regexp3, $_POST['ReleaseDate'])
    ) {
        $errors['ReleaseDate'] = " Must have a release date.";
        $numerror++;
    }
    if (
        !preg_match($regexp1, $_POST['Description'])
    ) {
        $errors['Description'] = " Must have a description.";
        $numerror++;
    }
    if (
        !preg_match($regexp2, $_POST['Rating'])
    ) {
        $errors['Rating'] = " Must have a rating.";
        $numerror++;
    }
    if (
        !preg_match($regexp1, $_POST['Platform'])
    ) {
        $errors['Platform'] = " Must have a platform.";
        $numerror++;
    }
    if (
        empty($img)
        || empty($Trailer)
        || empty($Screenshots)
    ) {
        $errors['media'] = " Must have a trailer.";
        $numerror++;
    }
    if ($numerror == 0) {
        if (!mysqli_query($connection, $query)) {
            die("DB error: " . mysqli_error($connection));
        }
        echo "Product added" . "<br> at " . date("h:i:sa");
    }
};
include("../navigation/adminNav.php");
?>
<div class="adminContent">
<div class="addProductContainer">
    <h2>Here you can add a new product.</h2>
    <form method="post" action="addproduct.php">
        Title:<br><input type="text" name="Title">
        <div style="color:red;"><?php echo $errors['Title']; ?></div> <br><br>
        (Comma Seperated) <br> Thumbnail & Cover:<br><input type="text" name="img">
        <div style="color:red;"><?php echo $errors['media']; ?></div> <br><br>
        Price:<br><input type="text" name="Price">
        <div style="color:red;"><?php echo $errors['Price']; ?></div> <br><br>
        (YYYY-MM-DD) <br> Release Date:<br><input type="text" name="ReleaseDate">
        <div style="color:red;"><?php echo $errors['ReleaseDate']; ?></div> <br><br>
        Description:<br><textarea type="text" name="Description"></textarea>
        <div style="color:red;"><?php echo $errors['Description']; ?></div> <br><br>
        Rating:<br><input type="text" name="Rating">
        <div style="color:red;"><?php echo $errors['Rating']; ?></div> <br><br>
        Platform:<br><input type="text" name="Platform">
        <div style="color:red;"><?php echo $errors['Platform']; ?></div> <br><br>
        Trailer:<br><input type="text" name="Trailer">
        <div style="color:red;"><?php echo $errors['media']; ?></div> <br><br>
        Screenshots:<br><input type="text" name="Screenshots">
        <div style="color:red;"><?php echo $errors['media']; ?></div> <br><br>
        <input type="submit" name="submit"> <br>
    </form>
</div>

<h2>Current Registered Products</h2><br><br>
<?php
$query = "SELECT * FROM `product`";
$result = mysqli_query($connection, $query) or die("nada joy!");
while ($row = mysqli_fetch_array($result)) {
?> <div class="currentProductsContainer">
        <div class="productNo"> <?php echo "No.: " . $row["id"] ?> </div>
        <div class="productSubContainer">
            <div class="productInfoContainer">
                <?php $img = explode(",", $row["img"]); ?>
                <div class="productImg"><img src="<?php echo $img[0] ?>" alt="thumbnail" style="width:100%;"> </div>
                <div class="productTitle"> <?php echo "Title: " . "<b>" . $row["Title"] . "</b><br>" ?> </div>
            </div>
            <div class="productBtnContainer"> <?php echo "<a style='text-decoration: none;' href='delproduct.php?id=" . $row['id'] . "'" ?>
                onclick="return confirm('Are you sure you want to annihilate?');"
                <?php echo "> <button>Delete</button></a>" ?><?php echo "<a style='text-decoration: none;' href='editproduct.php?id=" . $row['id'] . "'" ?>
                onclick="return confirm('Are you sure you want to influence changes?');"
                <?php echo ">  <button> Edit </button></a><br>"; ?> </div>
        </div>
    </div>
<?php } ?>
</div>
<?php
include("../navigation/footer.php");
?>