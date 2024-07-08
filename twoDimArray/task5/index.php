<?php
$n = mt_rand(3,5);
$m = mt_rand(3,5);
// $p = mt_rand(2,9);
// echo 'Проверяем кратность: ' . $p . '<br>';
function randomArray(int $n, int $m) 
{
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        $arr[$i] = range(1, 1 + $m - 1);
        shuffle($arr[$i]);
        for ($j = 0; $j < $m; $j++) {
            $arr[$i][$j] = $arr[$i][$j] * mt_rand(0, 12);
        }
    }
    return $arr;
}

$arr = randomArray($n, $m);
echo 'Исходный массив: <br>' . '<pre>';
print_r($arr);
echo '</pre>';

function sumColEl(array $arr, int $col) 
{
    $sum = 0;
    for ($i = 0, $countRow = count($arr); $i < $countRow; $i++) {
        $sum += $arr[$i][$col];
    }
    return $sum;
}

function sumElMultipleOf(array $arr, int $p) 
{
    $sum = null;
    for ($j = 0, $countCol = count($arr[0]); $j < $countCol; $j++) {
        for ($i = 0, $countRow = count($arr); $i < $countRow; $i++) {
            $multiple = true;
            if ($arr[$i][$j] % $p != 0) {
                $multiple = false;
                break;
            }
        }
        if ($multiple) {
            $sum += sumColEl($arr, $j);
        }
    }
    return $sum;
}

$sum = sumElMultipleOf($arr, 3);

if ($sum === null) {
    echo 'Нет подходящих столбцов!';
} else {
    echo 'Сумма = ' . $sum . '<br>';
}
