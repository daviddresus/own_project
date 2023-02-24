<?php
    $antwort = $_POST["antwort"];
    $neues_passwort = $_POST["neues_passwort"];

    session_start();

    $_SESSION["Error"] = FALSE;

    $email = $_SESSION["email"];
    $Pid = $_SESSION["Pid"];

    //DATABASE connection
    $conn = new mysqli('localhost', 'website_user', 'rodrigues 1', 'registrier_daten');

    //Table email
    if($conn->connect_error)
    {
        die('Connection Failed  : '.$conn->connect_error);
    }
    else
    {
        if ($check_data = $conn->prepare("
        SELECT antwort FROM vorname_nachname WHERE antwort = '$antwort' AND Pid = '$Pid';
        "))
        {
            $check_data->execute();
            $check_data->store_result();
            if ($check_data->num_rows < 1)
            {
                $_SESSION["Error"] = TRUE;
                header("Location: passwort_aendern.php");
            }
            else
            {
                $sqls = ["
                    UPDATE passwort
                    SET passwort = '$neues_passwort'
                    WHERE PWDid IN (SELECT p_id FROM vorname_nachname WHERE e_id IN (SELECT Eid FROM email WHERE email = '$email'));
                "];

                foreach ($sqls as $sql)
                {
                    mysqli_query($conn, $sql);
                }

                $_SESSION["Change_Password"] = TRUE;
                header("Location: anmeldung.php");
            }
        } 
    } 
?>