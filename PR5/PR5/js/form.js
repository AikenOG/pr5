const form = document.getElementById('login-form');
  const usernameInput = document.getElementById('username');
  const passwordInput = document.getElementById('password');

  form.addEventListener('submit', function(event) {
    event.preventDefault();

    const usernameValue = usernameInput.value.trim();
    const passwordValue = passwordInput.value.trim();

    if (usernameValue === '') {
      alert('Введите логин');
      return;
    }

    if (passwordValue === '') {
      alert('Введите пароль');
      return;
    }

    // Отправляем запрос на сервер
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'login.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);
        if (response.success) {
          window.location.href = 'admin.php'; // Перенаправляем пользователя на другую страницу
        } else {
          alert(response.message); // Выводим сообщение об ошибке
        }
      } else {
        alert('Ошибка сервера'); // Выводим сообщение об ошибке
      }
    };
    xhr.send('username=' + encodeURIComponent(usernameValue) + '&password=' + encodeURIComponent(passwordValue));
  });