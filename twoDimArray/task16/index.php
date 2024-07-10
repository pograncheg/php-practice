<?php

$n = mt_rand(3,5);
$m = mt_rand(3,5);

function randomArray(int $n, int $m) 
{
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            $arr[$i][$j] = mt_rand(1, 30);
        }
    }
    return $arr;
}

$arr = randomArray($n, $m);
echo 'Исходный массив: <br>' . '<pre>';
print_r($arr);
echo '</pre>';

function main(array $arr)
{
    $countCol = count($arr[0]);
    $countRow = count($arr);
    $maxElInRow = [];
    $rowOrder = [];
    $rowForInsert = 0;
    for ($i = 0; $i < $countRow; $i++) {
        $maxEl = $arr[$i][0];
        for ($j = 0; $j < $countCol; $j++) {
            if ($arr[$i][$j] > $maxEl) {
                $indexMaxEl = $j;
            }
        }
        $indexMaxElInRow[$i] = $IndexMaxEl;
    }
    echo 'Массив максимальных элементов: <br>' . '<pre>';
    print_r($maxElInRow);
    echo '</pre>';
    // for ($i = 0; $i < $countRow - 1; $i++) {
    //     for ($j = 0; $j < $countRow - 1 - i; $j++){
    //         if ($arr[$j][$indexMaxElInRow[$i]] > $arr[$j])
    //     }
    // }
}

main($arr);