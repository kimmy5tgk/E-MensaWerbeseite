<!--
- Praktikum DBWT. Autoren:
- Tuan,Nguyen, 3517392
- Dorian,Hoevelmann, 3525346
-->
<!DOCTYPE html>
<html lang="de">
<head>
    <title>{{$title}}</title>
<meta charset="utf-8">

</head>
<body>
<div></div>
<div>
    <h1>Anmeldung</h1>
    <h3>Email : admin@emensa.example and hashed salted pass :$2y$04$WbuRTYmSaNSArvAmI2JlS.WEDeYCduc8FdD0vXnX6AQIFa2aVtRyK</h3>
    <div class="container">
        <form action="anmeldung_verifizieren" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="email">E-mail</label>
                </div>
                <div class="col-75">
                    <input required type="email" id="email" name="email" placeholder="example@gmail.com" autocomplete="off">
                </div>
                <br>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="password">Password</label>
                </div>
                <div class="col-75">
                    <input required type="password" id="password" name="password" autocomplete="off">
                </div>
                <br>
            </div>
            <div class="row">
                <div></div>
                <div><input type="submit" name="submit" value="Anmelden"></div>
                <div></div>
                <div class="col-75">
                    <?php
                    if ($_GET['submit'] == 'fail')
                        echo 'Email oder Passwort ist nicht korrekt!';
                    ?>
                </div>
            </div>
        </form>
        <form method="post" action="index">
            <div class="row">
                <div></div>
                <div><input type="submit" name="" value="Return to Main Page"></div>
                <br>
            </div>
        </form>
    </div>
</div>
<div class="right"></div>
</body>
</html>
