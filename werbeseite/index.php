<!DOCTYPE html>
<!--
- Praktikum DBWT. Autoren:
- Tuan,Nguyen, 3517392
- Dorian,Hoevelmann, 3525346
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ihre E-Mensa</title>
<<<<<<<< HEAD:werbeseite/index.html
  <style>
    /*Begin header*/
    #quickLinks{
      display: grid;
      grid-template-columns: 100px 150px 100px 100px 100px 100px;
      padding-bottom: 15px;
      border-bottom: 1px solid black;
    }
    #quickLinks>a.logoimg{
      border: 1px solid black;
      padding-left: 8px;
      padding-top: 5px;
    }
    #quickLinks>a.announcements{
      margin-left: 10px;
    }
    #quickLinks>a:not(:nth-child(1)){
      padding-left: 20px;
      margin-top: 60px;
      padding-top: 20px;
      border-top: 1px solid black;
      border-bottom: 1px solid black;
      font-style: italic;
    }
    #quickLinks>a:nth-child(2) {
    border-left: 1px solid black;
    }
    #quickLinks>a:nth-child(6) {
      border-right: 1px solid black;
      padding-right: 150px;
      width: 100px;
    }
    /*Begin body*/
    h1{
      font-size: x-large;
    }
    #filler{
      margin-top: 10px;
      margin-left: 200px;
    }
    #announcementsMain{
      margin-top: 10px;
      margin-left: 200px;
      margin-right: 200px;
    }
    #announcementsMain>p.announcementText{
      border: 1px solid black;
      padding: 15px;
    }
    #mealsMain{
      margin-top: 10px;
      margin-left: 200px;
      margin-right: 200px;
    }
    #mealsMain>table, th, td{
      border: 1px solid black;
    }
    #numbersMain{
      margin-top: 10px;
      margin-left: 200px;
      margin-right: 200px;
      margin-bottom: 30px;
    }
    #numbersMain>ul.zahlenList{
      display: grid;
      list-style-type: none;
      grid-template-columns: 20px auto 20px auto 20px auto;
    }
    #contactMain{
      margin-top: 10px;
      margin-left: 200px;
      margin-right: 200px;
    }
    /*to do!*/
    .contactForm p  {
      position: relative;
      height: 40px;
      margin-top: 20px;
      margin-bottom: 10px;
    }
    .contactForm label {
      position: absolute;
      top: -25px;
      left: 5px;
      background-color: white;
    }
    #importantMain {
      margin-top: 10px;
      margin-left: 200px;
      margin-right: 200px;}
    #importantMain>ul.importantList{
      padding-left: 150px;
    }
    #notQuiteFooter{
      text-align: center;
      padding-bottom: 10px;
      border-bottom: 1px solid black;
    }
    /*begin footer*/
    .unten {
      margin-left: 3%;
      margin-right: 3%;
      columns: 3;
      list-style-type: none;
      text-align: center;
    }
    .unten>li:not(:nth-child(1)){
      border-left: 1px solid black;
    }
  </style>
========
    <link rel="stylesheet" type="text/css" href="index_stylesheet.css" >
>>>>>>>> 590431b (Second commit):werbeseite/index.php
</head>
<body>
<?php
echo "Test";
?>
<!--begin header-->
<!--to do: Links!-->
  <div id="quickLinks">
    <a class="logoimg">
      <img src="MensaLogo.png" height="100" alt="Logo">
    </a>
    <a class="announcements" href="#announcementsMain">
      Ankündigungen
    </a>
    <a class="meals" href="#mealsMain">
      Speisen
    </a>
    <a class="numbers" href="#numbersMain">
      Zahlen
    </a>
    <a class="contact" href="#contactMain">
      Kontakt
    </a>
    <a class="important" href="#importantMain">
      Wichtig für uns
    </a>
    </div>
<!--begin body-->
<div id="filler">
  <p class="randMensa">
    <img src="mensa.jpg" height="275" alt="Mensa Bild">
  </p>
</div>
<div id="announcementsMain">
  <h1>Bald gibt es Essen auch online ;)</h1>
  <p class="announcementText">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dignissim ultricies turpis, at efficitur justo tempor a. Maecenas porta eget lectus id molestie. Ut aliquet mattis est, nec vehicula mauris maximus ac. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean interdum nunc ut diam bibendum aliquam. Nullam congue erat eget luctus viverra. Sed vulputate tellus et placerat sodales. Maecenas nec aliquet odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacinia placerat mi quis vestibulum. Suspendisse laoreet neque in porttitor blandit. Integer non blandit nibh. Morbi consectetur, nibh eget volutpat sodales, leo dolor mattis massa, id porttitor massa est a ante.
  </p>
