<?php
require_once("../DWP-GameWebshop/users/includes/connection.php");

//check id parameter
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($connection, $_GET['id']);

    $sql = "SELECT * FROM product WHERE id = $id";

    $result = mysqli_query($connection, $sql);

    $product = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($connection);


}

?>

<html>
<?php include("navigation/header.php"); ?>

<br><br><br>

<?php if($product): ?>
    <div class="singleProductContainer">

        <div class="thumbnail">
            <img width="300px" height="200px" src="https://image.api.playstation.com/vulcan/img/cfn/11307DTu3lzL6thuipVwZruYSmRFn1_SpucegJYgtAzcjZLIRPxpCVJkr5C8vfVy5FYMRdHbaJHQXOZldbhjm9ypcA4w51iZ.png" alt="">
        </div>

    <div class="titlecard">
        <h2><?php echo htmlspecialchars($product['Title']) ?></h2>
        <h3><?php echo htmlspecialchars($product['Platform']) ?></h3>
    </div>
    <div class="break"></div>
    <div class="description">
        <h4><?php echo htmlspecialchars($product['Description']) ?></h4>
    </div>
    <div class="primarySpecs">
        <div class="spec">Player Count</div>
        <div class="spec">Required Space</div>
        <div class="spec">Online Players</div>
    </div>
    <div class="video">
        <h2>trailer goes here</h2>
    </div>
    <div class="slideshow">
        <h2>images for game go here</h2>
    </div>
    <div class="secondarySpecs">
        <table>
            <tr>
                <th>Age Rating</th>
                <td>18 +</td>
            </tr>
            <tr>
                <th>ESRB Rating</th>
                <td>M</td>
            </tr>
            <tr>
                <th>Multiplayer</th>
                <td>Yes</td>
            </tr>
            <tr>
                <th>In-game Purchases</th>
                <td>Yes</td>
            </tr>
        </table>
    </div>
    <div class="productPricing">
        <h5>Old Price</h5>
        <h2><?php echo htmlspecialchars($product['Price']) ?></h2>
    </div>
    <div class="addToBasket">
        <button><p>Add To Basket</p> <i class="materialize-icon "><span class="material-icons">shopping_cart
                </span></i></button>
    </div>

</div>
<?php else : ?>
<div align="center" style="font-size: 50px;"><?php echo "The product doesn't exist."?><br>
<img height="80px" src="https://www.cambridge.org/elt/blog/wp-content/uploads/2019/07/Sad-Face-Emoji.png" alt=""></div>

<?php endif; ?>

<?php include("navigation/footer.php"); ?>

</html>