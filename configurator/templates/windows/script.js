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
  };

  var outsideFolderMap = {
    // 1 створка — без подпапки
    '1-deaf':   null,
    '1-type-1': null,
    '1-type-2': null,
    '1-type-3': null,
    '1-type-4': null,

    // 2 створки
    '2-deaf':   'mid',
    '2-type-1': 'right',
    '2-type-2': 'left',
    '2-type-3': 'mid',
    '2-type-4': 'left',
    '2-type-5': 'right',
    '2-type-6': 'mid',
    '2-type-7': 'mid',
    '2-type-8': 'mid',

    // 3 створки
    '3-deaf':   'center',
    '3-type-1': 'center',
    '3-type-2': 'center',
    '3-type-3': 'center',
    '3-type-4': 'center',
    '3-type-5': 'sides',
    '3-type-6': 'sides',
    '3-type-7': 'sides',
  };

  var colorLaminationList = [
    {label: 'Тёмный дуб Hyundai', colorImg: CONFIGURATOR_IMGS + '/color-lamination/dark-dub-hyundai.svg', previewKey: 'dark-dub-hyundai'},
    {label: 'Шоколадно-коричневая Hyundai', colorImg: CONFIGURATOR_IMGS + '/color-lamination/shokoladno-korichnevaya-hyundai.svg', previewKey: 'shokoladno-korichnevaya-hyundai'},
    {label: 'Антрацитово-серый Hyundai', colorImg: CONFIGURATOR_IMGS + '/color-lamination/antracitovo-seryy-hyundai.svg', previewKey: 'antracitovo-seryy-hyundai'},
    {label: 'Базальтово-серый Hyundai', colorImg: CONFIGURATOR_IMGS + '/color-lamination/bazaltovo-seryy-hyundai.svg', previewKey: 'bazaltovo-seryy-hyundai'},
    {label: 'Средне-серая Hyundai', colorImg: CONFIGURATOR_IMGS + '/color-lamination/sredne-seraya-hyundai.svg', previewKey: 'sredne-seraya-hyundai'},
    {label: 'Махагон Hyundai', colorImg: CONFIGURATOR_IMGS + '/color-lamination/mahagon-hyundai.svg', previewKey: 'mahagon-hyundai'},
    {label: 'Золотой дуб Hyundai', colorImg: CONFIGURATOR_IMGS + '/color-lamination/zolotoy-dub-hyundai.svg', previewKey: 'zolotoy-dub-hyundai'},
    {label: 'Натуральный дуб Hyundai', colorImg: CONFIGURATOR_IMGS + '/color-lamination/naturalnyy-dub-hyundai.svg', previewKey: 'naturalnyy-dub-hyundai'},
    {label: 'Орех тёмный Hyundai', colorImg: CONFIGURATOR_IMGS + '/color-lamination/oreh-temnyy-hyundai.svg', previewKey: 'oreh-temnyy-hyundai'},
    {label: 'Черно-коричневая Hyundai', colorImg: CONFIGURATOR_IMGS + '/color-lamination/cherno-korichnevaya-hyundai.svg', previewKey: 'cherno-korichnevaya-hyundai'},
    {label: 'Рустикальный дуб Hyundai', colorImg: CONFIGURATOR_IMGS + '/color-lamination/rustikalnyy-dub-hyundai.svg', previewKey: 'rustikalnyy-dub-hyundai'},
    {label: 'Морёный дуб Hyundai', colorImg: CONFIGURATOR_IMGS + '/color-lamination/morenyy-dub-hyundai.svg', previewKey: 'morenyy-dub-hyundai'},
    {label: 'Дуб Шефилд светлый Hyundai', colorImg: CONFIGURATOR_IMGS + '/color-lamination/dub-shefild-svetlyy-hyundai.svg', previewKey: 'dub-shefild-svetlyy-hyundai'},
    {label: 'Горная сосна Hyundai', colorImg: CONFIGURATOR_IMGS + '/color-lamination/gornaya-sosna-hyundai.svg', previewKey: 'gornaya-sosna-hyundai'},
    {label: 'Берёза Hyundai', colorImg: CONFIGURATOR_IMGS + '/color-lamination/beryoza-hyundai.svg', previewKey: 'beryoza-hyundai'},
    {label: 'Антрацитово-серый шагрень Hyundai', colorImg: CONFIGURATOR_IMGS + '/color-lamination/antracitovo-seryy-shagren-hyundai.svg', previewKey: 'antracitovo-seryy-shagren-hyundai'},
    {label: 'Чёрная шагрень Hyundai', colorImg: CONFIGURATOR_IMGS + '/color-lamination/chernaya-shagren-hyundai.svg', previewKey: 'chernaya-shagren-hyundai'},
    {label: 'Песочно-серый Hyundai', colorImg: CONFIGURATOR_IMGS + '/color-lamination/pesochno-seryy-hyundai.svg', previewKey: 'pesochno-seryy-hyundai'},
    {label: 'Брашированный Антрацитовый LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/brashirovannyy-antracitovyy-lg.svg', previewKey: 'brashirovannyy-antracitovyy-lg'},
    {label: 'Брызги шампанского LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/bryzgi-shampanskogo-lg.svg', previewKey: 'bryzgi-shampanskogo-lg'},
    {label: 'Брашированный Шоколадный LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/brashirovannyy-shokoladnyy-lg.svg', previewKey: 'brashirovannyy-shokoladnyy-lg'},
    {label: 'Африканская вишня LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/afrikanskaya-vishnya-lg.svg', previewKey: 'afrikanskaya-vishnya-lg'},
    {label: 'Античная сосна LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/antichnaya-sosna-lg.svg', previewKey: 'antichnaya-sosna-lg'},
    {label: 'Тёмный Тик LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/temnyy-tik-lg.svg', previewKey: 'temnyy-tik-lg'},
    {label: 'Винтажная сосна LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/vintazhnaya-sosna-lg.svg', previewKey: 'vintazhnaya-sosna-lg'},
    {label: 'Тёмно-синий LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/temno-siniy-lg.svg', previewKey: 'temno-siniy-lg'},
    {label: 'Старинный дуб LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/starinnyy-dub-lg.svg', previewKey: 'starinnyy-dub-lg'},
    {label: 'Шоколадная сосна LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/shokoladnaya-sosna-lg.svg', previewKey: 'shokoladnaya-sosna-lg'},
    {label: 'Сапели LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/sapeli-lg.svg', previewKey: 'sapeli-lg'},
    {label: 'Дуб антик LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/dub-antik-lg.svg', previewKey: 'dub-antik-lg'},
    {label: 'Бургундия LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/burgundiya-lg.svg', previewKey: 'burgundiya-lg'},
    {label: 'Светло-серый LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/svetlo-seryy-lg.svg', previewKey: 'svetlo-seryy-lg'},
    {label: 'Морёная сосна LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/morenaya-sosna-lg.svg', previewKey: 'morenaya-sosna-lg'},
    {label: 'Грецкий орех LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/greckiy-oreh-lg.svg', previewKey: 'greckiy-oreh-lg'},
    {label: 'Тёмно-зелёный LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/temno-zelenyy-lg.svg', previewKey: 'temno-zelenyy-lg'},
    {label: 'Ледяной серый LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/ledyanoy-seryy-lg.svg', previewKey: 'ledyanoy-seryy-lg'},
    {label: 'Глубокий чёрный LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/glubokiy-chernyy-lg.svg', previewKey: 'glubokiy-chernyy-lg'},
    {label: 'Блэк ульти-мат LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/blek-ulti-mat-lg.svg', previewKey: 'blek-ulti-mat-lg'},
    {label: 'Полосатая сосна LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/polosataya-sosna-lg.svg', previewKey: 'polosataya-sosna-lg'},
    {label: 'Кремовый LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/kremovyy-lg.svg', previewKey: 'kremovyy-lg'},
    {label: 'Сиена Светлая LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/siena-svetlaya-lg.svg', previewKey: 'siena-svetlaya-lg'},
    {label: 'Светлый дуб LG', colorImg: CONFIGURATOR_IMGS + '/color-lamination/svetlyy-dub-lg.svg', previewKey: 'svetlyy-dub-lg'},
  ];

  var glassList = [
    {label: 'С аргоном', colorImg: CONFIGURATOR_IMGS + '/glass-colors/argon-glass.svg', default: true},
    {label: 'И-стекло (низкоэмиссионное)', colorImg: CONFIGURATOR_IMGS + '/glass-colors/i-glass.svg'},
    {label: 'С мультистеклом', colorImg: CONFIGURATOR_IMGS + '/glass-colors/multi-glass.svg'},
    {label: 'С закаленным стеклом', colorImg: CONFIGURATOR_IMGS + '/glass-colors/tempered-glass.svg'},
    {label: 'Триплекс', colorImg: CONFIGURATOR_IMGS + '/glass-colors/triplex-glass.svg'},
    {label: 'Тонированное стекло', colorImg: CONFIGURATOR_IMGS + '/glass-colors/toner-glass.svg'},
    {label: 'Стекло с упрочняющей пленкой', colorImg: CONFIGURATOR_IMGS + '/glass-colors/reinforced-glass.svg'},
    {label: 'Обычное стекло', colorImg: CONFIGURATOR_IMGS + '/glass-colors/i-glass.svg'},
  ];

  var hardwareEconom = [
    {label: 'ФУТУРУСС', value: 'futuruss'},
    {label: 'МАКО «Мульти-Эко»', value: 'mako'},
  ];

  var hardwarePremium = [
    {label: 'ФУТУРУСС', value: 'futuruss'},
    {label: 'МАКО «Мульти-Матик»', value: 'mako'},
  ];

  var checkboxesWithoutWarmProfile = {
    warmFrame: true,
    gluing: true,
    film: true,
    warmProfile: false,
    hiddenHinges: true,
    tiltFirst: true,
  }

  var checkboxesWithWarmProfile = {
    warmFrame: true,
    gluing: true,
    film: true,
    warmProfile: true,
    hiddenHinges: true,
    tiltFirst: true,
  }
