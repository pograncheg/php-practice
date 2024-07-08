<?php
$n = mt_rand(3,5);
$m = mt_rand(3,5);

function createRandomArray(int $n, int $m) 
{
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        $arr[$i] = range(1, 1 + $m - 1);
        shuffle($arr[$i]);
        for ($j = 0; $j < $m; $j++) {
            $arr[$i][$j] = $arr[$i][$j] * mt_rand(0, 153);
        }
    }
    return $arr;
}

$arr = createRandomArray($n, $m);
echo 'Исходный массив: <br>' . '<pre>';
print_r($arr);
echo '</pre>';

function checkElInArray(int $el, array $numbers)
{
    $result = false;
    while ($el > 0) {
        $num = $el % 10;
        $el = intdiv($el, 10);
        for ($i = 0; $i < count($numbers); $i++) {
            if ($num === $numbers[$i]) {
                $result = true;
                break;
            } else {
                $result = false;
            }
        }
        if ($result === false) {
            return $result;
        }
    }
    return $result;
}

function mySum(array $arr) 
{
    $numbers = [0, 1, 3, 8];
    $sum = 0;
    $count = 0;
    for ($i = 0, $countN = count($arr); $i < $countN; $i++) {       
        for ($j = 0, $countM = count($arr[$i]); $j < $countM; $j++){
            if (checkElInArray($arr[$i][$j], $numbers)) {
                echo $arr[$i][$j] . '<br>';
                $count++;
                $sum += $arr[$i][$j];
            }
        }
    }
    if ($count) {
        return $sum;
    } else {
        return null;
    }
};

// $test1 = [
//     [123, 1385, 380],
//     [0, 1385, 3804],
//     [1238, 1308, 380],
//     [100, 13805, 3811],
//     [3, 456, 3804]
// ];

$sum = mySum($arr);

if ($sum === null) {
    echo 'Нет подходящих элементов!';
} else {
    echo 'Сумма = ' . $sum . '<br>';
}