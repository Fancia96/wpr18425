<?php
#zadanie 1.11

echo "Podaj tekst:";
$tekst = readline('');

$tekst = strtolower($tekst);

$alphabet = range('a', 'z');
$pangramem  = true;
foreach($alphabet as $value){
    if(!str_contains($tekst, $value)){
        $pangramem = false;
        break;
    }
}

if($pangramem){
    echo " - jest panagramem";
}
else{
    echo " - nie jest panagramem";
}


?>
