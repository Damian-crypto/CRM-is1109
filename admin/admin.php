<?php
	session_start();

	if (isset($_GET['register'])) {
		// if the query has "register" keyword re-direct to the register_user.php
		header('location: register_user.php');
	}

	if (!isset($_SESSION['current_user'])) {
		// if the current session has no user, then this will re-direct to the login page
		header('location: login.php');
	} else {
		// else create variable 'current_user' for this web-page
		$current_user = $_SESSION['current_user'];
	}

	if (isset($_GET['home'])) {
		// if user click on "home" button re-direct to the admin page
		header('location: admin.php');
	}
?>

<html>
	<head>
		<title>Tribal Exotic CRM | Admin Page</title>
	</head>

	<body>
		<?php include('navbar.php'); ?>

		<h1>Hello, <?php echo $current_user; ?>!</h1>
	</body>
</html>
