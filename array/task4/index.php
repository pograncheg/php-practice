<?php

$arr = [];
$n = mt_rand(5,15);
for ($i = 0; $i <=$n; $i++) {
    $arr[$i] = mt_rand(0, 12);
}
sort($arr);
echo 'Исходный массив:';
echo '<pre>';
print_r($arr);
echo '</pre>';
$k = mt_rand(1,3);
// echo 'Вставим в массив' . $k . ' элементов.<br>';
$a = [0, 2, 3, 5, 6, 8, 9];
function insertEl(int $k, array $arr) {
    for ($j = 1; $j <= $k; $k++) {
        $el = mt_rand(1, 10);
        // echo $el . '<br>';
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] > $el) {
                for ($j = count($arr) - 1; $j >= $i; $j--) {
                    $arr[$j+1] = $arr[$j];
                }
                $arr[$i] = $el;
                break;
            }
        }
        // echo '<pre>';
        // print_r($arr);
        // echo '</pre>';
    }
    return $arr;
}


echo '<pre>';
print_r(insertEl($k, $a));
echo '</pre>';