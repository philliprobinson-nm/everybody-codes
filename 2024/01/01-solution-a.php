<?php

$inputFile = __DIR__.'/01-input-a.txt';

$enemies = [];
$solution = 0;

$f = fopen($inputFile, 'r');

while (!feof($f)) {
    $line = fgets($f);

    $enemies = str_split($line, 1);
}

fclose($f);

$enemiesCount = array_count_values($enemies);

$solution = $enemiesCount["B"] + $enemiesCount["C"] * 3;

echo $solution;