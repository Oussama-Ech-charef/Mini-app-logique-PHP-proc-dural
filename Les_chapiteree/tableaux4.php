 <?php

$animaux = ["Chat", "Chien", "Lapin"];
echo "Premier animal : " . $animaux[0] . "<br>";
echo "Premier animal : " . $animaux[2] . "<br> <br>";




foreach ($animaux as $animal) {
    echo "Animal : $animal <br> <br>";
}




$voiture = [
    "marque" => "Toyota",
    "modele" => "Corolla",
    "année"  => "2026"
] ;
echo "Modéle : " . $voiture["modele"] . "<br>";
echo "Année : " . $voiture["année"] . "<br> <br>";



$fruits = ["Pomme", "Banane"];
array_push($fruits, "Mangue"); // Ajoute "Mangue"
unset($fruits[1]); // Supprime "Banane"


echo "Nombre de fruits : " . count($fruits);






?>