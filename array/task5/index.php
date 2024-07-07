<?php
$arr = [];
$n = mt_rand(5,12);
for ($i = 0; $i <=$n; $i++) {
    $arr[$i] = mt_rand(0, 2);
}
echo 'Исходный массив: <br>' . '<pre>';
print_r($arr);
echo '</pre>';

function mySortArray(array $arr) {
    $pos0 = -1;
    for ($i = 0; $i < count($arr); $i++) {
        switch ($arr[$i]) {
            case 0:
                $pos0++;
                $el = $arr[$i];
                for ($j = $i - 1; $j >= $pos0; $j--) {
                    $arr[$j + 1] = $arr[$j];
                }
                $arr[$pos0] = $el;
                break;
            case 2:
                $el = $arr[$i];
                for ($j = $i - 1; $j >= $pos0 + 1; $j--) {
                    $arr[$j + 1] = $arr[$j];
                }
                $arr[$pos0 + 1] = $el;
                break;
        }
    }
    return $arr;
}

echo 'Результат: <br>' . '<pre>';
print_r(mySortArray($arr));
echo '</pre>';
