<?php
require("includes/connection.php");
require("includes/session.php");

$sql = "SELECT id, img, Title, Price, Platform FROM product ";


if(!empty($_GET)){
    $sql .= "WHERE Platform LIKE '%$_GET[f]%' ";
}


if (isset($_POST['search'])){
    $search_term = $_POST['search_box'];

    $sql .= "WHERE Title LIKE '%$search_term%' ";  
    $sql .= "OR Platform LIKE '%$search_term%' ";
}

$result = mysqli_query($connection, $sql);

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($connection);


include("navigation/header.php");
?>

<div class="allContent">
    <br><br><br>
    <div align="center" style="font-size: 50px;">All Products Page</div>
    <div class="filter">
        <form method="POST" action="all.php">
            Search: <input type="search" name="search_box" placeholder="Search for a game" value="">
            <input type="submit" name="search" value="Search">
        </form>
    </div>
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
                <div class="title">
                    <h3><?php echo htmlspecialchars(strlen($product['Title']) > 16 ? substr($product['Title'], 0, 16)."..." : $product['Title']); ?></h3>
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