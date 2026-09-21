<?php 

// PHP-09
// Slugify
// Transforme « Bonjour le Monde ! » en bonjour-le-monde.

$chaine = "Bonjour le Monde !";

$lowerChaine = strtolower($chaine);
$cleanChaine = preg_replace('/[^a-zA-Z0-9]+/', '-', $lowerChaine);
$resultat = trim($cleanChaine, "-");

echo $resultat;