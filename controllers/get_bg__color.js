const nav_card = document.querySelector('.nav-card');

function getRandomHexColor() {
    return '#' + Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0');
}

nav_card.style.backgroundColor = getRandomHexColor(); // Для цвета фона
