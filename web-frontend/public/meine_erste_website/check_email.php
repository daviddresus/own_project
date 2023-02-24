<?php
    session_start();

    //DATABASE connection
    $conn = new mysqli('localhost', 'website_user', 'rodrigues 1', 'registrier_daten');

	if($conn->connect_error)
    {
        die('Connection Failed  : '.$conn->connect_error);
    }
    else
	{
		$email = $_POST["email"];

		if ($check_email = $conn->prepare("
        SELECT e.email, s.frage, vn.antwort, vn.Pid
        FROM vorname_nachname vn
        JOIN email e ON e.Eid = vn.e_id
        JOIN sicherheitsfrage s ON s.Sid = vn.s_id
        WHERE email = '$email';
        "))
		{
			$check_email->execute();
            $check_email->store_result();

            if ($check_email->num_rows < 1)
            {
                $_SESSION["Error"] = TRUE;
                header("Location: anfrage_email.php");
            }
            else
            {
                $check_email->bind_result($email, $frage, $antwort, $Pid);
                $check_email->fetch();

			    $_SESSION["email"] = $email;
			    $_SESSION["frage"] = $frage;
			    $_SESSION["antwort"] = $antwort;
                $_SESSION["Pid"] = $Pid;

                $_SESSION["Error"] = FALSE;

                header("Location: passwort_aendern.php");
            }
		}
	}
?>