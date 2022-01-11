<?php
	session_start();

	include('config/setup.php');
	include('functions/functions.php');

	$show_error_msg = false;

	if (isset($_GET['login'])) {
		$result = checkUserExists($_POST['username'], $_POST['password'], $connection);
		if ($result != 'null') {
			if ($result == 'admin') {
				$_SESSION['current_user'] = $_POST['username'];
				header('location: admin/admin.php');
			} else if ($result == 'customer') {
				$_SESSION['current_user'] = $_POST['username'];
				header('location: customer/customer.php');
			}
			$show_error_msg = false;
		} else {
			$show_error_msg = true;
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

		<?php include('styles/css.php'); ?>
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
