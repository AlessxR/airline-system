<?php
require_once 'db_connect.php'; // Підключення до бази даних

// Запит до таблиці Ticket
$sql = "SELECT ID_Ticket, ID_Passenger, ID_Flight, SeatNumber, Price FROM Ticket";
$result = $link->query($sql);

// Формуємо HTML-таблицю з даними квитків
if ($result->num_rows > 0) {
    echo "<h2>Список білетів</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID квитка</th>
                <th>ID пасажира</th>
                <th>ID літака</th>
                <th>Номер сидіння</th>
                <th>Ціна квитка</th>
            </tr>";

    // Виведення кожного рядка з результатів запиту
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['ID_Ticket']}</td>
                <td>{$row['ID_Passenger']}</td>
                <td>{$row['ID_Flight']}</td>
                <td>{$row['SeatNumber']}</td>
                <td>{$row['Price']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Немає квитків.";
}

// Закриваємо з'єднання з базою даних
$link->close();
?>
