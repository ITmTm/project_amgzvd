<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("");
$APPLICATION->SetPageProperty("description", "Амега - завод пластиковых окон в " . $SEO_CITY . ". У нас вы можете купить качественные пластиковые окна по доступным ценам");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetPageProperty("title", "Завод пластиковых окон в " . $SEO_CITY . ", купить окна от производителя")

    function getXMLElement($CODE)
    {
        $FILTER_MATERIAL = array('GLOBAL_ACTIVE' => 'Y', 'CODE' => $CODE);
        $SELECT_MATERIAL = array("ID");
        $db_list = CIBlockElement::GetList(array(), $FILTER_MATERIAL, false, false, $SELECT_MATERIAL);
        $response = array();
        while ($ar_result = $db_list->GetNext()) {
            $response[] = $ar_result;
        }
        return $response[0];
    }
    $res = getXMLElement($_REQUEST["CODE"]);

$APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "news-smi", // шаблон
    array(
        "IBLOCK_ID" => "48",  // ID информационного блока
        "IBLOCK_TYPE" => "news",  // тип информационного блока
        "ELEMENT_ID" => $res["ID"],  // параметр передаваемой страницы
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "SET_BROWSER_TITLE" => "Y",
        "SET_META_DESCRIPTION" => "Y",
        "SET_TITLE" => "Y",
        "ADD_ELEMENT_CHAIN" => "Y"
    ),
);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");