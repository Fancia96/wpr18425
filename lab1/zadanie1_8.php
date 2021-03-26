<?php
#zadanie 1.8
function sprawdzCzyNumer(&$variable, $num){
    if(str_contains($variable, "a")) {
        echo "Podaj liczbę numer" . $num . ":";
        $variable = readline('');
        if (!is_numeric($variable)) {
            echo "Podałeś zły numer";
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

function sortowanie(&$numberOfTries ,&$list, $pervious_high,$typ){
    if ($numberOfTries == -1){
        $numberOfTries = 1 ;
    }
    $highest = 0;
    foreach($list as $x){
        if ($x > $highest and ($x < $pervious_high or $pervious_high == -1)){
            $highest = $x;
        }
    }
    $index_max = array_search($highest, $list);
    $index_ost = sizeof($list) - $numberOfTries;
    if($typ == 2){
         $index_ost = $numberOfTries-1;
    }
    //echo "index max, " . $index_max . " , index ost " . $index_ost . "";
    $temp = $list[$index_max];
    $list[$index_max] = $list[$index_ost];
    $list[$index_ost] = $temp;

    if($numberOfTries == sizeof($list)){
        //echo "Teraz moja lista wygląda tak 2121212 " . printOutList($list);
    }
    else{
        $numberOfTries += 1;
        sortowanie($numberOfTries,$list, $highest, $typ);
    }

}

$number1 = "a";
$number2 = "a";
$number3 = "a";

while((!is_numeric($number1))
    || (!is_numeric($number2))
    || (!is_numeric($number3))){

    sprawdzCzyNumer($number1, 1);
    sprawdzCzyNumer($number2, 2);
    sprawdzCzyNumer($number3, 3);
}

//echo "" . var_dump($number1);
//echo "" . var_dump($number2);
//echo "" . var_dump($number3);

$list = array($number1, $number2, $number3);

//sort($list);
echo "\nOd najmniejszej do największej:";
$numberOfTries = -1;
sortowanie($numberOfTries, $list,-1, 1);
printOutList($list);

//rsort($list);
echo "\nOd największej do najmniejszej:";
$numberOfTries = -1;
sortowanie($numberOfTries, $list,-1, 2);
printOutList($list);

?>
