<html lang="rus">
<head><title>Простое число</title></head>
<body>
<form method='get' action='task3.php'>
    Введите число: <input type='text' name='number'>
    <input type='submit' value='Загрузить'>
</form>

<?php
if (isset($_GET['number'])) {
    $numeric = $_GET['number'];

    try {
        if (!(error($numeric))) {

            if (isPrime($numeric)) echo "prime";
            else echo "composite";
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
    if ($tmp < 2 || $tmp > (2 * 10 ** 5)) return true;
    return false;
}

function isPrime($number)
{
    if ($number == 2)
        return true;
    if ($number % 2 == 0)
        return false;
    $i = 3;
    $max_factor = (int)sqrt($number);
    while ($i <= $max_factor) {
        if ($number % $i == 0)
            return false;
        $i += 2;
    }
    return true;
}