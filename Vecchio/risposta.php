<!doctype html>
<html lang="it">
<head>
	<title>Risposta</title>
    <link rel="stylesheet" href="styles.css">
</head>
    
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand mx-auto" href="index.php">Palestra Bernini</a>
        </div>
    </nav>
    </header>

<body>
    <div style="overflow-x:auto;">
        <?php
            // CONNESSIONE
            require ('connessione.php');
            require ('credenzialilocalhost.php');
            require ('repo/htmlphp.php');
            require ('repo/sqlfunc.php');
            $cred = credenziali();
            $con = connessione($cred[0],$cred[1],$cred[2],$cred[3]);


            //RICHIESTE
            $cognome = $_REQUEST["Cognome"];
            $giorno = $_REQUEST["Giorno"];
            //echo $cognome;
            //echo $giorno;

            //SQL
            $sql = "SELECT 
            P.Giorno, P.OraI, P.OraF, A.Nome, A.TipoA, A.Livello
        FROM
            Attivita A,
            Programma P,
            Istruttore I
        WHERE
            I.Cognome = '$cognome' AND
            P.Giorno = '$giorno' AND
            A.CodA = P.CodA AND I.CodFisc = P.CodFisc
        ORDER BY
            A.Livello, A.Nome;";
            $result = mysqli_query($con,$sql) or die(mysqli_error($con));
            

            // DISPLAY TABLE
            echo "<table>";
            echo "<tr> <td>Giorno</td> <td>Ora Inizio</td> <td>Ora Fine</td> <td>Nome Attività</td> <td>Tipo</td> <td>Livello</td> </tr>";
            if(mysqli_num_rows($result)){
            $table = queryToArray($result);
            table_gen($table);
                /*while($row = mysqli_fetch_array($result)) {
                    echo "<tr> <td>$row[0]</td> <td>$row[1]</td> <td>$row[2]</td> <td>$row[3]</td> <td>$row[4]</td> <td>$row[5]</td> </tr>";
                }*/
        } else {
            echo "<td style=\"color:red\">Non sono state trovate lezioni</td>";
        }
            echo "</table>";
            mysqli_close($con);
        ?>
    </div>
</body>

</html>