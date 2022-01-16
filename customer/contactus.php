<?php
	include('page_header.php');
    include('../config/setup.php');
    include('../functions/functions.php');

    $page = 'contactus';
?>
<html>
	<head>
		<title>Tribal Exotic CRM | Customer Page</title>
		<?php include("../styles/css.php"); ?>
	</head>

	<body>
		<?php include('navbar.php'); ?>

		<div class="container">
            <?php
                $query = "SELECT * FROM messages WHERE userName='".$_SESSION['current_user']."'";
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

            <form>
                <label>Enter your message here:</label><br />
                <textarea name="msg" type="textarea" cols="70" rows="10"></textarea><br />
                <input type="submit" value="Send" />
            </form>
		</div>
	
		<div class="footer">
  			<p>Footer</p>
		</div>
	</body>
</html>
