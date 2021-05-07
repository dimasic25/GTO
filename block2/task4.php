<html lang="rus">
<head><title>Задание 4</title></head>
<body>
<form method='get' action='task4.php'>
    Введите год: <input type='number' name='number' min="1000" max="9000">
    <input type='submit' value='Загрузить'>
</form>

<?php
if (isset($_GET['number'])) {
    $numeric = $_GET['number'];

    try {
        if (!(error($numeric))) {
            $year = $numeric + 1;
            while (true) {
                $flag = true;
                $arr = str_split((string)$year);
                for ($i = 0; $i < 4; $i++) {
                    for ($j = $i + 1; $j < 4; $j++) {
                        if ($arr[$i] == $arr[$j]) {
                            $flag = false;
                            break;
                        }
                    }
                    if (!$flag) {
                        break;
                    }
                }
                if ($flag) {
                    echo $year;
                    break;
                }
                $year++;
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
    if ($tmp < 1000 || $tmp > 9000) return true;
    return false;
}
