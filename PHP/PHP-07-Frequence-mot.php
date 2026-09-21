<?php 

// PHP-07
// Fréquence des mots
// À partir d'une phrase, renvoie un tableau associatif mot => nombre d'occurrences.

$chaine = "ma chaine pour ma de mot pour le php 07 anticonstitutionnellement 07 ma test pour";
$frequence = [];

$motsChaine = explode(" ", $chaine);

foreach($motsChaine as $motChaine){
    $occurence = 0;
    for($i = 0; $i < count($motsChaine); $i++){
        if($motChaine == $motsChaine[$i]){
            $occurence++;
        }
    }
    $frequence[$motChaine] = $occurence;
}

var_dump($frequence);