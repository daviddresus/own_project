<?php
    session_destroy();
    include('login.php');

    $vorname = $_POST["vorname"];
    $nachname = $_POST["nachname"];

    $email = $_POST["email"];

    $passwort = $_POST["passwort"];

    $geschlecht = $_POST["geschlecht"];

    $antwort = $_POST["antwort"];



    $session_email = $_SESSION["email"];

    $session_passwort = $_SESSION["passwort"];

    $session_vorname = $_SESSION["vorname"];

    $session_nachname = $_SESSION["nachname"];

    $session_geschlecht = $_SESSION["geschlecht"];

    $session_antwort = $_SESSION["antwort"];

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
        
        $_SESSION["Change_Data"] = FALSE;

        if ($vorname == $nachname)
        {
            $_SESSION["same_name"] = TRUE;
            header("Location: account.php");
        }
        else if ($check_email = $conn->prepare("
        SELECT email FROM email
        WHERE email = '$email'
        AND
        email NOT IN ('$session_email');
        "))
        {
            $check_email->execute();
            $check_email->store_result();
            if ($check_email->num_rows < 1)
            {
                $sqls = [
                "UPDATE email
                SET email = '$email'
                WHERE email = '$session_email';",

                "UPDATE passwort
                SET passwort = '$passwort'
                WHERE passwort = '$session_passwort';",

                "UPDATE vorname_nachname
                SET vorname = '$vorname'
                WHERE vorname = '$session_vorname';",

                "UPDATE vorname_nachname
                SET nachname = '$nachname'
                WHERE nachname = '$session_nachname';",

                "UPDATE vorname_nachname
                SET antwort = '$antwort'
                WHERE antwort = '$session_antwort';",

                "UPDATE vorname_nachname
                SET g_id = (SELECT Gid FROM geschlecht WHERE geschlecht = '$geschlecht')
                WHERE g_id = (SELECT Gid FROM geschlecht WHERE geschlecht = '$session_geschlecht');"
                ];

                foreach ($sqls as $sql)
                {
                    mysqli_query($conn, $sql);
                }
                $_SESSION["Change_Data"] = TRUE;

                if (isset($_SESSION["Change_Data"]) && $_SESSION["Change_Data"] === TRUE){
                    unset($_SESSION["locked"]);
                    unset($_SESSION["login_attempts"]);
                    unset($_SESSION["same_name"]);
                    unset($_SESSION["same_email"]);
                    header("Location: anmeldung.php");
                }
            }
            else
            {
                $_SESSION["same_email"] = TRUE;
                header("Location: account.php");
            }
        } 
    }  
?>