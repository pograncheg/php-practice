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

function sortArr(array $arr) 
{
    $count = count($arr);
    for ($j = 0; $j < $count; $j++) {
        $f = false;
        for ($q = 0; $q < $count - 1 - $j; $q++) {
            if ($arr[$q] < $arr[$q + 1]) {
                $buff = $arr[$q + 1];
                $arr[$q + 1] = $arr[$q];
                $arr[$q] = $buff;
                $f = true;
            }
        }
        if (!$f) {
            break;
        }
    } 
    return $arr;
}

function insertEl(array $arr, int $el)
{
    $count = count($arr);
    for ($i = 0; $i < $count ; $i++) {
        if ($arr[$i] < $el) {
            for ($j = $count - 1; $j >= $i; $j--) {
                $arr[$j+1] = $arr[$j];
            }
            $arr[$i] = $el;
            break;
        }
        if ($i == $count - 1) {
            $arr[$count] = $el;
        }
    }
    return $arr;
}

function main($arr)
{
    $countCol = count($arr[0]);
    $countRow = count($arr);
    $p = mt_rand(1, 30);
    echo 'Вставляемое число: ' . $p . '<br>';
    for ($i = 0; $i < count($arr); $i++) {
        $arr[$i] = sortArr($arr[$i]);
        $arr[$i] = insertEl($arr[$i], $p);
    }
    return $arr;
}

$result = main($arr);
echo 'Итоговый массив: <br>' . '<pre>';
print_r($result);
echo '</pre>';