<?php
  $server = '127.127.126.50';
  $login = 'root';
  $password = '';
  $name_db = 'AirlineSystem';

  // Function connect to DB ~ True - success, False - unsuccess
  $link = mysqli_connect($server, $login, $password, $name_db);
  // Получение данных формы авторизации
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Пошук користувача по email
  $login_query = "SELECT * FROM usertbl WHERE email='$email'";
  $login_result = mysqli_query($link, $login_query);

  if (mysqli_num_rows($login_result) == 1) {
    $email = mysqli_fetch_assoc($login_result);
   
    // Проверка пароля
    if (password_verify($password, $email['password'])) {
      // Направлення на головну сторінку
      session_start();
      $_SESSION['email'] = $email['email'];
      header("Location: /pages/home.html");
    } else {
      echo "Неверный пароль.";
    }
  } else {
    echo "Пользователь не найден.";
  }
?>