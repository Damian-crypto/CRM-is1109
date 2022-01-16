<div class="navbar">
	<a href="customer.php?home" <?php if ($page == 'customer') echo 'class="active"'; ?>>Home</a>
	<a href="customer.php?faq" <?php if ($page == 'faq') echo 'class="active"'; ?>>FAQ</a>
	<a href="customer.php?help" <?php if ($page == 'help') echo 'class="active"'; ?>>Help</a>
	<a id="avatar" href="#">
		<table>
			<tr>
				<td><img width="20" src="../images/user.png" alt="user image here" /></td>
				<td><?php echo "   ".$_SESSION['current_user']; ?></td>
			</tr>
		</table>
	</a>
	<a href="customer.php?contactus" <?php if ($page == 'contactus') echo 'class="active"'; ?>>Contact Us</a>
	<a href="customer.php?logout">Log Out</a>
</div>
