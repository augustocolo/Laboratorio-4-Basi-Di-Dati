	<?php
		require ("/repo/htmlphp.php");
		require ("/repo/connessione.php");
		require ("/repo/credenzialilocalhost.php");
		require ("/repo/sqlfunc.php");
		bootstrap_head("Inserisci attività");
		
		//CONNECT TO DB
		$cred = credenziali();
		$con = connessione($cred[0],$cred[1],$cred[2],$cred[3]);

		?>
<body>
        <?php
        bootstrap_header();
        bootstrap_errorBar();
        ?>
	<div class="container-fluid">
		<h1>Hello World!</h1>
		<p>Resize the browser window to see the effect.</p>
		<p>The columns will automatically stack on top of each other when the screen is less than 576px wide.</p>
		<div class="row">
			<div class="col-sm-6">
				<h3>Inserisci Attività</h3>
				<form name="form_attivita" action="update.php" method="GET">
					<div class="form-group">
						<input type="hidden" name="table" value="attivita"/>
						<label for="CodA">Codice attività: </label>
						<input type="text" class="form-control" name="CodA" required/>
						<label for="TipoA">Tipo: </label>
						<input type="text" class="form-control" name="TipoA" required/>
						<label for="Nome">Nome attività: </label>
						<input type="text" class="form-control" name="Nome"/>
						<label for="Livello">Livello: </label>
						<select class="form-control" name="Livello">
							<option value="NULL">Nessun Livello</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Invia</button>
					<button type="reset" class="btn btn-secondary">Reset</button>
				</form>
			</div>
			<div class="col-sm-6">
				<form name = "form_programma" action= "update.php" method="GET">
					<input type="hidden" name="table" value="programma"/>
					<h3>Inserisci Programmazione</h3>
					<div class="form-group">
						<label for="CodA">Codice Attività: </label>
						<select class="form-control" name="CodA" required>
						<?php
                            //QUERY ATTIVITA'
                            $sql = file_get_contents("SQL/QueryAttivita.sql"); /*potrebbe essere fatto con una procedura*/
                            $result = mysqli_query($con,$sql) or die("Bad SQL: $sql");
                            $array = queryToArray($result);
							dropdown($array,$array);
							?>
						</select>
						<label for="Giorno">Giorno:</label>
						<select name="Giorno" class="form-control" required>
							<option value="Lun">Lunedì</option>
							<option value="Mar">Martedì</option>
							<option value="Mer">Mercoledì</option>
							<option value="Gio">Giovedì</option>
							<option value="Ven">Venerdì</option>
							<option value="Sab">Sabato</option>
							<option value="Dom">Domenica</option>
						</select>
						<label for="OraI">Ora Inizio: </label>
						<input type="time" class="form-control" name="OraI" required>
						<label for="OraF">Ora Fine: </label>
						<input type="time" class="form-control" name="OraF" required>
						<label for="Sala">Sala: </label>
						<input type="text" class="form-control" name="Sala" required>
						<label for="CodFisc">Codice Fiscale: </label>
						<select name="CodFisc" class="form-control" required>
						<?php
                            //QUERY ISTRUTTORE
							$sql = file_get_contents("SQL/QueryIstruttore.sql");
							$result = mysqli_query($con,$sql) or die("Bad SQL: $sql");
							$array = queryToArray($result);
							dropdown($array,$array);
							//print_r($array);
							?>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Invia</button>
					<button type="reset" class="btn btn-secondary">Reset</button>
				</form>
			</div>
		</div>
	</div>
	</body>
</html>