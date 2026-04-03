<section class="py-5">
    <div class="container">
        <?
        global $arrFilter;
        $query = "";
        $page = "1";
        if (isset($_GET["q"])) {
            $query = $_GET["q"];
        }
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        }
        $arrFilter = array(
            array("NAME" => "%" . $query . "%")
        );
        $PageSize = 10;
        $filter = array("=IBLOCK_ID" => 1, "NAME" => "%" . $query . "%", "ACTIVE" => "Y");
        $newsList = CIBlockElement::GetList(
            array("DATE_ACTIVE_FROM" => "DESC"),
            $filter,
            false,
            [   'nTopCount' => 0,
                'iNumPage' => $page,
                'nPageSize' => $PageSize,],
            ['DETAIL_PAGE_URL', 'PREVIEW_PICTURE', 'NAME', "DATE_ACTIVE_FROM", "PREVIEW_TEXT"]
        ); ?>

        <div class="row justify-content-between">
            <? while ($newsItem = $newsList->GetNext()): ?>
                <div class="col-12 mb-5">
                    <div class="row">
                        <div class="col-4">
                            <a href="<?= $newsItem["DETAIL_PAGE_URL"] ?>" class="mb-3">
         
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <? endwhile; ?>
        </div>
        <? require_once($_SERVER["DOCUMENT_ROOT"] . "/parts/pagination.php");?>
    </div>
</section>