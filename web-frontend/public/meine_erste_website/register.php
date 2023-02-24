<?php
    $vorname = $_POST["vorname"];
    $nachname = $_POST["nachname"];

    $email = $_POST["email"];

    $passwort = $_POST["passwort"];
    $passwort_bestätigen = $_POST["passwort_bestätigen"];

    $geschlecht = $_POST["geschlecht"];

    $sicherheitsfrage = $_POST["sicherheitsfrage"];
    $antwort = $_POST["antwort"];

    //DATABASE connection
    $conn = new mysqli('localhost', 'website_user', 'rodrigues 1', 'registrier_daten');

    //Table email
    if($conn->connect_error)
    {
        die('Connection Failed  : '.$conn->connect_error);
    }
    else
    {
        session_start();
        if ($vorname == $nachname)
        {
            $_SESSION["same_name"] = TRUE;
            header("Location: registrierung.php");
        }
        else if ($passwort != $passwort_bestätigen)
        {
            $_SESSION["different_password"] = TRUE;
            header("Location: registrierung.php");
        }
        else if ($check_double_email = $conn->prepare("
        SELECT email FROM email
        WHERE email = '$email';
        "))
        {
            $check_double_email->execute();
            $check_double_email->store_result();
            if ($check_double_email->num_rows < 1)
            {
                $sqls = [
                "insert into email(email) values('$email');",
                "insert into passwort(passwort) values('$passwort');",
                "insert into vorname_nachname(vorname, nachname, e_id, p_id, g_id, s_id, antwort) values('$vorname', '$nachname', (select Eid from email where email = '$email'), (select PWDid from passwort where passwort = '$passwort'), (select Gid from geschlecht where geschlecht = '$geschlecht'), (select Sid from sicherheitsfrage where Sid = '$sicherheitsfrage'), '$antwort');"
                ];

                foreach ($sqls as $sql)
                {
                    mysqli_query($conn, $sql);
                }
            
                $_SESSION["Registriert"] = TRUE;
                header("Location: anmeldung.php");
            }
            else
            {
                $_SESSION["same_email"] = TRUE;
                header("Location: registrierung.php");
            }
        }
    }
?>