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

    </div>
</div>
