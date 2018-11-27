<?php 
	function connessione($user, $pw, $db){
		/* CONNESSIONE AL DB*/
		$con = @mysqli_connect($user,$pw,'',$db);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		return $con;
	}
?>