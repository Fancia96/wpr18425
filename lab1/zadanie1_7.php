<?php
#zadanie 1.7
$miesiac = 0;

while(!($miesiac <= 12 && $miesiac >= 1)){
    echo("Podaj numer miesiąca od 1-12:");
    $miesiac = (int)readline('');
}

switch($miesiac){
    case 1:
        echo "Styczeń, dni:" . cal_days_in_month(CAL_GREGORIAN,1, date("Y"));
        break;
    case 2:
        echo "Luty, dni:" . cal_days_in_month(CAL_GREGORIAN,2, date("Y"));
        break;
    case 3:
        echo "Marzec, dni:" . cal_days_in_month(CAL_GREGORIAN,3, date("Y"));
        break;
    case 4:
        echo "Kwiecieñ, dni:" . cal_days_in_month(CAL_GREGORIAN,4, date("Y"));
        break;
    case 5:
        echo "Maj, dni:" . cal_days_in_month(CAL_GREGORIAN,5, date("Y"));
        break;
    case 6:
        echo "Czerwiec, dni:" . cal_days_in_month(CAL_GREGORIAN,6, date("Y"));
        break;
    case 7:
        echo "Lipiec, dni:" . cal_days_in_month(CAL_GREGORIAN,7, date("Y"));
        break;
    case 8:
        echo "Sierpieñ, dni:" . cal_days_in_month(CAL_GREGORIAN,8, date("Y"));
        break;
    case 9:
        echo "Wrzesień, dni:" . cal_days_in_month(CAL_GREGORIAN,9, date("Y"));
        break;
    case 10:
        echo "Październik, dni:" . cal_days_in_month(CAL_GREGORIAN,10, date("Y"));
        break;
    case 11:
        echo "Listopad, dni:" . cal_days_in_month(CAL_GREGORIAN,11, date("Y"));
        break;
    case 12:
        echo "Grudzieñ, dni:" . cal_days_in_month(CAL_GREGORIAN,12, date("Y"));
        break;

}

?>