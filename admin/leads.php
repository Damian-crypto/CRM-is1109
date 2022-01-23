<?php
    $page = 'leads';
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
			<h1>Current Leads</h1>

            <table>
                <tr>
                    <td><button>Send Mail</button></td>
                    <td><button onclick="toggleApplicationForm()">Create Lead</button></td>
                </tr>
            </table>

            <div id="application-form">
                <script>toggleApplicationForm();</script>
                <?php include('forms/create_lead_form.php'); ?>
            </div>

            <table>
                <?php
                    $query = "SELECT * FROM lead";
                    $data = getData($query, $connection);
                    $cnt = count($data);

                    if ($cnt > 0) {
                        for ($i = 0; $i < $cnt; $i++) {
                            if ($data[$i]['status'] == 1) continue;
                            $query = "SELECT * FROM person WHERE personID=".$data[$i]['personID'];
                            $personData = getRawData($query, $connection); ?>

                            <tr>
                                <td><input type="checkbox" /></td>
                                <td>
                                    <table border="1">
                                        <tr><td rowspan="4"><img width="60" src="../images/user.png" /></td></tr>
                                        <tr><td colspan="2"><h2><?php echo $personData['fName'].' '.$personData['lName']; ?></h2></td><td rowspan="3"><button>Delete</button><br /><button>Edit</button></td></tr>
                                        <tr><td>Phone: <?php echo $personData['phoneNo']; ?></td><td>Email: <?php echo $personData['email']; ?></td></tr>
                                        <tr><td>Title: <?php echo $personData['title']; ?></td><td>Lead Source: <?php echo $data[$i]['leadSource']; ?></td></tr>
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
