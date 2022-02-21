<?php
    $page = 'admin';
    include('page_header.php');

    $leadData = getRunningLeads();
    $userData = getSystemAdmins();
    $contactData = getContacts();
    $runningDeals = getRunningDeals();
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
            <hr />

            <table cellspacing="10px">
                <tr>
                    <h2>Current Business Status</h2>
                    <td>
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
                                $query = "SELECT * FROM deals WHERE closingDate <= '".date('Y-m').'-31'."'";
                                $data = getData($query, $connection);
                                $cnt = count($data);

                                if ($cnt > 0) {
                                    for ($i = 0; $i < $cnt; $i++) {
                                        $query = "SELECT * FROM persons WHERE personID=".$data[$i]['contactID']."";
                                        $personData = getRawData($query, $connection);
                                    ?>
                                        <tr>
                                            <td><?php echo $data[$i]['dealName']; ?></td>
                                            <td>$ <?php echo $data[$i]['amount']; ?></td>
                                            <td><?php echo $data[$i]['closingDate']; ?></td>
                                            <td><?php echo $data[$i]['description']; ?></td>
                                            <td><?php echo $personData['fName'].' '.$personData['lName']; ?></td>
                                        </tr>

                                    <?php }
                                }
                            ?>
                        </table>
                    </td>
                    <td rowspan="100">
                        <strong>Conversations</strong>
                        <table>
                            <?php
                                $query = "SELECT * FROM messages";
                                $data = getData($query, $connection);
                                $cnt = count($data);

                                if ($cnt > 0) {
                                    for ($i = 0; $i < $cnt; $i++) {
                                        $query = "SELECT * FROM persons WHERE personID=".$data[$i]['personID']."";
                                        $personData = getRawData($query, $connection);
                                        ?>
                                        <tr>
                                            <table border="1" cellpadding="10">
                                                <tr>
                                                    <td>From: <?php echo "$personData[fName] $personData[lName]"; ?></td>
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
                    </td>
                </tr>
                <tr>
                    <strong>Lead Sources</strong><br />
                    <td colspan="2">
                        <table border="1" cellpadding="10">
                            <tr><th>Lead Source</th><th>Count</th></tr>
                            <?php
                                $query = "SELECT leadSource, COUNT(*) AS cnt FROM leads GROUP BY leadSource";
                                $sourcesData = getData($query, $connection);

                                foreach ($sourcesData as $source) { ?>
                                    <tr>
                                        <td><?php echo $source['leadSource']; ?></td>
                                        <td><?php echo $source['cnt']; ?></td>
                                    </tr>
                                <?php }
                            ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <h2>Current System Statistics</h2>
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    Running Leads<br/>
                                    <?php
                                        $cnt = 0;
                                        for ($i = 0; $i < count($leadData); $i++) {
                                            if ($leadData[$i]['status'] == 2) $cnt++;
                                        }
                                        echo $cnt;
                                    ?>
                                </td>
                                <td>
                                    Conversions<br/>
                                    <?php
                                        echo count(getMessages());
                                    ?>
                                </td>
                                <td>Administrators<br/><?php echo count($userData); ?></td>
                                <td>Contacts<br/><?php echo count($contactData); ?></td>
                                <td>Current Deals<br/><?php echo count($runningDeals); ?>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

        <?php //include('../footer.php'); ?>
	</body>
</html>
