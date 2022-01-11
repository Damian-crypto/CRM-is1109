<?php
	session_start();

	if (!isset($_SESSION['current_user'])) {
		header('location: login.php');
	} else {
		$current_user = $_SESSION['current_user'];
	}

?>

<html>
	<head>
		<title>Tribal Exotic CRM | Customer Page</title>
	</head>

	<body>
		<h1>Hello, <?php echo $current_user; ?>!</h1>
	</body>
</html>
