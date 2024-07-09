<?php

$n = mt_rand(3,5);
$m = mt_rand(3,5);

function randomArray(int $n, int $m) 
{
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            $arr[$i][$j] = mt_rand(2, 7);
        }
    }
    return $arr;
}

$arr = randomArray($n, $m);
echo 'Исходный массив: <br>' . '<pre>';
print_r($arr);
echo '</pre>';

$b = [];
for ($i = 0; $i < $n; $i++) {
    $b[$i] = $arr[$i][$j] = mt_rand(2, 7);
}

function main(array $arr, ) {

}

