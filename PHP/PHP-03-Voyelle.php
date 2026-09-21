<?php

// PHP-03
// Compter les voyelles
// Renvoie le nombre de voyelles présentes dans une chaîne.

$voyelles = ["a", "e", "i", "o", "u", "y"];
$maChaine = "ma chaine de test des voyelles";
$mesVoyelles = 0;

foreach($voyelles as $voyelle){
    $numbVoy = substr_count($maChaine, $voyelle);
    $mesVoyelles += $numbVoy;
}
    
echo $mesVoyelles;