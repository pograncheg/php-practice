<?php
//Задача 3
for ($k = 1000; $k < 10000; $k += 2) {
    $b = true;
    $num = $k % 10;
    $n = intdiv($k, 10);
    $sign = $num - ($n % 10);
    if ($sign == 0) {
        $b = false;
    } else {
        while ($n >= 10) {
            $num = $n % 10;
            $n = intdiv($n, 10);
            if ($sign * ($num - ($n % 10)) <= 0) {
                $b = false;
                break;
            }
        }
    }
    if ($b) {
        echo $k . '<br>';
    }
}
