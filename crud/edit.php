<?php
require_once("../styles/styles.php");
require_once("../users/includes/connection.php");
$id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM `accounts` WHERE ID='$id'");

$data = mysqli_fetch_array($query);

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $fname = $_POST['Fname'];
    $lname = $_POST['Lname'];
    $email = $_POST['email'];
    $description = $_POST['description'];

    $iterations = ['cost' => 15];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);


    $sql = "UPDATE `accounts` SET `username`='$username', `pass`='$hashed_password', `Fname`='$fname', `Lname`='$lname', `email`='$email', `description`='$description' WHERE ID='$id'";
    echo $sql;
    $edit = mysqli_query($connection, $sql);

    if ($edit) {
        mysqli_close($connection);
        header("location:../index.php");
        exit;
    } else {
        echo mysqli_error($connection);
    }
}
?>

<h3>Update Data</h3>

<form method="POST">
    Username:<br><input type="text" name="username" value="<?php echo $data['username'] ?>" placeholder="Edit Username" Required> <br><br>
    Password:<br><input type="text" name="pass" value="" placeholder="New Password" Required> <br><br>
    First Name:<br><input type="text" name="Fname" value="<?php echo $data['Fname'] ?>" placeholder="Edit Fist name" Required> <br><br>
    Last Name:<br><input type="text" name="Lname" value="<?php echo $data['Lname'] ?>" placeholder="Edit Last Name" Required> <br><br>
    Email:<br><input type="text" name="email" value="<?php echo $data['email'] ?>" placeholder="Edit Email" Required> <br><br>
    Description:<br><input type="text" name="description" value="<?php echo $data['description'] ?>" placeholder="Edit Description" Required> <br><br>
    <input type="submit" name="update" value="Update">
</form>