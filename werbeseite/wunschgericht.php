<!--
- Praktikum DBWT. Autoren:
- Tuan,Nguyen, 3517392
- Dorian,Hoevelmann, 3525346
-->
<?php
/**
 * Connect to the db
 * @return mysqli The connection to the db
 */
function db_connect() : mysqli {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "root";
    $database = "emensawerbeseite";

    return mysqli_connect($servername, $username, $password, $database,3306);
}

function valid_data(array $post):bool{
    $ename = trim($post['creator']);
    $email = trim($post['email']);

    $ename = filter_var($ename);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    //if name=""
    if ($ename == "")
        $_POST['creator'] = 'anonym';
    // break if invalid entry
    $is_valid = !((substr_count($email, '@') != 1) || (substr_count($email, '.') < 1));
    if (!$is_valid)
        return false;

    $invalid_emails = ["@trashmail", "@rcpt.at", "@damnthespam.at", "@wegwerfmail.at"];
    foreach ($invalid_emails as $invalid_word) {
        if (strpos($email, $invalid_word)) {
            $is_valid = false;
            break;
        }
    }
    if (!$is_valid)
        return false;
    return true;
}

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Wunschgericht</title>
    <meta charset="utf-8">
    <style>
        body{
            display: : grid;
            grid-template-columns: 350px auto 350px;
            gap: 10px;
            font-family: Tahoma, monospace;
            font-size: 14px;
            margin-top: 150px;
        }
        h1 {
            color: white;
            background-color: #1BB1AB;
        }
        .middle {
            background-color: #1BB1AB;
            text-align: center;
            border: 2px solid black;
        }
        .row {
            display: grid;
            grid-template-columns: 200px auto ;
        }
        input[type='text'],input[type='email']{
            line-height: 17px;
            width: 200px;
            font-size: 15px;
            border: 1px solid white;
        }
        input[type='submit'] {
            font-family: Tahoma, monospace;
            background-color: lightgrey;
        }
        textarea {
            height: 40px;
            width: 200px;
            font-size: 13px;
            border: 1px solid white;
        }
    </style>
</head>
<body>
<div class ="middle">
    <h1> Ihr Wunschgericht:</h1>
    <div class="container">
        <form action= "wunschgericht.php" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="name">Gericht Name</label>
                </div>
                <div class="col-75">
                    <input required type="text" id="name" name="name" placeholder="Name Ihres Gerichts.">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="description">Beschreibung</label>
                </div>
                <div class="col-75">
                     <textarea id="description" name="description" placeholder="Beschreibung Ihres Gerichts.."></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="creator">Ersteller/in</label>
                </div>
                <div class="col-75">
                    <input required type="text" id="creator" name="creator" placeholder="Name des/der Erstellers/in.">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="email">E-mail</label>
                </div>
                <div class="col-75">
                    <input required type="email" id="email" name="email" placeholder="example@gmail.com">
                </div>
            </div>
            <div class="row">
                    <div></div>
                    <div><input type ="submit" name ="submit" value ="Submit"></div>
            </div>
        </form>
         <?php
        $link = db_connect();

         if(isset($_POST['submit']) && valid_data($_POST)){
             $gname = mysqli_real_escape_string($link, $_POST['name']);
             $beschreibung = mysqli_real_escape_string($link, $_POST['description']);
             $ersteller = mysqli_real_escape_string($link, $_POST['creator']);
             $email = mysqli_real_escape_string($link, $_POST['email']);

             $statement_ersteller = mysqli_stmt_init($link);
             mysqli_stmt_prepare($statement_ersteller,"INSERT INTO ersteller(email, name) VALUES (?,?) ON DUPLICATE KEY UPDATE name = VALUES(name)");
             mysqli_stmt_bind_param($statement_ersteller,'ss',$email,$ersteller);
             if(mysqli_stmt_execute($statement_ersteller)){
                 echo "Ersteller/in erfolgreich hinzugefügt.";
             }else{
                 echo "ERROR:could not able to execute $statement_ersteller." . mysqli_error($link);
             }
             $id_ersteller = mysqli_insert_id($link);

             $statement_wunsch = mysqli_stmt_init($link);
             mysqli_stmt_prepare($statement_wunsch, "INSERT INTO wunschgericht(gericht_name, beschreibung, erstellerID)  SELECT ?,?, erstellerID FROM ersteller WHERE email = '$email'");
             mysqli_stmt_bind_param($statement_wunsch,'ss',$gname,$beschreibung);
             if(mysqli_stmt_execute($statement_wunsch)){
                 echo "Ihr Wunschgericht erfolgreich hinzugefügt";
             }else{
                 echo "ERROR:could not able to execute $statement_wunsch." . mysqli_error($link);
             }
             $id_wunsch = mysqli_insert_id($link);

         }
        ?>
        <form method="post" action="index.php">
            <div class="row">
                <div></div>
                <div><input type="submit" name="" value="Return to Main Page"></div>
                <br>
            </div>
        </form>
    </div>

</div>


</body>

</html>