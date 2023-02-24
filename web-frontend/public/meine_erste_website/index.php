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

					<li><a href="wer_ich_bin.php">Wer ich bin</a></li>

					<li><a href="meine_hobbies.php">Meine Hobbies</a></li>

					<li><a href="mein_wohnort.php">Mein Wohnort</a></li>

					<li><a href="meine_familie.php">Meine Familie</a></li>

					<li><a href="meine_nationalitaet.php">Meine Nationalität</a></li>
					
					<li><a href="../index.html">Klassenseite</a></li>

					<div class="login_teil">

						<?php
							session_start();

							if (isset($_SESSION["Loggedin"]) && $_SESSION["Loggedin"] === TRUE){
								echo '<li><a href="account.php"><img src="profile_icon.png" alt="Bild von user"></a></li>';
							}
							else
							{
								echo '<li><a href="anmeldung.php">Anmelden</a></li>';

								echo '<li><a href="registrierung.php">Registrieren</a></li>';
							}
						?>

					</div>
				
				</ul>

			</nav>

			
	
	</header> 
	
			<div class="text_startseite">
		
				<h2>Hallo und herzlich Willkommen zu meiner Website über mich!</h2>
		
					<p>Mein Name ist David Rodrigues, welches sie vielleicht schon bemerkt haben oben Links bei meiner Website.</p>
		
					<p>Bei dieser Seite werde ich nur kurze Infos mitteilen über Die Website und über mein Projekt.</p>
				
				<h3>Zum Projekt:</h3>
				
					<p>Wir hatten als Projekt, eine Website zu erstellen über uns. Ziel dabei war es, dass wir selbst etwas erstellen könnten, mit:</p>
				
					<p>HTML (fürs Strukturieren einer Website)</p>
				
					<p>CSS (Computersprache. Wird mit HTML benutzt und dient für die Formatierung der Website).</p>
			
				<h3>Infos zur Website:</h3>
				
					<p>Oben sieht ihr verschiedene Titeln, die ihr anklicken könnt, um zu denn anderen Seiten zu gehen. Unten steht ein 'Link' welches sie klicken können, um zu der Webseite vom Software zu gehen, welches ich benutzt habe für die Website.</p>
			</div>
	
		<footer>
			
				<p class="copy_right">Copyright © 2022</p>
			
				<a class="website_fr" href="index_fr.php">FR</a>
			
				<a class="website_en" href="index_en.php">EN</a>
			
		</footer>
	
</body>
	
</html>


