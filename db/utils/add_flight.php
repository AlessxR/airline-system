<?php
require_once '/OSPanel/home/db-politech.local/public/db/getData/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flightNumber = $_POST["flight_number"];
    $departure = $_POST["departure"];
    $destination = $_POST["destination"];
    $departureTime = $_POST["departure_time"];
    $arrivalTime = $_POST["arrival_time"];

    $sql = "INSERT INTO Flight (FlightNumber, Departure, Destination, DepartureTime, ArrivalTime) 
            VALUES ('$flightNumber', '$departure', '$destination', '$departureTime', '$arrivalTime')";

    if ($link->query($sql) === TRUE) {
        echo "Рейс успішно додано!";
    } else {
        echo "Помилка: " . $link->error;
    }

    $link->close();
}
?>
