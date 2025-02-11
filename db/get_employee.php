<?php
require_once 'db_connect.php'; // Підключення до бази даних

// Запит до таблиці Employee
$sql = "SELECT ID_Employee, FirstName, Position, ID_Flight FROM Employee";
$result = $link->query($sql);

// Формуємо HTML-таблицю з даними працівників
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID працівника</th>
                <th>Ім'я</th>
                <th>Позиція</th>
                <th>ID літака</th>
            </tr>";

    // Виведення кожного рядка з результатів запиту
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['ID_Employee']}</td>
                <td>{$row['FirstName']}</td>
                <td>{$row['Position']}</td>
                <td>{$row['ID_Flight']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Немає працівників.";
}

// Закриваємо з'єднання з базою даних
$link->close();
?>
