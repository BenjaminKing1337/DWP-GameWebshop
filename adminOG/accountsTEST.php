<?php
// require("../includes/connection.php");
// require("../includes/session.php");

// $query = "SELECT * FROM `accounts`";
// $result = mysqli_query($connection, $query) or die("nada joy!");

include("users.php");
if (!admin()) {
    redirect_to("../index.php");
}
include("../navigation/adminNav.php");
?>


<div class="adminContent">
    <h2>Current Registered Users</h2><br><br>
    <div>
        <?php
        if (isset($_GET['ud']) && $_GET['ud'] == 1) {
            echo "<p> User Deleted. </p>";
        }
        ?>
    </div>
    <div class="currentRegisteredUsers">
            <?php 
            
            // echo New User();

             ?>
    </div>
</div>

</html>