<?php
$n = mt_rand(3,5);
$m = mt_rand(3,5);

function randomArray(int $n, int $m) {
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        $arr[$i] = range(1, 1 + $m - 1);
        shuffle($arr[$i]);
        for ($j = 0; $j < $m; $j++) {
            $arr[$i][$j] = $arr[$i][$j] * mt_rand(0, 53);
        }
    }
    return $arr;
}

$arr = randomArray($n, $m);
echo 'Исходный массив: <br>' . '<pre>';
print_r($arr);
echo '</pre>';