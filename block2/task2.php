<?php
echo "Введите количество элементов массива: ";
try {
    $N = readline();
    error($N);
    $firstIndex = 0;
    $secondIndex = 0;
    $flag = false;

    echo "Введите значения в массив:\n";
    $stdin = fopen('php://stdin', 'r');
    $result = fscanf($stdin, str_repeat("%d ", $N) . "\n");

    for ($i = 0; $i < $N; $i++) {
        error($result[$i]);
    }

    for ($i = 0; $i < $N; $i++) {
        for ($j = $i + 1; $j < $N; $j++) {
            if ($result[$i] == -$result[$j]) {
                $firstIndex = $i;
                $secondIndex = $j;
                $flag = true;
                break;
            }
        }
        if ($flag) {
            echo $firstIndex . ' ' . $secondIndex;
            break;
        }

    }
} catch (Exception $e) {
    echo $e->getMessage();
}


/**
 * @throws Exception
 */
function error($number)
{
    if (!is_numeric($number)) throw new Exception("Некорректное значение числа");
    if (!is_int(+$number)) throw new Exception("Некорректное значение числа");
    $tmp = (int)$number;
    if (abs($tmp) < 1 || abs($tmp) > 100) throw new Exception("Некорректное значение числа");
}