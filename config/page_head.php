<?php
	session_start();

	if (!isset($_SESSION['current_user'])) {
		header('location: login.php');
	} else {
		$current_user = $_SESSION['current_user'];
	}

	if (isset($_GET['register'])) {
		header('location: register_user.php');
	}

	if (isset($_GET['home'])) {
		header('location: admin.php');
	}

?>
