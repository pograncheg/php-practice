<?php
$n = mt_rand(3,5);
$m = mt_rand(3,5);
function randomArray(int $n, int $m) 
{
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            $arr[$i][$j] = mt_rand(-10, 30);
        }
    }
    return $arr;
}

$arr = randomArray($n, $m);
echo 'Исходный массив: <br>' . '<pre>';
print_r($arr);
echo '</pre>';

function swapMinMax($arr)
{
    $max = $arr[0][0];
    $min = $arr[0][0];
    $maxCol = $minCol = 0;
    $countRow = count($arr);
    $countCol = count($arr[0]);
    for ($i = 0; $i < $countRow; $i++) {
        for ($j = 0; $j < $countCol; $j++){
            if ($arr[$i][$j] > $max) {
                $max = $arr[$i][$j];
                $maxCol = $j;
            } elseif ($arr[$i][$j] < $min) {
                $min = $arr[$i][$j];
                $minCol = $j;
            }
        }
    }
    if ($maxCol != $minCol) {
        for ($i = 0; $i < $countRow; $i++) {
            $buff = $arr[$i][$maxCol];
            $arr[$i][$maxCol] = $arr[$i][$minCol];
            $arr[$i][$minCol] = $buff;
        }
    }

    return $arr;
}

echo 'Итоговый массив: <br>' . '<pre>';
print_r(swapMinMax($arr));
echo '</pre>';
