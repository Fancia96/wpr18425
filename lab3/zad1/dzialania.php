<?php


function dodawanie($pierwsza, $druga) {
    return $pierwsza + $druga;
}

function odejmowanie($pierwsza, $druga) {
    return $pierwsza - $druga;
}

function mnozenie($pierwsza, $druga) {
    return $pierwsza * $druga;
}

function dzielenie($pierwsza, $druga) {
    if($druga == 0){
        echo 'Nie mozna dzielić przez zero! ';
        return 0;
    }
    else{
        return $pierwsza / $druga;
    }
}



?>