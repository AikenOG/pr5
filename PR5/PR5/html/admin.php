<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/reset.css">
    <title>Admin Panel</title>
</head>
<body>
    <header class="header"></header>
    
<div class="terminal" contenteditable="true" spellcheck="false"></div>
<div class="terminal-labels">
    1. Изменить имя и фамилию тренера<br>
    2. Изменить фотографию тренера<br>
    3. Изменить статус тренера<br>
    4. Вернуться на сайт<br>
</div>
<!-- Модальное окно 1 -->
<div class="modal" id="modal1">
    <div class="modal-content">
        <h2>Изменить имя и фамилию тренера</h2>
        <form id="nameForm" action="comand.php" method="post">
            <input type="hidden" name="comand" value="изменить имя и фамилию тренера">
            <label for="trainer_id">Выберите тренера:</label>
            <select name="trainer_id" id="trainer_id_name" required>
                <option value="1">Тренер 1</option>
                <option value="2">Тренер 2</option>
                <option value="3">Тренер 3</option>
            </select>
            <label for="new_name">Новое имя и фамилия:</label>
            <input type="text" id="new_name" name="new_full_name" placeholder="" onclick="this.value=''">
            <button type="submit">Сохранить</button>
        </form>
    </div>
</div>

<!-- Модальное окно 2 -->
<div class="modal" id="modal2">
    <div class="modal-content">
        <h2>Изменить фотографию тренера</h2>
        <form id="photoForm" action="comand.php" method="post">
            <input type="hidden" name="comand" value="изменить фотографию карточки">
            <label for="trainer_id">Выберите тренера:</label>
            <select name="trainer_id" id="trainer_id_photo" required>
                <option value="1">Тренер 1</option>
                <option value="2">Тренер 2</option>
                <option value="3">Тренер 3</option>
            </select>
            <label for="new_photo">Новая фотография (URL):</label>
            <input type="text" id="new_photo" name="new_photo_url" required>
            <button type="submit">Сохранить</button>
        </form>
    </div>
</div>


<!-- Модальное окно 3 -->
<div class="modal" id="modal3">
    <div class="modal-content">
        <h2>Изменить статус тренера</h2>
        <form id="statusForm" action="comand.php" method="post">
            <input type="hidden" name="comand" value="изменить должность тренера">
            <label for="trainer_id">Выберите тренера:</label>
            <select name="trainer_id" id="trainer_id_status" required>
                <option value="1">Тренер 1</option>
                <option value="2">Тренер 2</option>
                <option value="3">Тренер 3</option>
            </select>
            <label for="new_position">Новый статус:</label>
            <input type="text" id="new_position" name="new_position" placeholder="" onclick="this.value=''">
            <button type="submit">Сохранить</button>
        </form>
    </div>
</div>





<footer class="footer"></footer>
<script>
    document.querySelectorAll('form').forEach((form) => {
        form.addEventListener('submit', (event) => {
            event.preventDefault();

            let formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData
            }).then(response => {
                console.log(response);
            }).catch(error => {
                console.log(error);
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        const terminal = document.querySelector(".terminal");
        const modals = document.querySelectorAll(".modal");

        terminal.addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            const comand = parseInt(terminal.textContent.trim());

            if (comand >= 1 && comand <= 3) {
                modals[comand - 1].style.display = "flex";
            } else if (comand === 4) {
                // Замените 'http://example.com' на URL вашего основного сайта
                window.location.href = 'index.php';
            } else {
                alert("Неверная команда, введите число от 1 до 4.");
            }

            terminal.textContent = "";
        }
    });


        modals.forEach(function (modal) {
            modal.addEventListener("click", function (event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        });
    });
</script>
</body>
</html>

