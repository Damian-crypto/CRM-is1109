<?php
	include('page_header.php');

	$page = 'customer';
?>

<html>
	<head>
		<title>Tribal Exotic CRM | Customer Page</title>
		<?php include("../styles/css.php"); ?>
	</head>

	<body>
		<?php include('navbar.php'); ?>

		<div class="container">
			<h1>Hello, <?php echo $current_user; ?>!</h1>
		</div>
	
		<div class="footer">
  			<p>Footer</p>
		</div>
	</body>
</html>
