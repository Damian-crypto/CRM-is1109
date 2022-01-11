<?php
	function checkUserExists($username, $password, $db) {
		$query = "SELECT * FROM user WHERE userName='$username' AND password=sha1('$password')";
		$result_set = mysqli_query($db, $query);
		$data = mysqli_fetch_array($result_set, MYSQLI_ASSOC);

		if (mysqli_num_rows($result_set) > 0) {
			return $data['role'];
		}

		return "null";
	}

	function insertAUser($query, $db) {
		if (mysqli_query($db, $query)) {
			return true;
		}

		return false;
	}
?>
