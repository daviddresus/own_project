<!doctype html>

<html lang="en">
	
	<head>
	
		<meta charset="utf-8">
	
		<meta name="author" content="David Rodrigues">
		
		<meta name="description" content="Startseite">
		
		<meta name="keywords" content="Startseite, David, Rodrigues">
		
    		<title>Startseite</title>
	
    		<link href="styles.css" rel="stylesheet">
	
			<link rel="icon" href="Icon_für_website.png">
			<script type="text/javascript" src="../javascript.js"></script>
	</head>

<body>
	<button onclick="go_back()">Zurück</button>
	<header>
		
			<nav>
				
				<ul>
					<li><a href="index.php">Startseite</a></li>

					<li><a href="wer_ich_bin.php">Wer ich bin</a></li>

					<li><a href="meine_hobbies.php">Meine Hobbies</a></li>

					<li><a href="mein_wohnort.php">Mein Wohnort</a></li>

					<li><a href="meine_familie.php">Meine Familie</a></li>

					<li><a href="meine_nationalitaet.php">Meine Nationalität</a></li>
					
					<li><a href="../index.html">Klassenseite</a></li>
					
				</ul>	
				
			</nav>
	
	</header>

		<div class="text_registrieren">

			<h2>Registrieren</h2>

			<form method="post" action="register.php">

			<?php
				session_start();

				if (isset($_SESSION["same_name"]) && $_SESSION["same_name"] === TRUE){
					echo '<p class="error">Vorname und Nachname können nicht gleich sein!</p>';
    			}

				if (isset($_SESSION["same_email"]) && $_SESSION["same_email"] === TRUE){
					echo '<p class="error">Diese E-Mail-Adresse wird schon verwendet!</p>';
    			}

				if (isset($_SESSION["different_password"]) && $_SESSION["different_password"] === TRUE)
				{
					echo '<p class="error">Dein Passwort muss mit dem vom Feld "Passwort Bestätigen" übereinstimmen!</p>';
				}
				
			?>
		
				<input type="radio" id="maennlich" name="geschlecht" value="m" required></input><label for="maennlich">Männlich</label>

				<input type="radio" id="weiblich" name="geschlecht" value="w"></input><label for="weiblich">Weiblich</label>

				<input type="radio" id="divers" name="geschlecht" value="d"></input><label for="divers">Divers</label><br>


				<input name="vorname" id="vorname" placeholder="Vorname" type="text" size=40 maxlength=38 minlength="2" required type="text" pattern="[A-Z, a-z]{2,38}"><br>

				<input name="nachname" id="nachname" placeholder="Nachname" type="text" size=40 maxlength=38 minlength="2" required type="text" pattern="[A-Z, a-z]{2,38}"><br>
		
				<input name="email" id="email" placeholder="E-Mail" size=40 maxlength=38 required type="email" pattern="[a-z, A-Z, 1-9]{1,38}[.]{0,1}[a-z, A-Z, 1-9]{1,38}@[a-z]{2,38}.[a-z]{1,3}"><br>

				<input name="passwort" id="passwort" placeholder="Passwort" type="password" size=40 maxlength=38 required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&])[A-Za-z\d@#$!%*?&]{8,38}$"><br><small><i>Passwort: 1 Grossbuchstabe, 1 Kleinbuchstabe, eine Zahl, mind. 8 stellig und 1 Sonderzeichen</i></small><br>

				<input name="passwort_bestätigen" placeholder="Passwort bestätigen" type="password" size=40 maxlength=38 required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&])[A-Za-z\d@#$!%*?&]{8,38}$"><br>

				<br><select name="sicherheitsfrage" id="sicherheitsfrage" required>

						<option value="">Sicherheitsfrage auswählen</option>

  						<option value="1">Lieblings Ferienort?</option>

  						<option value="2">Lieblings Tier?</option>

  						<option value="3">Lieblings Farbe?</option>

  						<option value="4">Geburtsjahr von Mutter?</option>

						<option value="5">Geburtsjahr von Vater?</option>

						<option value="6">Lieblingsspiel?</option>
					
					</select><br>

				<input name="antwort" id="antwort" placeholder="Antwort auf Sicherheitsfrage" size=40 maxlength=38 required><br>

				<br><input type="checkbox" required> Ich bin mindestens 12 Jahre alt<br>

				<input type="submit" value="Abschicken">
		
			</form>

				<p>Schon registriert? <a href="anmeldung.php">Hier</a> drücken fürs anmelden!</p>

		</div>

	<footer>
	
		<a class="website_fr" href="index_fr.php">FR</a>
		
		<a class="website_en" href="index_en.php">EN</a>
		
	</footer>
	
</body>
	
</html>


