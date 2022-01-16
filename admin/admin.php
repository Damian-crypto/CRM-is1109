<?php
	session_start();

	$page = 'admin_page';

	if (isset($_GET['register'])) {
		// if the query has "register" keyword re-direct to the register_user.php
		header('location: register_user.php');
	}

	if (!isset($_SESSION['current_user'])) {
		// if the current session has no user, then this will re-direct to the login page
		header('location: ../login.php');
	} else {
		// else create variable 'current_user' for this web-page
		$current_user = $_SESSION['current_user'];
	}

	if (isset($_GET['home'])) {
		// if user click on "home" button re-direct to the admin page
		header('location: admin.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		header('location: admin.php');
	}
?>

<html>
	<head>
		<title>Tribal Exotic CRM | Admin Page</title>
		<?php include("../styles/css.php"); ?>
	</head>

	<body>
		<?php include('navbar.php'); ?>

		<div class="container">
			<h1>Hello, <?php echo $current_user; ?>!</h1>

            <?php
                $query = "SELECT * FROM messages WHERE reply IS NULL";
                $data = getData($query, $connection);
                $cnt = count($data);
                if ($cnt > 0) {
            ?>
                <ul>
                    <?php
                        for ($i = 0; $i < $cnt; $i++) {
                    ?>
                        <li>
                            <table>
                                <tr>
                                    <td>
                                        <strong><?php echo $data[$i]['userName'] ?></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Message:</td>
                                    <td>
                                        <?php echo $data[$i]['message']; ?>
                                    </td>    
                                </tr>
                                <tr>
                                    <td>Reply:</td>
                                    <td>
                                        <?php echo $data[$i]['reply']; ?>
                                    </td>    
                                </tr>
                            </table>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>

		</div>
	</body>
</html>
