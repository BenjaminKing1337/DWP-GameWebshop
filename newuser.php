
<?php 
	require_once("includes/connection.php"); 
	require_once("includes/session.php"); 

?>


<html>
<?php 
	include("navigation/header.php");
?>
	
<?php
// START FORM PROCESSING
if (isset($_POST['submit'])) { // Form has been submitted.

	// perform validations on the form data
	$username = trim(mysqli_real_escape_string($connection, $_POST['username']));
	$password = trim(mysqli_real_escape_string($connection, $_POST['pass']));
	$fname = trim(mysqli_real_escape_string($connection, $_POST['Fname']));
	$lname = trim(mysqli_real_escape_string($connection, $_POST['Lname']));
	$email = trim(mysqli_real_escape_string($connection, $_POST['email']));
	$description = trim(mysqli_real_escape_string($connection, $_POST['description']));
	$iterations = ['cost' => 15];
	$hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);

	$query = "INSERT INTO `accounts` (`username`, `Fname`, `Lname`, `email`, `description`, `pass`) VALUES ('{$username}', '{$fname}', '{$lname}', '{$email}', '{$description}', '{$hashed_password}')";
	$result = mysqli_query($connection, $query);
	if ($result) {
		$message = "User Created.";
		header("Location: ../index.php");
	} else {
		$message = "User could not be created.";
		$message .= "<br />" . mysqli_error($connection);
	}
}

if (!empty($message)) {
	echo "<p>" . $message . "</p>";
}
?>
<div id="CreateNewUser">
<h2>Create New User</h2>

<form action="" method="post">
	Username:<br><input type="text" name="username"> <br><br>
	Password:<br><input type="text" name="pass"> <br><br>
	First Name:<br><input type="text" name="Fname"> <br><br>
	Last Name:<br><input type="text" name="Lname"> <br><br>
	Email:<br><input type="text" name="email"> <br><br>
	Description:<br><input type="text" name="description"> <br><br>
	<input type="submit" name="submit" value="Create" />
</form>
</div>
</div>
<?php include("navigation/footer.php"); ?>
<?php
if (isset($connection)) {
	mysqli_close($connection);
}


?>