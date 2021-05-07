<html lang="rus">
<head><title>Оптимальный маршрут</title></head>
<body>
<form method='post' action='task4.php'>
    Введите длину дорожки от дома до первого магазина: <input type='text' name='a1'>
    <br><br>
    Введите длину дорожки от дома до второго магазина:<input type='text' name='a2'>
    <br><br>
    Введите длину дорожки от первого до второго магазина: <input type='text' name='a3'>
    <input type='submit' value='Загрузить'>
</form>

<?php
if (isset($_POST['a1']) && isset($_POST['a2']) && isset($_POST['a3'])) {
    $a1 = $_POST['a1'];
    $a2 = $_POST['a2'];
    $a3 = $_POST['a3'];

    if (check($a1) && check($a2) && check($a3)) {
        $sum = 0;
        $index = 0;
        if ($a1 <= $a2) {
            $sum += $a1;
            $index = 1;
        } else {
            $sum += $a2;
            $index = 2;
        }
        if (way($a1, $a2, $a3)) {
            $sum += $a1 + $a2;
        } else { $sum += $a3;
        }
        if ($index == 1) $sum += $a2;
        if ($index == 2) $sum += $a1;
        echo $sum;
    } else echo "Введены некорректные данные";
}

function check($value)
{
    if (is_numeric($value) && $value >= 0 && is_int(+$value)) return true;
    return false;
}

function way($a1, $a2, $a3)
{
    if ($a1 + $a2 < $a3) {
        return true;
    }
    return false;
}