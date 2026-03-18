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