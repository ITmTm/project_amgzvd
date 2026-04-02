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