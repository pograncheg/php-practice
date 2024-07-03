<?php
// Задача 5
function count_num($number) {
    $count = 0;
    while ($number > 0) {
        $count++;
        $number = intdiv($number, 10);
    }
    return $count;
}

$n = 31247574213;
$count = count_num($n);
if ($count % 2 === 0) {
    $b = true;
     for ($i = 0; $i < $count/2; $i++){
        $p = $count - $i*2 - 1;
        if ($n % 10 != intdiv($n, (10**$p))) {
            $b = false;
            break;
        }  
        $n = intdiv(($n % (10**$p)), 10);
    }
} else {
    $b = false; 
}

if ($b) {
    echo 'число 2n m симметрично';
} else {
    echo 'число 2n m НЕ симметрично';
}