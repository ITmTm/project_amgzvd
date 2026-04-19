<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("Амега в " . $SEO_CITY . " - компания по производству металлических и пвх конструкций");
$APPLICATION->SetPageProperty("title", "Амега в " . $SEO_CITY . " - компания по производству металлических и пвх конструкций");
$APPLICATION->SetPageProperty("description", "Компания Амега в " . $SEO_CITY . " ★ 13 лет на рынке ★ 34 секунды - время изготовление окна ★ 2 550 конструкций в сутки ★ Выгодные условия для дилеров ★ Система скидок ★ Собственная сеть логистики");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->AddHeadScript("/about/js/script.js");
require("banner_top.php");

$breadcrumbs = [
    array(
        "title" => "Главная",
        "url" => "/",
    ),
    array(
        "title" => "О компании",
        "url" => "",
    ),
];

require($_SERVER["DOCUMENT_ROOT"] . "/parts/breadcrumbs.php");
require($_SERVER["DOCUMENT_ROOT"] . "/parts/statistics/statistics.php"); ?>
<section class="py-5">
  <div class="container">
    <div class="row g-3 align-items-center mb-4">
      <div class="col-lg col-12 order-lg-1 order-2 d-flex flex-column">
        <h2 class="fs-3 fw-bold mb-4">Наши продукты</h2>
        <div class="mb-4">Завод «Амега» - это мультибрендовое предприятие. Мы производим окна, балконы, двери, порталы
          из 6 профильных ПВХ систем, 3 алюминиевых систем, 3 видов фурнитуры для ПВХ, 5 видов фурнитуры для алюминия и
          8 видов стекол. Ассортимент завода «Амега» может удовлетворить любой запрос потребителя от эконом до премиума.
        </div>
        <div>
          <a href="/assets/files/presentation-amega-2026.pdf" target="_blank"
             class="btn btn-outline-danger btn-outline-brand-red">Ассортиментная матрица <img
              src="/imgs/icons/download-black.svg" alt=""></a>
        </div>
      </div>
      <div class="col-lg-4 col-12 order-lg-2 order-1">
        <img src="/about/img/1.png" alt="" class="w-100">
      </div>
    </div>
    <div class="row g-3  align-items-center mb-4">
      <div class="col-lg-4 col-12">
        <img src="/about/img/5.png" alt="" class="w-100">
      </div>
      <div class="col-lg col-12 d-flex flex-column">
        <h2 class="fs-3 fw-bold mb-4">Производство</h2>
        <div class="mb-4">Производственная площадки завода «Амега» оснащена тенологическими линиями: EMAR, BEST MAKINA,
          FIMTEC, включая 3 линии по ламинированию профильных систем и изготовлению окон любой формы. Производственный
          процесс выстроен по принципу бережливого производства Kaizen и включает в себя испытания конструкций на
          собственной лабораторной базе.
        </div>
        <div>
          <div class="btn btn-outline-danger btn-outline-brand-red sign_tour">
            Записаться на экскурсию на завод <img src="/imgs/icons/arrows-right-black.svg" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="row g-3 align-items-center mb-4">
      <div class="col-lg col-12 order-lg-1 order-2 d-flex flex-column">
        <h2 class="fs-3 fw-bold mb-4">Логистика</h2>
        <div class="mb-4">
          «Амега» – это собственная сеть логистики. Доставка в 8 регионов России осуществляется в тентовом транспорте со
          100% упаковкой изделий. Сеть распределительных центров в Перми, Екатеринбурге, Уфе, Казани, Ижевске, Тюмени
          помогает доставлять заказы до адреса потребителя или организовывать самовывоз.
          <br><br>Записывайтесь на точное время самовывоза и получайте заказ без очередей, в запланированное время.
          <br>При самовывозе из распределительного центра в субботу - запись обязательна.
        </div>
        <div>
            <? if ((int)$CITY['IBLOCK_SECTION_ID'] === 305) : ?>
              <a href="https://dikidi.ru/1559160?p=0.pi" target="_blank"
                 class="btn btn-outline-danger btn-outline-brand-red">
                Записаться на самовывоз
                <img src="/imgs/icons/arrows-right-black.svg" alt="→">
              </a>
            <? elseif ((int)$CITY['IBLOCK_SECTION_ID'] === 311) : ?>
          <a href="https://dikidi.net/1639840?p=0.pi"
             target="_blank" class="btn btn-outline-danger btn-outline-brand-red">
            Записаться на самовывоз
            <img src="/imgs/icons/arrows-right-black.svg" alt="→">
          </a>
            <? elseif ((int)$CITY['ID'] === 244757) : ?>
          <a href="https://dikidi.ru/1680845?p=0.pi" target="_blank" class="btn btn-outline-danger btn-outline-brand-red">
            Записаться на самовывоз
            <img src="/imgs/icons/arrows-right-black.svg" alt="→">
          </a>
            <? elseif ((int)$CITY['ID'] === 244758) : ?>
          <a href="https://dikidi.ru/1843509?p=0.pi" target="_blank" class="btn btn-outline-danger btn-outline-brand-red">
            Записаться на самовывоз
            <img src="/imgs/icons/arrows-right-black.svg" alt="→">
          </a>
            <? elseif ((int)$CITY['ID'] === 244763) : ?>
          <a href="https://dikidi.ru/1546580?p=0.pi" target="_blank" class="btn btn-outline-danger btn-outline-brand-red">
            Записаться на самовывоз
            <img src="/imgs/icons/arrows-right-black.svg" alt="→">
          </a>
