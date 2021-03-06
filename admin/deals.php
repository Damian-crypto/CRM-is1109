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
            <hr />

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
                    <th>Actions</th>
                </tr>
                <?php
                    $query = "SELECT * FROM deals";
                    $data = getData($query, $connection);
                    $cnt = count($data);

                    if ($cnt > 0) {
                        for ($i = 0; $i < $cnt; $i++) {
                            $query = "SELECT * FROM persons WHERE personID=".$data[$i]['contactID']."";
                            $contactData = getRawData($query, $connection);
                        ?>
                            <tr>
                                <td><input type="checkbox" /></td>
                                <td><?php echo $data[$i]['dealName']; ?></td>
                                <td>$ <?php echo $data[$i]['amount']; ?></td>
                                <td><?php echo $data[$i]['closingDate']; ?></td>
                                <td><?php echo $data[$i]['description']; ?></td>
                                <td><?php echo $contactData['fName'].' '.$contactData['lName']; ?></td>
                                <td>
                                    <form>
                                        <input type="text" name="delete_deal_id" value="<?php echo $data[$i]['dealID']; ?>" hidden/>
                                        <input type="submit" value="Delete Deal" />
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
