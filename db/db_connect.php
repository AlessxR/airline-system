<!-- Connect to DB -->

<?php

// Connecting data's
$server = '127.127.126.50';
$login = 'root';
$password = '';
$name_db = 'AirlineSystem';

// Function connect to DB ~ True - success, False - unsuccess
$link = mysqli_connect($server, $login, $password, $name_db);

// Check connections
if ($link == False) {
    echo "Connection failed.";
}


?>