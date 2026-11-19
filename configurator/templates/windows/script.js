$(document).ready(function () {
  var configuratorParamsSwiper = null;

  function initParamsSwiper() {
    if (configuratorParamsSwiper) {
      configuratorParamsSwiper.destroy(true, true);
      configuratorParamsSwiper = null;
    }

    configuratorParamsSwiper = new Swiper('#configurator-params-slider .configurator__params-swiper', {
