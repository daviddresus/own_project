<!doctype html>

<html lang="en">
	
	<head>
	
		<meta charset="utf-8">
	
		<meta name="author" content="David Rodrigues">
		
		<meta name="description" content="Home page">
		
		<meta name="keywords" content="Home page, David, Rodrigues">
		
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

					<li><a href="wer_ich_bin_en.php">Who I am</a></li>

					<li><a href="meine_hobbies_en.php">My hobbies</a></li>

					<li><a href="mein_wohnort_en.php">Where I live</a></li>

					<li><a href="meine_familie_en.php">My family</a></li>

					<li><a href="meine_nationalitaet_en.php">My nationality</a></li>
					
					<li><a href="../index.html">Class page</a></li>

					<div class="login_teil">

						<?php
							session_start();

							if (isset($_SESSION["Loggedin"]) && $_SESSION["Loggedin"] === TRUE){
								echo '<li><a href="account.php"><img src="profile_icon.png" alt="Bild von user"></a></li>';
							}
							else
							{
								echo '<li><a href="anmeldung.php">Log in</a></li>';

								echo '<li><a href="registrierung.php">Register</a></li>';
							}
						?>

					</div>
					
				</ul>	
				
			</nav>
	
	</header> 
	
			<div class="text_startseite">
		
				<h2>Hello and welcome to my website about me!</h2>
		
					<p>My name is David Rodrigues, which you may have noticed at the top left of my website.</p>
		
					<p>On this page I will only give short information about the website and about my project.</p>
				
				<h3>About the project:</h3>
				
					<p>We had a project to create a website about us. The goal was that we could create something ourselves with:</p>
				
					<p>HTML (for structuring a website)</p>
				
					<p>CSS (Computer language. Used with HTML for formatting the website).</p>
			
				<h3>Information about the website:</h3>
				
					<p>Above you see different titles that you can click to go to the other pages. Below is a 'link' you can click to go to the website of the software I used for the website</p>
			</div>
	
		<footer>
			
				<p class="copy_right">Copyright © 2022</p>
			
				<a class="website_fr" href="index_fr.php">FR</a>
			
				<a class="website_de" href="index.php">DE</a>
			
		</footer>
	
</body>
	
</html>


