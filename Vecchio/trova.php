<?php
    // CONNESSIONE 
    require ('connessione.php');
    require ('credenzialilocalhost.php');
    require ('repo/htmlphp.php');
    require ('repo/sqlfunc.php');
    $cred = credenziali();
    $con = connessione($cred[0],$cred[1],$cred[2],$cred[3]);
    // ESECUZIONE QUERY
    $sql = file_get_contents("QueryOpzione.sql");
    $result = mysqli_query($con,$sql) or die("Bad SQL: $sql");
    $array = queryToArray($result);
?>
<!doctype html>
<html lang="it">
<head>
	<title>Istruttori</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
	<h1>Trova il tuo istruttore:</h1>
	<br>
	<form name="ricerca_istruttori" action="Risposta.php" method="GET">
		<select name="Cognome">
            <?php
                dropdown($array,$array);
                /*while($row = mysqli_fetch_row($result)) {
                    echo "<option value =\"".$row[0]."\">";
                    echo $row[0];
					echo "</option> ";
				}*/
            ?>
		</select>
		
		<select name="Giorno">
			<option value="lun">Lunedì</option>
			<option value="mar">Martedì</option>
			<option value="mer">Mercoledì</option>
			<option value="gio">Giovedì</option>
			<option value="ven">Venerdì</option>
			<option value="sab">Sabato</option>
			<option value="dom">Domenica</option>
		</select>
		
		<input type="submit" name="invia" value="Sottometti la richiesta" />
		<input type="reset" name="annulla" value="Annulla la richiesta" />
		
	</form>
</body>

</html>
