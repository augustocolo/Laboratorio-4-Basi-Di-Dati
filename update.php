<html>
<?php
    require ('repo/connessione.php');
    require ('repo/credenzialilocalhost.php');
    require ('repo/htmlphp.php');
    require ('repo/sqlfunc.php');    

    // CONNESSIONE 
    $cred = credenziali();
    $con = connessione($cred[0],$cred[1],$cred[2],$cred[3]);

    //DATA VALIDATION
        // inconsistenze tra i valori indicati come orario d’inizio e di fine attività
if($_REQUEST['table']=="programma"){
    if(strtotime($_REQUEST['OraI'])>=strtotime($_REQUEST['OraF'])){
        $status = "danger";
        $message = "L'ora d'inizio indicata viene dopo l'ora di fine"; 
        exit(hiddenResponse($status,$message,'inserisci.php','POST'));
        
    }
        //se la sala selezionata, nel giorno e nell’ora selezionate è disponibile. In presenza di errori la pagina deve notificare il relativo errore.
    $sqlSala = "SELECT COUNT(*) FROM Programma WHERE Sala = ".$_REQUEST['Sala']." AND Giorno = '".$_REQUEST['Giorno']."' AND OraF > STR_TO_DATE(\"".$_REQUEST['OraI']."\",\"%H:%i\") AND OraI< STR_TO_DATE(\"".$_REQUEST['OraF']."\",\"%H:%i\");";
    $querySala = mysqli_query($con,$sqlSala) or die(mysqli_error($con));
    if(mysqli_fetch_row($querySala)[0]!="0"){
        $status = "danger";
        $message = "La sala ".$_REQUEST['Sala']." è già occupata dalle ".$_REQUEST['OraI']." alle ".$_REQUEST['OraF']." il giorno scelto.";
        exit(hiddenResponse($status,$message,'inserisci.php','POST'));
    }
        // 2 se l’istruttore, nel giorno e nell’ora selezionate non è occupato in un’altra attività. In presenza di errori la pagina deve notificare il relativo errore
        $sqlIstruttore = "SELECT COUNT(*) FROM Programma WHERE CodFisc = \"".$_REQUEST['CodFisc']."\" AND Giorno = '".$_REQUEST['Giorno']."' AND OraF > STR_TO_DATE(\"".$_REQUEST['OraI']."\",\"%H:%i\") AND OraI< STR_TO_DATE(\"".$_REQUEST['OraF']."\",\"%H:%i\");";
    
        $queryIstruttore = mysqli_query($con,$sqlIstruttore) or die(mysqli_error($con));
        if(mysqli_fetch_row($queryIstruttore)[0]!=0){
            $status = "danger";
            $message = "L'istruttore ".$_REQUEST['CodFisc']." è già occupato dalle".$_REQUEST['OraI']." alle ".$_REQUEST['OraF']." il giorno scelto.";
            exit(hiddenResponse($status,$message,'inserisci.php','POST'));
        }
}
    $sqlTableReq = "DESCRIBE ".$_REQUEST['table'];//tablename
    $queryTableReq = mysqli_query($con,$sqlTableReq) or die(mysqli_error($con));
    $array=queryToArray($queryTableReq);
    $field_name = array_column($array,0);
    for ($i=0;$i<count($field_name);$i++){
        if(isset($_REQUEST[$field_name[$i]])){
            $data[$i] = $_REQUEST[$field_name[$i]];
        } else {
            $data[$i] = NULL;
        }
    }
    //print_r($field_name);
    //print_r($data);
    
    //Insert (create request)
    $sql = insertGenerator($_REQUEST['table'], $field_name, $data);
    $query = mysqli_multi_query($con,$sql);

    //response
    if ($query){
        $status = "success";
        $message = "La tua richiesta è stata inserita correttamente!";
        exit(hiddenResponse($status,$message,'inserisci.php','POST'));
    } else{
        $status = "danger";
        $message = "C'è stato un problema nell'inserimento: ";
        exit(var_dump($sql));
        exit(hiddenResponse($status,$message.mysqli_error($con),'inserisci.php','POST'));
    }
        
    //else okay
?>
</html>



    

