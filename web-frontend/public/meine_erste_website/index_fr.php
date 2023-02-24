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

					<li><a href="wer_ich_bin_fr.php">Qui suis-je</a></li>

					<li><a href="meine_hobbies_fr.php">Mes loisirs</a></li>

					<li><a href="mein_wohnort_fr.php">Où je vis</a></li>

					<li><a href="meine_familie_fr.php">Ma famille</a></li>

					<li><a href="meine_nationalitaet_fr.php">Ma nationalité</a></li>
					
					<li><a href="../index.html">Page de classe</a></li>

					<div class="login_teil">

						<?php
							session_start();

							if (isset($_SESSION["Loggedin"]) && $_SESSION["Loggedin"] === TRUE){
								echo '<li><a href="account.php"><img src="profile_icon.png" alt="Bild von user"></a></li>';
							}
							else
							{
								echo '<li><a href="anmeldung.php">Inscriver</a></li>';

								echo '<li><a href="registrierung.php">Enregistrer</a></li>';
							}
						?>

					</div>
					
				</ul>	
				
			</nav>
	
	</header> 
	
			<div class="text_startseite">
		
				<h2>Bonjour et bienvenue sur mon site à propos de moi !</h2>
		
					<p>Mein Name ist David Rodrigues, welches sie vielleicht schon bemerkt haben oben Links bei meiner Website.</p>
		
					<p>Je m'appelle David Rodrigues, ce que vous avez peut-être remarqué dans les liens en haut de mon site Web.</p>
				
				<h3>À propos du projet:</h3>
				
					<p>Nous avions le projet de créer un site web sur nous. Le but était que nous puissions créer quelque chose nous-mêmes avec:</p>
				
					<p>HTML (pour structurer un site Web)</p>
				
					<p>CSS (Langage informatique. Utilisé avec HTML pour la mise en forme du site Web).</p>
			
				<h3>Informations sur le site:</h3>
				
					<p>Ci-dessus, vous voyez différents titres sur lesquels vous pouvez cliquer pour accéder aux autres pages. Vous trouverez ci-dessous un « lien » sur lequel vous pouvez cliquer pour accéder au site Web du logiciel que j'ai utilisé pour le site Web.</p>
			</div>
	
		<footer>
			
				<p class="copy_right">Copyright © 2022</p>
			
				<a class="website_en_beim_fr" href="index_en.php">EN</a>
			
				<a class="website_de_beim_fr" href="index.php">DE</a>
			
		</footer>
	
</body>
	
</html>


