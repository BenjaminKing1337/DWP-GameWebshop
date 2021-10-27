<?php 
require_once("../DWP-GameWebshop/users/includes/connection.php");

$sql = "SELECT id, Price FROM product";

$result = mysqli_query($connection, $sql);

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($connection)

?>


<html>
<?php include("navigation/header.php"); ?>

<br><br><br>
<div align="center" style="font-size: 50px;">All Products Page</div>

<div class="filter">FILTER</div>
<div class="allProductsContainer">
    <?php foreach ($products as $product) { ?>

        <div class="productContainer">
            <div onclick="window.location='single.php?id=<?php echo $product['id']; ?>'" class="product">
                <div class="platformTag">
                    <img width="25px" height="25px" src="https://i.kym-cdn.com/entries/icons/original/000/012/368/playstation-wallpaper-46825-48282-hd-wallpapers.jpg" alt="">
                </div>
                <img width="190px" height="180px" src="https://image.api.playstation.com/vulcan/img/cfn/11307DTu3lzL6thuipVwZruYSmRFn1_SpucegJYgtAzcjZLIRPxpCVJkr5C8vfVy5FYMRdHbaJHQXOZldbhjm9ypcA4w51iZ.png" alt="">
            </div>
            <div class="price">
                <h3><?php echo htmlspecialchars($product['Price']); ?> DKK</h3> <br>
                <h4>Old Price</h4>
                <button>Add <br>
                    to <br>
                    Cart</button>
            </div>

        </div>


    <?php } ?>
</div>

<?php include("navigation/footer.php"); ?>

</html>