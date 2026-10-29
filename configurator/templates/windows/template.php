<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addCss($templateFolder . '/style.css');
Asset::getInstance()->addJs($templateFolder . '/script.js');
?>

<!-- Оверлей конфигуратора -->
<div class="configurator-overlay" id="configurator-overlay"></div>

