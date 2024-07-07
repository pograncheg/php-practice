<?php

$arr = range(-3, 15, 1);
shuffle($arr);
echo 'Исходный массив:';
echo '<pre>';
print_r($arr);
echo '</pre>';

function countBeforeNegative(array $arr) {
    $count = 0;
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] >= 0) {
            $count++;
        } else {
            break;
        }
    }
    return $count;
}

function sumOddAfterNegative(array $arr) {
    $sum = 0;
    for ($i = count($arr) - 1; $i >= 0; $i--) {
        if (($arr[$i] > 0) && ($i % 2 == 0)) {
            $sum += $arr[$i];
        } elseif ($arr[$i] < 0) {
            break;
        }
    }
    return $sum;
}

echo 'a) ' . countBeforeNegative($arr) . '<br>';
echo 'б) ' . sumOddAfterNegative($arr) . '<br>';
