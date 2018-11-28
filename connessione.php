<?php 
	function connessione($host, $user, $pw, $db){
		/* CONNESSIONE AL DB*/
		$con = @mysqli_connect($host, $user, $pw, $db);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		return $con;
	}
?>