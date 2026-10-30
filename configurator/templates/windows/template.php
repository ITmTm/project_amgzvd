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
