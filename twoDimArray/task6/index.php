<?php
$n = mt_rand(3,5);
function randomArray(int $n)
{
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $arr[$i][$j] = mt_rand(-3, 12);
        }
    }
    return $arr;
}

$arr = randomArray($n);
echo 'Исходный массив: <br>' . '<pre>';
print_r($arr);
echo '</pre>';

function lineWithoutNegativeEl(array $arr)
{ 
    for ($i = 0, $countRow = count($arr); $i < $countRow; $i++) {
        $onlyPositive = true;
        for ($j = 0, $countCol = count($arr[0]); $j < $countCol; $j++) {
            if ($arr[$i][$j] < 0) {
                $onlyPositive = false;
                break;
            }
        }
        if ($onlyPositive) {
            return $arr[$i];
        }
    }
    return null;
}

function f(array $arr)
{
    $result = [];
    $count = count($arr);
    $vector = lineWithoutNegativeEl($arr);
    if ($vector !== null) {
        echo 'Вектор-строка: <br>' . '<pre>';
        print_r($vector);
        echo '</pre>';
        for ($i = 0; $i < $count; $i++) {
            $result[$i] = 0;
            for ($j = 0; $j < $count; $j++) {
                $result[$i] += $vector[$i] * $arr[$j][$i];
            }
        }
    } else {
        echo 'Нет подходящих строк.<br>';
    }
    return $result;
}

$result = f($arr);
if ($result) {
    echo 'Результат: <br>' . '<pre>';
    print_r($result);
    echo '</pre>';
}