<?php

require('../includes/connection.php');
require('../includes/session.php');

if (!admin()) {
    redirect_to("../index.php");
}

$query_select = "SELECT * FROM `games`";
$result = mysqli_query($connection, $query_select) or die("DB error: " . mysqli_error($connection));
$product = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);


$Title = $Thumbnail = $Cover = $Price = $ReleaseDate = $Description = $Rating = $PlatformChck = $GenreChck = $Trailer = $Screenshots = '';
$errors = array('Title' => '', 'Price' => '', 'ReleaseDate' => '', 'Description' => '', 'Rating' => '', 'Platform' => '', 'Genre' => '', 'media' => '');
$numerror = 0;

if (isset($_POST['submit'])) {
    $Title = $_POST['Title'];
    $Thumbnail = $_POST['Thumbnail'];
    $Cover = $_POST['Cover'];
    $Price = $_POST['Price'];
    $ReleaseDate = $_POST['ReleaseDate'];
    $Description = $_POST['Description'];
    $Rating = $_POST['Rating'];
    $PlatformChck = !empty($_POST['PlatformChck']) ? $_POST['PlatformChck'] : '';
    $Platform = "";
    if(!empty($PlatformChck)){
        foreach ($PlatformChck as $Pchk) {
            $Platform .= $Pchk . "/";
        }
    }
    $GenreChck = !empty($_POST['GenreChck']) ? $_POST['GenreChck'] : '';
    $Genre = '';
    if(!empty($GenreChck)){
        foreach ($GenreChck as $Gchk) {
            $Genre .= $Gchk . "/";
        }
    }
    $Trailer = $_POST['Trailer'];
    $Screenshots = $_POST['Screenshots'];

    $query = "INSERT INTO `product` (`id`, `Title`, `Price`, `ReleaseDate`, `Description`, `Rating`, `Platform`, `Genre`) VALUES (NULL, '$Title', '$Price', '$ReleaseDate', '$Description', '$Rating', '$Platform', '$Genre'); 
                INSERT INTO `media` (`mediaID`, `Thumbnail`, `Cover`, `Trailer`, `Screenshots`) VALUES (NULL, '$Thumbnail', '$Cover', '$Trailer', '$Screenshots');";

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
    /* if (
        !preg_match($regexp1, $_POST['PlatformChck'])
    ) {
        $errors['Platform'] = " Must have a platform.";
        $numerror++;
    } */
    if (
        empty($Thumbnail)
        || empty($Trailer)
        || empty($Screenshots)
        || empty($Cover)
    ) {
        $errors['media'] = " Must have a trailer.";
        $numerror++;
    }
    if (
        empty($Platform)
    ) {
        $errors['Platform'] = " Must have a platform.";
        $numerror++;
    }
    if (
        empty($Genre)
    ) {
        $errors['Genre'] = " Must have a genre.";
        $numerror++;
    }
    if ($numerror == 0) {
        if (!mysqli_multi_query($connection, $query)) {
            die("DB error: " . mysqli_error($connection));
        }
        header('Location: '.$_SERVER['PHP_SELF']);
        exit;
        echo "Product added" . "<br> at " . date("h:i:sa");
        $Title = $Thumbnail = $Cover = $Price = $ReleaseDate = $Description = $Rating = $GenreChck = $PlatformChck = $Trailer = $Screenshots = '';
    }
};

