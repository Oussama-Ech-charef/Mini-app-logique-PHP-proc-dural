<?php




$age = 17 ;
if ($age >= 18) {
    echo "Vous êtes majeur.";
} else {
    echo "Vous êtes mineur.";
}


$note = 14;

if ($note >= 16) {
    echo "Très bien";

}elseif ($note >= 10) {
    echo "passable";
} else {
    echo "Échec";
} 

$jour = "Vendredi";
switch ($jour) {
    case "Landi":
        echo "Début de semaine";
        break;
    case "Vendredi":
        echo "Dernier jour avant le week-end";
        break;
    default:
        echo "Jour normal";
}
