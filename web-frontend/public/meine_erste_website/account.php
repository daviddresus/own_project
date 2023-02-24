<?php
	session_start();

	if (!isset($_SESSION["Loggedin"])){
        header("Location: index.php");
    }

	//DATABASE connection
    $conn = new mysqli('localhost', 'website_user', 'rodrigues 1', 'registrier_daten');

	if($conn->connect_error)
    {
        die('Connection Failed  : '.$conn->connect_error);
    }
    else
	{
		$Pid = $_SESSION["Pid"];

		if ($display_data = $conn->prepare("
        SELECT vn.vorname, vn.nachname, g.geschlecht, p.passwort, e.email, s.frage, vn.antwort
        FROM vorname_nachname vn
        JOIN geschlecht g ON g.Gid = vn.g_id
        JOIN passwort p ON p.PWDid = vn.p_id
        JOIN email e ON e.Eid = vn.e_id
		JOIN sicherheitsfrage s ON s.Sid = vn.s_id
		WHERE vn.Pid = '$Pid';
        "))
		{
			$display_data->execute();
            $display_data->store_result();
			$display_data->bind_result($vorname, $nachname, $geschlecht, $passwort, $email, $frage, $antwort);
            $display_data->fetch();

			$_SESSION["email"] = $email; 
            $_SESSION["vorname"] = $vorname;
            $_SESSION["nachname"] = $nachname;
            $_SESSION["geschlecht"] = $geschlecht;
            $_SESSION["passwort"] = $passwort;
			$_SESSION["frage"] = $frage;
			$_SESSION["antwort"] = $antwort;
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
	
	</head>

<body>
	
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

			<form method="post" action="change_data.php">

				<h2>Konto:</h2>
				
				<h3>Geschlecht:</h3>
				<p>Aktuell:
					<?php 
					switch ($_SESSION["geschlecht"])
					{
						case "m";
							echo "Männlich";
						break;

						case "w";
							echo "Weiblich";
						break;

						case "d";
							echo "Divers";
						break;
					}
					?></p>
				<input type="radio" id="maennlich" name="geschlecht" value="m" required></input><label for="maennlich">Männlich</label>

				<input type="radio" id="weiblich" name="geschlecht" value="w"></input><label for="weiblich">Weiblich</label>

				<input type="radio" id="divers" name="geschlecht" value="d"></input><label for="divers">Divers</label><br>

				<h3>Vorname:</h3>

				<?php
					if (isset($_SESSION["same_name"]) && $_SESSION["same_name"] === TRUE){
						echo '<p class="error">Vorname und Nachname können nicht gleich sein!</p>';
    				}
				?>
				
				<input name="vorname" id="vorname" value="<?php echo $_SESSION["vorname"]; ?>" placeholder="Vorname" size=40 maxlength=38 required type="text" pattern="[A-Z, a-z]{2,38}"><br>

				<h3>Nachname:</h3>
				<input name="nachname" id="nachname" value="<?php echo $_SESSION["nachname"]; ?>" placeholder="Nachname" size=40 maxlength=38 required type="text" pattern="[A-Z, a-z]{2,38}"><br>

				<h3>E-Mail:</h3>

				<?php
					if (isset($_SESSION["same_email"]) && $_SESSION["same_email"] === TRUE){
						echo '<p class="error">Diese E-Mail-Adresse wird schon verwendet!</p>';
					}
				?>

				<input name="email" id="email" value="<?php echo $_SESSION["email"]; ?>" placeholder="E-Mail" size=40 maxlength=38 required type="email" pattern="[a-z, A-Z, 1-9]{1,38}[.]{0,1}[a-z, A-Z, 1-9]{1,38}@[a-z]{2,38}.[a-z]{1,3}"><br>

				<h3>Passwort:</h3>
				<input name="passwort" id="passwort" value="<?php echo $_SESSION["passwort"]; ?>" placeholder="Passwort" size=40 maxlength=38 required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&])[A-Za-z\d@#$!%*?&]{8,38}$"><br>

				<h3>Sicherheitsfrage:</h3>
				<p><?php echo $_SESSION["frage"]; ?></p>

				<h3>Antwort auf Sicherheitsfrage:</h3>
				<input name="antwort" id="antwort" value="<?php echo $_SESSION["antwort"]; ?>" placeholder="Antwort auf Sicherheitsfrage" size=40 maxlength=38 required><br>

				<input type="submit" value="Änderungen abschicken"><br>

			</form>

			<form method="post" action="session_destroy.php">

				<input class="abmelden" type="submit" value="Abmelden">

			</form>

		</div>
	
		<footer>
			
				<a class="website_fr" href="index_fr.php">FR</a>
			
				<a class="website_en" href="index_en.php">EN</a>
			
		</footer>
	
</body>
	
</html>

