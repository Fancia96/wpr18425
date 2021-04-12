<html>
<head>
    <meta charset="utf-8">
    <title>kalkulator</title>
</head>
<body>
<form method="post">
    //jeszcze zobaczem

    <label for="ile_osob">Ile osób? </label>
    <select name="osoba">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>

    <p></p>

    <p>Imie    :<input type="text" name="imie"  required></p>
    <p>Nazwisko:<input type="text" name="nazwisko"  required></p>
    <p>Adres   :<input type="text" name="adres"></p>
    <p>Karta   :<input type="text" name="karta"  required></p>
    <p>Email   :<input type="email" name="email"  required></p>
    <p>Od dnia :<input type="date" name="od"  required> <label for="dodaj"> format yyyy-mm-dd </label></p>
    <p>Ile dni :<input type="text" name="dni"></p>
    <p>Godzina :
    <select type="text" name="godzina">
        <option value="0">0</option>
        <option value="9:00">9:00</option>
        <option value="12:00">12:00</option>
        <option value="16:00">16:00</option>
        <option value="20:00">20:00</option>
    </select>
    </p>

    <label for="dodaj">czy klimatyzacja? </label>
    <input type="checkbox" name="klimatyzacja">

    <label for="dodaj">czy dostawić łózko dla dziecka? </label>
    <input type="checkbox" name="dziecko">

    <label for="dodaj">czy palacz? </label>
    <input type="checkbox" name="palacz">

    <p></p>
    <button type="submit" name="zatwierdz">Zatwierdź</button>
</form>

<div id="panel">
</div>
</body>

<?php


if (isset($_POST['zatwierdz'])) {


    $doc = new DOMDocument();

    $os = $_POST['osoba'];

    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $adres = $_POST['adres'];
    $karta = (int)$_POST['karta'];
    $email = $_POST['email'];
    $od = $_POST['od'];
    $dni = (int)$_POST['dni'];
    $godzina = $_POST['godzina'];

    $osoba_node = $doc->createElement("h3",
        'Dane osoby nr ' . $os );
    $doc->appendChild($osoba_node);

    $osoba_node = $doc->createElement("p",
        'Imię i Nazwisko: ' . $imie . ' ' . $nazwisko );
    $doc->appendChild($osoba_node);

    $adres_node = $doc->createElement("p",
        ' Adres: ' . $adres  );
    $doc->appendChild($adres_node);

    $karta_node = $doc->createElement("p",
        ' Nr karty: ' . $karta . ' ' );
    $doc->appendChild($karta_node);

    $email_node = $doc->createElement("p",
        ' Email: ' . $email );
    $doc->appendChild($email_node);

    if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$od)) {
        echo 'format daty sie nie zgadza';
        return;
    }

    if(!($dni > 0)){
        echo 'liczba dni pobytu musi być większa od zera';
        return;
    }

    $dni_node = $doc->createElement("p",
        ' Pobyt od dnia: ' .
        $od . ' , zatrzymuje się dni: ' . $dni );
    $doc->appendChild($dni_node);

    if($godzina != 0) {
        $godzina_node = $doc->createElement("p",
            ' Pojwi sie około godziny: ' . $godzina);
        $doc->appendChild($godzina_node);
    }

    $dodatkoweinformacje = false;
    $dodatkowe = " Dodatkowo $imie $nazwisko zaznaczył/a że: ";
    if (array_key_exists('klimatyzacja', $_POST)) {
        $dodatkoweinformacje = true;
        $dodatkowe .= " `chcę klimatyzację` ";
    }
    if (array_key_exists('dziecko', $_POST)) {
        $dodatkoweinformacje = true;
        $dodatkowe .= " `prosi o dostawienie łózka dla dziecka` ";
    }
    if (array_key_exists('palacz', $_POST)) {
        $dodatkoweinformacje = true;
        $dodatkowe .= " ` jest palaczem` ";
    }
    if ($dodatkoweinformacje) {
        $node4 = $doc->createElement("p", $dodatkowe);
        $doc->appendChild($node4);
    }

    echo $doc->saveXML();
}

    ?>

</html>

