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


// Поиск
$(document).on('submit', '#news-search-form', function(e) {
  e.preventDefault();
  const query = $(this).find('input[name="q"]').val();
  const url = '/news-smi/?' + (query ? 'q=' + encodeURIComponent(query) : '');

  window.history.pushState({}, '', url);
  loadNews(url, query);
});


// Показать/скрыть крестик