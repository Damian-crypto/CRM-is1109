<?php
	include('../config/page_head.php');
	include('../functions/functions.php');

	$user_not_added = false;
	$user_added = false;

	print_r($_POST);

	if (isset($_POST['register'])) {
		$username = $_POST['username'];
		$firstName = $_POST['fName'];
		$lastName = $_POST['lName'];
		$pass = $_POST['password'];
		$email = $_POST['email'];
		$role = $_POST['role'];

		$query = "INSERT INTO user (userId, userName, fName, lName, password, email, role)
		VALUES (NULL, $username, $firstName, $lastName, $pass, $email, $role)";

		if (insertAUser($query, $connection)) {
			echo "User added";
			$user_added = true;
		} else {
			echo "Failed";
			$user_not_added = true;
		}
	} else {
		echo "not set";
	}
?>

<html>
	<head>
		<title>Tribal Exotic CRM | User Registration Page</title>
		<?php include('../styles/css.php'); ?>
	</head>

	<body>
		<?php include('navbar.php'); ?>

		<?php if ($user_not_added) { ?>
			<div class="error-msg">
				<p><strong>User creation failed! </strong>try again.</p>
			</div>
		<?php } else if ($user_added) { ?>
			<div class="success-msg">
				<p><strong>User created successfully! </strong>try again.</p>
			</div>
		<?php } ?>

		<form action="register_user.php?register=1" method="post">
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
			</table>
			<input type="submit" value="Register" />
		</form>
	</body>
</html>