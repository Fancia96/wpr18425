<?php
#zadanie 1.9
function sprawdzCzyNumer(&$variable, $num){
    if(str_contains($variable, "a")) {
        echo "" . $num . ":";
        $variable = readline('');
        if (!is_numeric($variable)) {
            echo "Podałeś zły numer";
            $variable = "a";
        } else {
            //throw new Exception('BŁĄD.');
            //$variable = ()$variable;
        }
    }
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

    sprawdzCzyNumer($A, "WIELKOŚĆ TABLICY 1");
    sprawdzCzyNumer($B, "WIELKOŚĆ TABLICY 2");
}

if($A == $B){

$list1 = array();
$list2 = array();

echo "Wypełniaj tablice 1\n";

while(sizeof($list1) != $A){
    echo "Podaj liczbę:";
    $variable = (int)readline('');
    if (is_numeric($variable)) {
        array_push($list1,$variable);
    }
}

echo "Wypełniaj tablice 2\n";

while(sizeof($list2) != $B){
    echo "Podaj liczbę:";
    $variable = (int)readline('');
    if (is_numeric($variable)) {
        array_push($list2,$variable);
    }
}

echo "";

$skalar = array();


    for($i = 0; $i < $A ; $i++){
        array_push($skalar, $list1[$i]*$list2[$i] );
    }


echo "Tablica 1: ";
printOutList($list1);

echo "Tablica 2: ";
printOutList($list2);

echo "Skalar: ";
printOutList($skalar);
}
else{
   echo "BŁĄD. listy muszą mieć te same długości.";
}

?>
