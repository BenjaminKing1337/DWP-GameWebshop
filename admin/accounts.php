<?php
spl_autoload_register(function ($class) {
    include "../classes/" . $class . ".php";
});
require('../includes/connection.php');
require('../includes/session.php');
$db = new DbCon();

if (!admin()) {
    $redirect = New Redirector("../index.php");
}

$query = "SELECT * FROM `accounts`";
$result = mysqli_query($connection, $query) or die("nada joy!");

include("../navigation/adminNav.php");
?>


<div class="adminContent">
    <div class="userList">
        <h2>Current Registered Users</h2><br><br>
        <div class="message">
            <?php
            if (isset($_GET['ud']) && $_GET['ud'] == 1) {
                echo "<p> User Deleted. </p>";
            }
            ?>
        </div>
    <div class="currentRegisteredUsers">
        <?php

        $users = new Userviewer();
        $users->displayUser();
        ?>
    </div>
    </div>
</div>


</html>