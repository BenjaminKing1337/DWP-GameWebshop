<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/session.php"); ?>

<html>
<?php 
	include("navigation/header.php");
?>
	<?php
		if (logged_in()) {
			redirect_to("../index.php");
		}
 	?>

	<div id="Login"><h2>Please login</h2>
	<form action="" method="post">
	Username:
	<input type="text" name="user" maxlength="30" value="" /> <br><br>
	Password:
	<input type="password" name="pass" maxlength="30" value="" /> <br><br>
	<input type="submit" name="submit_login" value="Login" />
	</form>

	<br><br>

	<h2>Is it someone new?</h2>
	<a style='text-decoration: none;' href='newuser.php' >Create user...</a>

	</div>
	<?php include("navigation/footer.php"); ?>

</html>
<?php
if (isset($connection)){mysqli_close($connection);}
?>