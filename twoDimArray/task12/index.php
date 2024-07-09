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

function isPrimeNumber(int $num)
{
    if ($num <=1) {
        return false;
    }
    $count = 2;
    for ($i = 2; $i <= intdiv($num, 2); $i++) {
        if ($num % $i == 0) {
            $count++;
        }
    }
    return $count == 2 ? true : false;
}

function main(array $arr)
{
    $countCol = count($arr[0]);
    $countRow = count($arr);
    for ($j = 0; $j < $countCol; $j++) {
        $primeNumOnly = true;
        for ($i = 0; $i < $countRow; $i++) {
            if (!isPrimeNumber($arr[$i][$j])) {
                $primeNumOnly = false;
                break;
            }
        }
        if ($primeNumOnly) {
            for ($i = 0; $i < $countRow; $i++) {
                unset($arr[$i][$j]);
            }
        }
    }
    return $arr;
}

$result = main($arr);
echo 'Итоговый массив: <br>' . '<pre>';
print_r($result);
echo '</pre>';