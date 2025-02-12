<?php
require_once '/OSPanel/home/db-politech.local/public/db/getData/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_flight"];
    $flightNumber = $_POST["flight_number"];
    $destination = $_POST["destination"];

    $sql = "UPDATE Flight SET FlightNumber = '$flightNumber', Destination = '$destination' WHERE ID_Flight = $id";

    if ($link->query($sql) === TRUE) {
        echo "Рейс успішно оновлено!";
    } else {
        echo "Помилка: " . $link->error;
    }

    $link->close();
}
?>
