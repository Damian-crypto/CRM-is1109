<?php
	session_start();

	// include common functionalities for the web-page
	include('../config/setup.php');
	include('../functions/functions.php');

	$user_not_added = false;
	$user_added = false;

	if (isset($_GET['register'])) {
		$username = $_POST['username'];
		$firstName = $_POST['fName'];
		$lastName = $_POST['lName'];
		$pass = $_POST['password'];
		$email = $_POST['email'];
		$role = $_POST['role'];

		$query = "INSERT INTO user (userId, userName, fName, lName, password, email, role)
		VALUES (NULL, '$username', '$firstName', '$lastName', SHA1('$pass'), '$email', '$role')";

		if (executeQuery($query, $connection)) {
			$user_added = true;
		} else {
			$user_not_added = true;
		}
	}
?>

<html>
	<head>
		<title>Tribal Exotic CRM | User Registration Page</title>
		<link rel="stylesheet" href="../styles/styles.css" />
	</head>

	<body>
		<?php include('navbar.php'); ?>

		<?php if ($user_not_added) { ?>
			<div class="error-msg">
				<p><strong>User creation failed! </strong>try again.</p>
			</div>
		<?php } else if ($user_added) { ?>
			<div class="success-msg">
				<p><strong>User created successfully!<strong></p>
			</div>
		<?php } ?>

		<form action="register_user.php?register" method="post">
			<table>
				<tr>
					<td>User Name:</td>
					<td>
						<input type="text" name="username" placeholder="New user name" />
					</td>
				</tr>
				<tr>
					<td>User Password:</td>
					<td>
						<input type="password" name="password" placeholder="New user password" />
					</td>
				</tr>
				<tr>
					<td>First Name:</td>
					<td>
						<input type="text" name="fName" placeholder="First name" />
					</td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td>
						<input type="text" name="lName" placeholder="Last name" />
					</td>
				</tr>
				<tr>
					<td>e-mail:</td>
					<td>
						<input type="email" name="email" placeholder="e-mail" />
					</td>
				</tr>
				<tr>
					<td>Role:</td>
					<td>
						<select name="role">
							<option value="admin">Administrator</option>
							<option value="customer">Customer</option>
						</select>
					</td>
				</tr>
			</table>
			<input type="submit" value="Register" />
		</form>
	</body>
</html>
