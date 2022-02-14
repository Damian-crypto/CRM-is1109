<form action="users.php" method="post">
	<table>
		<tr>
			<td>User Name:</td>
			<td>
				<input type="text" name="username" placeholder="New user name" />
			</td>
		</tr>
		<tr>
			<td>User Password:</td>
			<td>
				<input type="password" name="password" placeholder="New user password" />
			</td>
		</tr>
		<tr>
			<td>First Name:</td>
			<td>
				<input type="text" name="fName" placeholder="First name" />
			</td>
		</tr>
		<tr>
			<td>Last Name:</td>
			<td>
				<input type="text" name="lName" placeholder="Last name" />
			</td>
		</tr>
		<tr>
			<td>e-mail:</td>
			<td>
				<input type="email" name="email" placeholder="e-mail" />
			</td>
		</tr>
	</table>
	<input type="text" name="register" value="true" hidden />
	<input type="submit" value="Create User" />
</form>
