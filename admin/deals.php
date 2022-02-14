<?php
    $page = 'deals';
    include('page_header.php');
?>

<html>
	<head>
		<title>Tribal Exotic CRM | Admin Page</title>
		<?php
            include("../styles/css.php");
            include("../js/script.php");
        ?>
	</head>

	<body>
		<?php include('navbar.php'); ?>

		<div class="container">
			<h1>Current Deals</h1>

            <table>
                <tr>
                    <td><button onclick="toggleApplicationForm()">Create Deal</button></td>
                </tr>
            </table>

            <div id="application-form">
                <script>toggleApplicationForm();</script>
                <?php include('forms/create_deal_form.php'); ?>
            </div>

            <table border="1" cellpadding="10">
                <tr>
                    <th>Select</th>
                    <th>Deal Name</th>
                    <th>Amount</th>
                    <th>Closing Date</th>
                    <th>Stage</th>
                    <th>Contact</th>
                </tr>
                <?php
                    $query = "SELECT * FROM deal";
                    $data = getData($query, $connection);
                    $cnt = count($data);

                    if ($cnt > 0) {
                        for ($i = 0; $i < $cnt; $i++) {
                            $query = "SELECT * FROM person WHERE personID=".$data[$i]['contactID']."";
                            $contactData = getRawData($query, $connection);
                        ?>
                            <tr>
                                <td><input type="checkbox" /></td>
                                <td><?php echo $data[$i]['dealName']; ?></td>
                                <td>$ <?php echo $data[$i]['amount']; ?></td>
                                <td><?php echo $data[$i]['closingDate']; ?></td>
                                <td><?php echo $data[$i]['description']; ?></td>
                                <td><?php echo $contactData['fName'].' '.$contactData['lName']; ?></td>
                            </tr>

                        <?php }
                    }
                ?>
            </table>
		</div>
	</body>
</html>
