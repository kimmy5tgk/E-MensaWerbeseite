<!--
- Praktikum DBWT. Autoren:
- Tuan,Nguyen, 3517392
- Dorian,Hoevelmann, 3525346
-->
<?php
date_default_timezone_set('Europe/Berlin');
$date = date('Y-m-d G:i:s');

$mail = "admin@emensa.example" ;
$pass = "$2y$04$"."WbuRTYmSaNSArvAmI2JlS.WEDeYCduc8FdD0vXnX6AQIFa2aVtRyK";

$link = mysqli_connect("localhost:3306","root","root","emensawerbeseite");
if (!$link) {
    echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
    exit();
}

$sql = "SELECT email, passwort FROM benutzer WHERE email = '$mail'";
mysqli_begin_transaction($link);
$result = mysqli_query($link, $sql);

if (!$result) {
    echo "Fehler während der Abfrage:  ", mysqli_error($link);
    exit();
}
mysqli_commit($link);

while($row = mysqli_fetch_assoc($result)){
    $check_email = $row['email'];
    $check_password = $row['password'];

    if($mail == $check_email && $pass == $check_password){
        $sql2 = "UPDATE benutzer SET anzahlanmeldung = anzahlanmeldung + 1 AND letzeanmeldung = '$date' WHERE email ='$check_email'" ;
        mysqli_begin_transaction($link);
        $result2 = mysqli_query($link,$sql2);
        if (!$result2) {
            echo "Fehler während der Abfrage:  ", mysqli_error($link);
            exit();
        }

        mysqli_commit($link);
        mysqli_free_result($result2);
        header("Location:/home_session?user=$mail");
    }elseif ($mail == $check_email){
        $sql3 = "UPDATE benutzer SET letzterfehler ='$date' AND anzahlfehler = anzahlfehler + 1 WHERE email = '$mail'";
        mysqli_begin_transaction($link);
        $result3 = mysqli_query($link,$sql3);

        if (!$result3) {
            echo "Fehler während der Abfrage:  ", mysqli_error($link);
            exit();
        }

        mysqli_commit($link);
        mysqli_free_result($result3);
        header("Location:/anmeldung?submit=fail");
    }else
        header("Location:/anmeldung?submit=fail");
}

mysqli_free_result($result);
mysqli_close($link);
