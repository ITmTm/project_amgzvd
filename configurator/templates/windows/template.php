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

        <!-- Тип открывания -->
        <div class="configurator__config-section">
          <div class="configurator__config-sublabel text-xs">Тип открывания:</div>
          <div class="configurator__opening-types" id="configurator-opening-types">

            <!-- 1 створка — 5 иконок -->
            <div class="configurator__opening-group" data-sashes-group="1">
              <button class="configurator__opening-btn active" data-opening="1-deaf" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/1-deaf.svg" alt="Глухое">
              </button>
              <button class="configurator__opening-btn" data-opening="1-type-1" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/1-type-1.svg" alt="Распашное, ручка - слева">
              </button>
              <button class="configurator__opening-btn" data-opening="1-type-2" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/1-type-2.svg" alt="Распашное, ручка - справа">
              </button>
              <button class="configurator__opening-btn" data-opening="1-type-3" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/1-type-3.svg" alt="Поворотно-откидное, ручка - слева">
              </button>
              <button class="configurator__opening-btn" data-opening="1-type-4" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/1-type-4.svg" alt="Поворотно-откидное, ручка - справа">
              </button>
            </div>

            <!-- 2 створки — 9 иконок -->
            <div class="configurator__opening-group" data-sashes-group="2" style="display:none">
              <button class="configurator__opening-btn active" data-opening="2-deaf" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/2-deaf.svg" alt="Глухое">
              </button>
              <button class="configurator__opening-btn" data-opening="2-type-1" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/2-type-1.svg" alt="Левая глухая / Правая распашная створка">
              </button>
              <button class="configurator__opening-btn" data-opening="2-type-2" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/2-type-2.svg" alt="Левая распашная / Правая глухая створка">
              </button>
              <button class="configurator__opening-btn" data-opening="2-type-3" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/2-type-3.svg" alt="Левая распашная / Правая распашная створка">
              </button>
              <button class="configurator__opening-btn" data-opening="2-type-4" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/2-type-4.svg"
                     alt="Левая поворотно-откидная / Правая глухая створка">
              </button>
              <button class="configurator__opening-btn" data-opening="2-type-5" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/2-type-5.svg"
                     alt="Левая глухая / Правая поворотно-откидная створка">
              </button>
              <button class="configurator__opening-btn" data-opening="2-type-6" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/2-type-6.svg"
                     alt="Левая поворотно-откидная / Правая распашная створка">
              </button>
              <button class="configurator__opening-btn" data-opening="2-type-7" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/2-type-7.svg"
                     alt="Левая распашная / Правая поворотно-откидная створка">
              </button>
              <button class="configurator__opening-btn" data-opening="2-type-8" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/2-type-8.svg"
                     alt="Левая поворотно-откидная / Правая поворотно-откидная створка">
              </button>
            </div>

            <!-- 3 створки — 8 иконок -->
            <div class="configurator__opening-group" data-sashes-group="3" style="display:none">
              <button class="configurator__opening-btn active" data-opening="3-deaf" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/3-deaf.svg" alt="Глухое">
              </button>
              <button class="configurator__opening-btn" data-opening="3-type-1" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/3-type-1.svg"
                     alt="Левая глухая / Центральная распашная - ручка слева / Правая глухая створка">
              </button>
              <button class="configurator__opening-btn" data-opening="3-type-2" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/3-type-2.svg"
                     alt="Левая глухая / Центральная распашная - ручка справа / Правая глухая створка">
              </button>
              <button class="configurator__opening-btn" data-opening="3-type-3" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/3-type-3.svg"
                     alt="Левая глухая / Центральная поворотно-откидная - ручка слева / Правая глухая створка">
              </button>
              <button class="configurator__opening-btn" data-opening="3-type-4" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/3-type-4.svg"
                     alt="Левая глухая / Центральная поворотно-откидная - ручка справа / Правая глухая створка">
              </button>
              <button class="configurator__opening-btn" data-opening="3-type-5" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/3-type-5.svg"
                     alt="Левая распашная / Центральная глухая / Правая распашная створка">
              </button>
              <button class="configurator__opening-btn" data-opening="3-type-6" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/3-type-6.svg"
                     alt="Левая поворотно-откидная / Центральная глухая / Правая распашная створка">
              </button>
              <button class="configurator__opening-btn" data-opening="3-type-7" type="button">
                <img src="<?= $templateFolder ?>/imgs/opening-types/3-type-7.svg"
                     alt="Левая распашная / Центральная глухая / Правая поворотно-откидная створка">
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Центр — превью окна -->
      <div class="configurator__preview">
        <div class="configurator__preview-toggle">
          <button class="configurator__preview-toggle-btn" data-view="inside" type="button">Изнутри</button>
          <button class="configurator__preview-toggle-btn active" data-view="outside" type="button">Снаружи</button>
        </div>
        <img src="" alt="Превью окна" id="configurator-preview-img" class="configurator__preview-img">
      </div>

      <!-- Правая часть — параметры комплектации + форма -->
      <div class="configurator__options">
        <div class="configurator__options-label subtitle-h4">Выберете параметры комплектации:</div>

        <!-- Дропдауны -->
        <div class="configurator__dropdowns" id="configurator-dropdowns">

          <!-- Бренд и цвет профиля -->
          <div class="configurator__dropdown">
            <button class="configurator__dropdown-trigger text-xs" type="button">
              Бренд и цвет профиля
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 9L12 15L18 9" stroke="#1B1C20" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round"/>
              </svg>
            </button>
            <div class="configurator__dropdown-body" id="dropdown-profile" style="display:none">
              <!-- Заполняется JS -->
            </div>
          </div>

          <!-- Стеклопакет -->
          <div class="configurator__dropdown">
            <button class="configurator__dropdown-trigger text-xs" type="button">
              Стеклопакет
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 9L12 15L18 9" stroke="#1B1C20" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round"/>
              </svg>
            </button>
            <div class="configurator__dropdown-body" id="dropdown-glass" style="display:none">
              <!-- Заполняется JS -->
            </div>
          </div>

          <!-- Цвет ламинации изнутри -->
          <div class="configurator__dropdown">
            <button class="configurator__dropdown-trigger text-xs" type="button">
              Цвет ламинации изнутри
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 9L12 15L18 9" stroke="#1B1C20" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round"/>
              </svg>
            </button>
            <div class="configurator__dropdown-body" id="dropdown-color-inside" style="display:none">

              <!-- Заполняется JS -->
            </div>
          </div>

          <!-- Цвет ламинации снаружи -->
          <div class="configurator__dropdown">
            <button class="configurator__dropdown-trigger text-xs" type="button">
              Цвет ламинации снаружи
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 9L12 15L18 9" stroke="#1B1C20" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round"/>
              </svg>
            </button>
            <div class="configurator__dropdown-body" id="dropdown-color-outside" style="display:none">

              <!-- Заполняется JS -->
            </div>
          </div>

          <!-- Фурнитура -->
          <div class="configurator__dropdown" id="dropdown-hardware-wrap">
            <button class="configurator__dropdown-trigger text-xs" type="button">
              Фурнитура
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 9L12 15L18 9" stroke="#1B1C20" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round"/>
              </svg>
            </button>
            <div class="configurator__dropdown-body" id="dropdown-hardware" style="display:none">
              <!-- Заполняется JS -->
            </div>
          </div>
        </div>

        <!-- Чекбоксы -->
        <div class="configurator__checkboxes" id="configurator-checkboxes">
          <label class="primary-checkbox text-xs">
            <input type="checkbox" name="cfg_warm_frame">
            <span class="primary-checkbox__marker"></span>
            Стеклопакет с терморамкой
          </label>
          <label class="primary-checkbox text-xs" id="checkbox-gluing-wrap">
            <input type="checkbox" name="cfg_gluing">
            <span class="primary-checkbox__marker"></span>
            Вклейка стеклопакета
          </label>

          <label class="primary-checkbox text-xs">
            <input type="checkbox" name="cfg_film">
            <span class="primary-checkbox__marker"></span>
            Защитная плёнка
          </label>

          <label class="primary-checkbox text-xs" id="checkbox-warm-profile-wrap">
            <input type="checkbox" name="cfg_warm_profile">
            <span class="primary-checkbox__marker"></span>
            Тёплый подставочный профиль
          </label>

          <label class="primary-checkbox text-xs configurator__checkbox-disabled" id="checkbox-hidden-hinges-wrap">
            <input type="checkbox" name="cfg_hidden_hinges" disabled>
            <span class="primary-checkbox__marker"></span>
            Скрытые петли
            <span class="configurator__info-wrap" data-tooltip="Доступно только при выборе фурнитуры ФУТУРУСС">
              <img src="/imgs/icons/info.svg" alt="Информация" class="configurator__info-icon">
            </span>
          </label>
          <label class="primary-checkbox text-xs configurator__checkbox-disabled" id="checkbox-tilt-first-wrap">
            <input type="checkbox" name="cfg_tilt_first" disabled>
            <span class="primary-checkbox__marker"></span>
            Открывание TiltFirst
            <span class="configurator__info-wrap" data-tooltip="Доступно только при выборе фурнитуры ФУТУРУСС">
              <img src="/imgs/icons/info.svg" alt="Информация" class="configurator__info-icon">
            </span>
          </label>
        </div>
      </div>
    </div>

    <!-- Форма -->
    <form class="configurator__form" id="configurator-form" enctype="multipart/form-data">

      <!-- Скрытые поля параметров -->
      <input type="hidden" name="subject" value="Заявка из конфигуратора окон / Линейка окон ПВХ">
      <input type="hidden" name="page_label"
             value="<?= htmlspecialchars($arParams['PAGE_LABEL'] ?? parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?: '') ?>">
      <input type="hidden" name="form_source" value="page">
      <input type="hidden" name="cfg_type" id="cfg_type" value="">
      <input type="hidden" name="cfg_sashes" id="cfg_sashes" value="">
      <input type="hidden" name="cfg_opening" id="cfg_opening" value="">
      <input type="hidden" name="cfg_profile" id="cfg_profile" value="">
      <input type="hidden" name="cfg_glass_type" id="cfg_glass_type" value="">
      <input type="hidden" name="cfg_color_inside" id="cfg_color_inside" value="">
      <input type="hidden" name="cfg_color_outside" id="cfg_color_outside" value="">
      <input type="hidden" name="cfg_hardware" id="cfg_hardware" value="">
      <input type="hidden" name="cfg_options" id="cfg_options" value="">
