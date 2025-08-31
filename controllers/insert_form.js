document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('reviewForm');
  const responseDiv = document.getElementById('formResponse');
  let responseTimeout;

  if (!form) return;

  form.addEventListener('submit', function(e) {
    e.preventDefault();

    // Очистить предыдущее сообщение перед отправкой
    responseDiv.textContent = '';

    const formData = new FormData(form);

    fetch(form.action, {
      method: 'POST',
      body: formData
    })
    .then(res => res.json())
    .then(data => {
      // ожидаем data.success и data.message
      if (data && data.success) {
        responseDiv.textContent = data.message || 'Успешно';
        form.reset();

        // Очистка уведомления через 3 секунды
        if (responseTimeout) {
            clearTimeout(responseTimeout);
        }
        responseTimeout = setTimeout(function() {
            responseDiv.textContent = '';
        }, 1500);
        } else {
            
        responseDiv.textContent = data?.message || 'Ошибка отправки';
      }
    })
    .catch(err => {
      responseDiv.textContent = 'Ошибка соединения: ' + err;
    });
  });
});