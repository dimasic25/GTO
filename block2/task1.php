<html lang="rus">
<head><title>Автоморфное число</title></head>
<body>
<form method='get' action='task1.php'>
    Введите число: <input type='text' name='number'>
    <input type='submit' value='Загрузить'>
</form>

<?php
if (isset($_GET['number'])) {
    $numeric = $_GET['number'];

    try {
        if (!(error($numeric))) {
            for ($i = 0; $i <= $numeric; $i++) {
                if (automorphic($i)) {
                    print_r($i . "\n");
                }
            }
        } else {
            echo "Введено не корректное значение!";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function error($number)
{
    if (!is_numeric($number)) return true;
    if (!is_int(+$number)) return true;
    $tmp = (int)$number;
    if ($tmp < 0 || $tmp > (10 ** 6)) return true;
    return false;
}

function automorphic($N)
{
    $len = mb_strlen($N);
    $square = $N ** 2;
    $arr = str_split((string)$square);
    $mas = [];
    $index = 0;
    for ($i = 0; $i < $len; $i++, $index++) {
        $mas[$i] = $arr[count($arr) - $len + $index];
    }
    $str = implode('', $mas);
    if ($N == $str) return true;
    return false;
}