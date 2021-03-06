<?php
	/** This function will check whether the user is in the database
	 *  if yes return true otherwise false
	 */
	function checkUserExists($username, $password, $db) {
		checkConnection($db);
		// password is encrypted with "SHA1" algorithm
		$query = "SELECT * FROM users WHERE userName='$username' AND password=sha1('$password')";
		if ($result_set = mysqli_query($db, $query)) {
			$cnt = mysqli_num_rows($result_set);
			
			if ($cnt > 0) {
				return true;
			}
		}

		return false;
	}

	/** This function will execute the specified query in the database.
	 *  if the query success, return true otherwise false
	 */
	function executeQuery($query, $db) {
		checkConnection($db);
		$result = mysqli_query($db, $query);
		if ($result) {
			return true;
		}

		print_r(mysqli_error($db)); // print the mysql errors after the execution of the above query
		return false;
	}

	/** This function will execute the specified query (specially for searching).
	 *  if there there is a row that match to the specified data this will return true
	 */
	function checkMatchingData($query, $db) {
		checkConnection($db);
		$result_set = mysqli_query($db, $query) or die();

		if (mysqli_num_rows($result_set) > 0) {
			return true;
		}

		print_r(mysqli_error($db)); // print the mysql errors after the execution of the above query
		return false;
	}

	function getData($query, $db) {
		checkConnection($db);
		$result_set = mysqli_query($db, $query);
		$data = array();

		if (!mysqli_error($db))
		{
			while ($row = mysqli_fetch_assoc($result_set)) {
				array_push($data, $row);
			}
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

	function getRunningDeals() {
		global $connection;
		$query = "SELECT * FROM deals";
		$data = getData($query, $connection);

		return $data;
	}

	function getRunningLeads() {
        global $connection;
        $query = "SELECT * FROM leads";
        $data = getData($query, $connection);

        return $data;
    }

	function getMessages() {
        global $connection;
        $query = "SELECT * FROM messages";
        $data = getData($query, $connection);

        return $data;
    }

    function getSystemAdmins() {
        global $connection;
        $query = "SELECT * FROM users";
        $data = getData($query, $connection);

        return $data;
    }

    function getContacts() {
        global $connection;
        $query = "SELECT * FROM persons";
        $data = getData($query, $connection);

        return $data;
    }

    function orDefault($src, $default) {
    	return ($src == '' || $src == NULL) ? $default : $src;
    }
?>
