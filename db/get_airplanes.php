<?php
require_once 'db_connect.php'; // Підключаємо єдиний файл з підключенням до бази

// Запит до таблиці літаків
$sql = "SELECT ID_Aircraft, Model, SeatCapacity FROM Aircraft";
$result = $link->query($sql);

// Формуємо HTML-таблицю
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID літака</th>
                <th>Модель літака</th>
                <th>Вместимість літака</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['ID_Aircraft']}</td>
                <td>{$row['Model']}</td>
                <td>{$row['SeatCapacity']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Немає літаків.";
}

mysqli_close($link); // Закриваємо підключення
?>
