<?php

$n = mt_rand(3,5);
$m = mt_rand(3,5);

function randomArray(int $n, int $m) 
{
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            $arr[$i][$j] = mt_rand(0, 7);
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
    $b[$i] = mt_rand(2, 7);
}
echo 'Вставляемый столбец: <br>' . '<pre>';
print_r($b);
echo '</pre>';

function isZeroInCol(array $arr) 
{
    $countCol = count($arr[0]);
    $countRow = count($arr);
    $colNum = -1;
    for ($j = 0; $j < $countCol; $j++) {
        for ($i = 0; $i < $countRow; $i++) {
            if ($arr[$i][$j] == 0) {
                $colNum = $j;
                break;
            }
        }
    }
    return $colNum;
}

function insertCol(array $arr, array $b, int $colNum) 
{
    $countRow = count($arr);
    for ($i = 0; $i < $countRow; $i++) {
        $arr[$i][$colNum] = $b[$i];
    }
    return $arr;
}

function main(array $arr, array $b) 
{
    $colNumWithZero = isZeroInCol($arr);
    $countCol = count($arr[0]);
    $countRow = count($arr);
    if ($colNumWithZero == -1) {
        $colNum = $countRow;
        $arr = insertCol($arr, $b, $colNum);
        return $arr;
    } else {
        for ($i = 0; $i< $countRow; $i++) {
            for ($j = $countCol - 1; $j >= $colNumWithZero;  $j--) {
                $arr[$i][$j+1] = $arr[$i][$j];
            }
        }
        $arr = insertCol($arr, $b, $colNumWithZero);
        return $arr;
    }
}

$result = main($arr, $b);
echo 'Итоговый массив: <br>' . '<pre>';
print_r($result);
echo '</pre>';