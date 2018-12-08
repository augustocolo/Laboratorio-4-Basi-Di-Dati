SELECT COUNT(*)
FROM Programma
WHERE '$_REQUEST['sala']' = Sala AND
'$_REQUEST['giorno']' = Giorno AND
TO_DATE('$_REQUEST['OraI']',"HH24:MI")<OraF AND
OraI < TO_DATE('$_REQUEST['OraF']',"HH24:MI");
