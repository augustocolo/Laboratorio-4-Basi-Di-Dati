<?php 
    require ('repo/connessione.php');
    require ('repo/credenzialilocalhost.php');
    require ('repo/htmlphp.php');
    require ('repo/sqlfunc.php');

    // CONNESSIONE 
    $cred = credenziali();
    $con = connessione($cred[0],$cred[1],$cred[2],$cred[3]);

    // ESECUZIONE QUERY
    $sql = file_get_contents("SQL/QueryOpzione.sql");
    $result = mysqli_query($con,$sql) or die("Bad SQL: $sql");
    $array = queryToArray($result);
?>
<!DOCTYPE html>
<html lang="it">

    <?php
        //HEAD + NAVBAR
        bootstrap_head("Cerca Orari");
    ?>
    <body>
        <?php
        bootstrap_header();
        bootstrap_errorBar();
        ?>

        <div class="container-fluid">

          <h1>Cerca il tuo istruttore</h1>
          <p>Resize the browser window to see the effect.</p>
          <p>The columns will automatically stack on top of each other when the screen is less than 576px wide.</p>
            <div class="row">
                <div class="col-sm-8">
                   <form name="ricercaistruttori" action="risposta_orari.php" method="GET">
                       <div class="form-group">
                           <label for="cognome">Cognome dell'istruttore:</label>
                           <select name="cognome" class="form-control">
                                <?php
                                    dropdown($array,$array);
                                ?>
                            </select>
                       </div>
                       <div class="form-group">
                           <label for="giorno">Giorno:</label>
                           <select name="giorno" class="form-control">
                                <option value="lun">Lunedì</option>
                                <option value="mar">Martedì</option>
                                <option value="mer">Mercoledì</option>
                                <option value="gio">Giovedì</option>
                                <option value="ven">Venerdì</option>
                                <option value="sab">Sabato</option>
                                <option value="dom">Domenica</option>
                            </select>
                       </div>
                       <button type="submit" class="btn btn-primary">Invia</button>
                    </form>
                </div>
                            
            </div>
        </div>

    </body>
</html>