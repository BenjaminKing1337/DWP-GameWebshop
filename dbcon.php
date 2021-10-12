<?php
require_once("constants.php");
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if (!$connection) {
    die("no joy!");
}


echo "<br /> Database connected <br />";
