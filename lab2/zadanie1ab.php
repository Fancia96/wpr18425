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


if (isset($_POST['przelicz'])) {

    $wynik = 0;
    $pierwsza = (int)$_POST['pierwsza'];
    $druga = (int)$_POST['druga'];

    $dzialanie = "";

    $answer = $_POST['group1'];
    if ($answer == "dodaj") {
        $dzialanie = '+';
        $wynik = $pierwsza + $druga;
    }
    else if($answer == "odejmij"){
        $dzialanie = '-';
        $wynik = $pierwsza - $druga;
    }
    else if($answer == "pomnoz"){
        $dzialanie = '*';
        $wynik = $pierwsza * $druga;
    }
    else if($answer == "podziel"){
        $dzialanie = '/';
        if($druga == 0){
            echo 'Nie mozna dzielić przez zero! ';
        }
        else{
            $wynik = $pierwsza / $druga;
        }
    }

    echo ' Dla działania ' . $pierwsza . '' . $dzialanie .'' . $druga .', Wynik = ' . $wynik;
}
    ?>

</html>

