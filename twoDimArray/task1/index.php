<?php

$n = mt_rand(3,5);
function randomArray($n) {
    $arr = [];
    for ($i = 0; $i <=$n; $i++) {
        for ($j = 0; $j <=$n; $j++) {
            $arr[$i][$j] = mt_rand(0, 50);
        }
    }
    return $arr;
}

$arr = randomArray($n);
echo 'Исходный массив: <br>' . '<pre>';
print_r($arr);
echo '</pre>';

$mainSum = 0;
$upSum = 0;
$downSum = 0;
for ($i = 0; $i <=$n; $i++) {
    for ($j = 0; $j <=$n; $j++) {
        if ($j == $i) {
            $mainSum += $arr[$i][$j];
        } elseif ($j > $i) {
            $upSum += $arr[$i][$j];
        } else {
            $downSum += $arr[$i][$j];
        }
    }
}

echo 'Сумма элементов на главной диагонали: ' . $mainSum . '<br>';
echo 'Сумма элементов выше главной диагонали: ' . $upSum . '<br>';
echo 'Сумма элементов на главной диагонали: ' . $downSum . '<br>';

