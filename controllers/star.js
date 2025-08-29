(function() {
const container = document.querySelector('.star-rating');
const stars = Array.from(container.querySelectorAll('.star'));
const inputHidden = document.getElementById('ratingValue');

// резервируем поведение: когда курсор по звезде, подсветка до неё
// и при клике устанавливаем значение
stars.forEach((star) => {
const value = parseInt(star.dataset.value, 10);

star.addEventListener('mouseenter', () =&gt; {
  highlightStars(value);
});

star.addEventListener('mouseleave', () =&gt; {
  // вернуть к текущему сохраненному значению
  highlightStars(parseInt(inputHidden.value, 10) || 0);
});

star.addEventListener('click', () =&gt; {
  inputHidden.value = value;
  highlightStars(value);
});
});

function highlightStars(n) {
stars.forEach((s) => {
const val = parseInt(s.dataset.value, 10);
if (val <= n) {
s.classList.add('active');
} else {
s.classList.remove('active');
}
});
}

// начальная установка (если нужно показать сохранённое значение)
highlightStars(parseInt(inputHidden.value, 10) || 0);
})();