<?php
#zadanie 1.10
function wezLiczbe(&$variable){
    echo "\nPodaj liczbe:";
        $variable = (int)readline('');
        if ($variable <= 0) {
            echo "Podałeś zły numer";
            $variable = "a";
        } else {
            //$variable = ()$variable;
        }
}

function wypukle($number){
    for($i = 1; $i <= $number; $i++){
        for($j = 1; $j <= $number; $j++){
            if($j > $i){
            }
            else{
                echo "*";
            }
        }
        echo "\n";
    }
    for($i = 1; $i <= $number; $i++){
        for($j = $number; $j >=1; $j--){
            if($j < $i){
            }
            else{
                echo "*";
            }
        }
        echo "\n";
    }
}

function wklesle($number){
    for($i = $number; $i >= 1; $i--){
        for($j = $number; $j >=1; $j--){
            if($j <= $i){
                echo "*";
            }
            else{echo " ";}
        }
        echo "\n";
    }
    for($i = 1; $i <= $number; $i++){
        for($j = $number; $j >=1; $j--){
            if($j > $i){
                echo " ";
            }
            else{echo "*";}
        }
        echo "\n";
    }
}

$number = "a";
while(!is_int($number)){
    wezLiczbe($number);
}

wypukle($number);

wklesle($number);

?>
