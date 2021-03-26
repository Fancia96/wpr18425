<?php
    #zadanie 1.4
    echo("Podaj dwie liczby, a i b\n");
    echo("Podaj a:");
    $a = (int)readline('');
    echo("Podaj b:");
    $b = (int)readLine('');

    echo("Wynik dodawania=");
    echo($a+$b);
    echo("\nWynik odejmowania=");
    echo($a-$b);
    echo("\nWynik mnożenia=");
    echo($a*$b);


    if ($b == 0) {
        echo("\nNie można dzielić przez zero, oraz dzielić modulo przez zero.");
    }
    else{
        echo("\nWynik dzielenia=");
        echo($a/$b);
        echo("\nWynik dzielenia modulo=");
        echo($a%$b);
    }

?>