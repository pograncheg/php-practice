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

function sumElArr(array $arr)
{
    $count = count($arr);
    $sum = 0;
    for ($i = 0; $i < $count; $i++) {
        $sum += $arr[$i];
    }
    return $sum;
}

function main($arr)
{
    // $countCol = count($arr[0]);
    $countRow = count($arr);
    $maxSum = sumElArr($arr[0]);
    $maxRowIndex = 0;
    for ($i = 1; $i < $countRow; $i++) {
        $sum = sumElArr($arr[$i]);
        if ($sum > $maxSum) {
            $maxSum = $sum;
            $maxRowIndex = $i;
        }
    }
    $buff = $arr[$maxRowIndex];
    $arr[$maxRowIndex] = $arr[0];
    $arr[0] = $buff;
    for ($j = 1; $j < $countRow; $j++) {
        $f = false;
        for ($q = 1; $q < $countRow - $j; $q++) {
            if ($arr[$q][0] > $arr[$q + 1][0]) {
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

$result = main($arr);
echo 'Итоговый массив: <br>' . '<pre>';
print_r($result);
echo '</pre>';