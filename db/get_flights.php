<?php
require_once 'db_connect.php'; // Підключення до бази даних

// Запит до таблиці Flight
$sql = "SELECT FlightNumber, Departure, Destination, DepartureTime, ArrivalTime FROM Flight";
$result = $link->query($sql);

// Формуємо HTML-таблицю з даними рейсів
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Номер рейсу</th>
                <th>Відправлення</th>
                <th>Пункт призначення</th>
                <th>Час відправлення</th>
                <th>Час прибуття</th>
            </tr>";

    // Виведення кожного рядка з результатів запиту
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['FlightNumber']}</td>
                <td>{$row['Departure']}</td>
                <td>{$row['Destination']}</td>
                <td>{$row['DepartureTime']}</td>
                <td>{$row['ArrivalTime']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Немає рейсів.";
}

// Закриваємо з'єднання з базою даних
$link->close();
?>
