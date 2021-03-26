<?php
    #zadanie 1.6
    echo("Podaj 3 długości boków trójkąta:");
    echo "\nDługość a:";
    $a = (int)readline('');
    echo "\nDługość b:";
    $b = (int)readline('');
    echo "\nDługość c:";
    $c = (int)readline('');

    if(($a+$b > $c) && ($a+$c > $b) && ($b+$c > $a)){
        echo "Można zbudować trójkąt";
    }
    else{
        echo "BŁĄD";
    }

?>