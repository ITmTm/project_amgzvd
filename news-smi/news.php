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
   
            </div>
        </div>


    </div>
</div>
