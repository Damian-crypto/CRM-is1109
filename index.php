<?php
	include('config/setup.php');
	include('functions/functions.php');

	if (isset($_GET['email']) && isset($_GET['message']) && $_GET['email'] != '') {
		$query = "SELECT * FROM persons WHERE email='$_GET[email]'";
		if (!checkMatchingData($query, $connection)) {
			$fName = $_GET['fName'];
			$lName = $_GET['lName'];
			$phone = $_GET['phone_no'];
			$title = $_GET['title'];

			if ($fName == '' || $lName == '' || $phone == '' || $title == '') {
				header('location: index.php');
				exit();
			}

			$query = "INSERT INTO persons VALUES
			(NULL, '$_GET[fName]', '$_GET[lName]', '$_GET[email]', '$_GET[phone_no]', '$_GET[title]')";
			executeQuery($query, $connection);
		}

		$query = "SELECT personID FROM persons WHERE email='$_GET[email]'";
		$data = getRawData($query, $connection);

		$query = "INSERT INTO messages VALUES (NULL, '$_GET[message]', NULL, $data[personID])";
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
		<?php include('js/script.php'); ?>
	</head>

	<body>
		<?php include('navbar.php'); ?>
		<div class="container">
			<h1><center>Tribal Exotic Home Page</center></h1>

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
			
			<div class="message-form-wrapper">
				<form id="message-form" name="leave_message_form" action="index.php" method="GET">
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
							<td><input type="email" name="email" placeholder="john@gmail.com" required/></td>
						</tr>
						<tr>
							<td><label>Message:</label></td>
							<td><textarea name="message" rows="10" cols="50" required></textarea></td>
						</tr>
					</table>
					<input type="submit" value="Send" />
				</form>
			</div>
		</div>

		<?php include('footer.php'); ?>
	</body>
</html>
