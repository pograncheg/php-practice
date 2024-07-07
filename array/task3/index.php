<?php

$arr = [];
$n = mt_rand(5,15);
for ($i = 0; $i <=$n; $i++) {
    $arr[$i] = mt_rand(0, 12);
}
echo 'Исходный массив:';
echo '<pre>';
print_r($arr);
echo '</pre>';

function countDiffElements(array $arr) {
    $count = 0;
    for ($i = 0; $i < count($arr); $i++) {
        $unique = true;
        $j = 0;
        while ($j < $i) {
            if ($arr[$j] == $arr[$i]) {
                $unique = false;
                break;
            }
            $j++;
        }
        if ($unique) {
            $count++;
        }
    }
    return $count;
}

echo 'Количество различных элементов в исходном массиве: ' . countDiffElements($arr);
