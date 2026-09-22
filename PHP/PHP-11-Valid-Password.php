<?php 

// PHP-11
// Validation de mot de passe
// Écris une fonction qui renvoie la liste des règles NON respectées : au moins 8 caractères, une majuscule, un chiffre.

function testPassword($mdp){
    $erreurs = [];
    if(strlen($mdp) < 8){
        $erreurs[] = "La chaîne fait moins de 8 caractères";
    }
    if(!preg_match('/[A-Z]/', $mdp)) {
        $erreurs[] = "La chaine ne possède pas de majuscule";
    }
    if (!preg_match('/[0-9]/', $mdp)) {
       $erreurs[] = "La chaine ne possède pas de chiffre.";
    }
    if(!empty($erreurs)){
        return $erreurs;
    }

    return "Mot de passe correct";
}

$resultat = testPassword("dfzgsdq1A");

if(is_array($resultat)){
    foreach($resultat as $erreur){
        echo $erreur . "<br>";
    }
} else {
    echo $resultat;
}