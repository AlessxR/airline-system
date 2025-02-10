<?php
  // Авторизован користувач?
  session_start();
  if (!isset($_SESSION['email'])) {
    header("Location: login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Личный кабинет</title>
</head>
<body>
  <h1>Добро пожаловать, <?php echo $_SESSION['email']; ?>!</h1>

  <a href="/pages/login.html">Выход</a>
</body>
</html>