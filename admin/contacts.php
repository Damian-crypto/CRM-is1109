<?php
    $page = 'contacts';
    include('page_header.php');
    $data = [];
?>

<html>
	<head>
		<title>Tribal Exotic CRM | Admin Page</title>
		<?php include("../styles/css.php"); ?>
        <?php include("../js/script.php"); ?>
	</head>

	<body>
		<?php include('navbar.php'); ?>

		<div class="container">
			<h1>Contacts</h1>

            <table>
                <tr>
                    <td><button onclick="toggleApplicationForm()">Create Contact</button></td>
                </tr>
            </table>

            <div id="application-form">
                <script>toggleApplicationForm();</script>
                <?php include('forms/create_contact_form.php'); ?>
            </div>

            <table class="main-table">
                <?php
                    $query = "SELECT * FROM persons ORDER BY personID DESC";
                    $data = getData($query, $connection);
                    $cnt = count($data);

                    if ($cnt > 0) {
                        for ($i = 0; $i < $cnt; $i++) {?>
                            <a name="<?php echo $data[$i]['personID']; ?>"></a>
                            <tr class="main-table-tr">
                                <td class="main-table-td">
                                    <form action="contacts.php" method="GET">
                                        <table border="1">
                                            <tr><td rowspan="3"><img width="60" src="../images/user.png" /></td></tr>
                                            <tr>
                                                <td colspan="2">
                                                    First Name: <input name="fName" type="text" value="<?php echo $data[$i]['fName'] ?>" />
                                                    Last Name: <input name="lName" type="text" value="<?php echo $data[$i]['lName']; ?>" />
                                                </td>
                                                <td rowspan="3">
                                                    <form action="contacts.php" method="GET">
                                                        <input name="delete_contact" value="<?php echo $data[$i]['personID']; ?>" hidden />
                                                        <input type="submit" value="Delete" />
                                                    </form>
                                                    <input type="submit" value="Change & Save" />
                                                </td>
                                            </tr>
                                            <tr><td>Phone: <input name="phone_no" type="text" value="<?php echo $data[$i]['phoneNo']; ?>" /><td>Email: <input name="email" type="text" value="<?php echo $data[$i]['email']; ?>" /></tr>
                                            <tr><td colspan="2">Title: <input name="title" type="text" value="<?php echo $data[$i]['title']; ?>" /></tr>
                                            <input name="update_contact" value="<?php echo $data[$i]['personID']; ?>" hidden />
                                        </table>
                                    </form>
                                </td>
                            </tr>

                        <?php }
                    }
                ?>
            </table>
		</div>
	</body>
</html>
