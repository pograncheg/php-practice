<?php
$n = mt_rand(3,5);
$m = mt_rand(3,5);
// echo $n . ' x ' . $m . '<br>';
function randomArray(int $n, int $m) 
{
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        $arr[$i] = range(1, 1 + $m - 1);
        shuffle($arr[$i]);
        for ($j = 0; $j < $m; $j++) {
            $arr[$i][$j] = $arr[$i][$j] * mt_rand(0, 13);
        }
        $sort = mt_rand(-1, 1);
        switch ($sort) {
            case -1:
                rsort($arr[$i]);
                break;
            case 0:
                shuffle($arr[$i]);
                break;
            case 1:
                sort($arr[$i]);
                break;
        }
    }
    return $arr;
}

function isSort(array $arr) 
{
    $asc = true;
    $desc = true;
    for ($i = 0; $i < count($arr)-1; $i++) {
        if($arr[$i + 1] > $arr[$i]) {
            $desc = false;
            break;
        }
    }
    if ($desc == true) {
        return true;
    }
    for ($i = 0; $i < count($arr)-1; $i++) {
        if($arr[$i + 1] < $arr[$i]) {
            $asc = false;
            break;
        }
    }
    if ($asc == true) {
        return true;
    }
}

$arr = randomArray($n, $m);
echo 'Исходный массив: <br>' . '<pre>';
print_r($arr);
echo '</pre>';

function minElInArr(array $arr) 
{
    $min = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] < $min) {
            $min = $arr[$i]; 
        }
    }
    return $min;
}

function maxElInArr(array $arr) 
{
    $max = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] > $max) {
            $max = $arr[$i]; 
        }
    }
    return $max;
}

function maxMinInOrderedLine(array $arr)
{
    for ($i = 0; $i < count($arr); $i++) {
        if (isSort($arr[$i])) {
            $max = maxElInArr($arr[$i]);
            $min = minElInArr($arr[$i]);
            $index = $i;
            break;
        }
    }
    if (isset($index) && isset($max) && isset($min)) {
        for ($i = $index + 1; $i < count($arr); $i++) {
            if (isSort($arr[$i])) {
                $max = maxElInArr($arr[$i]) > $max ? maxElInArr($arr[$i]) : $max;
                $min = minElInArr($arr[$i]) < $min ? minElInArr($arr[$i]) : $min;
            }
        }
        return [$min, $max];
    }
    return ['Нет упорядоченных строк'];
}

$result = maxMinInOrderedLine($arr);
if(count($result) == 1) {
    echo $result[0];
} else {
    echo 'Минимальный элемент в упорядоченных строках: ' . $result[0] . '<br>';
    echo 'Максимальный элемент в упорядоченных строках: ' . $result[1]. '<br>';
}
