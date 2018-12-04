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
        bootstrap_page_init("Cerca Orari");
    ?>

        <div class="container-fluid">

          <h1>Cerca il tuo istruttore</h1>
          <p>Resize the browser window to see the effect.</p>
          <p>The columns will automatically stack on top of each other when the screen is less than 576px wide.</p>
            <div class="row">
                <div class="col-sm-4">
                    <p>Sue rimasto ansiosi disteso tre vederla. Se ne scolpire alterata acerbita scompare sa apparire smarrito.</p> <p>Le amarezza grappoli io mokattam ciascuno visibile esercita. Mai dono ride vedo che ogni crea. Sole luce vidi hai vedo onda pare gli. Con guardavamo appartiene uno sofferenza. Due monte mai scese sorso all legge tocco sia. </p>
                </div>
                <div class="col-sm-8">
                   <form name="ricercaistruttori" action="risposta_orari.php" method="GET">
                       <div class="form-group">
                           <label for="cognome">Cognome dell'istruttore:</label>
                           <select name="cognome">
                                <?php
                                    dropdown($array,$array);
                                ?>
                            </select>
                       </div>
                       <div class="form-group">
                           <label for="giorno">Giorno:</label>
                           <select name="giorno">
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