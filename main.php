<?php
    // Connect DB to main.php
    include "databases.php";

    // Робимо запрос на отримання даних
    $result = mysqli_query($link, "SELECT * FROM `Aircraft`");

    // Отримали всю таблицю в виді масива
    // $goods = mysqli_fetch_assoc($result);
    // echo $goods['Model']; // Вивід перву модель з запросу

    // while ($goods = mysqli_fetch_assoc($result)) {
    //     echo $goods['Model'];
    //     echo "<br>";
    // } // Вивели по моделі з БД.

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AirlineSystem</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <h1>Hello, <?php echo $login;?></h1>
    <h2>You're connect to DB - <?php echo $name_db;?></h2>

    
</body>
</html>