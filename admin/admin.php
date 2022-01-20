<?php
    include('page_header.php');
    $page = 'admin';
?>

<html>
	<head>
		<title>Tribal Exotic CRM | Admin Page</title>
		<?php include("../styles/css.php"); ?>
	</head>

	<body>
		<?php include('navbar.php'); ?>

		<div class="container">
			<h1>Welcome, <?php echo $current_user; ?>!</h1>

            <table>
                <?php
                    $query = "SELECT * FROM person";
                    $data = getData($query, $connection);
                    $cnt = count($data);

                    if ($cnt > 0) {
                        for ($i = 0; $i < $cnt; $i++) {?>
                            <tr>
                                <td>
                                    <table border="1">
                                        <tr><td rowspan="3"><img width="60" src="../images/user.png" /></td></tr>
                                        <tr><td colspan="2"><h2><?php echo $data[$i]['fName'].' '.$data[$i]['lName']; ?></h2></td><td rowspan="3"><button>Delete</button><br /><button>Edit</button></td></tr>
                                        <tr><td>Phone: <?php echo $data[$i]['phoneNo']; ?></td><td>Email: <?php echo $data[$i]['email']; ?></td></tr>
                                        <tr><td colspan="2">Title: <?php echo $data[$i]['title']; ?></td></tr>
                                    </table>
                                </td>
                            </tr>

                        <?php }
                    }
                ?>
            </table>
		</div>
	</body>
</html>
