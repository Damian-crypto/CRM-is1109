<?php
	//session_start();
	$page = 'users';
	include('page_header.php');

	// include common functionalities for the web-page
	//include('../config/setup.php');
	//include('../functions/functions.php');
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
			<hr />

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
                        		<tr>
	                                <form action="users.php" method="POST">
	                                    <table border="1">
	                                        <tr>
	                                        	<td rowspan="3"><img width="60" src="../images/user.png" /></td>
	                                        	<td>User Name: <input name="userName" type="text" value="<?php echo $data[$i]['userName']; ?>" required/></td>
	                                        </tr>
	                                        <tr>
	                                            <td colspan="2">
	                                                First Name: <input name="fName" type="text" value="<?php echo $data[$i]['fName'] ?>" />
	                                                Last Name: <input name="lName" type="text" value="<?php echo $data[$i]['lName']; ?>" />
	                                            </td>
	                                            <td rowspan="3">
	                                                <input type="text" name="change_user" value="<?php echo $data[$i]['userID']; ?>" hidden />
	                                                <input type="submit" value="Change and Save" />
	                                            </td>
	                                        </tr>
	                                        <tr>
	                                        	<td>
	                                        		Email: <input name="email" type="text" value="<?php echo $data[$i]['email']; ?>" />
	                                        		New Password: <input name="password" type="password" placeholder="password" required />
	                                        	</td>
	                                        </tr>
	                                    </table>
	                                </form>
	                                <br />
                                    <form action="contacts.php" method="GET">
                                        <input name="delete_user" value="<?php echo $data[$i]['personID']; ?>" hidden />
                                        <input type="submit" value="Delete" />
                                    </form>
                            	</tr>
						<?php } else { ?>
								<br />
	                            <tr>
	                                <td>
	                                    <table border="1">
	                                    	<tr>
	                                    		<td rowspan="3"><img width="60" src="../images/user.png" /></td>
	                                    		<td>User Name: <?php echo $data[$i]['userName']; ?></td>
	                                    	</tr>
	                                    	<tr>
	                                    		<td>First Name: <?php echo orDefault($data[$i]['fName'], 'NULL'); ?></td>
	                                    		<td>Last Name: <?php echo orDefault($data[$i]['lName'], 'NULL'); ?></td>
	                                    	</tr>
	                                    	<tr>
	                                    		<td colspan="2"><?php echo $data[$i]['email']; ?></td>
	                                    	</tr>
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
