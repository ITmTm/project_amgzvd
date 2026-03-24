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
);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");