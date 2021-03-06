<?php
    $page = 'customers';
    include('page_header.php');
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
			<h1 style="position: relative">Current Customers</h1>
            <hr />

            <table>
                <tr>
                    <td><button onclick="sendMailToCustomer()">Send Mail</button></td>
                    <td><button onclick="toggleApplicationForm()">Create Customer</button></td>
                </tr>
            </table>

            <div id="application-form">
                <script>toggleApplicationForm();</script>
                <?php include('forms/create_customer_form.php'); ?>
            </div>

            <table>
                <?php
                    $query = "SELECT * FROM leads";
                    $data = getData($query, $connection);
                    $cnt = count($data);

                    if ($cnt > 0) {
                        for ($i = 0; $i < $cnt; $i++) {
                            if ($data[$i]['status'] != 1) continue;
                            $query = "SELECT * FROM persons WHERE personID=".$data[$i]['personID']."";
                            $personData = getRawData($query, $connection); ?>

                            <tr>
                                <td><input type="checkbox" name="personID" value="<?php echo $personData['personID']; ?>" /></td>
                                <td>
                                    <table border="1">
                                        <tr><td rowspan="3"><img width="60" src="../images/user.png" /></td></tr>
                                        <tr>
                                            <td colspan="2"><h2><?php echo $personData['fName'].' '.$personData['lName']; ?></h2></td>
                                            <td rowspan="3">
                                                <form action="customers.php" method="GET">
                                                    <input type="text" name="remove_customer" value="<?php echo $personData['personID']; ?>" hidden />
                                                    <input type="submit" value="Remove" />
                                                </form>
                                            </td>
                                        </tr>
                                        <tr><td>Phone: <?php echo $personData['phoneNo']; ?></td><td>Email: <?php echo $personData['email']; ?></td></tr>
                                        <tr><td colspan="2">Title: <?php echo $personData['title']; ?></td></tr>
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
