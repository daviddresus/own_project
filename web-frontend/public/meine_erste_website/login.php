<?php
     session_start();

     $_SESSION["Error"] = FALSE;

    if (isset($_SESSION["Loggedin"]) && $_SESSION["Loggedin"] === TRUE){
        header("Location: index.php");
    }

    $hostname = "localhost";
    $username = "website_user";
    $password = "rodrigues 1";
    $dbname = "registrier_daten";
    $tablename = array("e" => "email", "g" => "geschlecht", "v" => "vorname_nachname", "p" => "passwort");

    $data = $_POST;

    $conn = new mysqli($hostname, $username, $password, $dbname);

    if($conn->connect_error)
    {
        die('Connection Failed  : '.$conn->connect_error);
    }

    if (empty($data))
    {
        die("Zuerst müssen sie sich einloggen!");
    }

    $login_email = $_POST["email"];
    $login_passwort = $_POST["passwort"];

    if (!isset($_SESSION["locked"]))
    {
        if ($abfrage = $conn->prepare("
        SELECT vn.Pid, e.email
            FROM vorname_nachname vn
            JOIN email e
                ON e.Eid=vn.e_id
            JOIN passwort p
                ON p.PWDid=vn.p_id
            JOIN geschlecht g
                ON g.Gid=vn.g_id
            WHERE (e.email = '$login_email' AND p.passwort = '$login_passwort');
        "))

        if ($account_daten = $conn->prepare("
        SELECT vn.vorname, vn.nachname, g.geschlecht, p.passwort, s.frage, vn.antwort
            FROM vorname_nachname vn
            JOIN geschlecht g 
                ON g.Gid = vn.g_id
            JOIN passwort p 
                ON p.PWDid = vn.p_id
            JOIN email e 
                ON e.Eid = vn.e_id
            JOIN sicherheitsfrage s 
                ON s.Sid = vn.s_id
            WHERE (e.email = '$login_email' AND p.passwort = '$login_passwort');
        "))
        {
            $abfrage->execute();
            $abfrage->store_result();
            $account_daten->execute();
            $account_daten->store_result();
            if ($abfrage->num_rows < 1)
            {
                $_SESSION["Error"] = TRUE;
                $_SESSION["login_attempts"] += 1;
                header("Location: anmeldung.php");
            }
            else
            {
                $abfrage->bind_result($Pid, $email);
                $abfrage->fetch();
                $account_daten->bind_result($vorname, $nachname, $geschlecht, $passwort, $frage, $antwort);
                $account_daten->fetch();
                session_regenerate_id();
                $_SESSION["Loggedin"] = TRUE; /* Logout: session_destroy(); */
                $_SESSION["Pid"] = $Pid;
                $_SESSION["email"] = $email;
            
                $_SESSION["vorname"] = $vorname;
                $_SESSION["nachname"] = $nachname;
                $_SESSION["geschlecht"] = $geschlecht;
                $_SESSION["passwort"] = $passwort;
                $_SESSION["frage"] = $frage;
                $_SESSION["antwort"] = $antwort;
                header("Location: index.php");
            }
        }
    }
    else
    {
        header("Location: anmeldung.php");
    }
?>