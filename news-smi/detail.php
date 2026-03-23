<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("");
$APPLICATION->SetPageProperty("description", "Амега - завод пластиковых окон в " . $SEO_CITY . ". У нас вы можете купить качественные пластиковые окна по доступным ценам");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetPageProperty("title", "Завод пластиковых окон в " . $SEO_CITY . ", купить окна от производителя")

    function getXMLElement($CODE){
        $FILTER_MATERIAL = Array('GLOBAL_ACTIVE'=>'Y', 'CODE'=>$CODE);
        $SELECT_MATERIAL = Array("ID");
    }



require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");