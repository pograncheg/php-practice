<?php

$arr = range(0, 25, 3);
sort($arr);
echo 'Исходный массив:';
echo '<pre>';
print_r($arr);
echo '</pre>';

$k = mt_rand(1,3);
echo 'Количество вставляемых элементов: ' . $k . '<br>';

function insertEl(int $k, array $arr) {
    for ($q = 1; $q <= $k; $q++) {
        $el = mt_rand(1, 13);
        echo 'Вставляем значение: ' . $el . '<br>';
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] > $el) {
                for ($j = count($arr) - 1; $j >= $i; $j--) {
                    $arr[$j+1] = $arr[$j];
                }
                $arr[$i] = $el;
                break;
            }
        }
    }
    return $arr;
}

echo 'Результат:';
echo '<pre>';
print_r(insertEl($k, $arr));
echo '</pre>';