<html>
<head>
    <meta charset="utf-8">
    <title>kalkulator</title>
</head>
<body>
<form method="post">

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
<form method="post">
    <button type="submit" name="wczytaj">Wczytaj</button>
</form>

<div id="panel">
</div>
</body>

<?php


if (isset($_POST['zatwierdz'])) {

//dopisz do pliku
    $append = "\n";

    $os = $_POST['osoba'];

    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $adres = $_POST['adres'];
    $karta = (int)$_POST['karta'];
    $email = $_POST['email'];
    $od = $_POST['od'];
    $godzina = $_POST['godzina'];

    //$append .= $os . ';';

    $append .=  $imie . ' ' . $nazwisko . ';';

    $append .= $adres . ';';

    $append .= $karta . ';';

    $append .= $email . ';';;

    if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$od)) {
        echo 'format daty sie nie zgadza';
        return;
    }

    $append .= $od . ';';

    $append .=  $godzina . ';';

    $dodatkoweinformacje = false;
    $dodatkowe = " Dodatkowo $imie $nazwisko zaznaczył/a że: ";
    if (array_key_exists('klimatyzacja', $_POST)) {
        $append .= "true" . ';';;
    }
    else{
        $append .= "false" . ';';;
    }
    if (array_key_exists('dziecko', $_POST)) {
        $append .= "true" . ';';;
    }
    else{
        $append .= "false" . ';';;
    }
    if (array_key_exists('palacz', $_POST)) {
        $append .= "true" . ';';;
    }
    else{
        $append .= "false" . ';';;
    }

    $myfile = fopen("csv", "a");

    fwrite($myfile, "" . $append );
    fclose($myfile);

}
else if(isset($_POST['wczytaj'])){

    $file = fopen("csv", "r");
    if ($file) {
        $zmienna_liczaca = 1;
        while (($line = fgets($file)) !== false) {

            if(!str_starts_with($line,'Imię i Nazwisko')) {

                $doc = new DOMDocument();
                //$line = fgets($file);
                $node4 = $doc->createElement("h3", "Osoba numer:" . $zmienna_liczaca);
                $doc->appendChild($node4);

                $arr = explode(";", $line);

                for ($i = 0; $i < count($arr); $i++) {
                    $value = $arr[$i];

                    //$node5 = $doc->createElement("p", $value);

                    if ($i == 0) {
                        $osoba_node = $doc->createElement("p",
                            'Imię i Nazwisko: ' . $value);
                        $doc->appendChild($osoba_node);
                    } else if ($i == 1) {
                        $adres_node = $doc->createElement("p",
                            ' Adres: ' . $value);
                        $doc->appendChild($adres_node);
                    } else if ($i == 2) {
                        $karta_node = $doc->createElement("p",
                            ' Nr karty: ' . $value . ' ');
                        $doc->appendChild($karta_node);
                    } else if ($i == 3) {
                        $email_node = $doc->createElement("p",
                            ' Email: ' . $value);
                        $doc->appendChild($email_node);
                    } else if ($i == 4) {
                        $dni_node = $doc->createElement("p",
                            ' Pobyt od dnia: ' . $value);
                        $doc->appendChild($dni_node);
                    } else if ($i == 5) {
                        if ($value != 0) {
                            $godzina_node = $doc->createElement("p",
                                ' Pojwi sie około godziny: ' . $value);
                            $doc->appendChild($godzina_node);
                        }
                    } else if ($i == 6) {
                        if ($value == true) {
                            $godzina_node = $doc->createElement("p",
                                ' Dodatkowo chcę klimatyzacji ' . $value);
                            $doc->appendChild($godzina_node);
                        }
                    } else if ($i == 7) {
                        if ($value == true) {
                            $godzina_node = $doc->createElement("p",
                                ' Dodatkowo prosi o dostawienie łózka dla dziecka y: ' . $value);
                            $doc->appendChild($godzina_node);
                        }
                    } else if ($i == 8) {
                        if ($value == true) {
                            $godzina_node = $doc->createElement("p",
                                ' Dodatkowo  jest palaczem: ' . $value);
                            $doc->appendChild($godzina_node);
                        }
                    }

                    //$doc->appendChild($node5);
                }

                echo $doc->saveXML();

                $zmienna_liczaca++;
            }
        }

        fclose($file);
    } else {
        // error opening the file.
    }

}

    ?>

</html>

