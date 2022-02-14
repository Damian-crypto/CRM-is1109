<?php
	session_start();

	// include common functionalities for the web-page
	include('../config/setup.php');
	include('../functions/functions.php');

	$page = 'users';

	$user_not_added = false;
	$user_added = false;

	if (isset($_GET['register'])) {
		$username = $_POST['username'];
		$firstName = $_POST['fName'];
		$lastName = $_POST['lName'];
		$pass = $_POST['password'];
		$email = $_POST['email'];
		$role = $_POST['role'];

		$query = "INSERT INTO users VALUES (NULL, '$username', '$firstName', '$lastName', SHA1('$pass'), '$email')";

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
		<?php
			include("../styles/css.php");
			include('../js/script.php');
		?>
	</head>

	<body>
		<?php include('navbar.php'); ?>

		<div class="container">
			<h1 style="position: relative">System Administrators</h1>

			<?php if ($user_not_added) { ?>
				<div class="error-msg">
					<p><strong>User creation failed! </strong>try again.</p>
				</div>
			<?php } else if ($user_added) { ?>
				<div class="success-msg">
					<p><strong>User created successfully!<strong></p>
				</div>
			<?php } ?>


            <table>
                <tr>
                    <td><button onclick="toggleApplicationForm()">Create Administrator</button></td>
                </tr>
            </table>

            <div id="application-form">
                <script>toggleApplicationForm();</script>
                <?php include('forms/create_user_form.php'); ?>
            </div>

			<table>
				<?php
                    $query = "SELECT * FROM users";
                    $data = getData($query, $connection);
                    $cnt = count($data);

                    if ($cnt > 0) {
                        for ($i = 0; $i < $cnt; $i++) {
                        	if ($data[$i]['userName'] == $_SESSION['current_user']) { ?>
                                <form action="users.php" method="GET">
                                    <table border="1">
                                        <tr>
                                        	<td rowspan="3"><img width="60" src="../images/user.png" /></td>
                                        	<td>User Name: <input name="userName" type="text" value="<?php echo $data[$i]['userName']; ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                First Name: <input name="fName" type="text" value="<?php echo $data[$i]['fName'] ?>" />
                                                Last Name: <input name="lName" type="text" value="<?php echo $data[$i]['lName']; ?>" />
                                            </td>
                                            <td rowspan="3">
                                                <form action="contacts.php" method="GET">
                                                    <input name="delete_user" value="<?php echo $data[$i]['personID']; ?>" hidden />
                                                    <input type="submit" value="Delete" />
                                                </form>
                                                <input type="text" name="change_user" value="<?php echo $data[$i]['userID']; ?>" hidden/>
                                                <input type="submit" value="Change & Save" />
                                            </td>
                                        </tr>
                                        <tr>
                                        	<td>Email: <input name="email" type="text" value="<?php echo $data[$i]['email']; ?>" /></td>
                                        </tr>
                                        <input name="update_contact" value="<?php echo $data[$i]['personID']; ?>" hidden />
                                    </table>
                                </form>
						<?php } else { ?>
	                            <tr>
	                                <td><input type="checkbox" name="personID" value="<?php echo $personData['personID']; ?>" /></td>
	                                <td>
	                                    <table border="1">
	                                    	<tr><td rowspan="3"><img width="60" src="../images/user.png" /></td><td><?php echo $data[$i]['userName']; ?></td></tr>
	                                    	<tr><td><?php echo orDefault($data[$i]['fName'], 'NULL'); ?></td><td><?php echo orDefault($data[$i]['lName'], 'NULL'); ?></td></tr>
	                                    	<tr><td colspan="2"><?php echo $data[$i]['email']; ?></td></tr>
	                                    </table>
	                                </td>
	                            </tr>
				<?php       }
                        }
                    } ?>
            </table>
		</div>
	</body>
</html>
