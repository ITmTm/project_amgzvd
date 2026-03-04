<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("Завод Амега в " . $SEO_CITY . " | Новости и события");
$APPLICATION->SetPageProperty("description", "Амега - завод пластиковых окон в " . $SEO_CITY . ". Новости и события от производителя пластиковых окон, дверей, натяжных потолков, балконных блоков");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetPageProperty("title", "Завод Амега в " . $SEO_CITY . " | Новости и события");

Bitrix\Main\Page\Asset::getInstance()->addJs("/news-smi/js/script.js");

$breadcrumbs = [
    array(
        "title" => "Главная",
        "url" => "/",
    ),
    array(
        "title" => "Новости",
        "url" => "",
    ),
];

require($_SERVER["DOCUMENT_ROOT"] . "/parts/breadcrumbs.php");
require("hero.php");

?>
