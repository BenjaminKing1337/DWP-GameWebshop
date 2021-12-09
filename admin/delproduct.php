<?php
spl_autoload_register(function ($class) {
    include "../classes/" . $class . ".php";
});
require("../includes/connection.php");
$id = $_GET['id'];
if (isset($id)) {
    $query = "DELETE FROM `product` WHERE id='$id';
            DELETE FROM `media` WHERE mediaID='$id'";
    mysqli_multi_query($connection, $query);
    $redirect = new Redirector('addproduct.php');
}
