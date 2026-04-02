<section class="py-5">
    <div class="container">
        <?
        global $arrFilter;
        $query = "";
        $page = "1";
        if (isset($_GET["q"])) {
            $query = $_GET["q"];
        }

                    </div>
                </div>
            <? endwhile; ?>
        </div>
        <? require_once($_SERVER["DOCUMENT_ROOT"] . "/parts/pagination.php");?>
    </div>
</section>