<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
		if (logged_in()) {
		redirect_to("../index.php");
	}
 ?>
 
 <html>
<?php include("../navigation/header.php"); ?>

 <?php
	// START FORM PROCESSING
	if (isset($_POST['submit'])) { // Form has been submitted.
		$username = trim(mysqli_real_escape_string($connection, $_POST['user']));
		$password = trim(mysqli_real_escape_string($connection,$_POST['pass']));

		$query = "SELECT id, username, pass FROM accounts WHERE username = '{$username}' LIMIT 1";
		$result = mysqli_query($connection, $query);
			
			if (mysqli_num_rows($result) == 1) {
				// username/password authenticated
				// and only 1 match
				$found_user = mysqli_fetch_array($result);
                if(password_verify($password, $found_user['pass'])){
				    $_SESSION['user_id'] = $found_user['id'];
				    $_SESSION['user'] = $found_user['user'];
				    redirect_to("../index.php");
			} else {
				// username/password combo was not found in the database
				$message = "Username/password combination incorrect.<br />
					Please make sure your caps lock key is off and try again.";
			}}
	} else { // Form has not been submitted.
		if (isset($_GET['logout']) && $_GET['logout'] == 1) {
			$message = "You are now logged out.";
		} 
	}
if (!empty($message)) {echo "<p>" . $message . "</p>";} ?>

<div id="Login"><h2>Please login</h2>
<form action="" method="post">
Username:
<input type="text" name="user" maxlength="30" value="" /> <br><br>
Password:
<input type="password" name="pass" maxlength="30" value="" /> <br><br>
<input type="submit" name="submit" value="Login" />
</form>

<br><br>

<h2>Is it someone new?</h2>
<a style='text-decoration: none;' href='newuser.php' >Create user...</a>

</div>
<?php include("../navigation/footer.php"); ?>

</html>
<?php
if (isset($connection)){mysqli_close($connection);}
?>