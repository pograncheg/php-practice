<?php

function randomArray() {
    $arr = [];
    $n = mt_rand(5,12);
    for ($i = 0; $i <=$n; $i++) {
    $arr[$i] = mt_rand(0, 100);
    }
    return $arr;
}

$a = randomArray();
sort($a);
$b = randomArray();
sort($b);
echo 'Исходные массивы: <br>' . '<pre>';
print_r($a);
print_r($b);
echo '</pre>';

function joinArray(array $a, array $b) {
    $c = [];
    $pos = 0;
    for ($i = 0; $i < count($a); $i++) {
        for ($j = $pos; $j < count($b); $j++){
            if ($a[$i] >= $b[$j]) {
                $c[] = $b[$j];
                $pos++;
            }
        }
        $c[] = $a[$i]; 
        if (($i == count($a) - 1) && ($pos < count($b))) {
            for ($k = $pos; $k < count($b); $k++) {
                $c[] = $b[$k];
            }
        }
    }
    return $c;
}

echo 'Результат: <br>' . '<pre>';
print_r(joinArray($a, $b));
echo '</pre>';