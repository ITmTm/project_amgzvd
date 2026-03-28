<?php
global $arrFilter;
$searchQuery = isset($_GET["q"]) ? trim($_GET["q"]) : "";
$arrFilter = [];
if ($searchQuery) {
    $arrFilter = ["NAME" => "%" . $searchQuery . "%"];
}
?>

<div class="news-wrapper">
    <div class="new-container">
        <!-- лоадер -->
        <div id="news-loader" class="d-none">
            <div class="news-loader-overlay">
                <div class="spinner-border text-danger" role="status">
                    <span class="visually-hidden">Загрузка...</span>
                </div>
            </div>
        </div>

        <?php $APPLICATION->IncludeComponent(
            'bitrix:news.list',
            'news.redesign',
    
        ); ?>
    </div>
</div>
