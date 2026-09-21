<?php 

// PHP-01
// FizzBuzz
// Affiche les nombres de 1 à 100. Remplace les multiples de 3 par « Fizz », de 5 par « Buzz », des deux par « FizzBuzz ».

$x = 1;
while($x <= 100){
    $num = $x;
    $x % 3 == 0 ? $num = "Fizz" : $num = $x;
    if($x % 5 == 0){
        $num = "Buzz";
    }
    if($x % 3 == 0 && $x % 5 == 0){
        $num = "FizzBuzz";
    }
    $x++;
    echo($num . "\n");
}