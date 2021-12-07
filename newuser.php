<?php 
	require("includes/connection.php"); 
	// require("includes/session.php"); 
	

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
		
		header("Location: index.php?uc=1");
	} else {
		$message = "User could not be created.";
		$message .= "<br />" . mysqli_error($connection);
	}
}

include("navigation/header.php");

?>
<div class="CreateNewUser">
<h2>Create New User</h2>
<div>  <?php if(isset($message)){
	echo $message;
} ?></div>
<form action="" method="post">
	Username:<br><input type="text" name="username"> <br><br>
	Password:<br><input type="text" name="pass"> <br><br>
	First Name:<br><input type="text" name="Fname"> <br><br>
	Last Name:<br><input type="text" name="Lname"> <br><br>
	Email:<br><input type="text" name="email"> <br><br>
	Description:<br><textarea cols="21" rows="10" type="text" name="description"></textarea> <br><br>
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