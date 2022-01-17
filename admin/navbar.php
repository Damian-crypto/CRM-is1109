<div class="navbar">
	<a href="admin.php?home" <?php if ($page == 'admin') echo 'class="active"'; ?>>Home</a>
	<a href="admin.php?leads" <?php if ($page == 'leads') echo 'class="active"'; ?>>Leads</a>
	<a href="admin.php?contacts" <?php if ($page == 'contacts') echo 'class="active"'; ?>>Contacts</a>
	<a href="admin.php?customers" <?php if ($page == 'customers') echo 'class="active"'; ?>>Customers</a>
	<a href="admin.php?register" <?php if ($page == 'register') echo 'class="active"'; ?>>Register a user</a>
	<a id="avatar" href="#">
		<img width="10" src="../images/user.png" alt="user image here" />
		<?php echo "   ".$_SESSION['current_user']; ?>
	</a>
	<a href="admin.php?logout">Logout</a>
</div>
