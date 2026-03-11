// Пагинация
$(document).on('click', '.pagination-item', function(e) {
  e.preventDefault();
  const url = $(this).attr('href');
  if (!url || $(this).hasClass('disabled') || $(this).hasClass('dots')) return;

  $('html, body').animate({
    scrollTop: $('.news-wrapper').offset().top - 200
  }, 500);

  loadNews(url);
});

// Показать/скрыть крестик
$(document).on('input', '#news-search-form input[name="q"]', function(e) {
  const $clear = $(this).siblings('.input-clear');
  if ($(this).val().length > 0) {
    $clear.addClass('visible');
  } else {
    $clear.removeClass('visible');
  }
});

// Клик по крестику - очистить поле
$(document).on('click', '.input-clear', function(e) {
  const $input = $(this).siblings('input[name="q"]');
  $input.val('').focus();
  $(this).removeClass('visible');
});


// Проверка при загрузке, есть ли значения
$(document).ready(function () {
  const $input = $('#news-search-form input[name="q"]');
  if ($input.val().length > 0) {
    $input.siblings('.input-clear').addClass('visible');
  }
})


// Поиск
$(document).on('submit', '#news-search-form', function(e) {
  e.preventDefault();
  const query = $(this).find('input[name="q"]').val();
  const url = '/news-smi/?' + (query ? 'q=' + encodeURIComponent(query) : '');

  window.history.pushState({}, '', url);
  loadNews(url, query);
});

// Сброс
$(document).on('click', '.btn-brand-red-clean', function(e) {
  e.preventDefault();
  const url = $(this).attr('href');
  $('input[name="q"]').val('');
  $('.input-clear').removeClass('visible');
  window.history.pushState({}, '', url);
  loadNews(url);
});

// Общая функция загрузки
function loadNews(url, query) {
  $('#news-loader').removeClass('d-none');

  $.ajax({
    url: url,
    type: 'GET',
    success: function(response) {
      const $response = $(response);
      let newContent = $response.find('.news-content').html();
      if (!newContent) {
        newContent = $response.filter('.news-content').html();
      }
      if (newContent) {
        $('.news-content').html(newContent);
        $('#news-loader').addClass('d-none');
      }
      if (query) {
        $('input[name="q"]').val(query);
      }
    },
    error: function() {
      $('#news-loader').addClass('d-none');
    }
  });
}