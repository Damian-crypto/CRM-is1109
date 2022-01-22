<?php
	include('config/setup.php');
	include('functions/functions.php');

	if (isset($_GET['message'])) {
		$query = "SELECT * FROM person WHERE email='$_GET[email]'";
		if (!checkMatchingData($query, $connection)) {
			$query = "INSERT INTO person VALUE 
			(NULL, '$_GET[fName]', '$_GET[lName]', '$_GET[email]', '$_GET[phone_no]', '$_GET[title]')";
			executeQuery($query, $connection);
		}

		$query = "SELECT personID FROM person WHERE email='$_GET[email]'";
		$data = getRawData($query, $connection);

		$query = "INSERT INTO messages VALUE (NULL, '$_GET[message]', NULL, $data[personID])";
		$success = executeQuery($query, $connection);

		if ($success) {
			header('location: index.php');
			echo '<br />message sent!<br />';
		} else {
			echo '<br />message not sent!<br />';
		}
	}
?>

<html>
	<head>
		<title>Tribal Exotic CRM | Home Page</title>
		<?php include("styles/css.php"); ?>
	</head>

	<body>
		<div class="container">
			<h1>Tribal Exotic Home Page</h1>

			<div class="slideshow-container">
				<div class="mySlides fade">
					<div class="numbertext">1 / 3</div>
					<img src="images/slider1.jpeg" style="width:100%">
				</div>

				<div class="mySlides fade">
					<div class="numbertext">2 / 3</div>
					<img src="images/slider2.jpg" style="width:100%">
				</div>

				<div class="mySlides fade">
					<div class="numbertext">3 / 3</div>
					<img src="images/slider3.jpg" style="width:100%">
				</div>
			</div>

			<?php include("js/script.php"); ?>

			<center><a id="login-button" href="login.php">Login</a></center>

			<div id="message-form">
				<form action="index.php?message" method="GET">
					<caption>Leave a message</caption>
					<table>
						<tr>
							<td><label>First Name:</label></td>
							<td><input type="text" name="fName" placeholder="john" /></td>
						</tr>
						<tr>
							<td><label>Last Name:</label></td>
							<td><input type="text" name="lName" placeholder="doe" /></td>
						</tr>
						<tr>
							<td><label>Phone No:</label></td>
							<td><input type="text" name="phone_no" placeholder="+94 12345678" /></td>
						</tr>
						<tr>
							<td><label>Title:</label></td>
							<td><input type="text" name="title" placeholder="Business man" /></td>
						</tr>
						<tr>
							<td><label>email:</label></td>
							<td><input type="email" name="email" placeholder="john@gmail.com" /></td>
						</tr>
						<tr>
							<td><label>Message:</label></td>
							<td><textarea name="message" rows="10" cols="50"></textarea></td>
						</tr>
					</table>
					<input type="submit" value="Send" />
				</form>
			</div>
		</div>
	</body>
</html>
