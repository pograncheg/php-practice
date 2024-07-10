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

$p = mt_rand(2, 5);
echo 'Искомая кратность: ' . $p . '<br>';

function sortArr(array $arr, int $count) 
{
    for ($j = 0; $j < $count; $j++) {
        $f = false;
        for ($q = 0; $q < $count - 1 - $j; $q++) {
            if ($arr[$q] > $arr[$q + 1]) {
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

function main(array $arr, int $p)
{
    $countCol = count($arr[0]);
    $countRow = count($arr);
    $countArr = []; 
    for ($i = 0; $i < $countRow; $i++) {
        $countMultipleEl = 0;
        for ($j = 0; $j < $countCol; $j++) {
            if ($arr[$i][$j] % $p == 0) {
                if ($j == 0) {
                    $countMultipleEl++;
                    continue;
                }
                $buff = $arr[$i][$j];
                for ($q = $j - 1; $q >= $countMultipleEl; $q--) {
                    $arr[$i][$q + 1] = $arr[$i][$q];
                }
                $arr[$i][$countMultipleEl] = $buff;
                $countMultipleEl++;
            }
        }
        $countArr[$i] = $countMultipleEl;
    }

    for ($i = 0; $i < $countRow; $i++) {
        if($countArr[$i] <= 1) {
            continue;
        }
        $arr[$i] = sortArr($arr[$i], $countArr[$i]);
    }

    return $arr;
}

$result = main($arr, $p);
echo 'Итоговый массив: <br>' . '<pre>';
print_r($result);
echo '</pre>';
