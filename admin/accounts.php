<?php
    require("../includes/connection.php"); 
    require("../includes/session.php"); 
    if (!admin()) {
        redirect_to("../index.php");
    }
?>

<html>
<?php 
    include("../navigation/adminNav.php");
?>

<h2>Current Registered Users</h2><br><br>

<?php
$query = "SELECT * FROM `accounts`";
$result = mysqli_query($connection, $query) or die("nada joy!");
while ($row = mysqli_fetch_array($result)) {
    echo
    "No.: " . $row["ID"] . "<br>" .
    "Username: " . "<b>" . $row["username"] . "</b><br>" .
    "First Name: " . "<i>" .$row["Fname"] . "</i><br>" .
    "Last Name: " . "<i>" . $row["Lname"] . "</i><br>" .
    "Email: " . "<a href=''>" .$row["email"] . "</a><br>" .
    "Description: " . $row["description"] . "<br>" .
        "<a style='text-decoration: none;' href='../admin/delete.php?id=" . $row['ID'] . "'" ?>
    onclick="return confirm('Are you sure you want to annihilate?');"
    <?php echo "> <button style='
    padding: 10px; 
    border: 1px solid rebeccapurple;
    text-decoration:none;
    margin: 10px;
    color:rebeccapurple;
    background-color:transparent;
    '>Delete</button></a>" .
        "<a style='text-decoration: none;' href='../admin/edit.php?id=" . $row['ID'] . "'" ?>
    onclick="return confirm('Are you sure you want to influence changes?');"
<?php echo ">  <button style='
    padding: 10px; 
    border: 1px solid rebeccapurple;
    text-decoration:none;
    margin: 10px;
    color:rebeccapurple;
    background-color:transparent;
    '> Edit </button></a><br>";
}
?>
</html>