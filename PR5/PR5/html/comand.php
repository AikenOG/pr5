<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trainers_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение команды
$comand = $_POST['comand'];

// Обработка команд
switch ($comand) {
    case 'изменить имя и фамилию тренера':
        $trainer_id = $_POST['trainer_id'];
        $new_full_name = $_POST['new_full_name'];

        $sql = "UPDATE team_members SET name = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $new_full_name, $trainer_id);
        $stmt->execute();
        break;
    case 'изменить фотографию карточки':
        $trainer_id = $_POST['trainer_id'];
        $new_photo_url = $_POST['new_photo_url'];

        $sql = "UPDATE team_members SET photo = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $new_photo_url, $trainer_id);
        $stmt->execute();
        break;
    case 'изменить должность тренера':
        $trainer_id = $_POST['trainer_id'];
        $new_role = $_POST['new_position'];

        $sql = "UPDATE team_members SET role = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $new_role, $trainer_id);
        $stmt->execute();
        break;
    default:
        echo "Неизвестная команда";
        break;
}

$conn->close();

?>
