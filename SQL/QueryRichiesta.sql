SELECT 
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
	A.Livello, A.Nome;