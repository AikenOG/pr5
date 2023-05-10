<?php
header('Content-Type: application/json');
// Включение вывода ошибок
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Получите данные из запроса
if (isset($_POST['username']) && isset($_POST['password'])) {
  $inputUsername = $_POST['username'];
  $inputPassword = $_POST['password'];
} else {
  die(json_encode(array('success' => false, 'message' => 'Отсутствуют логин или пароль')));
}



// Параметры подключения к базе данных
$servername = "localhost";
$username = "1337";
$password = "1337";
$dbname = "login";

// Создайте соединение с базой данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверьте соединение
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Выполните запрос к таблице users
$sql = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $inputUsername, $inputPassword);
$stmt->execute();
$result = $stmt->get_result();

// Обработайте результат запроса
if ($result->num_rows > 0) {
  // Если найден пользователь с указанным логином и паролем, отправляем JSON-ответ со статусом успеха
  die(json_encode(array('success' => true)));
} else {
  // Если пользователь не найден, отправляем JSON-ответ со статусом ошибки
  die(json_encode(array('success' => false, 'message' => 'Неправильный логин или пароль')));
}

?>
