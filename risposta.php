<!doctype html>
<html lang="it">
<head>
	<title>Risposta</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<?php
	// CONNESSIONE
	require ('connessione.php');
	require ('credenzialilocalhost.php');
	$cred = credenziali();
	$con = connessione($cred[0],$cred[1],$cred[2],$cred[3]);
	
	
	//RICHIESTE
	$cognome = $_REQUEST["Cognome"];
	$giorno = $_REQUEST["Giorno"];
	echo $cognome;
	echo $giorno;
	
	//SQL
	$sql = "SELECT P.Giorno, P.OraI, P.OraF, A.Nome, A.TipoA, A.Livello FROM Attivita A, Programma P, Istruttore I WHERE I.Cognome = 'Bruni' AND P.Giorno = 'mar' AND A.CodA = P.CodA AND I.CodFisc = P.CodFisc ORDER BY A.Livello, A.Nome";
    $sql = "SELECT * FROM attivita;";
	$result = mysqli_query($con,$sql) or die(mysqli_error($con));

	// DISPLAY TABLE
	echo "<table border='1'>";
	echo "<tr> <td>Giorno</td> <td>Ora Inizio</td> <td>Ora Fine</td> <td>Nome Attività</td> <td>Tipo</td> <td>Livello</td> </tr>";
	while($row = mysqli_fetch_row($result)) {
		echo "<tr> <td>$row[0]</td> <td>$row[1]</td> <td>$row[2]</td> <td>$row[3]</td> <td>$row[4]</td> <td>$row[5]</td> </tr>";
	}
	echo "</table>";
	mysqli_close($con);
?>
</body>

</html>