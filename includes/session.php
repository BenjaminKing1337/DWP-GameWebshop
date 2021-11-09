<?php
	session_start();
	
	function logged_in() {
		return isset($_SESSION['user_id']);
	}
	function admin() {
		return $_SESSION['usertype']=="admin";
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to("login.php");
		}
	}
	function redirect_to($location) {
		header("Location: {$location}");
		exit;
	}

	// START FORM PROCESSING
	if (isset($_POST['submit_login'])) { // Form has been submitted.
		$username = trim(mysqli_real_escape_string($connection, $_POST['user']));
		$password = trim(mysqli_real_escape_string($connection,$_POST['pass']));

		$query = "SELECT id, username, pass, usertype FROM accounts WHERE username = '{$username}' LIMIT 1";
		$result = mysqli_query($connection, $query);
			
			if (mysqli_num_rows($result) == 1) {
				// username/password authenticated
				// and only 1 match
				$found_user = mysqli_fetch_array($result);
                if(password_verify($password, $found_user['pass'])){
					if($found_user["usertype"]=="user"||$found_user["usertype"]==""){
						$_SESSION['user_id'] = $found_user['id'];
						$_SESSION['user'] = $found_user['username'];
						$_SESSION['usertype'] = $found_user['usertype'];
						redirect_to("index.php");
					}
					elseif($found_user["usertype"]=="admin"){
						$_SESSION['user_id'] = $found_user['id'];
						$_SESSION['user'] = $found_user['username'];
						$_SESSION['usertype'] = $found_user['usertype'];
						redirect_to("admin/addproduct.php");
					}
				} 
				else {
					// username/password combo was not found in the database
					$message = "Username/password combination incorrect.<br />
						Please make sure your caps lock key is off and try again.";
				}
			} 
			else { // Form has not been submitted.
				if (isset($_GET['logout']) && $_GET['logout'] == 1) {
					$message = "You are now logged out.";
				} 
			}
		if (!empty($message)){
			echo "<p>" . $message . "</p>";
		} 
	}
?>

