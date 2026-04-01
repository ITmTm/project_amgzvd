<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("");
$APPLICATION->SetPageProperty("description", " Новости и события завода Амега в ".$SEO_CITY.". Производитель пластиковых ПВХ окон, дверей, алюминевых конструкций.");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetPageProperty("title", "Завод пластиковых окон в ".$SEO_CITY." | Новости ");

$breadcrumbs = [
    array(
        "title"=> "Главная",
        "url"=> "/",
    ),
    array(
        "title"=> "Новости",
