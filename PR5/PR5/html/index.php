
<?php
$servername = "localhost";
$username = "root";
$password = ""; // если у вас есть пароль, укажите его здесь
$dbname = "trainers_db";

// Создание соединения с базой данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Получение данных из базы данных
$sql = "SELECT id, name, photo, role FROM team_members";
$result = $conn->query($sql);

// Установка значения $teamMembers
$teamMembers = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $teamMembers[] = $row;
  }
}
$sql = "SELECT id, name, photo, role FROM team_members";
$result = $conn->query($sql);

// Закрытие соединения с базой данных
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W2 Fitness</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

  </head>
  <body>
  <div class="modal" id="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Авторизация</h2>
                <button class="modal-close" id="modal-close">&times;</button>
            </div>
            <div class="modal-body">
            <form id="login-form" method="post" action="admin.php">
  <div class="modal-input">
    <input type="text" id="username" name="username" placeholder="Логин" required>
  </div>
  <div class="modal-input">
    <input type="password" id="password" name="password" placeholder="Пароль" required>
  </div>
  <button type="submit" class="modal-btn">Войти</button>
</form>
            </div>
        </div>
    </div>
    <script src="/js/form.js"></script>



    <!-- Навигационная панель -->
    <nav class="nav-bar">
      <div class="logo">W2</div>
      <div class="nav-links">
        <a href="#home-section">Главная</a>
        <a href="#team-section">Наша команда</a>
        <a href="#" id="admin-btn">Админ панель</a>
      </div>
    </nav>
   
    
    <!-- Первый блок -->
<section class="first-block" id="home-section">
    <div class="background-image">
      <img src="/img/Ilya_World_Class.png" alt="Мужчина">
    </div>
    <div class="text">
      <h1>W2 Fitness</h1>
      <p>Фитнес премиум-класса с неограниченными возможностями</p>
    </div>
    <div class="card-block">
      <h3>Получите фитнесc-карту</h3>
      <p>По специальной цене</p>
      <div class="button-block">
        <a href="#" class="apply-button"><span>Оставить заявку</span></a>
        <a href="#" class="details-button">Подробнее</a>
      </div>
    </div>
  </section>

 <!-- Второй блок -->

 <section class="second-block">
  <div class="second-block-front"></div>
  <div class="header">
    <h1>ФИТНЕС-ВОЗМОЖНОСТИ</h1>
  </div>
  <div class="description">
    <p>«W2 Fitness» – фитнес-клуб премиум-класса общей площадью ~4000 кв.м. Уникальность этого заведения в том, что в одном здании, расположенном в центре города, рядом с центром, созданы все условия для занятий спортом.</p>
  </div>
  <div class="slider-container">
    <div class="slider-text">
      <p>Качайся - Прокачивайся и вдохновляйся на новые достижения.</p>
    </div>
    <button class="slider-arrow prev-arrow"></button>
    <button class="slider-arrow next-arrow"></button>
  </div>
  <div class="icons-container">
    <div class="icons">
      <div class="icon">
        <img src="/img/free-icon-dumbbell-308911.png" alt="Иконка 1">
        <p>Тренажерный зал</p>
      </div>
      <div class="icon">
        <img src="/img/free-icon-network-1208280.png" alt="Иконка 2">
        <p>Групповые программы</p>
      </div>
      <div class="icon">
        <img src="/img/free-icon-biceps-6619275.png" alt="Иконка 3">
        <p>Персональный тренинг</p>
      </div>
      <div class="icon">
        <img src="/img/free-icon-heart-shape-outline-with-lifeline-30545.png" alt="Иконка 4">
        <p>Фитнес тестирование</p>
      </div>
      <div class="icon">
        <img src="/img/free-icon-swimming-pool-2977053.png" alt="Иконка 5">
        <p>Аквазона</p>
      </div>
      <div class="icon">
        <img src="/img/free-icon-baby-boy-2641623.png" alt="Иконка 6">
        <p>Детский Фитнесс</p>
      </div>
    </div>
  </div>
</section>

 <!-- Третий блок -->
<section class="third-block">
  <div class="video-container">
    <video autoplay muted loop>
      <source src="https://dl.dropboxusercontent.com/s/0lgrfoc6uxa0auc/2020.10.30_WorldClass%20%281%29.mp4?dl=0" type="video/mp4">
    </video>
  </div>
</section>

 <!-- Четвертый блок -->
<section class="fourth-block" id="team-section">
  <nav>
    <h1>Наша команда</h1>
  </nav>
  <div class="card-container">
    <?php foreach ($teamMembers as $member): ?>
    <div class="card">
      <div class="card-image" style="background-image: url('<?php echo $member["photo"]; ?>')"></div>
      <div class="card-content">
        <h2><?php echo $member["name"]; ?></h2>
        <p><?php echo $member["role"]; ?></p>
      </div>
      <form method="post" action="comand.php">
        <input type="hidden" name="trainer_id" value="<?php echo $member["id"]; ?>">
        <input type="hidden" name="comand" value="update_trainer">
        <input type="text" name="new_name" placeholder="Новое имя">
        <input type="text" name="new_photo" placeholder="Новое фото">
        <input type="text" name="new_role" placeholder="Новая роль">
        <button type="submit">Обновить</button>
      </form>
    </div>
    <?php endforeach; ?>
  </div>
  <footer>
    <p>Владислав, 5 практическая работа</p>
  </footer>
</section>
    <script src="/js/main.js"></script>
  </body>
</html>