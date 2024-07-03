<?php
//Задача 3
for ($k = 1000; $k < 10000; $k++) {
    $b = true;
    $num = $k % 10;
    $n = intdiv($k, 10);
    if ($n % 10 == $num) {
        $b = false;
    } elseif ($n % 10 < $num) {
        while ($n >= 10) {
            $num = $n % 10;
            $n = intdiv($n, 10);
            if ($n % 10 >= $num) {
                $b = false;
                break;
            }
        }
    } else {
        while ($n >= 10) {
            $num = $n % 10;
            $n = intdiv($n, 10);
            if ($n % 10 <= $num) {
                $b = false;
                break;
            }
        }
    }
    if ($b) {
        echo $k . '<br>';
    }
}