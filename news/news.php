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
                                <img src="<?= CFile::GetPath($newsItem["PREVIEW_PICTURE"]) ?>"
                                     alt="<?= $newsItem["NAME"] ?>" class="w-100"/>
                            </a>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="/imgs/icons/clock.svg" alt="Дата">
                              
                                </div>
                                <h2 class="news-title_h2 mb-3"><?= $newsItem["NAME"] ?></h2>
                                <? if ($newsItem["PREVIEW_TEXT"]): ?>
                                    <div class="mb-3">
                                        <?= $newsItem["PREVIEW_TEXT"] ?>
                                    </div>
                                <? endif ?>
                                <a href="<?= $newsItem["DETAIL_PAGE_URL"] ?>">
                                    Читать польностью
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