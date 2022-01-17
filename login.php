<?php
	session_start(); // this will keep track of the session(current user logged in)

	// include common functionalities of the site
	include('config/setup.php');
	include('functions/functions.php');

	$show_error_msg = false;

	// if the url(query) has 'login' keyword then this code segment will start working
	if (isset($_GET['login'])) {
		// check whether the user entered details are in the database
		$result = checkUserExists($_POST['username'], $_POST['password'], $connection);
		if ($result != 'null') {
			// if yes user will redirect to the page according to his/her role
			if ($result == 'admin') {
				// session has the name of the current logged in user
				$_SESSION['current_user'] = $_POST['username'];
				// redirect user to admin page
				header('location: admin/admin.php');
			}

			$show_error_msg = false;
		} else {
			$show_error_msg = true; // if there is no user in database show error message(by enabling this)
		}
	}
?>

<html>
	<head>
		<title>Tribal Exotic | Login Page</title>

		<script type="text/javascript">
			function validate() {
				if (document.loginForm.username.value == "" || document.loginForm.password.value == "") {
					alert("Username or Password cannot be empty");
					return false;
				}

				return true;
			}
		</script>

		<?php include("styles/css.php"); ?>
	</head>

	<body>
		<?php if ($show_error_msg) { ?>
			<div class="error-msg">
				<p><strong>Login Failed! </strong>incorrect credentials! try again.</p>
			</div>
		<?php } ?>

		<form name="loginForm" action="login.php?login" method="post" onsubmit="return(validate());">
			<label>Username:</label>
			<input type="text" name="username" placeholder="john123" />
			<br />
			<label>Password:</label>
			<input type="password" name="password" placeholder="1234" />
			<br />
			<input type="submit" value="Login"/>
		</form>
	</body>
</html>
