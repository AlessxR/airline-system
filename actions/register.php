<?php
// Connecting data's
$server = '127.127.126.50';
$login = 'root';
$password = '';
$name_db = 'AirlineSystem';

// Function connect to DB ~ True - success, False - unsuccess
$link = mysqli_connect($server, $login, $password, $name_db);

// Отримання даних форми
$email = $_POST['email'];
$password = $_POST['password'];

// Є такий користувач?
$email = $_POST['email'];
$password = $_POST['password'];

// Є користувач з таким email?
$check_user_query = "SELECT * FROM usertbl WHERE email='$email'";
$check_user_result = mysqli_query($link, $check_user_query);

if (mysqli_num_rows($check_user_result) > 0) {
  echo "Пользователь с таким email уже существует.";
  header("Location: /pages/login.html");
} else {
  // Хеширование пароля
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Вставка поля в БД
  $register_query = "INSERT INTO usertbl (email, password) VALUES ('$email', '$hashed_password')";
  mysqli_query($link, $register_query);

  header("Location: /pages/home.html");
  echo "Регистрация успешна!";
}
