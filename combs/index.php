<?php

class Combs
{
    protected string $str;
    protected int $n;
    protected int $countCombs = 0;
    protected array $result = [];

    function __construct(string $str, int $n)
    {
        $this->str = $str;
        $this->n = $n;
    }

    public function combinate(string $str, int $n, string $comb = '', array $usedIndices = [])
    {
        if (strlen($str) == 0) {
            throw new Exception('Исходная строка пустая!');
            return;
        } elseif ($n > strlen($str)) {
            throw new Exception('Длина строки меньше длины выборки!');
            return;
        } elseif ($n <= 0) {
            throw new Exception('Длина выборки должна быть больше 0!');
            return;
        } 
        if (strlen($comb) == $n) {
            $this->result[] = $comb;
            $this->countCombs++;
            return;
        }
        for ($i = 0; $i < strlen($str); $i++) {
            if (!(in_array($i, $usedIndices))) {
                $indices = $usedIndices;
                $indices[] = $i;
                $this->combinate($str, $n, $comb . $this->str[$i], $indices);
            } 
        }
    }

    public function main()
    {
        try{
            $this->combinate($this->str, $this->n);
        } catch (Exception $e) {
            echo 'Исключение: ',  $e->getMessage(), "\n";
            die();
        }
    }

    protected function fact(int $number)
    {
        $fact = 1;
        for ($i = 1; $i <= $number; $i++) {
            $fact *= $i;
        }
        return $fact;
    }

    public function getCountCombsCalc()
    {
        return $this->fact(strlen($this->str)) / $this->fact(strlen($this->str) - $this->n);
    }

    public function getCountCombs()
    {
        return $this->countCombs;
    }

    public function getResult()
    {
        return $this->result;
    }

}

$str = '1234';
$n = 2;
$combs = new Combs($str, $n);
$combs->main();
$result = $combs->getResult();
echo '<br>' . 'Полученные комбинации: ' . '<pre>';
print_r($result);
echo '</pre>';
echo 'Получено всего вариантов: ' . $combs->getCountCombs() . '<br>';
echo 'Должно быть всего вариантов по формуле: ' . $combs->getCountCombsCalc() . '<br>';