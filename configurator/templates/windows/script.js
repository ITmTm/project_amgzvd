$(document).ready(function () {
  var configuratorParamsSwiper = null;

  function initParamsSwiper() {
    if (configuratorParamsSwiper) {
      configuratorParamsSwiper.destroy(true, true);
      configuratorParamsSwiper = null;
    }

    configuratorParamsSwiper = new Swiper('#configurator-params-slider .configurator__params-swiper', {
      grabCursor: true,
      slidesPerView: 1,
      spaceBetween: 16,
      autoHeight: false,
      navigation: {
        prevEl: '.configurator-params-prev',
        nextEl: '.configurator-params-next',
      },
      pagination: {
        el: '.configurator-params-pagination',
      },
      breakpoints: {
        768: {
          slidesPerView: 2,
          spaceBetween: 16,
        },
        1100: {
          slidesPerView: 3,
          spaceBetween: 16,
        },
        1344: {
          slidesPerView: 5,
          spaceBetween: 20,
          allowTouchMove: false,
          grabCursor: false,
        }
      }
    });
  }


  // ================================
  // ОБЩИЕ ДАННЫЕ (переиспользуются)
  // ================================
  var insideFolderMap = {
    // 1 створка
    '1-deaf':   'deaf',
    '1-type-1': 'with-handles-and-hinges-l',
    '1-type-2': 'with-handles-and-hinges-r',
    '1-type-3': 'with-handles-and-hinges-l',
    '1-type-4': 'with-handles-and-hinges-r',

    // 2 створки
    '2-deaf':   'deaf',
    '2-type-1': 'with-handles-and-hinges-r',
    '2-type-2': 'with-handles-and-hinges-l',
    '2-type-3': 'with-handles-and-hinges-m',
    '2-type-4': 'with-handles-and-hinges-l',
    '2-type-5': 'with-handles-and-hinges-r',
    '2-type-6': 'with-handles-and-hinges-m',
    '2-type-7': 'with-handles-and-hinges-m',
    '2-type-8': 'with-handles-and-hinges-m',

    // 3 створки
    '3-deaf':   'deaf',
    '3-type-1': 'with-handle-center-l',
    '3-type-2': 'with-handle-center-r',
    '3-type-3': 'with-handle-center-l',
    '3-type-4': 'with-handle-center-r',
    '3-type-5': 'with-handles-sides',
    '3-type-6': 'with-handles-sides',
    '3-type-7': 'with-handles-sides',
