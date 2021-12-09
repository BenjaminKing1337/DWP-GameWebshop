<?php
spl_autoload_register(function ($class) {
    include "../classes/" . $class . ".php";
});
require('../includes/connection.php');
require('../includes/session.php');
if (!admin()) {
    $redirect = new Redirector("../index.php");
}
include("../navigation/adminNav.php");
?>

<div class="adminContent">
    <h2 align="center">Current Registered Products</h2>
    <div class="productList">
        <?php
        $products = new Productviewer();
        $products->displayProduct();
        ?>
    </div>
</div>

<?php
include("../navigation/footer.php");
?>