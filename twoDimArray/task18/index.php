<?php

$n = mt_rand(3,5);

function randomArray(int $n) 
{
    $arr = [];
    $negativePos = range(0, $n-1, 1);
    shuffle($negativePos);
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if($negativePos[$i] == $j) {
                $arr[$i][$j] = -mt_rand(1, 30); 
            } else {
                $arr[$i][$j] = mt_rand(1, 30);
            }
        }
    }
    return $arr;
}

$arr = randomArray($n);
echo 'Исходный массив: <br>' . '<pre>';
print_r($arr);
echo '</pre>';

function main(array $arr)
{   
    $countCol = count($arr[0]);
    $countRow = count($arr);
    for ($i = 0; $i < $countRow; $i++) {
        while ($arr[$i][$i] >= 0) {
            for ($j = 0; $j < $countCol; $j++) {
                if ($arr[$i][$j] < 0) {
                    $buff = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $buff;
                    break;
                }
            }
        } 
    }
    return $arr;
}

$result = main($arr);
echo 'Итоговый массив: <br>' . '<pre>';
print_r($result);
echo '</pre>';