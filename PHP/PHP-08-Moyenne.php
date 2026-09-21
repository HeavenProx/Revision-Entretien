<?php 

// PHP-08
// Moyenne
// Calcule la moyenne d'un tableau de notes, arrondie à 2 décimales.

$notes = [0];
$nbNote = count($notes);
$totalNote = 0;

if($nbNote === 0){
    echo "0 notes attriubués pour l'instant";
    exit;
}

foreach($notes as $note){
    $totalNote += $note;
}
$moyenne = round($totalNote / $nbNote, 2);

echo $moyenne;
