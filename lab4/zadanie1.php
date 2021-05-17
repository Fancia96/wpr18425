<?php

session_start();
$_SESSION['zmienna'] = "używam sesji w zadaniu domowym";

if (isset($_POST['osoba'])) {
    $numberOfPeople = $_POST['osoba'];
} else {
    $numberOfPeople = 0;
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>kalkulator</title>
</head>
<body>
<?php if (!$numberOfPeople) {?>
<form method="post">
    <label for="ile_osob">Wybierz dla ilu osób? </label>
    <select name="osoba">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <button type="submit">Wybierz</button>
</form>
    <?php } else {?>
    <form method="post">

        <?php for ($i = 1; $i <= $numberOfPeople; $i++) {?>
    <p>INFORMACJE DLA OSOBY NUMER <?=$i?> </p>

    <p>Imie    :<input type="text" name="person[<?=$i?>][imie]"  required></p>
    <p>Nazwisko:<input type="text" name="person[<?=$i?>][nazwisko]"  required></p>
    <p>Adres   :<input type="text" name="person[<?=$i?>][adres]"></p>
    <p>Karta   :<input type="text" name="person[<?=$i?>][karta]"  required></p>
    <p>Email   :<input type="email" name="person[<?=$i?>][email]"  required></p>
    <p>Od dnia :<input type="date" name="person[<?=$i?>][od]"  required> <label for="dodaj"> format yyyy-mm-dd </label></p>
    <p>Ile dni :<input type="text" name="person[<?=$i?>][dni]"></p>
    <p>Godzina :
    <select type="text" name="person[<?=$i?>][godzina]">
        <option value="0">0</option>
        <option value="9:00">9:00</option>
        <option value="12:00">12:00</option>
        <option value="16:00">16:00</option>
        <option value="20:00">20:00</option>
    </select>
    </p>

    <label for="dodaj">czy klimatyzacja? </label>
    <input type="checkbox" name="person[<?=$i?>][klimatyzacja]">

    <label for="dodaj">czy dostawić łózko dla dziecka? </label>
    <input type="checkbox" name="person[<?=$i?>][dziecko]">

    <label for="dodaj">czy palacz? </label>
    <input type="checkbox" name="person[<?=$i?>][palacz]">

    <p></p>
        <br><br>
        <?}?>
    <button type="submit" name="zatwierdz">Zatwierdź</button>
</form>
<?}?>

<div id="panel">
</div>
</body>

<?php

if (isset($_POST['zatwierdz'])) {

    if(empty($_POST['person'])){
        return;
    }

    foreach($_POST['person'] as $person) {

        $doc = new DOMDocument();

        $imie = $person['imie'];
        $nazwisko = $person['nazwisko'];
        $adres = $person['adres'];
        $karta = (int)$person['karta'];
        $email = $person['email'];
        $od = $person['od'];
        $dni = (int)$person['dni'];
        $godzina = $person['godzina'];

        $osoba_node = $doc->createElement("p",
            'Imię i Nazwisko: ' . $imie . ' ' . $nazwisko);
        $doc->appendChild($osoba_node);

        $adres_node = $doc->createElement("p",
            ' Adres: ' . $adres);
        $doc->appendChild($adres_node);

        $karta_node = $doc->createElement("p",
            ' Nr karty: ' . $karta . ' ');
        $doc->appendChild($karta_node);

        $email_node = $doc->createElement("p",
            ' Email: ' . $email);
        $doc->appendChild($email_node);

        if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $od)) {
            echo 'format daty sie nie zgadza';
            return;
        }

        if (!($dni > 0)) {
            echo 'liczba dni pobytu musi być większa od zera';
            return;
        }

        $dni_node = $doc->createElement("p",
            ' Pobyt od dnia: ' .
            $od . ' , zatrzymuje się dni: ' . $dni);
        $doc->appendChild($dni_node);

        if ($godzina != 0) {
            $godzina_node = $doc->createElement("p",
                ' Pojwi sie około godziny: ' . $godzina);
            $doc->appendChild($godzina_node);
        }

        $dodatkoweinformacje = false;
        $dodatkowe = " Dodatkowo $imie $nazwisko zaznaczył/a że: ";
        if (array_key_exists('klimatyzacja', $person)) {
            $dodatkoweinformacje = true;
            $dodatkowe .= " `chcę klimatyzację` ";
        }
        if (array_key_exists('dziecko', $person)) {
            $dodatkoweinformacje = true;
            $dodatkowe .= " `prosi o dostawienie łózka dla dziecka` ";
        }
        if (array_key_exists('palacz', $person)) {
            $dodatkoweinformacje = true;
            $dodatkowe .= " ` jest palaczem` ";
        }
        if ($dodatkoweinformacje) {
            $node4 = $doc->createElement("p", $dodatkowe);
            $doc->appendChild($node4);
        }


        $node6 = $doc->createElement("p",  $_SESSION['zmienna'] . session_id());
            $doc->appendChild($node6);

        $node6 = $doc->createElement("p",  $_COOKIE['ciastko'] . ' ciastko');
        $doc->appendChild($node6);

        setcookie('ciastko', 'juz bylo');

        echo $doc->saveXML();
    }
}

    ?>

</html>

