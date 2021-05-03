<html>
<head>
    <meta charset="utf-8">
    <title>kalkulator</title>
</head>
<body>
<form method="post" attribute="post">
    <p>text dopisz:<input type="text" id="pierwsza" name="pierwsza"></p>

    <p></p>
    <button name="zapisz" id="answer" value="answer">Zapisz</button>
</form>
</body>

<?php

if (isset($_POST['zapisz'])) {


    $pierwsza = $_POST['pierwsza'];
    $myfile = fopen("plik.txt", "a");

    fwrite($myfile, "\n" . $pierwsza );
    fclose($myfile);

}
    ?>

</html>

