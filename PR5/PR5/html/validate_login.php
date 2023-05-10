<?php
// Начинаем сессию
session_start();

// Подключаем файл с настройками подключения к базе данных
require_once 'login.php';

// Проверяем, была ли отправлена форма авторизации
if (isset($_POST['username']) && isset($_POST['password'])) {
  // Получаем введенные логин и пароль из формы
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Проверяем, существует ли пользователь с таким логином и паролем
  $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$username, $password]);
  $user = $stmt->fetch();

  if ($user) {
    // Если пользователь найден, сохраняем его данные в сессии
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    // Перенаправляем пользователя на следующую страницу
    header('Location: admin.php');
    exit;
  } else {
    // Если пользователь не найден, отображаем ошибку
    $error = 'Неправильное имя пользователя или пароль';
  }
}
?>