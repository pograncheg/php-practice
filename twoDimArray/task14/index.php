<?php

$n = mt_rand(3,5);
$m = mt_rand(3,5);

function randomArray(int $n, int $m) 
{
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            $arr[$i][$j] = mt_rand(-7, 7);
        }
    }
    return $arr;
}

$arr = randomArray($n, $m);
echo 'Исходный массив: <br>' . '<pre>';
print_r($arr);
echo '</pre>';

function countAlternateEl(array $row)
{
    $count = 0;
    $countEl = count($row);
    if($row[0] >= 0) {
        $plus = true;
    } else {
        $plus = false;
    }
    for ($i = 1; $i < $countEl; $i++) {
        if ($plus && $row[$i] < 0) {
            $plus = !$plus;
            $count++;
        } elseif (!$plus && $row[$i] >= 0) {
            $plus = !$plus;
            $count++;
        } else {
            break;
        }
    }
    return $count;
}

function main(array $arr) 
{
    $countCol = count($arr[0]);
    $countRow = count($arr);
    $maxCountAlter = countAlternateEl($arr[0]);
    echo countAlternateEl($arr[0]) . '<br>';
    $maxRowNum = 0;
    for ($i = 1; $i < $countRow; $i++){
        echo countAlternateEl($arr[$i]) . '<br>';
        if (countAlternateEl($arr[$i]) > $maxCountAlter) {
            $maxCountAlter = countAlternateEl($arr[$i]);
            $maxRowNum = $i;
        }
    }
    if ($maxRowNum == 0){
        return $arr;
    }
    $b = $arr[$maxRowNum];
    for ($i = $maxRowNum - 1; $i >=0; $i--) {
        $arr[$i+1] = $arr[$i];
    }
    $arr[0] = $b;
    return $arr;
}

$result = main($arr);
echo 'Итоговый массив: <br>' . '<pre>';
print_r($result);
echo '</pre>';