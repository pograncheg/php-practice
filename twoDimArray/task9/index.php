<?php
$n = mt_rand(3,5);
$m = mt_rand(3,5);
function randomArray(int $n, int $m) 
{
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            $arr[$i][$j] = mt_rand(-10, 20);
        }
    }
    return $arr;
}

$arr = randomArray($n, $m);
echo 'Исходный массив: <br>' . '<pre>';
print_r($arr);
echo '</pre>';

$countCol = count($arr[0]);
$countRow = count($arr);
for ($j = 0; $j < $countCol; $j++) {
    $minInColumn = $arr[0][$j];
    $colForIns = $j;
    $rowForIns = -1;
    for ($i = 0; $i < $countRow; $i++) {
        $minInColumn = $arr[$i][$j] < $minInColumn ? $arr[$i][$j] : $minInColumn;
        if ($arr[$i][$j] < 0 && $rowForIns === -1) {
            $rowForIns = $i;
        }
    }
    for ($i = $countRow - 1; $i >= $rowForIns + 1; $i--) {
        $arr[$i+1][$j] = $arr[$i][$j];
    }
    $arr[$rowForIns+1][$colForIns] = $minInColumn;
}

echo 'Итоговый массив: <br>' . '<pre>';
print_r($arr);
echo '</pre>';