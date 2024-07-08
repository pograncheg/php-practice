<?php
$n = mt_rand(3,5);
function randomArray(int $n)
{
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $arr[$i][$j] = mt_rand(-3, 50);
        }
    }
    return $arr;
}

$arr = randomArray($n);
echo 'Исходный массив: <br>' . '<pre>';
print_r($arr);
echo '</pre>';

function main(array $arr)
{
    $count = count($arr);
    $maxUp = $arr[0][1];
    $rowUp = 0;
    $colUp = 1;
    $maxDown = $arr[1][0];
    $rowDown = 1;
    $colDown = 0;
    for ($i = 0; $i < $count; $i++) {
        for ($j = 0; $j < $count; $j++) {
            if ($j > $i && $arr[$i][$j] > $maxUp) {
                $maxUp = $arr[$i][$j];
                $rowUp = $i;
                $colUp = $j;
            } elseif ($j < $i && $arr[$i][$j] > $maxDown) {
                $maxDown = $arr[$i][$j];
                $rowDown = $i;
                $colDown = $j;
            }
        }
    }
    echo "Максимальный элемент в верхнем треугольнике: [$rowUp][$colUp] = $maxUp <br>";
    echo "Максимальный элемент в нижнем треугольнике: [$rowDown][$colDown] = $maxDown <br>";
    $buf = $arr[$rowUp][$colUp];
    $arr[$rowUp][$colUp] = $arr[$rowDown][$colDown];
    $arr[$rowDown][$colDown] = $buf;

    return $arr;
}

$result = main($arr);
echo 'Итоговый массив: <br>' . '<pre>';
print_r($result);
echo '</pre>';
