<?php

// PHP-05
// Nombres pairs
// À partir d'un tableau d'entiers, renvoie un nouveau tableau avec uniquement les nombres pairs.

$numbers = [11, 14, 2, 99, 77, 56, 90, 53, 78, 124];
$nbPair = [];

foreach($numbers as $number){
    if($number % 2 === 0){
        array_push($nbPair, $number);
    }
}

var_dump($nbPair);
