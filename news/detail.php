<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("");
$APPLICATION->SetPageProperty("description", "Амега - завод пластиковых окон в ".$SEO_CITY.". У нас вы можете купить качественные пластиковые окна по доступным ценам");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetPageProperty("title", "Завод пластиковых окон в ".$SEO_CITY.", купить окна от производителя");

?>
<?
$APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "new", // шаблон
    Array(
        "IBLOCK_ID" => "1",  // ID информационного блока
        "IBLOCK_TYPE" => "news",  // тип информационного блока
        "ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],  // параметр передаваемой страницы
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "SET_BROWSER_TITLE" => "Y",
        "SET_META_DESCRIPTION" => "Y",

    ),
    false
);
?>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");