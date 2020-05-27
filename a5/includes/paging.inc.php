<?php
    function paging_module() {
        echo "<div class='pagination'>";

        $prevButton =  "<a href='#'>&laquo;</a>";
        $nextButton = "<a href='#'>&raquo;</a>";
        echo $prevButton;
        echo "<a href='#'>1</a>";

        echo $nextButton;
        echo "</div>";
    }
?>