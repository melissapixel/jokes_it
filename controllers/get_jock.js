function get_jock() {
    let joke_here = document.querySelector('.card-text');

    let xhr = new XMLHttpRequest();
    xhr.onload = function() {
        if (xhr.status === 200) {
            joke_here.innerHTML = xhr.responseText;
        }
    };

    xhr.open("POST", "php/get_new__jous.php", true);
    xhr.send();
}

function getRandomHexColor() {
    return '#' + Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0');
}

// Пример: при клике по нав-карте меняем фон и можем подгрузить шутку
document.addEventListener('click', function(e) {
    // если кликаем по элементу с нужным классом
    if (e.target.closest('.nav-card')) {
        // обновляем фон
        const nav_card = e.target.closest('.nav-card');
        nav_card.style.backgroundColor = getRandomHexColor();

        // можно вызвать подгрузку анекдота, если нужно
        // например двигайте клик по нав-карте даёт новую шутку
        get_jock();
    }
});

// Инициализируем фон сразу, если элемент есть на странице
const initial_nav_card = document.querySelector('.nav-card');
if (initial_nav_card) {
    initial_nav_card.style.backgroundColor = getRandomHexColor();
}