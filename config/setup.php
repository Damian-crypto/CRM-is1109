<?php
	// setup database for the entire web-site
	define('DB_SERVER', 'localhost:3306');
	define('DB_USERNAME', 'damian');
	define('DB_PASSWORD', '1234');
	define('DB_NAME', 'tribalexotic');

	$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
?>
