<?php
	/** This function will check whether the user is in the database
	 *  if yes return the "role" of that user, otherwise "null"
	 */
	function checkUserExists($username, $password, $db) {
		$query = "SELECT * FROM user WHERE userName='$username' AND password=sha1('$password')";
		$result_set = mysqli_query($db, $query);
		$data = mysqli_fetch_array($result_set, MYSQLI_ASSOC);

		if (mysqli_num_rows($result_set) > 0) {
			return $data['role'];
		}

		return "null";
	}

	/** This function will add a new user into the database
	 */
	function insertAUser($query, $db) {
		if (mysqli_query($db, $query)) {
			return true;
		}

		return false;
	}
?>
