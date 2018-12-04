SET FOREIGN_KEY_CHECKS=1;
use istruttori;
-- insert data records
SET autocommit=0;

INSERT INTO Istruttore (CodFisc,Nome,Cognome,DataN,Titolo,Email,Tel)
VALUES ('EEEEEE99E99E999E','Elena','Rossi','1979-09-05','Dottorato di
ricerca','nome.cognome@dominio.it',0110999999);
INSERT INTO Istruttore (CodFisc,Nome,Cognome,DataN,Titolo,Email,Tel)
VALUES ('LLLLLL99L99L999L','Luca','Bianchi','1984-10-
30','Laurea','nome.cognome@dominio.it',011099996);
INSERT INTO Istruttore (CodFisc,Nome,Cognome,DataN,Titolo,Email,Tel)
VALUES ('GGGGGG99G99G999G','Giulia','Neri','1968-10-04','Dottorato di
ricerca','nome.cognome@dominio.it',0110999998);
INSERT INTO Istruttore (CodFisc,Nome,Cognome,DataN,Titolo,Email,Tel)
VALUES ('99T99T999T','Tania','Bruni','1988-09-
01','Diploma','nome.cognome@dominio.it',0110999997);
INSERT INTO Attivita (CodA,TipoA)
VALUES ('BBPWRL','Body building');
INSERT INTO Attivita (CodA,TipoA,Nome,Livello)
VALUES ('MUSTUP','Musicale', 'Tone Up', '2');
INSERT INTO Attivita (CodA,TipoA,Nome,Livello)
VALUES ('MUSGIN','Musicale', 'Ginnastica dolce', '1');
INSERT INTO Attivita (CodA,TipoA,Nome,Livello)
VALUES ('MUSGAG','Musicale', 'GAG', '1');
INSERT INTO Attivita (CodA,TipoA)
VALUES ('MUSSPI','Cardio Fitness');
INSERT INTO Programma (CodFisc,Giorno,OraI,OraF,Sala,CodA)
VALUES ('99T99T999T','Lun','18:00:00','19:00:00','2','MUSGIN');
INSERT INTO Programma (CodFisc,Giorno,OraI,OraF,Sala,CodA)
VALUES ('99T99T999T','Mar','19:00:00','20:30:00','1','MUSTUP');
INSERT INTO Programma (CodFisc,Giorno,OraI,OraF,Sala,CodA)
VALUES ('EEEEEE99E99E999E','Mar','16:00:00','17:30:00','1','MUSTUP');