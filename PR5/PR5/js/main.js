document.addEventListener("DOMContentLoaded", function () {
  const updateTrainerForms = document.querySelectorAll(".card form");

  updateTrainerForms.forEach((form) => {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      const formData = new FormData(form);

      fetch("comand.php", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.text())
        .then((result) => {
          console.log(result);
          alert("Информация о тренере успешно обновлена");
          location.reload(); // обновление страницы для отображения изменений
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    });
  });
});

    const sliderTexts = [
    "Качайся - Прокачивайся и вдохновляйся на новые достижения.",
    "Участвуйте в наших групповых программах для мотивации и поддержки ваших фитнес-целей.",
    "Получите персональное внимание от наших профессиональных тренеров для максимальной эффективности тренировок.",
    "Пройдите фитнес-тестирование, чтобы лучше понять свои сильные и слабые стороны и разработать индивидуальный план тренировок.",
    "Отдохните и восстановитесь в нашей аквазоне с бассейном, сауной и гидромассажем.",
    "Позаботьтесь о фитнесе своих детей с нашими специальными программами для детей."
  ];
  
  const sliderText = document.querySelector('.slider-text p');
  const prevArrow = document.querySelector('.prev-arrow');
  const nextArrow = document.querySelector('.next-arrow');
  const iconElements = document.querySelectorAll('.icon');
  const teamLink = document.querySelector('a[href="#team-section"]');
  const teamSection = document.querySelector('#team-section');
  const homeLink = document.querySelector('a[href="#home-section"]');
  const homeSection = document.querySelector('#home-section');
  

  
  let currentSlide = 0;
  let currentAnimation;
  
  function updateSliderText(slideIndex) {
    if (sliderText.animating) return;
  
    sliderText.animating = true;
    sliderText.style.animationName = 'fadeOutUp';
  
    sliderText.addEventListener('animationend', function handleAnimationEnd() {
      sliderText.removeEventListener('animationend', handleAnimationEnd);
      sliderText.textContent = sliderTexts[slideIndex];
      sliderText.style.animationName = 'fadeInDown';
  
      sliderText.addEventListener('animationend', function handleAnimationEnd() {
        sliderText.removeEventListener('animationend', handleAnimationEnd);
        sliderText.style.animationName = '';
        sliderText.animating = false;
      });
    });
  }
  
  iconElements.forEach((iconElement, index) => {
    iconElement.addEventListener('click', () => {
      currentSlide = index;
      updateSliderText(currentSlide);
    });
  });
  
  teamLink.addEventListener('click', (event) => {
    event.preventDefault();
    teamSection.scrollIntoView({ behavior: 'smooth' });
  });
  homeLink.addEventListener('click', (event) => {
    event.preventDefault();
    homeSection.scrollIntoView({ behavior: 'smooth' });
  });
    const adminBtn = document.getElementById("admin-btn");
    const loginModal = document.querySelector(".modal");
    const modalClose = document.querySelector(".modal-close");
    const loginForm = document.querySelector(".modal-body form");
    const loginBtn = document.querySelector(".modal-btn");

    // Открыть модальное окно для входа
    adminBtn.addEventListener("click", (e) => {
      e.preventDefault();
      loginModal.style.display = "block";
    });

    // Закрыть модальное окно
    modalClose.addEventListener("click", () => {
      loginModal.style.display = "none";
    });

    // Обработать вход
    loginForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const username = document.getElementById("username").value;
      const password = document.getElementById("password").value;

      // Валидация входа (проверьте, соответствуют ли имя пользователя и пароль вашим учетным данным администратора)
      if (username === "admin" && password === "password") {
        alert("Успешный вход в админ-панель");
        // Закрыть модальное окно
        loginModal.style.display = "none";
        // Здесь можно добавить код, который будет отображать админ-панель после успешного входа
      } else {
      }
    });