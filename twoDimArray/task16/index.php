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

function mySort(array $arr, array $indexMaxEl) 
{
    $count = count($arr);
    for ($j = 0; $j < $count; $j++) {
        $f = false;
        for ($q = 0; $q < $count - 1 - $j; $q++) {
            if ($arr[$q][$indexMaxEl[$q]] < $arr[$q+1][$indexMaxEl[$q+1]]) {
                $buff = $arr[$q + 1];
                $arr[$q + 1] = $arr[$q];
                $arr[$q] = $buff;
                $buffIndex = $indexMaxEl[$q+1];
                $indexMaxEl[$q+1] = $indexMaxEl[$q];
                $indexMaxEl[$q] = $buffIndex;
                $f = true;
            }
        }
        if (!$f) {
            break;
        }
    } 
    return $arr;
}

function main(array $arr)
{
    $countCol = count($arr[0]);
    $countRow = count($arr);
    $maxElInRow = [];
    $indexMaxEls = [];
    $rowOrder = [];
    $rowForInsert = 0;
    for ($i = 0; $i < $countRow; $i++) {
        $maxEl = $arr[$i][0];
        $indexMaxEl = 0;
        for ($j = 0; $j < $countCol; $j++) {
            if ($arr[$i][$j] > $maxEl) {
                $maxEl = $arr[$i][$j];
                $indexMaxEl = $j;
            }
        }
        $maxElInRow[$i] = $maxEl;
        $indexMaxEls[$i] = $indexMaxEl;
    }

    return mySort($arr, $indexMaxEls);

}

$result = main($arr);
echo 'Итоговый массив: <br>' . '<pre>';
print_r($result);
echo '</pre>';