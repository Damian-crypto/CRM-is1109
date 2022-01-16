<div class="navbar">
	<a href="admin.php?home" <?php if ($page == 'admin_page') echo 'class="active"'; ?>>Home</a>
	<a href="admin.php?register" <?php if ($page == 'register_page') echo 'class="active"'; ?>>Register a user</a>
	<a id="avatar" href="#">
		<img width="20" src="../images/user.png" alt="user image here" />
		<?php echo "   ".$_SESSION['current_user']; ?>
	</a>
	<a href="admin.php?logout">Logout</a>
</div>
