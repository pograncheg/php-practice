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

function main($arr) {
    $countCol = count($arr[0]);
    $countRow = count($arr);
    $minCountOddEl = $countCol;
    $colMin = -1; 
    for ($j = 0; $j < $countCol; $j++) {
        $countOddEl = 0;
        for($i = 0; $i < $countRow; $i++) {
            if($arr[$i][$j] % 2 == 1) {
                $countOddEl++;
            }
        }
        if ($countOddEl < $minCountOddEl) {
            $minCountOddEl = $countOddEl;
            $colMin = $j;
        }
    }

    if ($colMin < 0) {
        return $arr;
    }
    
    for ($i = 0; $i < $countRow; $i++) {
        $buff = $arr[$i][$colMin];
        for ($j = $colMin + 1; $j < $countCol; $j++) {
            $arr[$i][$j-1] = $arr[$i][$j];
        }
        $arr[$i][$countCol - 1] = $buff;
    }
    return $arr;
}

$result = main($arr);
echo 'Итоговый массив: <br>' . '<pre>';
print_r($result);
echo '</pre>';