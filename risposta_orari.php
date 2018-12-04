<?php 
    require ('repo/connessione.php');
    require ('repo/credenzialilocalhost.php');
    require ('repo/htmlphp.php');
    require ('repo/sqlfunc.php');

    // CONNESSIONE 
    $cred = credenziali();
    $con = connessione($cred[0],$cred[1],$cred[2],$cred[3]);

    //RICHIESTE
    $cognome = $_REQUEST["cognome"];
    $giorno = $_REQUEST["giorno"];

    // ESECUZIONE QUERY
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
?>

<!DOCTYPE html>
<html lang="it">
    <?php
        //HEAD+NAVBAR
        bootstrap_page_init("Ricerca orari di ".$cognome." il ".$giorno);
        $result=mysqli_query($con,$sql);
        if($result == FALSE){
            echo "<div class=\"alert alert-danger\"> <strong>ERRORE</strong>";
            echo mysqli_error($con);
            echo "</div>";
        }
    ?>
    
            <div class="container-fluid">

          <h1>Cerca il tuo istruttore</h1>
          <p>Resize the browser window to see the effect.</p>
          <p>The columns will automatically stack on top of each other when the screen is less than 576px wide.</p>
            <div class="row">
                <div class="col-sm-4">
                    <table class="table table-striped">
                        <tr>
                            <th>Giorno</th>
                            <th>Ora Inizio</th>
                            <th>Ora Fine</th>
                            <th>Nome Attività</th>
                            <th>Tipo</th>
                            <th>Livello</th>
                        </tr>
                    <?php
                    // DISPLAY TABLE
                    if(mysqli_num_rows($result)!=0){
                        $table = queryToArray($result);
                        table_gen($table);
                    } else {
                        echo "<td style=\"color:red\"><strong>Non sono state trovate lezioni</strong></td>";
                    }
                        mysqli_close($con);
                    ?>
                    </table>
                </div>
                <div class="col-sm-8">
                  
                </div>
                            
            </div>
        </div>

    </body>
</html>
    