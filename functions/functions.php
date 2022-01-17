<?php
	/** This function will check whether the user is in the database
	 *  if yes return the "role" of that user, otherwise "null"
	 */
	function checkUserExists($username, $password, $db) {
		// password is encrypted with "SHA1" algorithm
		$query = "SELECT * FROM user WHERE userName='$username' AND password=sha1('$password')";
		$result_set = mysqli_query($db, $query);
		$data = mysqli_fetch_array($result_set, MYSQLI_ASSOC);

		if (mysqli_num_rows($result_set) > 0) {
			return true;
		}

		return false;
	}

	/** This function will execute the specified query
	 *  if the query success, return true otherwise false
	 */
	function executeQuery($query, $db) {
		$result = mysqli_query($db, $query) or die();
		if ($result) {
			return true;
		}

		return false;
	}

	function getData($query, $db) {
		$result_set = mysqli_query($db, $query);
		$data = array();

		while ($row = mysqli_fetch_assoc($result_set)) {
			array_push($data, $row);
		}

		return $data;
	}

?>
