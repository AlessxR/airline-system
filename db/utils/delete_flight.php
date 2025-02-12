<?php
require_once '/OSPanel/home/db-politech.local/public/db/getData/db_connect.php';

$id_flight = $_POST['id_flight'];

// Спочатку видаляємо білети, пов'язані з рейсом
$link->query("DELETE FROM Ticket WHERE ID_Flight = $id_flight");

// Тепер можна видалити сам рейс
if ($link->query("DELETE FROM Flight WHERE ID_Flight = $id_flight")) {
    echo "Рейс $id_flight успішно видалено!";
} else {
    echo "Помилка: " . $link->error;
}

$link->close();
