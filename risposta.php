<?php	/* CONNESSIONE AL DB*/
	$con = @mysqli_connect('localhost','root','','istruttori');
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>

<!doctype html>
<html lang="it">
<head>
	<title>Risposta</title>
</head>

<body>
<?php
	// CONNESSIONE
	require ('connessione.php');
	$con = connessione('localhost','root','istruttori');
	
	//RICHIESTE
	$cognome = $_REQUEST["Cognome"];
	$giorno = $_REQUEST["Giorno"];
	echo $cognome;
	echo $giorno;
	
	//SQL
	$sql = file_get_contents("QueryRichiesta.sql");
	$result = mysqli_query($con,$sql) or die("Bad SQL: $sql");;

	// DISPLAY TABLE
	echo "<table border='1'>";
	echo "<tr> <td>Giorno</td> <td>Ora Inizio</td> <td>Ora Fine</td> <td>Nome Attività</td> <td>Tipo</td> <td>Livello</td> </tr>";
	while($row = mysqli_fetch_row($result)) {
		echo "<tr> <td>$row[0]</td> <td>$row[1]</td> <td>$row[2]</td> <td>$row[3]</td> <td>$row[4]</td> <td>$row[5]</td> </tr>";
	}
	echo "</table>";
?>
</body>

</html>