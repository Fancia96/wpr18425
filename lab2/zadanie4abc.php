<html>
<head>
    <meta charset="utf-8">
    <title>kalkulator</title>
</head>
<body>
<form method="post" attribute="post">
    <p> Liczba:<input type="text" id="liczba" name="liczba"></p>
    <p></p>
    <button name="sprawdz" id="answer" value="answer">Sprawdz</button>
</form>
</body>

<?php


if (isset($_POST['sprawdz'])) {

    $liczba = (int)$_POST['liczba'];
    $pierwsza = true;

    $iteracja = 0;


       if ($liczba < 1) {
         echo 'Liczba nawet nie jest większa od 1. ';
           $pierwsza = false;
       } elseif ($liczba == 1) {
           $pierwsza = false;
       } else {
           //ok tu szukam czy ma jakiś dzielnik zaczynajac od 2
         for ($i = 2; $i < $liczba; $i++) {
           if ($pierwsza) {
             if ($liczba % $i == 0) {
              $pierwsza = false;
              break;
             }
           }
             $iteracja++;
         }
      }
      if ($pierwsza) {
        echo  $liczba . ' jest liczbą pierwszą. iteracji:' . $iteracja;
      } else {
          echo  $liczba . ' nie jest liczbą pierwszą. iteracji:' . $iteracja;
      }
}

    ?>

</html>

