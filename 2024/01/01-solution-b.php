<?php

$inputFile = __DIR__.'/01-input-b.txt';

$enemies = [];
$solution = 0;

$f = fopen($inputFile, 'r');

while (!feof($f)) {
    $line = fgets($f);

    $enemies = str_split($line, 2);
}

fclose($f);

$enemies = array_map(function($value) {
    $sortArray = str_split($value);
    sort($sortArray);

    return implode($sortArray);
}, $enemies);

$enemiesCount = array_count_values($enemies);

foreach ($enemiesCount as $enemyGrp => $total) {
    foreach (str_split($enemyGrp, 1) as $enemy) {
        if ($enemy == "A") {$solution = $solution + (0 * $total);}
        if ($enemy == "B") {$solution = $solution + (1 * $total);}
        if ($enemy == "C") {$solution = $solution + (3 * $total);}
        if ($enemy == "D") {$solution = $solution + (5 * $total);}
        if ($enemy == "x") {$solution = $solution + (0 * $total);}
    }

    $xs = substr_count($enemyGrp, "x");

    if ($xs == 0) {$solution = $solution + (2 * $total);}
}

echo $solution;