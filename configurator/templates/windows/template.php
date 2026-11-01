<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addCss($templateFolder . '/style.css');
Asset::getInstance()->addJs($templateFolder . '/script.js');
?>

<!-- Оверлей конфигуратора -->
<div class="configurator-overlay" id="configurator-overlay"></div>

<!-- Поп-ап конфигуратора -->
<div class="configurator" id="configurator">
  <div class="configurator__inner">

    <!-- Шапка -->
    <div class="configurator__header">
      <h3 class="configurator__title subtitle-h2" id="configurator-title"></h3>
      <button class="configurator__close" id="configurator-close" type="button">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M18 6L6 18M6 6L18 18" stroke="#1B1C20" stroke-width="2" stroke-linecap="round"/>
        </svg>
      </button>
    </div>

    <!-- 5 карточек параметров -->
    <div class="configurator__params-slider" id="configurator-params-slider">
      <button class="configurator-params-prev" type="button">
        <img src="/imgs/icons/chevron-left.svg" alt="Влево">
      </button>
      <div class="swiper configurator__params-swiper">
        <div class="swiper-wrapper" id="configurator-params"></div>
        <div class="configurator-params-pagination"></div>
      </div>
      <button class="configurator-params-next" type="button">
        <img src="/imgs/icons/chevron-right.svg" alt="Вправо">
      </button>
    </div>
    <!-- Основная часть: конфигурация + превью + параметры -->
    <div class="configurator__body">

      <!-- Левая часть — выбор конфигурации -->
      <div class="configurator__config">

        <!-- Количество створок -->
        <div class="configurator__config-section">
          <div class="configurator__config-label subtitle-h4">Выберите конфигурацию:</div>
          <div class="configurator__config-sublabel text-xs">Количество створок:</div>
          <div class="configurator__sashes" id="configurator-sashes">
            <button class="configurator__sash-btn active" data-sashes="1" type="button">
              <img src="<?= $templateFolder ?>/imgs/stvorki/odnostvorchatoye.svg" alt="1 створка">
            </button>
            <button class="configurator__sash-btn" data-sashes="2" type="button">
              <img src="<?= $templateFolder ?>/imgs/stvorki/dvukhstvorchataya.svg" alt="2 створки">
            </button>
            <button class="configurator__sash-btn" data-sashes="3" type="button">
              <img src="<?= $templateFolder ?>/imgs/stvorki/trekhstvorchataya.svg" alt="3 створки">
            </button>
          </div>
        </div>
