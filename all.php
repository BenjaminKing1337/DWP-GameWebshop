<?php
require("includes/connection.php");
require("includes/session.php");

$news = "SELECT * FROM `news`";
$newsResult = mysqli_query($connection, $news);
$new = mysqli_fetch_all($newsResult, MYSQLI_ASSOC);

// Gets current date
$today = date('Y-m-d');
// Gets current date minus 3 months
$olddate = date('Y-m-d', strtotime('-' . $new[0]['date'] . ' months', strtotime($today)));




$sql = "SELECT id, Thumbnail, Title, Price, Platform, Genre FROM games ";
// if the GET isn't empty, load one of the following options depending on where user navigated from.
if (isset($_GET['d'])) {
    $sql .= "WHERE ReleaseDate BETWEEN '$olddate' AND '$_GET[d]' ";
}
if (isset($_GET['f'])) {
    $sql .= "WHERE Platform LIKE '%$_GET[f]%' ";
}
if (isset($_GET['s'])) {
    $sql .= "WHERE Price < '$_GET[s]' ";
}
if (isset($_GET['r'])) {
    $sql .= "WHERE Rating > '$_GET[r]' ";
}


if (isset($_POST['search'])) {
    $search_term = $_POST['search_box'];

    $sql .= "WHERE Title LIKE '%$search_term%' ";
    $sql .= "OR Platform LIKE '%$search_term%' ";
}
if (isset($_POST['filter_submit'])) {
    $filter = $_POST['filter'];

    $sql .= "WHERE Title LIKE '%$filter%' ";
    $sql .= "OR Platform LIKE '%$filter%' ";
    $sql .= "OR Genre LIKE '%$filter%' ";
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
        <details>
            <summary>Filters</summary>
            <form method="POST" action="all.php">
                <input type="radio" name="filter" value="Action">
                <label>Action</label>
                <input type="radio" name="filter" value="Adventure">
                <label>Adventure</label>
                <input type="radio" name="filter" value="RPG">
                <label>RPG</label>
                <input type="radio" name="filter" value="FPS">
                <label>FPS</label>
                <input type="radio" name="filter" value="Roguelike">
                <label>Roguelike</label>

                <input type="submit" name="filter_submit" value="Apply filter"> 
            </form>
        </details>
    </div>
    <div class="allProductsContainer">
        <?php foreach ($products as $product) { ?>
            <div class="productContainer">
                <div onclick="window.location='single.php?id=<?php echo $product['id'] ?>'" class="product">
                    <div class="platformTag">
                        <img width="25px" height="25px" src="https://i.kym-cdn.com/entries/icons/original/000/012/368/playstation-wallpaper-46825-48282-hd-wallpapers.jpg" alt="">
                    </div>
                    <img width="190px" height="180px" src="<?php echo htmlspecialchars($product['Thumbnail']) ?>" alt="">
                </div>
                <div class="title">
                    <h3><?php echo htmlspecialchars(strlen($product['Title']) > 16 ? substr($product['Title'], 0, 16) . "..." : $product['Title']); ?></h3>
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