include("../navigation/adminNav.php");
?>
<div class="adminContent">
    <div class="addProductContainer">
        <form method="post" action="addproduct.php">
            <fieldset>
                <legend>
                    <h3>Here you can add a new product</h3>
                </legend>
                Title:<br><input type="text" name="Title" value="<?php echo $Title ?>">
                <div style="color:red;"><?php echo $errors['Title']; ?></div> <br>
                Thumbnail:<br><input type="text" name="Thumbnail" value="<?php echo $Thumbnail ?>">
                <div style="color:red;"><?php echo $errors['media']; ?></div> <br>
                Cover:<br><input type="text" name="Cover" value="<?php echo $Cover ?>">
                <div style="color:red;"><?php echo $errors['media']; ?></div> <br>
                Price:<br><input type="text" name="Price" value="<?php echo $Price ?>">
                <div style="color:red;"><?php echo $errors['Price']; ?></div> <br>
                (YYYY-MM-DD) <br> Release Date:<br><input type="text" name="ReleaseDate" value="<?php echo $ReleaseDate ?>">
                <div style="color:red;"><?php echo $errors['ReleaseDate']; ?></div> <br>
                Description:<br><textarea class="description" type="text" name="Description"><?php echo $Description ?></textarea>
                <div style="color:red;"><?php echo $errors['Description']; ?></div> <br>
                Rating:<br><input type="text" name="Rating" value="<?php echo $Rating ?>">
                <div style="color:red;"><?php echo $errors['Rating']; ?></div> <br>
                Platform:<br>
                    <input class="check" type="checkbox" name="PlatformChck[]" value="PS4" <?php if (isset($_POST['PlatformChck']) && in_array('PS4', $_POST['PlatformChck'])) echo "checked='checked'"; ?>>
                    <label>PS4</label><br>
                    <input class="check" type="checkbox" name="PlatformChck[]" value="PS5" <?php if (isset($_POST['PlatformChck']) && in_array('PS5', $_POST['PlatformChck'])) echo "checked='checked'"; ?>>
                    <label>PS5</label><br>
                    <input class="check" type="checkbox" name="PlatformChck[]" value="XBOX-ONE" <?php if (isset($_POST['PlatformChck']) && in_array('XBOX-ONE', $_POST['PlatformChck'])) echo "checked='checked'"; ?>>
                    <label>XBOX ONE</label><br>
                    <input class="check" type="checkbox" name="PlatformChck[]" value="XBOX-SERIES-X" <?php if (isset($_POST['PlatformChck']) && in_array('XBOX-SERIES-X', $_POST['PlatformChck'])) echo "checked='checked'"; ?>>
                    <label>XBOX SERIES X</label><br>
                    <input class="check" type="checkbox" name="PlatformChck[]" value="PC" <?php if (isset($_POST['PlatformChck']) && in_array('PC', $_POST['PlatformChck'])) echo "checked='checked'"; ?>>
                    <label>PC</label><br>
                    <input class="check" type="checkbox" name="PlatformChck[]" value="NINTENDO" <?php if (isset($_POST['PlatformChck']) && in_array('NINTENDO', $_POST['PlatformChck'])) echo "checked='checked'"; ?>>
                    <label>NINTENDO</label><br>
                <div style="color:red;"><?php echo $errors['Platform']; ?></div> <br>
                Genre: <br>
                    <input class="check" type="checkbox" name="GenreChck[]" value="Action" <?php if (isset($_POST['GenreChck']) && in_array('Action', $_POST['GenreChck'])) echo "checked='checked'"; ?>>
                    <label>Action</label><br>
                    <input class="check" type="checkbox" name="GenreChck[]" value="Adventure" <?php if (isset($_POST['GenreChck']) && in_array('Adventure', $_POST['GenreChck'])) echo "checked='checked'"; ?>>
                    <label>Adventure</label><br>
                    <input class="check" type="checkbox" name="GenreChck[]" value="RPG" <?php if (isset($_POST['GenreChck']) && in_array('RPG', $_POST['GenreChck'])) echo "checked='checked'"; ?>>
                    <label>RPG</label><br>
                    <input class="check" type="checkbox" name="GenreChck[]" value="Roguelike" <?php if (isset($_POST['GenreChck']) && in_array('Roguelike', $_POST['GenreChck'])) echo "checked='checked'"; ?>>
                    <label>Roguelike</label><br>
                    <input class="check" type="checkbox" name="GenreChck[]" value="Stealth" <?php if (isset($_POST['GenreChck']) && in_array('Stealth', $_POST['GenreChck'])) echo "checked='checked'"; ?>>
                    <label>Stealth</label><br>
                    <input class="check" type="checkbox" name="GenreChck[]" value="FPS" <?php if (isset($_POST['GenreChck']) && in_array('FPS', $_POST['GenreChck'])) echo "checked='checked'"; ?>>
                    <label>FPS</label><br>
                    <input class="check" type="checkbox" name="GenreChck[]" value="Horror" <?php if (isset($_POST['GenreChck']) && in_array('Horror', $_POST['GenreChck'])) echo "checked='checked'"; ?>>
                    <label>Horror</label><br>
                <div style="color:red;"><?php echo $errors['Genre']; ?></div> <br>
                Trailer:<br><input type="text" name="Trailer" value="<?php echo $Trailer ?>">
                <div style="color:red;"><?php echo $errors['media']; ?></div> <br>
                Screenshots:<br><textarea type="text" name="Screenshots"><?php echo $Screenshots ?></textarea>
                <div style="color:red;"><?php echo $errors['media']; ?></div> <br>
                <input class="subButton" type="submit" name="submit" value="SUBMIT"> <br>
            </fieldset>
        </form>
    </div>

    <h2 align="center">Current Registered Products</h2><br><br>
    <?php
    
    foreach ($product as $row) { ?>
        <div class="currentProductsContainer">
            <div class="productNo"> <?php echo "No.: " . $row["id"] ?> </div>
            <div class="productSubContainer">
                <div class="productInfoContainer">
                    <div class="productImg"><img src="<?php echo $row["Thumbnail"] ?>" alt="thumbnail" style="width:100%;"> </div>
                </div>
                <div>
                    <div class="productTitle"> <?php echo "Title: " . "<b>" . $row["Title"] . "</b><br>" ?> </div>
                    <div class="productPrice"> <?php echo "Price: " . "<b>" . $row["Price"] . " DKK" . "</b><br>" ?> </div>
                    <div class="productReleaseDate"> <?php echo "Release Date: " . "<b>" . $row["ReleaseDate"] . "</b><br>" ?> </div>
                    <div class="productRating"> <?php echo "Rating: " . "<b>" . $row["Rating"] . "</b><br>" ?> </div>
                    <div class="productPlatform"> <?php echo "Platform: " . "<b>" . $row["Platform"] . "</b><br>" ?> </div>

                </div>
                <div class="productBtnContainer"> <?php echo "<a style='text-decoration: none;' href='delproduct.php?id=" . $row['id'] . "'" ?>
                    onclick="return confirm('Are you sure you want to annihilate?');"
                    <?php echo "> <button>Delete</button></a>" ?><?php echo "<a style='text-decoration: none;' href='editproduct.php?id=" . $row['id'] . "'" ?>
                    onclick="return confirm('Are you sure you want to influence changes?');"
                    <?php echo ">  <button>Edit</button></a><br>"; ?> </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php
include("../navigation/footer.php");
?>