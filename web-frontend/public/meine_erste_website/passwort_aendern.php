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

			<h2>Passwort Zurücksetzen</h2>

			<p>Schritt 2</p>

            <p>Bitte Beantworten Sie die Folgende Sicherheitsfrage mit der Antwort, die Sie für diese Frage eingegeben haben:</p>

			<form method="post" action="change_password.php">
            
            <?php
	            session_start();

                if (isset($_SESSION["Error"]) && $_SESSION["Error"] === TRUE)
				{
					echo '<p class="error">Die Daten, die Sie eingegeben haben, stimmen nicht überein!</p>';
				}
            ?>

				<p><?php echo $_SESSION["frage"]?></p>

				<input name="antwort" id="antwort" placeholder="Antwort auf Sicherheitsfrage" size=40 maxlength=38 required><br>

				<input name="neues_passwort" id="neues_passwort" placeholder="Neues Passwort" type="password" size=40 maxlength=38 required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&])[A-Za-z\d@#$!%*?&]{8,38}$"><br><small><i>Passwort: 1 Grossbuchstabe, 1 Kleinbuchstabe, eine Zahl, mind. 8 stellig und 1 Sonderzeichen</i></small><br>

				<input type="submit" value="Abschicken">
		
			</form>

                <p class="reset_password">Zurück zur <a href="anmeldung.php">Anmeldung</a></p>

		</div>

	<footer>
	
		<a class="website_fr" href="index_fr.php">FR</a>
		
		<a class="website_en" href="index_en.php">EN</a>
		
	</footer>
	
</body>
	
</html>