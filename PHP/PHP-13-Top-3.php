<?php 

// PHP-13
// Top 3
// Renvoie les 3 plus grandes valeurs d'un tableau, triées en ordre décroissant.

$nb = [11, 45, 7, 90, 23, 1, 156, 64, 34];
rsort($nb);

$top3 = array_slice($nb, 0, 3);

var_dump($top3);
