<?php
$n = mt_rand(3,5);
$m = mt_rand(3,5);
echo $n . ' x ' . $m . '<br>';
function randomArray($n, $m) {
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        $arr[$i] = range(1, 1 + $m - 1);
        shuffle($arr[$i]);
        for ($j = 0; $j < $m; $j++) {
            $arr[$i][$j] = $arr[$i][$j] * mt_rand(0, 13);
        }
        $sort = mt_rand(-1, 1);
        echo $sort . '<br>';
        switch ($sort) {
            case -1:
                rsort($arr[$i]);
                break;
            case 0:
                shuffle($arr[$i]);
                break;
            case 1:
                sort($arr[$i]);
                break;
        }
    }
    return $arr;
}

function isSort($arr) {
    $asc = true;
    $desc = true;
    for ($i = 0; $i < count($arr)-1; $i++) {
        if($arr[$i + 1] > $arr[$i]) {
            $desc = false;
            break;
        }
    }
    if ($desc = true) {
        return true;
    }
    for ($i = 0; $i < count($arr)-1; $i++) {
        if($arr[$i + 1] < $arr[$i]) {
            $asc= false;
            break;
        }
    }
    if ($asc = true) {
        return true;
    }
}

$arr = randomArray($n, $m);
echo 'Исходный массив: <br>' . '<pre>';
print_r($arr);
echo '</pre>';

for ($i = 0; $i < $n; $i++) {
    
}