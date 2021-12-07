<?php
require("../includes/connection.php");
require("../includes/session.php");
if (!admin()) {
    redirect_to("../index.php");
}

$query = "SELECT * FROM `accounts`";
$result = mysqli_query($connection, $query) or die("nada joy!");

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
            while ($row = mysqli_fetch_array($result)) {
                echo
                "<div class='user'> No.: " . $row["ID"] . "<br>" .
                    "Username: " . "<b>" . $row["username"] . "</b><br>" .
                    "First Name: " . "<i>" . $row["Fname"] . "</i><br>" .
                    "Last Name: " . "<i>" . $row["Lname"] . "</i><br>" .
                    "Email: " . "<a href=''>" . $row["email"] . "</a><br>" .
                    "Description: " . $row["description"] . "<br>" .
                    "<a style='text-decoration: none;' href='../admin/deluser.php?id=" . $row['ID'] . "'" ?>
                onclick="return confirm('Are you sure you want to annihilate?');"
                <?php echo "> <button>Delete</button></a>" .
                    "<a style='text-decoration: none;' href='../admin/edituser.php?id=" . $row['ID'] . "'" ?>
                onclick="return confirm('Are you sure you want to influence changes?');"
            <?php echo ">  <button> Edit </button></a><br></div>";
            }
            ?>
        </div>
    </div>
</div>

</html>