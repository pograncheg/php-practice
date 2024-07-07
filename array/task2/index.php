<?php

$arr = [];
$n = mt_rand(5,15);
for ($i = 0; $i <=$n; $i++) {
    $arr[$i] = mt_rand(0, 20);
}
echo 'Исходный массив:';
echo '<pre>';
print_r($arr);
echo '</pre>';

function average(array $arr) {
    $b = [];
    $sum = 0;
    for ($i = 0; $i < count($arr); $i++) {
        $sum += $arr[$i];
        $b[$i] = $sum / ($i+1);
    }
    return $b;
}   

echo 'Результат:';
echo '<pre>';
print_r(average($arr));
echo '</pre>';