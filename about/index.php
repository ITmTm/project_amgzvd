<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Амега в ".$SEO_CITY." - компания по производству металлических и пвх конструкций");
$APPLICATION->SetPageProperty("title", "Амега в ".$SEO_CITY." - компания по производству металлических и пвх конструкций");
$APPLICATION->SetPageProperty("description", "Компания Амега в ".$SEO_CITY." ★ 13 лет на рынке ★ 34 секунды - время изготовление окна ★ 2 550 конструкций в сутки ★ Выгодные условия для дилеров ★ Система скидок ★ Собственная сеть логистики");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->AddHeadScript("/about/js/script.js");
require("banner_top.php");

$breadcrumbs = [
    array(
        "title"=> "Главная",
        "url"=> "/",
    ),
    array(
        "title"=> "О компании",
        "url"=> "",
    ),
];

require($_SERVER["DOCUMENT_ROOT"] . "/parts/breadcrumbs.php");
