<?php

	require_once('db_credentials.php');

	function db_connect(){
		//return mysqli_connect("127.0.0.1", "webuser", "secretpassword", "globe_bank");
		$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		//confirm_db_connect();
		return $connection;

	}

	function db_disconnect($connection){
		if(isset($connection)){
		mysqli_close($connection);
	}
}	



?>