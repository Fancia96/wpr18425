<?php

//phpinfo();
//exit();

session_start();
$_SESSION['zmienna'] = "używam sesji w zadaniu domowym";

if (isset($_POST['osoba'])) {
    $numberOfPeople = $_POST['osoba'];
} else {
    $numberOfPeople = 0;
}


if (!$db = mysqli_connect("localhost", "root", "root", "mpr")) {
    exit("błąd połączenia");
}

echo 'select';
$query = 'select * from movie';
$result = mysqli_query($db, $query);

echo 'mysqli_fetch_row';
while ($rows = mysqli_fetch_row($result)) {
    foreach ($rows as $row) {
        echo '  ';
        echo $row;

    }
    echo "</br>";

}

echo 'mysqli_fetch_array'. "</br>";

$result2 = mysqli_query($db, $query);

//var_dump($row);exit;

while($row = mysqli_fetch_array($result2, MYSQLI_BOTH)) {

    echo 'ID:'. $row[0] . ', nazwa:' .  $row[1] . ', kategoria:' . $row[2] . ', avavava:' . $row[3];

    echo "</br>";
}

    echo "</br>";

$row_cnt = mysqli_num_rows($result);

echo "Result set has " . $row_cnt . " rows.";



$stmt = $db->prepare("INSERT INTO movie(nazwa, kategoria) VALUES (?, ?)");

$nazwa = 'php_add' . $row_cnt;
$kategoria = 'dramat';
$stmt->bind_param("ss", $nazwa, $kategoria);

$stmt->execute();

$result3 = mysqli_query($db, $query);

echo 'mysqli_fetch_row';
while ($rows = mysqli_fetch_row($result3)) {
    foreach ($rows as $row) {
        echo '  ';
        echo $row;

    }
    echo "</br>";

}


?>

