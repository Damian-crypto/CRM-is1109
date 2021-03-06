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
		if ($result) {
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

		<div class="login-form-wrapper">
			<form class="login-form" name="loginForm" action="login.php?login" method="post" onsubmit="return(validate());">
				<table>
					<tr>
						<td>User Name:</td>
						<td><input type="text" name="username" placeholder="john123" /></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="password" placeholder="1234" /></td>
					</tr>
					<tr style="text-align: center">
						<td>
							<input id="btn-submit" type="submit" value="Login"/>
						</td>
						<td>
							<a href="index.php">Go back to home</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
