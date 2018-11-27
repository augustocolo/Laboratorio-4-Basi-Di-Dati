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
	$cognome = $_REQUEST["Cognome"];
	$giorno = $_REQUEST["Giorno"];
	echo $cognome;
	echo $giorno;
	$sql = "SELECT 
				P.Giorno, P.OraI, P.OraF, A.Nome, A.TipoA, A.Livello 
			FROM 
				Attivita A, Programma P, Istruttore I
			WHERE
				I.Cognome = '$cognome' AND
				P.Giorno = '$giorno' AND
				A.CodA = P.CodA AND I.CodFisc = P.CodFisc
			ORDER BY
				A.Livello, A.Nome";
	$result = mysqli_query($con,$sql);

	
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