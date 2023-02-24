<?php
session_start();

if (isset($_SESSION["locked"]))
{
    $difference = time() - $_SESSION["locked"];
    if ($difference > 15)
    {
        unset($_SESSION["locked"]);
        unset($_SESSION["login_attempts"]);
    }
}
?>
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

			<h2>Anmeldung</h2>
	
			<form method="post" action="login.php">
	
				<?php
				if (isset($_SESSION["Error"]) && $_SESSION["Error"] === TRUE && isset($_SESSION["login_attempts"]) && $_SESSION["login_attempts"] < 3)
				{
					echo '<p class="error">Falsches Passwort oder E-mail!</p>';
				}

				if (isset($_SESSION["login_attempts"]) && $_SESSION["login_attempts"] > 2)
				{
    				$_SESSION["locked"] = time();
    				echo '<p class="error">Zu viele fehlerhafte Versuche! Bitte warten Sie 15 Sekunden!</p>';
				}

				if (isset($_SESSION["Registriert"]) && $_SESSION["Registriert"] === TRUE && isset($_SESSION["Error"]) && $_SESSION["Error"] === FALSE)
				{
    				echo '<p class="update">Ihre Daten wurden gespeichert! Melden Sie sich an:</p>';
				}

				if (isset($_SESSION["Change_Data"]) && $_SESSION["Change_Data"] === TRUE && $_SESSION["Error"] === FALSE || isset($_SESSION["Change_Password"]) && $_SESSION["Change_Password"] === FALSE)
				{
					echo '<p class="update">Ihre Daten wurden gespeichert! Melden Sie sich an:</p>';
				}

				if (isset($_SESSION["Change_Password"]) && $_SESSION["Change_Password"] === TRUE && $_SESSION["Error"] === FALSE)
				{
					echo '<p class="update">Ihr Passwort wurde Geändert!</p>';
				}
				?>

				<input name="email" id="email" placeholder="E-Mail" size=40 maxlength=38 required type="email"><br>

				<input name="passwort" id="passwort" placeholder="Passwort" type="password" size=40 maxlength=38 required><br>

				<input type="submit" value="Abschicken"><br>

				
			</form>
			
				<a href="anfrage_email.php" class="reset_password">Passwort vergessen?</a>

				<p>Noch nicht registriert? <a href="registrierung.php">Hier</a> drücken fürs registrieren!</p>

		</div>

	<footer>
	
		<a class="website_fr" href="index_fr.php">FR</a>
	
		<a class="website_en" href="index_en.php">EN</a>
	
	</footer>
	
</body>
	
</html>