<?php
$n = mt_rand(3, 5);
$m = mt_rand(3, 5);
// echo $n . ' x ' . $m . '<br>';
function randomArray(int $n, int $m) 
{
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        $arr[$i] = range(0, $m - 1);
        shuffle($arr[$i]);
        for ($j = 0; $j < $m; $j++) {
            $arr[$i][$j] = $arr[$i][$j] * mt_rand(0, 1);
        }
    }
    return $arr;
}

$arr = randomArray($n, $m);
echo 'Исходный массив: <br>' . '<pre>';
print_r($arr);
echo '</pre>';

function deleteZeroRow($arr) {
    $countRow = count($arr);
    $countCol = count($arr[0]);
    for ($i = 0; $i < $countRow; $i++) {
        $zeroRow = true;
        for ($j = 0; $j < $countCol; $j++) {
            if ($arr[$i][$j] != 0) {
                $zeroRow = false;
                break;
            }
        }
        if ($zeroRow) {
            unset($arr[$i]);
        }
    }
    return $arr;
}

echo 'Итоговый массив: <br>' . '<pre>';
print_r(deleteZeroRow($arr));
echo '</pre>';