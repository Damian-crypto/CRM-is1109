<?php
    $page = 'admin';
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
			<h1>Welcome, <?php echo $current_user; ?>!</h1>

            <div class="row">
                <div class="column">
                    <strong>My deals closing in this month</strong>
                    <table border="1" cellpadding="10">
                        <tr>
                            <th>Deal Name</th>
                            <th>Amount</th>
                            <th>Closing Date</th>
                            <th>Stage</th>
                            <th>Contact</th>
                        </tr>
                        <?php
                            $query = "SELECT * FROM deal WHERE closingDate <= '".date('Y-m').'-31'."'";
                            $data = getData($query, $connection);
                            $cnt = count($data);

                            if ($cnt > 0) {
                                for ($i = 0; $i < $cnt; $i++) {
                                    $query = "SELECT * FROM person WHERE personID=".$data[$i]['contactID']."";
                                    $contactData = getRawData($query, $connection);
                                ?>
                                    <tr>
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
                <div class="column">
                    <strong>Conversations</strong>
                    <table>
                        <?php
                            $query = "SELECT * FROM messages";
                            $data = getData($query, $connection);
                            $cnt = count($data);

                            if ($cnt > 0) {
                                for ($i = 0; $i < $cnt; $i++) {
                                    $query = "SELECT * FROM person WHERE personID=".$data[$i]['personID'];
                                    $personData = getRawData($query, $connection);
                                    ?>
                                    <tr>
                                        <table border="1" cellpadding="10">
                                            <tr>
                                                <td>From: <?php echo $personData['fName'].' '.$personData['lName']; ?></td>
                                                <td>Message: <?php echo $data[$i]['message']; ?></td>
                                                <td>
                                                    <input type="button" name="reply" value="Reply" onclick="sendEmailAlert('<?php echo $personData['email']; ?>');" /><br />
                                                    <form action="admin.php" method="GET">
                                                        <input name="delete_message" value="<?php echo $data[$i]['messageID']; ?>" hidden />
                                                        <input type="submit" value="Delete" />
                                                    </form>
                                                </td>
                                            </tr>
                                        </table>
                                    </tr>
                        <?php   }
                            }
                        ?>
                    </table>
                </div>
            </div>
		</div>
	</body>
</html>
