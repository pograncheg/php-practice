<?php
$n = mt_rand(3,5);
$m = mt_rand(3,5);
echo $n . ' x ' . $m . '<br>';
function randomArray($n, $m) {
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        $arr[$i] = range(-1, -1 + $m - 1);
        shuffle($arr[$i]);
        for ($j = 0; $j < $m; $j++) {
            $arr[$i][$j] = $arr[$i][$j] * mt_rand(1, 13);
        }
    }
    return $arr;
}

$arr = randomArray($n, $m);
echo 'Исходный массив: <br>' . '<pre>';
print_r($arr);
echo '</pre>';

$count = 0;
$sum = 0;
for ($q = 0; $q < $m; $q++) {
    if ($arr[0][$q] > 0) {
        $sum += $arr[0][$q];
        $count++;
    }
}
$minAverage = $count ? $sum / $count : 0;
$num = 0;
for ($i = 1; $i < $n; $i++) {
    $count = 0;
    $sum = 0;
    for ($j = 0; $j < $m; $j++) {
        if ($arr[$i][$j] > 0) {
            $sum += $arr[$i][$j];
            $count++;
        }
    }
    if ($count) {
        if ($sum / $count < $minAverage) {
            $minAverage = $sum / $count;
            $num = $i;
        }
    }

}

echo 'Номер необходимой строки: ' . $num;