<?php

// PHP-04
// Min / Max maison
// Trouve le plus petit et le plus grand nombre d'un tableau, sans min() ni max().

$array = [11, 25, 7, 89, 65, 4, 38];
$min = $array[0];
$max = $array[0];

for($i = 0; $i < count($array); $i++){
    if($array[$i] < $min){
        $min = $array[$i];
    }
    if($array[$i] > $max){
        $max = $array[$i];
    }
}

echo "Minimum = " . $min . "<br>";
echo "Maximum = " . $max;
