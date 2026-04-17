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
require($_SERVER["DOCUMENT_ROOT"] . "/parts/statistics/statistics.php");?>
<section class="py-5">
    <div class="container">
        <div class="row g-3 align-items-center mb-4">
            <div class="col-lg col-12 order-lg-1 order-2 d-flex flex-column">
                <h2 class="fs-3 fw-bold mb-4">Наши продукты</h2>
                <div class="mb-4">Завод «Амега» - это мультибрендовое предприятие. Мы производим окна, балконы, двери, порталы из 6 профильных ПВХ систем, 3 алюминиевых систем, 3 видов фурнитуры для ПВХ, 5 видов фурнитуры для алюминия и 8 видов стекол. Ассортимент завода «Амега» может удовлетворить любой запрос потребителя от эконом до премиума.</div>
                <div>
                    <a href="/assets/files/presentation-amega-2026.pdf" target="_blank" class="btn btn-outline-danger btn-outline-brand-red">Ассортиментная матрица <img src="/imgs/icons/download-black.svg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-4 col-12 order-lg-2 order-1">
                <img src="/about/img/1.png" alt="" class="w-100">
            </div>