<?php
spl_autoload_register(function ($class) {
    include "../classes/" . $class . ".php";
});
require ("../includes/connection.php");
if(isset($_GET['id'])) {
    $query = "DELETE FROM `accounts` WHERE ID=" .$_GET['id'];
    mysqli_query($connection, $query);
    $redirect = New Redirector("accounts.php?ud=1");
}
