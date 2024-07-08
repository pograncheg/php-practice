<?php
$n = mt_rand(3,5);
$m = mt_rand(5,10);
function randomArray(int $n, int $m) 
{
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            $arr[$i][$j] = mt_rand(-3, 7);
        }
    }
    return $arr;
}

$arr = randomArray($n, $m);
echo 'Исходный массив: <br>' . '<pre>';
print_r($arr);
echo '</pre>';

function deleteBetweenMax(array $arr) {
    $countRow = count($arr);
    $countCol = count($arr[0]);
    for ($i = 0; $i < $countRow; $i++) {
        $max = $arr[$i][0];
        $firstMaxIndex = 0;
        $lastMaxIndex = 0;
        for ($j = 1; $j < $countCol; $j++){
            if ($arr[$i][$j] >= $max) {
                $max = $arr[$i][$j];
                $lastMaxIndex = $j;
            }
        }
        for ($j = 0; $j <= $lastMaxIndex; $j++) {
            if ($arr[$i][$j] == $max) {
                $firstMaxIndex = $j;
                break;
            } 
        }
        // echo 'first ' . $firstMaxIndex . ' and last ' . $lastMaxIndex . '<br>';
        for ($j = $firstMaxIndex +1; $j < $lastMaxIndex; $j++) {
            unset($arr[$i][$j]);
        }
    }
    return $arr;
}

$result = deleteBetweenMax($arr);
echo 'Итоговый массив: <br>' . '<pre>';
print_r($result);
echo '</pre>';

