<?php
// Задача 6
$a = 36;
$b = 18;

while ($a !== 0 && $b !== 0) {
    if ($a > $b) {
        $a = $a % $b;
    } else {
        $b = $b % $a;
    }
}

echo $a == 0 ? $b : $a;