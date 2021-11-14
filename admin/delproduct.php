<?php
require_once ("../includes/connection.php");
if(isset($_GET['id'])) {
    $query = "DELETE FROM `product` WHERE id=" .$_GET['id'];
    mysqli_query($connection, $query);
    header("Location: addproduct.php");

}
?>