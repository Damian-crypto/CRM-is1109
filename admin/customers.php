<?php
    include('page_header.php');
    $page = 'customers';
?>

<html>
	<head>
		<title>Tribal Exotic CRM | Admin Page</title>
		<?php include("../styles/css.php"); ?>
	</head>

	<body>
		<?php include('navbar.php'); ?>

		<div class="container">
			<h1 style="relative: fixed">Welcome, <?php echo $current_user; ?>!</h1>
		</div>
	</body>
</html>
