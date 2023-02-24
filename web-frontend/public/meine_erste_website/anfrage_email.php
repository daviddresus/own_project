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

            <p>Schritt 1</p>

            <p>Bitte geben Sie hier Ihre E-Mail adresse</p>

			<form method="post" action="check_email.php">
            
            <?php
	            session_start();

                if (isset($_SESSION["Error"]) && $_SESSION["Error"] === TRUE)
				{
					echo '<p class="error">Diese E-Mail existiert bei dieser Website nicht!</p>';
				}
            ?>
		
				<input name="email" id="email" placeholder="E-Mail" size=40 maxlength=38 required type="email" pattern="[a-z, A-Z, 1-9]{1,38}[.]{0,1}[a-z, A-Z, 1-9]{1,38}@[a-z]{2,38}.[a-z]{1,3}"><br>

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