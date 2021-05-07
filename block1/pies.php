<html lang="rus">
<head><title>Стоимость пирожков</title></head>
<body>
<form method='get' action='pies.php'>
    Введите стоимость пирожка (рубли): <input type='text' name='rub'>
    копейки <input type='text' name='kop'>
    <br><br>
    Введите количество пирожков: <input type='text' name='count'>
    <input type='submit' value='Загрузить'>
</form>

<?php
const KOP_IN_RUB = 100;
if (isset($_GET['count']) && isset($_GET['rub']) && isset($_GET['kop'])) {

    try {
        error($_GET['count'], $_GET['rub'], $_GET['kop']); // обработка ошибок ввода
        $count = $_GET['count'];
        $rub = $_GET['rub'];
        $kop = $_GET['kop'];
        $price_pie = $rub * KOP_IN_RUB + $kop;  // цена пирожка в копейках
        //echo $price_pie . "\n";
        $price = $price_pie * $count;           // цена всех пирожков
        //echo $price . "\n";
        $kop_pies = $price % KOP_IN_RUB;
        $rub_pies = ($price - $kop_pies) / KOP_IN_RUB;
        echo "Пирожки стоят " . $rub_pies . " руб. " . $kop_pies . " коп.";

    } catch (Exception $e) {
        echo "Ошибка: " . $e->getMessage();
    }

} else {
    echo "Данные не введены!";
}

/**
 * @throws Exception
 */
function error($count, $rub, $kop)
{
    if (!is_numeric($count) || !is_numeric($rub) || !is_numeric($kop)) throw new Exception("Введено не число!");
    if ($count < 0 || $rub < 0 || $kop < 0) throw new Exception("Введено отрицательное значение");
    $count = +$count;
    $rub = +$rub;
    $kop = +$kop;
    if (!is_int($count) || !is_int($rub) || !is_int($kop)) throw new Exception("Введено не целое число");
}

?>

</body>
</html>
