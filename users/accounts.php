<html><body>
<button id="Home" onclick="window.location.href='../index.php'" style="background-color:magenta; font-weight:bold;">Home</button>
<br><br>
</body></html>

<?php
// require_once(".././navigation/header.php");
require_once("includes/connection.php");
$query = "SELECT * FROM `accounts`";
$result = mysqli_query($connection, $query) or die("nada joy!");
while ($row = mysqli_fetch_array($result)) {
    echo
    $row["ID"] . " - " .
        $row["username"] . " - " .
        $row["Fname"] . " - " .
        $row["Lname"] . " - " .
        $row["email"] . " - " .
        $row["description"] .
        "<a style='text-decoration: none;' href='../crud/delete.php?id=" . $row['ID'] . "'" ?>
    onclick="return confirm('Are you sure you want to annihilate?');"
    <?php echo "> <button style='
    padding: 10px; 
    border: 1px solid rebeccapurple;
    text-decoration:none;
    margin: 10px;
    color:rebeccapurple;
    background-color:transparent;
    '>Delete</button></a>" .
        "<a style='text-decoration: none;' href='../crud/edit.php?id=" . $row['ID'] . "'" ?>
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
