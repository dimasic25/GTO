<html lang="rus">
<head><title>Перестановка</title></head>
<body>
<form method='get' action='task3.php'>
    Введите число: <input type='text' name='number'>
    <input type='submit' value='Загрузить'>
</form>

<?php
if (isset($_GET['number'])) {
    $numeric = $_GET['number'];

    if (is_numeric($numeric) && mb_strlen($numeric) == 4 && is_int(+$numeric)) {
        $arr = str_split($numeric);
        arsort($arr);
        $numeric = implode('', $arr);
        echo $numeric;
    } else {
        echo "Введено не корректное значение!";
    }
}