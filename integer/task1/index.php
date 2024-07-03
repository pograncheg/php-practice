<?php
// Задача 1
$n = 123355561223327333;
$count = 0;

do {
    if ($n % 10 < 5) {
        $count++;
    }
    $n = intdiv($n, 10);
} while ($n > 0);

echo $count . '<br>';