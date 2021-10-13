<?php
require_once ("../users/includes/connection.php");
if(isset($_GET['id'])) {
    $query = "DELETE FROM `accounts` WHERE ID=" .$_GET['id'];
    mysqli_query($connection, $query);
    header("Location:../users/accounts.php");

}