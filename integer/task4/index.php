<?php
// Задача 4
// Функция возвращает true, если цифра $n встречается только один раз в числе $number.
function once_in_number($n, $number) {
    $b = false;
    while ($number > 0) {
        $num = $number % 10;
        $number = intdiv($number, 10);
        if ($num == $n) {
            if (!$b) {
                $b = true;
            } else {
                $b = false;
                break;
            }
        }
    }
    return $b;
}

for ($k = 1000; $k < 10000; $k++) {
    // if (one_in_number(5, $k)) {
    //     echo $k . '<br>';
    // }
    if (once_in_number(0, $k) && once_in_number(2, $k)
    && once_in_number(3, $k) && once_in_number(7, $k)) {
        echo $k . '<br>';
    }
}