<?php
require("includes/connection.php");
require("includes/session.php");

$sql = "SELECT id, img, Price FROM product";

$result = mysqli_query($connection, $sql);

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($connection);

include("navigation/header.php");
?>

<div class="allContent">
    <br><br><br>
    <div align="center" style="font-size: 50px;">All Products Page</div>
    <div class="filter">FILTER</div>
    <div class="allProductsContainer">
        <?php foreach ($products as $product) { ?>
            <div class="productContainer">
                <div onclick="window.location='single.php?id=<?php echo $product['id'] ?>'" class="product">
                    <div class="platformTag">
                        <img width="25px" height="25px" src="https://i.kym-cdn.com/entries/icons/original/000/012/368/playstation-wallpaper-46825-48282-hd-wallpapers.jpg" alt="">
                    </div>
                    <?php $img = explode(',', $product['img']); ?>
                    <img width="190px" height="180px" src="<?php echo htmlspecialchars($img[0]) ?>" alt="">
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
</div>
<?php include("navigation/footer.php"); ?>