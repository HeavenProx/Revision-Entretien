<?php

// PHP-02
// Renverser une chaîne
// Inverse une chaîne de caractères, sans utiliser strrev().

$chaine = "ma chaine de test";
$inverse = "";
$longueur = strlen($chaine);

for($i = $longueur; $i >= 0; $i--){
    $inverse .= $chaine[$i];
}

echo $chaine . "<br>";
echo $inverse;
