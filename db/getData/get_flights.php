<?php
require_once 'db_connect.php'; // Підключення до БД

// Отримуємо всі рейси
$sql = "SELECT ID_Flight, FlightNumber, Departure, Destination, DepartureTime, ArrivalTime FROM Flight";
$result = $link->query($sql);

// Кнопки управління
echo "<h2>Список рейсів</h2>";
echo "<button onclick='showForm(\"add\")'>Додати</button>
      <button onclick='showForm(\"edit\")'>Редагувати</button>
      <button onclick='showForm(\"delete\")'>Видалити</button>";

// Виводимо таблицю з рейсами
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Номер рейсу</th>
            <th>Відправлення</th>
            <th>Пункт призначення</th>
            <th>Час відправлення</th>
            <th>Час прибуття</th>
        </tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['ID_Flight']}</td>
                <td>{$row['FlightNumber']}</td>
                <td>{$row['Departure']}</td>
                <td>{$row['Destination']}</td>
                <td>{$row['DepartureTime']}</td>
                <td>{$row['ArrivalTime']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>Немає рейсів.</td></tr>";
}
echo "</table>";

// Форма для додавання
echo "<div id='addForm' style='display:none;'>
      <h2>Додати новий рейс</h2>
      <form id='addFlightForm'>
          <label>Номер рейсу: <input type='text' name='flight_number' required></label><br>
          <label>Відправлення: <input type='text' name='departure' required></label><br>
          <label>Пункт призначення: <input type='text' name='destination' required></label><br>
          <label>Час відправлення: <input type='datetime-local' name='departure_time' required></label><br>
          <label>Час прибуття: <input type='datetime-local' name='arrival_time' required></label><br>
          <button type='submit'>Додати рейс</button>
      </form>
      <div id='flightMessage'></div>
      </div>";

// Форма для редагування
echo "<div id='editForm' style='display:none;'>
      <h2>Редагувати рейс</h2>
      <form id='editFlightForm'>
          <label>ID рейсу: <input type='number' name='id_flight' required></label><br>
          <label>Новий номер рейсу: <input type='text' name='flight_number'></label><br>
          <label>Новий пункт призначення: <input type='text' name='destination'></label><br>
          <button type='submit'>Зберегти зміни</button>
      </form>
      <div id='editMessage'></div>
      </div>";

// Форма для видалення
echo "<div id='deleteForm' style='display:none;'>
      <h2>Видалити рейс</h2>
      <form id='deleteFlightForm'>
          <label>ID рейсу: <input type='number' name='id_flight' required></label><br>
          <button type='submit'>Видалити</button>
      </form>
      <div id='deleteMessage'></div>
      </div>";

$link->close();
?>

<script>
    function showForm(formType) {
        // Сховати всі форми
        $('#addForm').hide();
        $('#editForm').hide();
        $('#deleteForm').hide();

        // Показати форму в залежності від типу
        if (formType === 'add') {
            $('#addForm').show();
        } else if (formType === 'edit') {
            $('#editForm').show();
        } else if (formType === 'delete') {
            $('#deleteForm').show();
        }
    }
</script>