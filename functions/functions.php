<?php
	/** This function will check whether the user is in the database
	 *  if yes return the "role" of that user, otherwise "null"
	 */
	function checkUserExists($username, $password, $db) {
		checkConnection($db);
		// password is encrypted with "SHA1" algorithm
		$query = "SELECT * FROM user WHERE userName='$username' AND password=sha1('$password')";
		if ($result_set = mysqli_query($db, $query)) {
			$cnt = mysqli_num_rows($result_set);
			
			if ($cnt > 0) {
				return true;
			}
		}

		return false;
	}

	/** This function will execute the specified query
	 *  if the query success, return true otherwise false
	 */
	function executeQuery($query, $db) {
		checkConnection($db);
		$result = mysqli_query($db, $query);
		if ($result) {
			return true;
		}

		print_r(mysqli_error($db));
		return false;
	}

	function checkMatchingData($query, $db) {
		checkConnection($db);
		$result_set = mysqli_query($db, $query) or die();

		if (mysqli_num_rows($result_set) > 0) {
			return true;
		}

		echo '<br />'.mysqli_error($db);
		return false;
	}

	function getData($query, $db) {
		checkConnection($db);
		$result_set = mysqli_query($db, $query);
		$data = array();

		while ($row = mysqli_fetch_assoc($result_set)) {
			array_push($data, $row);
		}

		return $data;
	}

	function getRawData($query, $db) {
		checkConnection($db);
		$result_set = mysqli_query($db, $query);
		$data = mysqli_fetch_assoc($result_set);

		return $data;
	}

	function checkConnection($db) {
		if (mysqli_connect_error($db)) {
			echo '<br /><span style="color: red>"'.mysqli_connect_error($db).'</span>';
			exit();
		}
	}

	

?>
