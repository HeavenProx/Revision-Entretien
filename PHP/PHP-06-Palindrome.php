<?php

// PHP-06
// Palindrome
// Indique si un mot est un palindrome, en ignorant la casse et les espaces.

$chaine = "  kayak kayak";
$chaineSecu = preg_replace('/\s+/', '', $chaine);
$inverse = "";
$longueur = strlen($chaineSecu);

for($i = ($longueur - 1); $i >= 0; $i--){
    $inverse .= $chaineSecu[$i];
}

$palindrome = false;
$chaineSecu === $inverse ? $palindrome = true : $palindrome = false;

if($palindrome){
    echo "Oui c'est un palindrome";
} else {
    echo "Non ce n'est pas un palindrome";
}