<html lang="rus">
<head><title>Квадрат числа</title></head>
<body>
<form method='get' action='square.php'>
    Введите число (не больше 100): <input type='text' name='number'>
    <input type='submit' value='Загрузить'>
</form>

<?php
if (isset($_GET['number'])) {
    $numeric = $_GET['number'];

    if (is_numeric($numeric) && abs($numeric) <= 100 && is_int(+$numeric)) {
        echo "Квадрат числа " . $numeric . ": " . ($numeric * $numeric);
    } else {
        echo "Введено не корректное значение!";
    }
} else {
    echo "Данные не введены!";
}
?>

</body>
</html>
