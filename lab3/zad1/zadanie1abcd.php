<html>
<head>
    <meta charset="utf-8">
    <title>kalkulator</title>
</head>
<body>
<form method="post" attribute="post">
    <p>Pierwsza liczba:<input type="text" id="pierwsza" name="pierwsza"></p>
    <p>Druga liczba:<input type="text" id="druga" name="druga"></p>

    <label for="dodaj">dodaj: </label>
    <input type="radio" name="group1" value="dodaj" checked="true">

    <label for="odejmij">odejmij: </label>
    <input type="radio" name="group1" value="odejmij">

    <label for="pomnoz">pomnoz: </label>
    <input type="radio" name="group1" value="pomnoz">

    <label for="podziel">podziel: </label>
    <input type="radio" name="group1" value="podziel">

    <p></p>
    <button name="przelicz" id="answer" value="answer">Przelicz</button>
</form>
</body>

<?php
include 'dzialania.php';

if (isset($_POST['przelicz'])) {

    $wynik = 0;
    $pierwsza = (int)$_POST['pierwsza'];
    $druga = (int)$_POST['druga'];

    $dzialanie = "";

    $answer = $_POST['group1'];
    switch($answer){
        case "dodaj":
            $dzialanie = '+';
            $wynik = dodawanie($pierwsza, $druga);
            break;
        case "odejmij":
            $dzialanie = '-';
            $wynik = odejmowanie($pierwsza, $druga);
            break;
        case "pomnoz":
            $dzialanie = '*';
            $wynik = mnozenie($pierwsza, $druga);
            break;
        case "podziel":
            $dzialanie = '/';
            $wynik = dzielenie($pierwsza, $druga);
            break;
    }

    echo ' Dla działania ' . $pierwsza . '' . $dzialanie .'' . $druga .', Wynik = ' . $wynik;
}
    ?>

</html>

