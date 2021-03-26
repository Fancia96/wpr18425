<?php
    #zadanie 1.5
    echo("Podaj dwa napisy rozdzielone spacją:");
    $tekst = (String)readline('');

    if(str_contains($tekst, ' ')){
        $napis1 = substr($tekst, 0, strpos($tekst, ' '));
        $napis2 = substr($tekst, strpos($tekst, ' ')+1);

        echo "%" . $napis2 . " " .  $napis1 . "%$#";
    }
    else{
        echo("\nNie podałeś dwóch tekstów ze spacją");
    }

?>