<?php
require("includes/head.php");



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
	$query1 = "SELECT id, username, pass, usertype FROM accounts WHERE username = '{$username}' LIMIT 1";
	$result1 = mysqli_query($connection, $query1);
	$details = mysqli_fetch_array($result1);
	if ($result) {
		if ($details["usertype"] == "user" || $details["usertype"] == "") {
			$_SESSION['user_id'] = $details['id'];
			$_SESSION['user'] = $details['username'];
			$_SESSION['usertype'] = $details['usertype'];
			$redirect = new Redirector("index.php?uc=1");
		}
	} else {
		$message = "User could not be created. This user already exists.";
		$message .= "<br />" . mysqli_error($connection);
	}
}

include("navigation/header.php");

?>
<div class="CreateNewUser">
	<div> <?php if (isset($message)) {
				echo $message;
			} ?>
	</div>
	<form action="" method="post">
		<fieldset>
			<legend>
				<h2>Create New User</h2>
			</legend>
			Username:<br><input type="text" name="username"> <br><br>
			Password:<br><input type="text" name="pass"> <br><br>
			First Name:<br><input type="text" name="Fname"> <br><br>
			Last Name:<br><input type="text" name="Lname"> <br><br>
			Email:<br><input type="text" name="email"> <br><br>
			Description:<br><textarea cols="21" rows="6" type="text" name="description"></textarea> <br><br>
			<input class="button" type="submit" name="submit" value="Create" />
		</fieldset>
	</form>
</div>
</div>
<?php include("navigation/footer.php"); ?>
<?php
if (isset($connection)) {
	mysqli_close($connection);
}


?>