<?php 

// PHP-10
// Parseur clé=valeur
// Transforme "nom=Hugo;role=dev;ville=Lyon" en tableau associatif.

$chaine = "nom=Hugo;role=dev;ville=Lyon";
$arrayParse = [];

$chaineParse = explode(";", $chaine);

foreach($chaineParse as $chaineEgal){
    $attributs = explode("=", $chaineEgal);
    $arrayParse[$attributs[0]] = $attributs[1];
}

var_dump($arrayParse);