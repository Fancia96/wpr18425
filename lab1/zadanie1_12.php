<?php
#zadanie 1.8
function sprawdzCzyNumer(&$variable, $num){
    if(str_contains($variable, "a")) {
        echo "Podaj liczbę " . $num . ":";
        $variable = (int)readline('');
        if ((!is_numeric($variable)) || $variable == '0') {
            echo "Podałeś zły numer!";
            $variable = "a";
        } else {
            //$variable = ()$variable;
        }
    }
    // echo "\n " . $variable . "\n";
}

function printOutList($list){
    foreach ($list as $value) {
        echo $value . " ";

    }
}

$A = "a";
$B = "a";

while((!is_numeric($A))
    || (!is_numeric($B))){

    sprawdzCzyNumer($A, "A");
    sprawdzCzyNumer($B, "B");
}

echo "Ok mamy tabelke o rozmiarach (wiersze,kolumny): ";
echo "" . $A . "x" . $B;

//potrzebuje axb liczb
$values = $A * $B;
echo "\npotrzebuje tyle rekordow: " . $values;

$tablica = array();
//a razy dodaje wiersz i b wartosci w wierszu

echo "\nTeraz w konsoli wpiszesz liczbe po liczbie.";

//jesli podam zly numer to wpisuje zeero na to miejsce, dobre rozwiazanie ns momemnt
while(sizeof($tablica) != $A){
    $temp = array();
    while(sizeof($temp) != $B){
        echo "Podaj liczbę:";
        $variable = (int)readline('');
        if (is_numeric($variable)) {
            array_push($temp,$variable);
        }
    }
    array_push($tablica, $temp);
}
echo "Tabela utworzona.\n";

//wypisze normalnie
echo "Poniżej wiersze i kolumny:\n";
for($i = 0 ; $i < sizeof($tablica) ; $i++){
    $wiersz = $tablica[$i];
    for($j = 0 ; $j < sizeof($wiersz) ; $j++){
        echo $wiersz[$j] . " ";
    }
    echo "\n";
}

echo "Poniżej kolumny i wiersze:\n";
for($i = 0 ; $i < $B ; $i++){
    for($j = 0 ; $j < $A ; $j++){
        echo $tablica[$j][$i] . " ";
    }
    echo "\n";
}

?>
