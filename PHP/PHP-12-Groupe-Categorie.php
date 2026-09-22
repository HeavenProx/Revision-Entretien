<?php 

// PHP-12
// Regrouper par catégorie
// À partir d'un tableau de produits (chaque produit a un nom et une categorie), regroupe-les par catégorie.

$produits = [
    ['nom' => 'Café',        'categorie' => 'boisson'],
    ['nom' => 'Thé vert',    'categorie' => 'boisson'],
    ['nom' => 'Croissant',   'categorie' => 'snack'],
    ['nom' => 'Jus d’orange', 'categorie' => 'boisson'],
    ['nom' => 'Chips',       'categorie' => 'snack'],
    ['nom' => 'Pomme',       'categorie' => 'fruit'],
    ['nom' => 'Eau',         'categorie' => 'boisson'],
    ['nom' => 'Banane',      'categorie' => 'fruit'],
];

$categories = [];
foreach($produits as $produit){
    if(!isset($categories[$produit['categorie']])){
        $categories[$produit['categorie']] = [$produit['nom']];
    } else {
        $categories[$produit['categorie']][] = $produit['nom'];
    }
}

var_dump($categories);