</div>
<div id="mealsMain">
  <h1>Köstlichkeiten, die Sie erwarten</h1>
  <table class="mealTable">
    <tr>
      <th>Bild</th>
      <th>Beschreibung</th>
      <th>Preis intern</th>
      <th>Preis extern</th>
    </tr>
      <?php
      $file = fopen('Gerichte.txt', 'r');
          while (!feof($file)) {
              $gerichte = fgets($file);
              if (!empty($gerichte)) {
                  $gerichtelemente = explode('; ', $gerichte);
                  echo '<tr>';
                  foreach ($gerichtelemente as $key => $gerichtelement) {
                      if ($key === 0)
                          echo '<td><img alt="Meal_Picture" width="200px" src="./img/' . htmlspecialchars($gerichtelement) . ' "></td>';
                      else
                          echo '<td>' . htmlspecialchars($gerichtelement) . '</td>';
                  }
                  echo '</tr>';
              }
          }
      fclose($file);
      ?>
</table>
</div>
<div id="numbersMain">
  <h1>E-Mensa in Zahlen</h1>
  <ul class="zahlenList">
    <li>X</li>
    <li>Besuche</li>
    <li>Y</li>
    <li>Anmeldungen zum Newsletter</li>
    <li>Z</li>
    <li>Speisen</li>
  </ul>
</div>
<div id="contactMain">
  <h1>Interesse geweckt? Wir informieren Sie!</h1>
  <form method="post" class="contactForm">
    <fieldset>
        <p> <label for="name">Ihr Name:</label>
           <input type="text" id="name" name="name" placeholder="Vorname" required>
        </p>
        <p><label for="email">Ihre E-Mail</label>
            <input type="text" id="email" name="email" placeholder="E-Mail" required>
        </p>
        <p>
          <label for="lang">Newsletter bitte in:</label>
          <select id="lang" name="language">
            <option value="de">Deutsch</option>
            <option value="en">English</option>
            <option value="af">Afrikaans</option>
          </select>
        </p>
       <p>
         <label for="dsgvo">Den Datenschutzhinweise Stimme ich zu</label>
         <input type="checkbox" id="dsgvo">
       </p>
        <input type="submit" value="Zum Newsletter anmelden">
    </fieldset>
      <?php
      $invalid_emails = [
          1 => 'rcpt.at',
          2 => 'damnthespam.at',
          3 => 'wegwerfmail.de',
          4 => 'trashmail.'
      ];
      $file = fopen("Anmeldungsdaten.txt", "a");

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          if (isset($_POST)) {
              $errors = [];
              if(empty(trim($_POST['name'])))
                  $errors[] = 'Bitte geben Sie einen Namen ein!';
              if(empty($_POST['email']))
                  $errors[] = 'Bitte geben Sie eine gültige Email ein!';
              else
                  if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                      $errors[] = 'Bitte geben Sie eine gültige Email ein!';
              for($i = 0; $i < count($invalid_emails);$i++){
                  $invalid = strstr($_POST['email'],$invalid_emails[$i+1]);
                  if($invalid)
                      $errors[] = 'Bitte geben Sie eine gültige Email ein!';
              }
              if(empty($errors)){
                  echo  '<div class="success"> Vielen Danke. Sie haben sich erfolgreich zum Newsletter angemeldet.</div>';
                  fwrite($file,$_POST['name'].';'.$_POST['email'].';'. $_POST['language'] . "\n");
              }else{
                  echo '<div class="error"> <ul>';
                  foreach ($errors as $error)
                      echo '<li>'. htmlspecialchars($error).'</li>';
                  echo '</ul> </div>';
              }
          }
      }
      fclose($file);
      ?>
  </form>
</div>
<div id="importantMain">
  <h1>Das ist uns wichtig</h1>
  <ul class="importantList">
    <li>Beste frische saisonale Zutaten</li>
    <li>Ausgewogene abwechslungsreiche Gerichte</li>
    <li>Sauberkeit</li>
  </ul>
</div>
<div id="notQuiteFooter">
  <h1>Wir freuen uns auf Ihren Besuch!</h1>
</div>